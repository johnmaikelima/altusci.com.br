<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="<?= e($pageDescription ?? 'Altustec - Suporte de TI, manutenção de notebooks e computadores em Guarulhos. Soluções profissionais em tecnologia para sua empresa.') ?>">
    <meta name="keywords" content="<?= e($pageKeywords ?? 'suporte TI Guarulhos, manutenção notebook, manutenção computador, assistência técnica, TI empresarial') ?>">
    <meta name="author" content="Altustec">
    <meta name="google-adsense-account" content="ca-pub-2935633410371712">
    <meta property="og:title" content="<?= e($pageTitle ?? SITE_NAME) ?>">
    <meta property="og:description" content="<?= e($pageDescription ?? 'Especialistas em suporte de TI, manutenção de notebooks e computadores em Guarulhos, SP') ?>">
    <meta property="og:type" content="<?= $ogType ?? 'website' ?>">
    <?php if (!empty($ogImage)): ?>
    <meta property="og:image" content="<?= e($ogImage) ?>">
    <?php endif; ?>
    <meta property="og:url" content="<?= e(SITE_URL . ($_SERVER['REQUEST_URI'] ?? '/')) ?>">
    <meta property="og:site_name" content="Altustec">
    <link rel="canonical" href="<?= e($canonicalUrl ?? SITE_URL . ($_SERVER['REQUEST_URI'] ?? '/')) ?>">
    <title><?= e($pageTitle ?? SITE_NAME) ?></title>
    <link rel="stylesheet" href="/styles.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <?php if (!empty($extraHead)): ?>
    <?= $extraHead ?>
    <?php endif; ?>
</head>
<body>
    <!-- Header -->
    <header class="header" id="header">
        <nav class="nav container">
            <a href="/" class="nav__logo">
                <img src="/logo.png" alt="Altustec Logo" class="logo-img">
            </a>

            <div class="nav__menu" id="nav-menu">
                <ul class="nav__list">
                    <li class="nav__item">
                        <a href="/" class="nav__link <?= ($currentPage ?? '') === 'home' ? 'active' : '' ?>">Início</a>
                    </li>
                    <li class="nav__item">
                        <a href="/servicos" class="nav__link <?= ($currentPage ?? '') === 'servicos' ? 'active' : '' ?>">Serviços</a>
                    </li>
                    <li class="nav__item">
                        <a href="/compramos-seu-notebook-usado" class="nav__link <?= ($currentPage ?? '') === 'compramos' ? 'active' : '' ?>">Compramos seu Notebook</a>
                    </li>
                    <li class="nav__item">
                        <a href="/blog" class="nav__link <?= ($currentPage ?? '') === 'blog' ? 'active' : '' ?>">Blog</a>
                    </li>
                    <li class="nav__item nav__item--dropdown">
                        <a href="#" class="nav__link">
                            Links Úteis
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="dropdown-icon">
                                <polyline points="6 9 12 15 18 9"></polyline>
                            </svg>
                        </a>
                        <ul class="nav__dropdown">
                            <li><a href="/como-criar-um-pendrive-bootavel-do-mac-no-windows">Pendrive Bootável Mac</a></li>
                        </ul>
                    </li>
                    <li class="nav__item">
                        <a href="/contato" class="nav__link <?= ($currentPage ?? '') === 'contato' ? 'active' : '' ?>">Contato</a>
                    </li>
                </ul>
                <div class="nav__close" id="nav-close">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <line x1="18" y1="6" x2="6" y2="18"></line>
                        <line x1="6" y1="6" x2="18" y2="18"></line>
                    </svg>
                </div>
            </div>

            <div class="nav__toggle" id="nav-toggle">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <line x1="3" y1="12" x2="21" y2="12"></line>
                    <line x1="3" y1="6" x2="21" y2="6"></line>
                    <line x1="3" y1="18" x2="21" y2="18"></line>
                </svg>
            </div>
        </nav>
    </header>

    <!-- Content -->
    <main>
        <?php include $contentTemplate; ?>
    </main>

    <!-- Footer -->
    <footer class="footer">
        <div class="container">
            <div class="footer__grid">
                <div class="footer__column">
                    <a href="/" class="footer__logo">
                        <img src="/logo.png" alt="Altustec Logo" class="logo-img">
                    </a>
                    <p class="footer__description">
                        Soluções profissionais em TI para sua empresa. Suporte técnico, manutenção e consultoria em Guarulhos.
                    </p>
                </div>

                <div class="footer__column">
                    <h3 class="footer__title">Links Rápidos</h3>
                    <ul class="footer__links">
                        <li><a href="/">Início</a></li>
                        <li><a href="/servicos">Serviços</a></li>
                        <li><a href="/compramos-seu-notebook-usado">Compramos seu Notebook</a></li>
                        <li><a href="/blog">Blog</a></li>
                        <li><a href="/contato">Contato</a></li>
                    </ul>
                </div>

                <div class="footer__column">
                    <h3 class="footer__title">Blog</h3>
                    <ul class="footer__links">
                        <?php
                        $footerPosts = get_db()->query("SELECT title, slug FROM blog_posts WHERE active = 1 ORDER BY created_at DESC LIMIT 5")->fetchAll();
                        foreach ($footerPosts as $fp): ?>
                        <li><a href="/blog/<?= e($fp['slug']) ?>"><?= e(truncate($fp['title'], 40)) ?></a></li>
                        <?php endforeach; ?>
                    </ul>
                </div>

                <div class="footer__column">
                    <h3 class="footer__title">Contato</h3>
                    <ul class="footer__contact">
                        <li>
                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path>
                                <circle cx="12" cy="10" r="3"></circle>
                            </svg>
                            Estrada dos Vados, 551<br>Guarulhos, SP
                        </li>
                        <li>
                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path>
                                <polyline points="22,6 12,13 2,6"></polyline>
                            </svg>
                            contato@altusci.com.br
                        </li>
                        <li>
                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M21 11.5a8.38 8.38 0 0 1-.9 3.8 8.5 8.5 0 0 1-7.6 4.7 8.38 8.38 0 0 1-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 0 1-.9-3.8 8.5 8.5 0 0 1 4.7-7.6 8.38 8.38 0 0 1 3.8-.9h.5a8.48 8.48 0 0 1 8 8v.5z"></path>
                            </svg>
                            (11) 98775-6034
                        </li>
                    </ul>
                </div>
            </div>

            <div class="footer__bottom">
                <p>&copy; <?= date('Y') ?> Altustec. Todos os direitos reservados.</p>
            </div>
        </div>
    </footer>

    <!-- WhatsApp Floating Button -->
    <a href="https://wa.me/5511987756034" class="whatsapp-float" target="_blank" aria-label="WhatsApp">
        <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <path d="M21 11.5a8.38 8.38 0 0 1-.9 3.8 8.5 8.5 0 0 1-7.6 4.7 8.38 8.38 0 0 1-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 0 1-.9-3.8 8.5 8.5 0 0 1 4.7-7.6 8.38 8.38 0 0 1 3.8-.9h.5a8.48 8.48 0 0 1 8 8v.5z"></path>
        </svg>
    </a>

    <script src="/script.js"></script>
</body>
</html>
