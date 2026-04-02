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

        $fields = [
            'site_name', 'site_description', 'site_keywords',
            'analytics_code', 'adsense_code',
            'contact_phone', 'contact_whatsapp', 'contact_email',
            'contact_address', 'contact_city', 'contact_hours',
            'social_instagram', 'social_facebook', 'social_youtube', 'social_linkedin',
        ];

        foreach ($fields as $field) {
            if (isset($_POST[$field])) {
                set_setting($field, trim($_POST[$field]));
            }
        }

        // Upload de logo
        if (!empty($_FILES['site_logo']['tmp_name'])) {
            $file = $_FILES['site_logo'];
            $allowed = ['image/png', 'image/jpeg', 'image/webp', 'image/svg+xml'];
            $finfo = finfo_open(FILEINFO_MIME_TYPE);
            $mimeType = finfo_file($finfo, $file['tmp_name']);
            finfo_close($finfo);

            if (in_array($mimeType, $allowed)) {
                $ext = match($mimeType) {
                    'image/png' => 'png',
                    'image/jpeg' => 'jpg',
                    'image/webp' => 'webp',
                    'image/svg+xml' => 'svg',
                    default => 'png',
                };
                $filename = 'logo.' . $ext;
                $destDir = BASE_PATH . '/public/assets/img/';
                if (!is_dir($destDir)) mkdir($destDir, 0755, true);
                $destPath = $destDir . $filename;

                if (move_uploaded_file($file['tmp_name'], $destPath)) {
                    set_setting('site_logo', '/assets/img/' . $filename);
                }
            } else {
                flash('error', 'Formato de logo inválido. Use PNG, JPG, WebP ou SVG.');
                header('Location: /admin/configuracoes');
                exit;
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
    $stmt = $db->prepare('INSERT INTO settings (`key`, `value`) VALUES (:key, :val) ON DUPLICATE KEY UPDATE `value` = :val2');
    $stmt->execute([':key' => $key, ':val' => $value, ':val2' => $value]);
}
