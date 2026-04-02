<?php
require_once BASE_PATH . '/config.php';

class AdminCategoryController {

    public function index(): void {
        require_login();
        $db = get_db();
        $categories = $db->query("SELECT c.*, (SELECT COUNT(*) FROM blog_posts WHERE category_id = c.id) as post_count FROM blog_categories c ORDER BY c.sort_order, c.name")->fetchAll();

        $pageTitle = 'Categorias do Blog';
        $contentTemplate = BASE_PATH . '/templates/admin/categories_content.php';
        include BASE_PATH . '/templates/layouts/admin.php';
    }

    public function store(): void {
        require_login();
        if (!verify_csrf($_POST['csrf_token'] ?? '')) {
            flash('error', 'Token inválido.');
            header('Location: /admin/categorias');
            exit;
        }

        $db = get_db();
        $name = trim($_POST['name'] ?? '');
        $catSlug = trim($_POST['slug'] ?? '') ?: slug($name);
        $description = trim($_POST['description'] ?? '');

        if (empty($name)) {
            flash('error', 'Nome é obrigatório.');
            header('Location: /admin/categorias');
            exit;
        }

        $stmt = $db->prepare("INSERT INTO blog_categories (name, slug, description) VALUES (:name, :slug, :description)");
        $stmt->execute([':name' => $name, ':slug' => $catSlug, ':description' => $description]);

        flash('success', 'Categoria criada!');
        header('Location: /admin/categorias');
        exit;
    }

    public function edit(string $id): void {
        require_login();
        $db = get_db();
        $stmt = $db->prepare("SELECT * FROM blog_categories WHERE id = :id");
        $stmt->execute([':id' => $id]);
        $category = $stmt->fetch();

        if (!$category) {
            flash('error', 'Categoria não encontrada.');
            header('Location: /admin/categorias');
            exit;
        }

        $categories = $db->query("SELECT c.*, (SELECT COUNT(*) FROM blog_posts WHERE category_id = c.id) as post_count FROM blog_categories c ORDER BY c.sort_order, c.name")->fetchAll();

        $pageTitle = 'Editar Categoria';
        $contentTemplate = BASE_PATH . '/templates/admin/categories_content.php';
        include BASE_PATH . '/templates/layouts/admin.php';
    }

    public function update(string $id): void {
        require_login();
        if (!verify_csrf($_POST['csrf_token'] ?? '')) {
            flash('error', 'Token inválido.');
            header('Location: /admin/categorias/editar/' . $id);
            exit;
        }

        $db = get_db();
        $name = trim($_POST['name'] ?? '');
        $catSlug = trim($_POST['slug'] ?? '') ?: slug($name);
        $description = trim($_POST['description'] ?? '');
        $active = isset($_POST['active']) ? 1 : 0;
        $sortOrder = (int)($_POST['sort_order'] ?? 0);

        $stmt = $db->prepare("UPDATE blog_categories SET name = :name, slug = :slug, description = :description, active = :active, sort_order = :sort_order WHERE id = :id");
        $stmt->execute([':name' => $name, ':slug' => $catSlug, ':description' => $description, ':active' => $active, ':sort_order' => $sortOrder, ':id' => $id]);

        flash('success', 'Categoria atualizada!');
        header('Location: /admin/categorias');
        exit;
    }

    public function delete(string $id): void {
        require_login();
        if (!verify_csrf($_POST['csrf_token'] ?? '')) {
            flash('error', 'Token inválido.');
            header('Location: /admin/categorias');
            exit;
        }

        $db = get_db();
        // Remove a associação dos posts
        $db->prepare("UPDATE blog_posts SET category_id = NULL WHERE category_id = :id")->execute([':id' => $id]);
        $db->prepare("DELETE FROM blog_categories WHERE id = :id")->execute([':id' => $id]);

        flash('success', 'Categoria excluída.');
        header('Location: /admin/categorias');
        exit;
    }
}
