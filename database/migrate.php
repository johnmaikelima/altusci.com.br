<?php
require_once __DIR__ . '/../config.php';

$db = get_db();

// Tabela de usuários
$db->exec("CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    role VARCHAR(50) DEFAULT 'admin',
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci");

// Tabela de categorias do blog
$db->exec("CREATE TABLE IF NOT EXISTS blog_categories (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    slug VARCHAR(255) NOT NULL UNIQUE,
    description TEXT,
    active TINYINT DEFAULT 1,
    sort_order INT DEFAULT 0,
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci");

// Migrar coluna category_id se tabela blog_posts já existe
try { $db->exec("ALTER TABLE blog_posts ADD COLUMN category_id INT DEFAULT NULL"); } catch (\Exception $e) {}

// Tabela de posts do blog
$db->exec("CREATE TABLE IF NOT EXISTS blog_posts (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(500) NOT NULL,
    slug VARCHAR(500) NOT NULL UNIQUE,
    excerpt TEXT,
    content LONGTEXT NOT NULL,
    image VARCHAR(500) DEFAULT '',
    meta_title VARCHAR(500) DEFAULT '',
    meta_description TEXT,
    meta_keywords TEXT,
    author VARCHAR(255) DEFAULT 'Altustec',
    active TINYINT DEFAULT 1,
    featured TINYINT DEFAULT 0,
    views INT DEFAULT 0,
    category_id INT DEFAULT NULL,
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
    updated_at DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (category_id) REFERENCES blog_categories(id) ON DELETE SET NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci");

// Tabela de analytics - visitantes e pageviews
$db->exec("CREATE TABLE IF NOT EXISTS analytics_pageviews (
    id INT AUTO_INCREMENT PRIMARY KEY,
    page_url VARCHAR(500) NOT NULL,
    page_title VARCHAR(500) DEFAULT '',
    visitor_id VARCHAR(64) NOT NULL,
    session_id VARCHAR(128) NOT NULL,
    ip_address VARCHAR(45) DEFAULT '',
    user_agent VARCHAR(500) DEFAULT '',
    referrer VARCHAR(1000) DEFAULT '',
    device_type VARCHAR(20) DEFAULT 'desktop',
    country VARCHAR(100) DEFAULT '',
    duration INT DEFAULT 0,
    status VARCHAR(20) DEFAULT 'valid',
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci");

// Migrar coluna status se não existir
try { $db->exec("ALTER TABLE analytics_pageviews ADD COLUMN status VARCHAR(20) DEFAULT 'valid'"); } catch (\Exception $e) {}

// Tabela de sessões de visitantes
$db->exec("CREATE TABLE IF NOT EXISTS analytics_sessions (
    id INT AUTO_INCREMENT PRIMARY KEY,
    session_id VARCHAR(128) NOT NULL UNIQUE,
    visitor_id VARCHAR(64) NOT NULL,
    ip_address VARCHAR(45) DEFAULT '',
    user_agent VARCHAR(500) DEFAULT '',
    referrer VARCHAR(1000) DEFAULT '',
    device_type VARCHAR(20) DEFAULT 'desktop',
    pages_viewed INT DEFAULT 1,
    duration INT DEFAULT 0,
    started_at DATETIME DEFAULT CURRENT_TIMESTAMP,
    last_activity DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci");

// Índices para performance
try { $db->exec("CREATE INDEX idx_pageviews_created ON analytics_pageviews(created_at)"); } catch (\Exception $e) {}
try { $db->exec("CREATE INDEX idx_pageviews_visitor ON analytics_pageviews(visitor_id)"); } catch (\Exception $e) {}
try { $db->exec("CREATE INDEX idx_pageviews_page ON analytics_pageviews(page_url(191))"); } catch (\Exception $e) {}
try { $db->exec("CREATE INDEX idx_sessions_visitor ON analytics_sessions(visitor_id)"); } catch (\Exception $e) {}
try { $db->exec("CREATE INDEX idx_sessions_started ON analytics_sessions(started_at)"); } catch (\Exception $e) {}

// Tabela de configurações
$db->exec("CREATE TABLE IF NOT EXISTS settings (
    `key` VARCHAR(255) PRIMARY KEY,
    `value` TEXT
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci");

// Configurações padrão
$defaults = [
    'site_name' => 'Altustec - Suporte de TI e Manutenção em Guarulhos',
    'site_description' => 'Especialistas em suporte de TI, manutenção de notebooks e computadores em Guarulhos, SP',
    'site_keywords' => 'suporte TI Guarulhos, manutenção notebook, manutenção computador, assistência técnica',
    'footer_text' => '© ' . date('Y') . ' Altustec. Todos os direitos reservados.',
    'analytics_code' => '',
    'adsense_code' => 'ca-pub-2935633410371712',
    'site_logo' => '/logo.png',
    'contact_phone' => '(11) 98775-6034',
    'contact_whatsapp' => '5511987756034',
    'contact_email' => 'contato@altusci.com.br',
    'contact_address' => 'Estrada dos Vados, 551',
    'contact_city' => 'Guarulhos, SP',
    'contact_hours' => 'Seg a Sex: 9h às 18h | Sáb: 9h às 13h',
    'social_instagram' => '',
    'social_facebook' => '',
    'social_youtube' => '',
    'social_linkedin' => '',
];

$stmt = $db->prepare('INSERT IGNORE INTO settings (`key`, `value`) VALUES (:key, :value)');
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
