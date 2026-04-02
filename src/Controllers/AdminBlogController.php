<?php
require_once BASE_PATH . '/config.php';

class AdminBlogController {

    public function index(): void {
        require_login();
        $db = get_db();
        $posts = $db->query("SELECT p.*, c.name as category_name FROM blog_posts p LEFT JOIN blog_categories c ON p.category_id = c.id ORDER BY p.created_at DESC")->fetchAll();

        $pageTitle = 'Blog Posts';
        $contentTemplate = BASE_PATH . '/templates/admin/blog/index_content.php';
        include BASE_PATH . '/templates/layouts/admin.php';
    }

    public function create(): void {
        require_login();
        $db = get_db();
        $post = ['id' => '', 'title' => '', 'slug' => '', 'excerpt' => '', 'content' => '', 'image' => '', 'meta_title' => '', 'meta_description' => '', 'meta_keywords' => '', 'author' => 'Altustec', 'active' => 1, 'featured' => 0, 'category_id' => ''];
        $categories = $db->query("SELECT * FROM blog_categories WHERE active = 1 ORDER BY sort_order, name")->fetchAll();

        $pageTitle = 'Novo Post';
        $contentTemplate = BASE_PATH . '/templates/admin/blog/form_content.php';
        include BASE_PATH . '/templates/layouts/admin.php';
    }

    public function store(): void {
        require_login();
        if (!verify_csrf($_POST['csrf_token'] ?? '')) {
            flash('error', 'Token inválido.');
            header('Location: /admin/blog/criar');
            exit;
        }

        $db = get_db();
        $title = trim($_POST['title'] ?? '');
        $postSlug = trim($_POST['slug'] ?? '') ?: slug($title);
        $excerpt = trim($_POST['excerpt'] ?? '');
        $content = $_POST['content'] ?? '';
        $image = trim($_POST['image'] ?? '');
        $metaTitle = trim($_POST['meta_title'] ?? '') ?: $title;
        $metaDesc = trim($_POST['meta_description'] ?? '') ?: $excerpt;
        $metaKeys = trim($_POST['meta_keywords'] ?? '');
        $author = trim($_POST['author'] ?? 'Altustec');
        $categoryId = !empty($_POST['category_id']) ? (int)$_POST['category_id'] : null;
        $active = isset($_POST['active']) ? 1 : 0;
        $featured = isset($_POST['featured']) ? 1 : 0;

        // Upload de imagem
        if (!empty($_FILES['image_file']['name'])) {
            $image = $this->uploadImage($_FILES['image_file']);
        }

        if (empty($title) || empty($content)) {
            flash('error', 'Título e conteúdo são obrigatórios.');
            header('Location: /admin/blog/criar');
            exit;
        }

        $stmt = $db->prepare("INSERT INTO blog_posts (title, slug, excerpt, content, image, meta_title, meta_description, meta_keywords, author, active, featured, category_id) VALUES (:title, :slug, :excerpt, :content, :image, :meta_title, :meta_description, :meta_keywords, :author, :active, :featured, :category_id)");
        $stmt->execute([
            ':title' => $title,
            ':slug' => $postSlug,
            ':excerpt' => $excerpt,
            ':content' => $content,
            ':image' => $image,
            ':meta_title' => $metaTitle,
            ':meta_description' => $metaDesc,
            ':meta_keywords' => $metaKeys,
            ':author' => $author,
            ':active' => $active,
            ':featured' => $featured,
            ':category_id' => $categoryId,
        ]);

        flash('success', 'Post criado com sucesso!');
        header('Location: /admin/blog');
        exit;
    }

    public function edit(string $id): void {
        require_login();
        $db = get_db();
        $stmt = $db->prepare("SELECT * FROM blog_posts WHERE id = :id");
        $stmt->execute([':id' => $id]);
        $post = $stmt->fetch();

        if (!$post) {
            flash('error', 'Post não encontrado.');
            header('Location: /admin/blog');
            exit;
        }

        $categories = $db->query("SELECT * FROM blog_categories WHERE active = 1 ORDER BY sort_order, name")->fetchAll();

        $pageTitle = 'Editar Post';
        $contentTemplate = BASE_PATH . '/templates/admin/blog/form_content.php';
        include BASE_PATH . '/templates/layouts/admin.php';
    }

    public function update(string $id): void {
        require_login();
        if (!verify_csrf($_POST['csrf_token'] ?? '')) {
            flash('error', 'Token inválido.');
            header('Location: /admin/blog/editar/' . $id);
            exit;
        }

        $db = get_db();
        $title = trim($_POST['title'] ?? '');
        $postSlug = trim($_POST['slug'] ?? '') ?: slug($title);
        $excerpt = trim($_POST['excerpt'] ?? '');
        $content = $_POST['content'] ?? '';
        $image = trim($_POST['image'] ?? '');
        $metaTitle = trim($_POST['meta_title'] ?? '') ?: $title;
        $metaDesc = trim($_POST['meta_description'] ?? '') ?: $excerpt;
        $metaKeys = trim($_POST['meta_keywords'] ?? '');
        $author = trim($_POST['author'] ?? 'Altustec');
        $categoryId = !empty($_POST['category_id']) ? (int)$_POST['category_id'] : null;
        $active = isset($_POST['active']) ? 1 : 0;
        $featured = isset($_POST['featured']) ? 1 : 0;

        if (!empty($_FILES['image_file']['name'])) {
            $image = $this->uploadImage($_FILES['image_file']);
        }

        if (empty($title) || empty($content)) {
            flash('error', 'Título e conteúdo são obrigatórios.');
            header('Location: /admin/blog/editar/' . $id);
            exit;
        }

        $stmt = $db->prepare("UPDATE blog_posts SET title = :title, slug = :slug, excerpt = :excerpt, content = :content, image = :image, meta_title = :meta_title, meta_description = :meta_description, meta_keywords = :meta_keywords, author = :author, active = :active, featured = :featured, category_id = :category_id, updated_at = CURRENT_TIMESTAMP WHERE id = :id");
        $stmt->execute([
            ':title' => $title,
            ':slug' => $postSlug,
            ':excerpt' => $excerpt,
            ':content' => $content,
            ':image' => $image,
            ':meta_title' => $metaTitle,
            ':meta_description' => $metaDesc,
            ':meta_keywords' => $metaKeys,
            ':author' => $author,
            ':active' => $active,
            ':featured' => $featured,
            ':category_id' => $categoryId,
            ':id' => $id,
        ]);

        flash('success', 'Post atualizado com sucesso!');
        header('Location: /admin/blog');
        exit;
    }

    public function delete(string $id): void {
        require_login();
        if (!verify_csrf($_POST['csrf_token'] ?? '')) {
            flash('error', 'Token inválido.');
            header('Location: /admin/blog');
            exit;
        }

        $db = get_db();
        $stmt = $db->prepare("DELETE FROM blog_posts WHERE id = :id");
        $stmt->execute([':id' => $id]);

        flash('success', 'Post excluído.');
        header('Location: /admin/blog');
        exit;
    }

    private function uploadImage(array $file): string {
        $allowedTypes = ['image/jpeg', 'image/png', 'image/webp', 'image/gif'];
        if (!in_array($file['type'], $allowedTypes)) return '';

        $ext = pathinfo($file['name'], PATHINFO_EXTENSION);
        $filename = 'blog_' . uniqid() . '.' . $ext;
        $dest = BASE_PATH . '/public/assets/img/uploads/' . $filename;

        if (move_uploaded_file($file['tmp_name'], $dest)) {
            return '/assets/img/uploads/' . $filename;
        }
        return '';
    }
}
