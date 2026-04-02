<!-- Blog Header -->
<section class="page-header">
    <div class="container">
        <h1 class="page-header__title">Blog Altustec</h1>
        <p class="page-header__description">Dicas, tutoriais e guias sobre notebooks, computadores e tecnologia</p>
    </div>
</section>

<!-- Featured Posts -->
<?php if (!empty($featured)): ?>
<section class="section">
    <div class="container">
        <div class="section__header">
            <span class="section__subtitle">Destaques</span>
            <h2 class="section__title">Artigos em Destaque</h2>
        </div>
        <div class="services__grid">
            <?php foreach ($featured as $fp): ?>
            <a href="/blog/<?= e($fp['slug']) ?>" class="service__card" style="text-decoration:none;">
                <?php if ($fp['image']): ?>
                <img src="<?= e($fp['image']) ?>" alt="<?= e($fp['title']) ?>" style="width:100%;height:180px;object-fit:cover;border-radius:12px;margin-bottom:16px;" loading="lazy">
                <?php endif; ?>
                <h3 class="service__title" style="font-size:18px;"><?= e($fp['title']) ?></h3>
                <p class="service__description"><?= e(truncate($fp['excerpt'] ?: strip_tags($fp['content']), 120)) ?></p>
                <p style="color:var(--primary-color);font-weight:600;margin-top:12px;font-size:14px;">Ler artigo &rarr;</p>
            </a>
            <?php endforeach; ?>
        </div>
    </div>
</section>
<?php endif; ?>

<!-- All Posts -->
<section class="section section--gray">
    <div class="container">
        <div class="section__header">
            <span class="section__subtitle">Todos os artigos</span>
            <h2 class="section__title">Nosso Blog</h2>
        </div>

        <!-- Filtro por Categoria -->
        <?php if (!empty($categories)): ?>
        <div class="blog-categories-filter">
            <a href="/blog" class="blog-category-tag <?= empty($categoryFilter) ? 'active' : '' ?>">Todos</a>
            <?php foreach ($categories as $cat): ?>
            <a href="/blog?categoria=<?= e($cat['slug']) ?>" class="blog-category-tag <?= $categoryFilter === $cat['slug'] ? 'active' : '' ?>">
                <?= e($cat['name']) ?> <span class="blog-category-count"><?= $cat['post_count'] ?></span>
            </a>
            <?php endforeach; ?>
        </div>
        <?php endif; ?>

        <?php if (empty($posts)): ?>
        <p style="text-align:center;color:var(--text-gray);">Nenhum artigo publicado ainda.</p>
        <?php else: ?>
        <div class="blog-grid">
            <?php foreach ($posts as $post): ?>
            <a href="/blog/<?= e($post['slug']) ?>" class="blog-card">
                <?php if ($post['image']): ?>
                <div class="blog-card__image">
                    <img src="<?= e($post['image']) ?>" alt="<?= e($post['title']) ?>" loading="lazy">
                </div>
                <?php endif; ?>
                <div class="blog-card__content">
                    <?php if (!empty($post['category_name'])): ?>
                    <span class="blog-card__category"><?= e($post['category_name']) ?></span>
                    <?php endif; ?>
                    <span class="blog-card__date"><?= format_date($post['created_at']) ?> &bull; <?= reading_time($post['content']) ?> min de leitura</span>
                    <h3 class="blog-card__title"><?= e($post['title']) ?></h3>
                    <p class="blog-card__excerpt"><?= e(truncate($post['excerpt'] ?: strip_tags($post['content']), 140)) ?></p>
                    <span class="blog-card__link">Ler mais &rarr;</span>
                </div>
            </a>
            <?php endforeach; ?>
        </div>

        <!-- Pagination -->
        <?php if ($totalPages > 1): ?>
        <div style="display:flex;justify-content:center;gap:8px;margin-top:48px;">
            <?php for ($i = 1; $i <= $totalPages; $i++): ?>
            <a href="/blog?page=<?= $i ?>" class="button <?= $i === $page ? 'button--primary' : 'button--secondary' ?>" style="padding:10px 18px;font-size:14px;">
                <?= $i ?>
            </a>
            <?php endfor; ?>
        </div>
        <?php endif; ?>
        <?php endif; ?>
    </div>
</section>
