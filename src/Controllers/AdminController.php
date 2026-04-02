<?php
require_once BASE_PATH . '/config.php';

class AdminController {

    public function dashboard(): void {
        require_login();
        $db = get_db();

        $stats = [
            'total_posts' => $db->query("SELECT COUNT(*) FROM blog_posts")->fetchColumn(),
            'active_posts' => $db->query("SELECT COUNT(*) FROM blog_posts WHERE active = 1")->fetchColumn(),
            'total_views' => $db->query("SELECT COALESCE(SUM(views), 0) FROM blog_posts")->fetchColumn(),
            'featured_posts' => $db->query("SELECT COUNT(*) FROM blog_posts WHERE featured = 1")->fetchColumn(),
        ];

        $recent_posts = $db->query("SELECT * FROM blog_posts ORDER BY created_at DESC LIMIT 10")->fetchAll();

        $pageTitle = 'Dashboard';
        $contentTemplate = BASE_PATH . '/templates/admin/dashboard_content.php';
        include BASE_PATH . '/templates/layouts/admin.php';
    }
}
