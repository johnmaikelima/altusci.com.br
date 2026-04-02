<?php
/**
 * Router para o PHP built-in server.
 * php -S localhost:8000 -t public public/router.php
 */
$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$file = __DIR__ . $uri;

// Redirect 301 de URLs antigas .html para URLs limpas (SEO)
if (str_ends_with($uri, '.html')) {
    $newUri = str_replace('.html', '', $uri);
    header('Location: ' . $newUri, true, 301);
    exit;
}

// Serve arquivos estáticos diretamente (CSS, JS, imagens) mas não rotas dinâmicas
if ($uri !== '/' && is_file($file) && !str_ends_with($uri, '.xml')) {
    return false;
}

require __DIR__ . '/index.php';
