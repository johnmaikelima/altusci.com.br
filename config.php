<?php
/**
 * Configurações gerais do sistema - Altustec
 */

// Timezone
date_default_timezone_set('America/Sao_Paulo');

// Session segura
if (session_status() === PHP_SESSION_NONE) {
    ini_set('session.cookie_httponly', 1);
    ini_set('session.use_strict_mode', 1);
    ini_set('session.cookie_samesite', 'Strict');
    session_start();
}

// Caminho base
define('BASE_PATH', __DIR__);
define('SITE_NAME', 'Altustec - Suporte de TI e Manutenção em Guarulhos');
define('SITE_URL', 'https://altusci.com.br');

// Database config (MySQL)
define('DB_HOST', '154.12.241.156');
define('DB_PORT', '3306');
define('DB_NAME', 'altu_sistema');
define('DB_USER', 'altu_sistema');
define('DB_PASS', 'REMOVED');

// CSRF Token
function csrf_token(): string {
    if (empty($_SESSION['csrf_token'])) {
        $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
    }
    return $_SESSION['csrf_token'];
}

function csrf_field(): string {
    return '<input type="hidden" name="csrf_token" value="' . csrf_token() . '">';
}

function verify_csrf(string $token): bool {
    return isset($_SESSION['csrf_token']) && hash_equals($_SESSION['csrf_token'], $token);
}

// Flash messages
function flash(string $type, string $message): void {
    $_SESSION['flash'][] = ['type' => $type, 'message' => $message];
}

function get_flashes(): array {
    $flashes = $_SESSION['flash'] ?? [];
    unset($_SESSION['flash']);
    return $flashes;
}

// Auth helpers
function is_logged_in(): bool {
    return !empty($_SESSION['user_id']);
}

function require_login(): void {
    if (!is_logged_in()) {
        header('Location: /admin/login');
        exit;
    }
}

function current_user(): ?array {
    if (!is_logged_in()) return null;
    $db = get_db();
    $stmt = $db->prepare('SELECT * FROM users WHERE id = :id');
    $stmt->execute([':id' => $_SESSION['user_id']]);
    return $stmt->fetch(PDO::FETCH_ASSOC) ?: null;
}

// Database connection (MySQL)
function get_db(): PDO {
    static $db = null;
    if ($db === null) {
        $dsn = 'mysql:host=' . DB_HOST . ';port=' . DB_PORT . ';dbname=' . DB_NAME . ';charset=utf8mb4';
        $db = new PDO($dsn, DB_USER, DB_PASS, [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        ]);
    }
    return $db;
}

// Sanitização
function e(string $str): string {
    return htmlspecialchars($str, ENT_QUOTES, 'UTF-8');
}

function slug(string $str): string {
    $str = mb_strtolower($str, 'UTF-8');
    $str = preg_replace('/[áàâãä]/u', 'a', $str);
    $str = preg_replace('/[éèêë]/u', 'e', $str);
    $str = preg_replace('/[íìîï]/u', 'i', $str);
    $str = preg_replace('/[óòôõö]/u', 'o', $str);
    $str = preg_replace('/[úùûü]/u', 'u', $str);
    $str = preg_replace('/[ç]/u', 'c', $str);
    $str = preg_replace('/[^a-z0-9\s-]/', '', $str);
    $str = preg_replace('/[\s-]+/', '-', $str);
    return trim($str, '-');
}

// Truncar texto
function truncate(string $str, int $length = 160): string {
    if (mb_strlen($str) <= $length) return $str;
    return mb_substr($str, 0, $length) . '...';
}

// Formatar data
function format_date(string $date): string {
    $d = new DateTime($date);
    $meses = ['janeiro','fevereiro','março','abril','maio','junho','julho','agosto','setembro','outubro','novembro','dezembro'];
    return $d->format('d') . ' de ' . $meses[(int)$d->format('m') - 1] . ' de ' . $d->format('Y');
}

// Configurações do banco
function get_setting(string $key, string $default = ''): string {
    static $cache = [];
    if (isset($cache[$key])) return $cache[$key];
    $db = get_db();
    $stmt = $db->prepare('SELECT `value` FROM settings WHERE `key` = :key');
    $stmt->execute([':key' => $key]);
    $row = $stmt->fetch();
    $cache[$key] = $row ? $row['value'] : $default;
    return $cache[$key];
}

// ============================================================
// Analytics / Tracking
// ============================================================

function get_visitor_id(): string {
    if (!isset($_COOKIE['_alt_vid'])) {
        $vid = bin2hex(random_bytes(16));
        setcookie('_alt_vid', $vid, [
            'expires' => time() + 86400 * 365 * 2,
            'path' => '/',
            'httponly' => true,
            'samesite' => 'Lax',
        ]);
        $_COOKIE['_alt_vid'] = $vid;
    }
    return $_COOKIE['_alt_vid'];
}

function detect_device(string $ua): string {
    if (preg_match('/Mobile|Android.*Mobile|iPhone|iPod/i', $ua)) return 'mobile';
    if (preg_match('/iPad|Android(?!.*Mobile)|Tablet/i', $ua)) return 'tablet';
    return 'desktop';
}

function track_pageview(string $pageTitle = '', string $status = 'valid'): void {
    // Não rastrear bots, requests de admin, ou assets
    $ua = $_SERVER['HTTP_USER_AGENT'] ?? '';
    $uri = $_SERVER['REQUEST_URI'] ?? '/';
    if (preg_match('/bot|crawl|spider|slurp|Googlebot|Bingbot/i', $ua)) return;
    if (str_starts_with($uri, '/admin')) return;
    if (preg_match('/\.(css|js|png|jpg|jpeg|gif|ico|svg|webp|woff|woff2|xml)$/i', $uri)) return;

    // Respeitar opt-out de cookies
    if (isset($_COOKIE['_alt_consent']) && $_COOKIE['_alt_consent'] === 'denied') return;

    $db = get_db();
    $visitorId = get_visitor_id();
    $sessionId = session_id();
    $ip = $_SERVER['REMOTE_ADDR'] ?? '';
    $referrer = $_SERVER['HTTP_REFERER'] ?? '';
    $device = detect_device($ua);

    // Registrar pageview
    $stmt = $db->prepare("INSERT INTO analytics_pageviews (page_url, page_title, visitor_id, session_id, ip_address, user_agent, referrer, device_type, status) VALUES (:url, :title, :vid, :sid, :ip, :ua, :ref, :device, :status)");
    $stmt->execute([
        ':url' => parse_url($uri, PHP_URL_PATH),
        ':title' => $pageTitle,
        ':vid' => $visitorId,
        ':sid' => $sessionId,
        ':ip' => $ip,
        ':ua' => substr($ua, 0, 500),
        ':ref' => $referrer,
        ':device' => $device,
        ':status' => $status,
    ]);

    // Gerenciar sessão
    $existing = $db->prepare("SELECT id, pages_viewed FROM analytics_sessions WHERE session_id = :sid");
    $existing->execute([':sid' => $sessionId]);
    $session = $existing->fetch();

    if ($session) {
        $db->prepare("UPDATE analytics_sessions SET pages_viewed = pages_viewed + 1, last_activity = NOW(), duration = TIMESTAMPDIFF(SECOND, started_at, NOW()) WHERE id = :id")
            ->execute([':id' => $session['id']]);
    } else {
        $db->prepare("INSERT INTO analytics_sessions (session_id, visitor_id, ip_address, user_agent, referrer, device_type) VALUES (:sid, :vid, :ip, :ua, :ref, :device)")
            ->execute([':sid' => $sessionId, ':vid' => $visitorId, ':ip' => $ip, ':ua' => substr($ua, 0, 500), ':ref' => $referrer, ':device' => $device]);
    }
}

// Tempo de leitura estimado
function reading_time(string $content): int {
    $words = str_word_count(strip_tags($content));
    return max(1, (int)ceil($words / 200));
}
