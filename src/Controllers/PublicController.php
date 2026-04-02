<?php
require_once BASE_PATH . '/config.php';

class PublicController {

    public function home(): void {
        $db = get_db();
        $latestPosts = $db->query("SELECT * FROM blog_posts WHERE active = 1 ORDER BY created_at DESC LIMIT 6")->fetchAll();

        $currentPage = 'home';
        $contentTemplate = BASE_PATH . '/templates/public/home_content.php';
        include BASE_PATH . '/templates/layouts/public.php';
    }

    public function servicos(): void {
        $currentPage = 'servicos';
        $pageTitle = 'Serviços - Altustec | Suporte de TI e Manutenção em Guarulhos';
        $pageDescription = 'Conheça nossos serviços de suporte de TI, manutenção de notebooks e computadores, consultoria técnica e mais.';
        $contentTemplate = BASE_PATH . '/templates/public/servicos_content.php';
        include BASE_PATH . '/templates/layouts/public.php';
    }

    public function contato(): void {
        $currentPage = 'contato';
        $pageTitle = 'Contato - Altustec | Fale Conosco';
        $pageDescription = 'Entre em contato com a Altustec para suporte de TI, manutenção de notebooks e computadores em Guarulhos.';
        $contentTemplate = BASE_PATH . '/templates/public/contato_content.php';
        include BASE_PATH . '/templates/layouts/public.php';
    }

    public function compramosNotebook(): void {
        $currentPage = 'compramos';
        $pageTitle = 'Compramos seu Notebook Usado - Altustec Guarulhos';
        $pageDescription = 'Vendemos seu notebook usado com segurança. Avaliação justa e pagamento rápido em Guarulhos.';
        $contentTemplate = BASE_PATH . '/templates/public/compramos_content.php';
        include BASE_PATH . '/templates/layouts/public.php';
    }

    public function pendriveBootavel(): void {
        $pageTitle = 'Como Criar um Pendrive Bootável do Mac no Windows - Altustec';
        $pageDescription = 'Aprenda passo a passo como criar um pendrive bootável do macOS usando um computador com Windows.';
        $contentTemplate = BASE_PATH . '/templates/public/pendrive_content.php';
        include BASE_PATH . '/templates/layouts/public.php';
    }

    public function sitemap(): void {
        header('Content-Type: application/xml; charset=utf-8');

        $db = get_db();
        $posts = $db->query("SELECT slug, updated_at FROM blog_posts WHERE active = 1 ORDER BY updated_at DESC")->fetchAll();

        $baseUrl = SITE_URL;

        echo '<?xml version="1.0" encoding="UTF-8"?>' . "\n";
        echo '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">' . "\n";

        // Páginas estáticas
        $staticPages = [
            ['/', '1.0', 'weekly'],
            ['/servicos', '0.8', 'monthly'],
            ['/contato', '0.7', 'monthly'],
            ['/compramos-seu-notebook-usado', '0.8', 'monthly'],
            ['/como-criar-um-pendrive-bootavel-do-mac-no-windows', '0.6', 'yearly'],
            ['/blog', '0.9', 'daily'],
        ];

        foreach ($staticPages as $sp) {
            echo "  <url>\n";
            echo "    <loc>{$baseUrl}{$sp[0]}</loc>\n";
            echo "    <priority>{$sp[1]}</priority>\n";
            echo "    <changefreq>{$sp[2]}</changefreq>\n";
            echo "  </url>\n";
        }

        // Blog posts
        foreach ($posts as $post) {
            $lastmod = date('Y-m-d', strtotime($post['updated_at']));
            echo "  <url>\n";
            echo "    <loc>{$baseUrl}/blog/" . htmlspecialchars($post['slug']) . "</loc>\n";
            echo "    <lastmod>{$lastmod}</lastmod>\n";
            echo "    <priority>0.7</priority>\n";
            echo "    <changefreq>monthly</changefreq>\n";
            echo "  </url>\n";
        }

        echo '</urlset>';
        exit;
    }
}
