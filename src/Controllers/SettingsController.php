<?php
require_once BASE_PATH . '/config.php';

class SettingsController {

    public function index(): void {
        require_login();

        $pageTitle = 'Configurações';
        $contentTemplate = BASE_PATH . '/templates/admin/settings_content.php';
        include BASE_PATH . '/templates/layouts/admin.php';
    }

    public function update(): void {
        require_login();
        if (!verify_csrf($_POST['csrf_token'] ?? '')) {
            flash('error', 'Token inválido.');
            header('Location: /admin/configuracoes');
            exit;
        }

        $fields = ['site_name', 'site_description', 'site_keywords', 'analytics_code', 'adsense_code'];
        foreach ($fields as $field) {
            if (isset($_POST[$field])) {
                set_setting($field, trim($_POST[$field]));
            }
        }

        // Atualizar senha se preenchida
        if (!empty($_POST['new_password'])) {
            $db = get_db();
            $stmt = $db->prepare("UPDATE users SET password = :password WHERE id = :id");
            $stmt->execute([
                ':password' => password_hash($_POST['new_password'], PASSWORD_DEFAULT),
                ':id' => $_SESSION['user_id'],
            ]);
        }

        flash('success', 'Configurações atualizadas!');
        header('Location: /admin/configuracoes');
        exit;
    }
}

function set_setting(string $key, string $value): void {
    $db = get_db();
    $stmt = $db->prepare('INSERT INTO settings (key, value) VALUES (:key, :value) ON CONFLICT(key) DO UPDATE SET value = :value');
    $stmt->execute([':key' => $key, ':value' => $value]);
}
