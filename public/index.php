<?php
require_once __DIR__ . '/../config.php';

// Inicializar banco se não existir
if (!file_exists(DB_PATH)) {
    require_once BASE_PATH . '/database/migrate.php';
}

// Router simples
$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$uri = rtrim($uri, '/') ?: '/';
$method = $_SERVER['REQUEST_METHOD'];

// Redirect 301 de URLs antigas .html para URLs limpas (preserva ranking SEO)
if (str_ends_with($uri, '.html')) {
    $newUri = str_replace('.html', '', $uri);
    header('Location: ' . $newUri, true, 301);
    exit;
}

// Rotas
$routes = [
    // Frontend público
    'GET /'                             => 'PublicController@home',
    'GET /servicos'                     => 'PublicController@servicos',
    'GET /contato'                      => 'PublicController@contato',
    'GET /compramos-seu-notebook-usado' => 'PublicController@compramosNotebook',
    'GET /como-criar-um-pendrive-bootavel-do-mac-no-windows' => 'PublicController@pendriveBootavel',

    // Blog público
    'GET /blog'                         => 'BlogController@index',
    'GET /blog/{slug}'                  => 'BlogController@show',

    // Sitemap
    'GET /sitemap.xml'                  => 'PublicController@sitemap',

    // Auth
    'GET /admin/login'                  => 'AuthController@loginForm',
    'POST /admin/login'                 => 'AuthController@login',
    'GET /admin/logout'                 => 'AuthController@logout',

    // Admin Dashboard
    'GET /admin'                        => 'AdminController@dashboard',

    // Admin Blog
    'GET /admin/blog'                   => 'AdminBlogController@index',
    'GET /admin/blog/criar'             => 'AdminBlogController@create',
    'POST /admin/blog/criar'            => 'AdminBlogController@store',
    'GET /admin/blog/editar/{id}'       => 'AdminBlogController@edit',
    'POST /admin/blog/editar/{id}'      => 'AdminBlogController@update',
    'POST /admin/blog/excluir/{id}'     => 'AdminBlogController@delete',

    // Admin Categorias do Blog
    'GET /admin/categorias'                 => 'AdminCategoryController@index',
    'POST /admin/categorias/criar'          => 'AdminCategoryController@store',
    'GET /admin/categorias/editar/{id}'     => 'AdminCategoryController@edit',
    'POST /admin/categorias/editar/{id}'    => 'AdminCategoryController@update',
    'POST /admin/categorias/excluir/{id}'   => 'AdminCategoryController@delete',

    // Admin Configurações
    'GET /admin/configuracoes'          => 'SettingsController@index',
    'POST /admin/configuracoes'         => 'SettingsController@update',

    // Admin Analytics
    'GET /admin/analytics'              => 'AdminAnalyticsController@index',

    // Política de Privacidade
    'GET /politica-de-privacidade'      => 'PublicController@privacidade',
];

// Encontrar rota correspondente
$matchedRoute = null;
$params = [];

foreach ($routes as $route => $handler) {
    [$routeMethod, $routePath] = explode(' ', $route, 2);

    if ($method !== $routeMethod) continue;

    $pattern = preg_replace('/\{([a-z]+)\}/', '(?P<$1>[^/]+)', $routePath);
    $pattern = '#^' . $pattern . '$#';

    if (preg_match($pattern, $uri, $matches)) {
        $matchedRoute = $handler;
        foreach ($matches as $key => $val) {
            if (!is_int($key)) $params[$key] = $val;
        }
        break;
    }
}

// Rastrear pageview (apenas GET público, não admin)
if ($method === 'GET') {
    track_pageview();
}

if ($matchedRoute) {
    [$controller, $action] = explode('@', $matchedRoute);
    require_once BASE_PATH . "/src/Controllers/{$controller}.php";
    $ctrl = new $controller();
    $ctrl->$action(...array_values($params));
} else {
    http_response_code(404);
    include BASE_PATH . '/templates/public/404.php';
}
