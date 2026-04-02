<!-- Breadcrumb -->
<nav class="breadcrumb">
    <div class="container">
        <ul class="breadcrumb__list">
            <li class="breadcrumb__item"><a href="/" class="breadcrumb__link">Início</a></li>
            <li class="breadcrumb__separator">/</li>
            <li class="breadcrumb__item"><a href="/blog" class="breadcrumb__link">Blog</a></li>
            <li class="breadcrumb__separator">/</li>
            <li class="breadcrumb__item breadcrumb__item--active"><span><?= e(truncate($post['title'], 50)) ?></span></li>
        </ul>
    </div>
</nav>

<!-- Article -->
<article class="section">
    <div class="container">
        <div class="article-wrapper">
            <header class="article-header">
                <?php if (!empty($post['category_name'])): ?>
                <a href="/blog?categoria=<?= e($post['category_slug']) ?>" class="blog-card__category" style="margin-bottom:12px;"><?= e($post['category_name']) ?></a>
                <?php endif; ?>
                <h1 class="article-header__title"><?= e($post['title']) ?></h1>
                <div class="article-header__meta">
                    <span>Por <strong><?= e($post['author'] ?: 'Altustec') ?></strong></span>
                    <span>&bull;</span>
                    <span><?= format_date($post['created_at']) ?></span>
                    <span>&bull;</span>
                    <span><?= reading_time($post['content']) ?> min de leitura</span>
                    <span>&bull;</span>
                    <span><?= number_format($post['views']) ?> visualizações</span>
                </div>
            </header>

            <?php if ($post['image']): ?>
            <div class="article-image">
                <img src="<?= e($post['image']) ?>" alt="<?= e($post['title']) ?>" loading="lazy">
            </div>
            <?php endif; ?>

            <div class="article-content">
                <?= $post['content'] ?>
            </div>

            <!-- Share -->
            <div class="article-share">
                <p style="font-weight:600;margin-bottom:12px;">Compartilhe este artigo:</p>
                <div style="display:flex;gap:12px;flex-wrap:wrap;">
                    <a href="https://wa.me/?text=<?= urlencode($post['title'] . ' - ' . SITE_URL . '/blog/' . $post['slug']) ?>" target="_blank" class="button button--secondary" style="padding:10px 20px;font-size:14px;">WhatsApp</a>
                    <a href="https://www.facebook.com/sharer/sharer.php?u=<?= urlencode(SITE_URL . '/blog/' . $post['slug']) ?>" target="_blank" class="button button--secondary" style="padding:10px 20px;font-size:14px;">Facebook</a>
                    <a href="https://twitter.com/intent/tweet?url=<?= urlencode(SITE_URL . '/blog/' . $post['slug']) ?>&text=<?= urlencode($post['title']) ?>" target="_blank" class="button button--secondary" style="padding:10px 20px;font-size:14px;">Twitter</a>
                </div>
            </div>
        </div>
    </div>
</article>

<!-- Related Posts -->
<?php if (!empty($relatedPosts)): ?>
<section class="section section--gray">
    <div class="container">
        <div class="section__header">
            <span class="section__subtitle">Continue lendo</span>
            <h2 class="section__title">Artigos Relacionados</h2>
        </div>
        <div class="blog-grid">
            <?php foreach ($relatedPosts as $rp): ?>
            <a href="/blog/<?= e($rp['slug']) ?>" class="blog-card">
                <?php if ($rp['image']): ?>
                <div class="blog-card__image">
                    <img src="<?= e($rp['image']) ?>" alt="<?= e($rp['title']) ?>" loading="lazy">
                </div>
                <?php endif; ?>
                <div class="blog-card__content">
                    <span class="blog-card__date"><?= format_date($rp['created_at']) ?></span>
                    <h3 class="blog-card__title"><?= e($rp['title']) ?></h3>
                    <p class="blog-card__excerpt"><?= e(truncate($rp['excerpt'] ?: strip_tags($rp['content']), 100)) ?></p>
                    <span class="blog-card__link">Ler mais &rarr;</span>
                </div>
            </a>
            <?php endforeach; ?>
        </div>
    </div>
</section>
<?php endif; ?>

<!-- CTA -->
<section class="cta section">
    <div class="container">
        <div class="cta__content">
            <h2 class="cta__title">Precisa de Ajuda com seu Notebook?</h2>
            <p class="cta__description">Nossa equipe está pronta para resolver qualquer problema técnico. Entre em contato!</p>
            <div class="cta__buttons">
                <a href="/contato" class="button button--white">Fale Conosco</a>
                <a href="https://wa.me/<?= e(get_setting('contact_whatsapp', '5511987756034')) ?>" target="_blank" class="button button--outline-white">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M21 11.5a8.38 8.38 0 0 1-.9 3.8 8.5 8.5 0 0 1-7.6 4.7 8.38 8.38 0 0 1-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 0 1-.9-3.8 8.5 8.5 0 0 1 4.7-7.6 8.38 8.38 0 0 1 3.8-.9h.5a8.48 8.48 0 0 1 8 8v.5z"></path>
                    </svg>
                    <?= e(get_setting('contact_phone', '(11) 98775-6034')) ?>
                </a>
            </div>
        </div>
    </div>
</section>
