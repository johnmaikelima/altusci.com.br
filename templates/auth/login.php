<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Altustec Admin</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body { font-family: 'Inter', sans-serif; min-height: 100vh; display: flex; align-items: center; justify-content: center; background: linear-gradient(135deg, #002C87 0%, #0041c4 100%); }
        .login-card { background: #fff; border-radius: 16px; padding: 48px 40px; width: 100%; max-width: 420px; box-shadow: 0 20px 60px rgba(0,0,0,0.3); }
        .login-logo { text-align: center; margin-bottom: 32px; }
        .login-logo img { height: 50px; }
        .login-title { text-align: center; font-size: 24px; font-weight: 700; color: #1a1a1a; margin-bottom: 8px; }
        .login-subtitle { text-align: center; color: #666; margin-bottom: 32px; font-size: 14px; }
        .form-group { margin-bottom: 20px; }
        .form-label { display: block; font-weight: 600; color: #1a1a1a; margin-bottom: 8px; font-size: 14px; }
        .form-input { width: 100%; padding: 14px 16px; border: 2px solid #e0e0e0; border-radius: 8px; font-family: inherit; font-size: 16px; transition: all 0.3s; }
        .form-input:focus { outline: none; border-color: #002C87; box-shadow: 0 0 0 3px rgba(0,44,135,0.1); }
        .btn-login { width: 100%; padding: 14px; background: #002C87; color: #fff; border: none; border-radius: 8px; font-size: 16px; font-weight: 600; cursor: pointer; transition: all 0.3s; font-family: inherit; }
        .btn-login:hover { background: #001f5f; transform: translateY(-2px); box-shadow: 0 4px 16px rgba(0,44,135,0.3); }
        .flash { padding: 12px 16px; border-radius: 8px; margin-bottom: 20px; font-size: 14px; font-weight: 500; }
        .flash-error { background: #fee2e2; color: #dc2626; border: 1px solid #fecaca; }
        .flash-success { background: #dcfce7; color: #16a34a; border: 1px solid #bbf7d0; }
        .back-link { display: block; text-align: center; margin-top: 24px; color: #666; font-size: 14px; text-decoration: none; }
        .back-link:hover { color: #002C87; }
    </style>
</head>
<body>
    <div class="login-card">
        <div class="login-logo">
            <img src="/logo.png" alt="Altustec">
        </div>
        <h1 class="login-title">Painel Administrativo</h1>
        <p class="login-subtitle">Faça login para gerenciar o site</p>

        <?php foreach (get_flashes() as $flash): ?>
            <div class="flash flash-<?= $flash['type'] ?>"><?= e($flash['message']) ?></div>
        <?php endforeach; ?>

        <form method="POST" action="/admin/login">
            <?= csrf_field() ?>
            <div class="form-group">
                <label class="form-label">E-mail</label>
                <input type="email" name="email" class="form-input" placeholder="seu@email.com" required>
            </div>
            <div class="form-group">
                <label class="form-label">Senha</label>
                <input type="password" name="password" class="form-input" placeholder="Sua senha" required>
            </div>
            <button type="submit" class="btn-login">Entrar</button>
        </form>
        <a href="/" class="back-link">Voltar ao site</a>
    </div>
</body>
</html>
