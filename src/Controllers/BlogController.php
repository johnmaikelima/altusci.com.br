<?php
require_once BASE_PATH . '/config.php';

class BlogController {

    public function index(): void {
        $db = get_db();
        $page = max(1, (int)($_GET['page'] ?? 1));
        $perPage = 12;
        $offset = ($page - 1) * $perPage;
        $categoryFilter = $_GET['categoria'] ?? '';

        $where = "WHERE p.active = 1";
        $params = [];
        if ($categoryFilter) {
            $where .= " AND c.slug = :cat_slug";
            $params[':cat_slug'] = $categoryFilter;
        }

        $stmt = $db->prepare("SELECT p.*, c.name as category_name, c.slug as category_slug FROM blog_posts p LEFT JOIN blog_categories c ON p.category_id = c.id {$where} ORDER BY p.created_at DESC LIMIT :limit OFFSET :offset");
        foreach ($params as $k => $v) $stmt->bindValue($k, $v);
        $stmt->bindValue(':limit', $perPage, PDO::PARAM_INT);
        $stmt->bindValue(':offset', $offset, PDO::PARAM_INT);
        $stmt->execute();
        $posts = $stmt->fetchAll();

        $countStmt = $db->prepare("SELECT COUNT(*) FROM blog_posts p LEFT JOIN blog_categories c ON p.category_id = c.id {$where}");
        foreach ($params as $k => $v) $countStmt->bindValue($k, $v);
        $countStmt->execute();
        $total = $countStmt->fetchColumn();
        $totalPages = (int)ceil($total / $perPage);

        $categories = $db->query("SELECT c.*, (SELECT COUNT(*) FROM blog_posts WHERE category_id = c.id AND active = 1) as post_count FROM blog_categories c WHERE c.active = 1 ORDER BY c.sort_order, c.name")->fetchAll();

        $featured = $db->query("SELECT p.*, c.name as category_name FROM blog_posts p LEFT JOIN blog_categories c ON p.category_id = c.id WHERE p.active = 1 AND p.featured = 1 ORDER BY p.created_at DESC LIMIT 3")->fetchAll();

        $currentPage = 'blog';
        $pageTitle = 'Blog - Dicas e Tutoriais sobre Notebooks | Altustec';
        $pageDescription = 'Confira nossas dicas, tutoriais e guias sobre notebooks, computadores e tecnologia. Aprenda a resolver problemas e otimizar seu equipamento.';
        $pageKeywords = 'blog notebook, dicas notebook, tutoriais computador, manutenção notebook, dicas tecnologia';
        $contentTemplate = BASE_PATH . '/templates/public/blog_index.php';
        include BASE_PATH . '/templates/layouts/public.php';
    }

    public function show(string $slug): void {
        $db = get_db();
        $stmt = $db->prepare("SELECT p.*, c.name as category_name, c.slug as category_slug FROM blog_posts p LEFT JOIN blog_categories c ON p.category_id = c.id WHERE p.slug = :slug AND p.active = 1");
        $stmt->execute([':slug' => $slug]);
        $post = $stmt->fetch();

        if (!$post) {
            http_response_code(404);
            include BASE_PATH . '/templates/public/404.php';
            return;
        }

        // Incrementar views
        $db->prepare("UPDATE blog_posts SET views = views + 1 WHERE id = :id")->execute([':id' => $post['id']]);

        // Posts relacionados
        $related = $db->prepare("SELECT * FROM blog_posts WHERE active = 1 AND id != :id ORDER BY RANDOM() LIMIT 4");
        $related->execute([':id' => $post['id']]);
        $relatedPosts = $related->fetchAll();

        $currentPage = 'blog';
        $pageTitle = ($post['meta_title'] ?: $post['title']) . ' | Altustec';
        $pageDescription = $post['meta_description'] ?: truncate(strip_tags($post['excerpt'] ?: $post['content']), 160);
        $pageKeywords = $post['meta_keywords'];
        $ogType = 'article';
        $ogImage = $post['image'] ? SITE_URL . $post['image'] : '';
        $contentTemplate = BASE_PATH . '/templates/public/blog_post.php';

        // Schema.org structured data for article
        $extraHead = '<script type="application/ld+json">' . json_encode([
            '@context' => 'https://schema.org',
            '@type' => 'Article',
            'headline' => $post['title'],
            'description' => $pageDescription,
            'author' => ['@type' => 'Organization', 'name' => $post['author'] ?: 'Altustec'],
            'publisher' => ['@type' => 'Organization', 'name' => 'Altustec', 'logo' => ['@type' => 'ImageObject', 'url' => SITE_URL . '/logo.png']],
            'datePublished' => $post['created_at'],
            'dateModified' => $post['updated_at'],
            'mainEntityOfPage' => SITE_URL . '/blog/' . $post['slug'],
            'image' => $post['image'] ? SITE_URL . $post['image'] : '',
        ], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE) . '</script>';

        include BASE_PATH . '/templates/layouts/public.php';
    }
}
