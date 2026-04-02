<?php
require_once __DIR__ . '/../config.php';

$db = get_db();

// Tabela de usuários
$db->exec("CREATE TABLE IF NOT EXISTS users (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    name TEXT NOT NULL,
    email TEXT NOT NULL UNIQUE,
    password TEXT NOT NULL,
    role TEXT DEFAULT 'admin',
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP
)");

// Tabela de categorias do blog
$db->exec("CREATE TABLE IF NOT EXISTS blog_categories (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    name TEXT NOT NULL,
    slug TEXT NOT NULL UNIQUE,
    description TEXT DEFAULT '',
    active INTEGER DEFAULT 1,
    sort_order INTEGER DEFAULT 0,
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP
)");

// Migrar coluna category_id se tabela blog_posts já existe
try { $db->exec("ALTER TABLE blog_posts ADD COLUMN category_id INTEGER DEFAULT NULL"); } catch (\Exception $e) {}

// Tabela de posts do blog
$db->exec("CREATE TABLE IF NOT EXISTS blog_posts (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    title TEXT NOT NULL,
    slug TEXT NOT NULL UNIQUE,
    excerpt TEXT DEFAULT '',
    content TEXT NOT NULL,
    image TEXT DEFAULT '',
    meta_title TEXT DEFAULT '',
    meta_description TEXT DEFAULT '',
    meta_keywords TEXT DEFAULT '',
    author TEXT DEFAULT 'Altustec',
    active INTEGER DEFAULT 1,
    featured INTEGER DEFAULT 0,
    views INTEGER DEFAULT 0,
    category_id INTEGER DEFAULT NULL,
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
    updated_at DATETIME DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (category_id) REFERENCES blog_categories(id) ON DELETE SET NULL
)");

// Tabela de analytics - visitantes e pageviews
$db->exec("CREATE TABLE IF NOT EXISTS analytics_pageviews (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    page_url TEXT NOT NULL,
    page_title TEXT DEFAULT '',
    visitor_id TEXT NOT NULL,
    session_id TEXT NOT NULL,
    ip_address TEXT DEFAULT '',
    user_agent TEXT DEFAULT '',
    referrer TEXT DEFAULT '',
    device_type TEXT DEFAULT 'desktop',
    country TEXT DEFAULT '',
    duration INTEGER DEFAULT 0,
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP
)");

// Tabela de sessões de visitantes
$db->exec("CREATE TABLE IF NOT EXISTS analytics_sessions (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    session_id TEXT NOT NULL UNIQUE,
    visitor_id TEXT NOT NULL,
    ip_address TEXT DEFAULT '',
    user_agent TEXT DEFAULT '',
    referrer TEXT DEFAULT '',
    device_type TEXT DEFAULT 'desktop',
    pages_viewed INTEGER DEFAULT 1,
    duration INTEGER DEFAULT 0,
    started_at DATETIME DEFAULT CURRENT_TIMESTAMP,
    last_activity DATETIME DEFAULT CURRENT_TIMESTAMP
)");

// Índices para performance
$db->exec("CREATE INDEX IF NOT EXISTS idx_pageviews_created ON analytics_pageviews(created_at)");
$db->exec("CREATE INDEX IF NOT EXISTS idx_pageviews_visitor ON analytics_pageviews(visitor_id)");
$db->exec("CREATE INDEX IF NOT EXISTS idx_pageviews_page ON analytics_pageviews(page_url)");
$db->exec("CREATE INDEX IF NOT EXISTS idx_sessions_visitor ON analytics_sessions(visitor_id)");
$db->exec("CREATE INDEX IF NOT EXISTS idx_sessions_started ON analytics_sessions(started_at)");

// Tabela de configurações
$db->exec("CREATE TABLE IF NOT EXISTS settings (
    key TEXT PRIMARY KEY,
    value TEXT DEFAULT ''
)");

// Configurações padrão
$defaults = [
    'site_name' => 'Altustec - Suporte de TI e Manutenção em Guarulhos',
    'site_description' => 'Especialistas em suporte de TI, manutenção de notebooks e computadores em Guarulhos, SP',
    'site_keywords' => 'suporte TI Guarulhos, manutenção notebook, manutenção computador, assistência técnica',
    'footer_text' => '© ' . date('Y') . ' Altustec. Todos os direitos reservados.',
    'analytics_code' => '',
    'adsense_code' => 'ca-pub-2935633410371712',
];

$stmt = $db->prepare('INSERT OR IGNORE INTO settings (key, value) VALUES (:key, :value)');
foreach ($defaults as $key => $value) {
    $stmt->execute([':key' => $key, ':value' => $value]);
}

// Categorias padrão do blog
$catExists = $db->query("SELECT COUNT(*) FROM blog_categories")->fetchColumn();
if ($catExists == 0) {
    $cats = [
        ['Desempenho', 'desempenho', 'Dicas para melhorar a velocidade e desempenho do notebook'],
        ['Hardware', 'hardware', 'Informações sobre componentes e upgrades de hardware'],
        ['Teclado', 'teclado', 'Dicas e soluções para problemas com o teclado do notebook'],
        ['Bateria', 'bateria', 'Cuidados, testes e informações sobre bateria de notebook'],
        ['Software', 'software', 'Dicas de software, downloads e configurações'],
        ['Tela e Vídeo', 'tela-e-video', 'Tudo sobre tela, placa de vídeo e exibição'],
        ['Manutenção', 'manutencao', 'Limpeza, cuidados e manutenção preventiva do notebook'],
    ];
    $stmt = $db->prepare("INSERT INTO blog_categories (name, slug, description, sort_order) VALUES (?, ?, ?, ?)");
    foreach ($cats as $i => $cat) {
        $stmt->execute([$cat[0], $cat[1], $cat[2], $i]);
    }
    echo "Categorias do blog criadas.\n";
}

// Criar usuário admin padrão
$adminExists = $db->query("SELECT COUNT(*) FROM users")->fetchColumn();
if ($adminExists == 0) {
    $stmt = $db->prepare("INSERT INTO users (name, email, password, role) VALUES (:name, :email, :password, 'admin')");
    $stmt->execute([
        ':name' => 'Administrador',
        ':email' => 'admin@altusci.com.br',
        ':password' => password_hash('admin123', PASSWORD_DEFAULT),
    ]);
    echo "Usuario admin criado: admin@altusci.com.br / admin123\n";
}

// Seed dos posts do blog se tabela estiver vazia
$postCount = $db->query("SELECT COUNT(*) FROM blog_posts")->fetchColumn();
if ($postCount == 0 && file_exists(__DIR__ . '/seed_blog.php')) {
    require_once __DIR__ . '/seed_blog.php';
    echo "Posts do blog inseridos.\n";
}

echo "Migracao concluida com sucesso!\n";
