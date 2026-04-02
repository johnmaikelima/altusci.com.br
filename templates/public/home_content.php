    <!-- Hero Section -->
    <section class="hero" id="home">
        <div class="hero__container container">
            <div class="hero__content">
                <span class="hero__subtitle">Soluções em Tecnologia</span>
                <h1 class="hero__title">Suporte de TI e Manutenção Profissional em Guarulhos</h1>
                <p class="hero__description">
                    Especialistas em manutenção de notebooks, computadores e suporte técnico completo para sua empresa. Atendimento rápido e eficiente.
                </p>
                <div class="hero__buttons">
                    <a href="/contato" class="button button--primary">
                        Solicitar Orçamento
                    </a>
                    <a href="https://wa.me/<?= e(get_setting('contact_whatsapp', '5511987756034')) ?>" target="_blank" class="button button--secondary">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M21 11.5a8.38 8.38 0 0 1-.9 3.8 8.5 8.5 0 0 1-7.6 4.7 8.38 8.38 0 0 1-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 0 1-.9-3.8 8.5 8.5 0 0 1 4.7-7.6 8.38 8.38 0 0 1 3.8-.9h.5a8.48 8.48 0 0 1 8 8v.5z"></path>
                        </svg>
                        WhatsApp
                    </a>
                </div>
            </div>
            <div class="hero__image">
                <div class="hero__blob">
                    <svg viewBox="0 0 200 200" xmlns="http://www.w3.org/2000/svg">
                        <path fill="#002C87" d="M44.7,-76.4C58.8,-69.2,71.8,-59.1,79.6,-45.8C87.4,-32.6,90,-16.3,88.5,-0.9C87,14.6,81.4,29.2,73.1,42.8C64.8,56.4,53.8,69,40.1,76.8C26.4,84.6,10,87.6,-5.7,86.3C-21.4,85,-42.8,79.4,-58.6,68.8C-74.4,58.2,-84.6,42.6,-88.9,25.8C-93.2,9,-91.6,-9,-84.8,-24.7C-78,-40.4,-66,-53.8,-52.4,-61.2C-38.8,-68.6,-23.6,-70,- 8.1,-70.9C7.4,-71.8,30.6,-83.6,44.7,-76.4Z" transform="translate(100 100)" />
                    </svg>
                </div>
                <img src="/notebook.webp" alt="Notebook Altustec" class="hero__notebook">
            </div>
        </div>
    </section>

    <!-- Services Preview -->
    <section class="services-preview section" id="services">
        <div class="container">
            <div class="section__header">
                <span class="section__subtitle">Nossos Serviços</span>
                <h2 class="section__title">Soluções Completas em TI</h2>
            </div>

            <div class="services__grid">
                <div class="service__card">
                    <div class="service__icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <rect x="2" y="3" width="20" height="14" rx="2" ry="2"></rect>
                            <line x1="8" y1="21" x2="16" y2="21"></line>
                            <line x1="12" y1="17" x2="12" y2="21"></line>
                        </svg>
                    </div>
                    <h3 class="service__title">Manutenção de Notebooks</h3>
                    <p class="service__description">Reparo e manutenção preventiva de notebooks de todas as marcas. Troca de peças, limpeza e upgrade.</p>
                </div>
                <div class="service__card">
                    <div class="service__icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <rect x="2" y="7" width="20" height="14" rx="2" ry="2"></rect>
                            <path d="M16 21V5a2 2 0 0 0-2-2h-4a2 2 0 0 0-2 2v16"></path>
                        </svg>
                    </div>
                    <h3 class="service__title">Manutenção de Computadores</h3>
                    <p class="service__description">Assistência técnica completa para desktops. Montagem, upgrade e manutenção de hardware e software.</p>
                </div>
                <div class="service__card">
                    <div class="service__icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"></path>
                        </svg>
                    </div>
                    <h3 class="service__title">Suporte de TI</h3>
                    <p class="service__description">Suporte técnico especializado para empresas. Gerenciamento de redes, servidores e infraestrutura.</p>
                </div>
                <div class="service__card">
                    <div class="service__icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <circle cx="12" cy="12" r="10"></circle>
                            <polyline points="12 6 12 12 16 14"></polyline>
                        </svg>
                    </div>
                    <h3 class="service__title">Atendimento Rápido</h3>
                    <p class="service__description">Atendimento ágil e eficiente. Diagnóstico preciso e soluções rápidas para seu problema.</p>
                </div>
                <div class="service__card">
                    <div class="service__icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                            <circle cx="9" cy="7" r="4"></circle>
                            <path d="M23 21v-2a4 4 0 0 0-3-3.87"></path>
                            <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                        </svg>
                    </div>
                    <h3 class="service__title">Consultoria Técnica</h3>
                    <p class="service__description">Consultoria especializada para otimização de processos e escolha de equipamentos adequados.</p>
                </div>
                <div class="service__card">
                    <div class="service__icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z"></path>
                            <polyline points="3.27 6.96 12 12.01 20.73 6.96"></polyline>
                            <line x1="12" y1="22.08" x2="12" y2="12"></line>
                        </svg>
                    </div>
                    <h3 class="service__title">Instalação de Software</h3>
                    <p class="service__description">Instalação e configuração de sistemas operacionais, aplicativos e softwares corporativos.</p>
                </div>
            </div>

            <div class="section__cta">
                <a href="/servicos" class="button button--primary">Ver Todos os Serviços</a>
            </div>
        </div>
    </section>

    <!-- Blog Section -->
    <?php if (!empty($latestPosts)): ?>
    <section class="section section--gray" id="blog">
        <div class="container">
            <div class="section__header">
                <span class="section__subtitle">Blog</span>
                <h2 class="section__title">Dicas e Tutoriais</h2>
            </div>

            <div class="blog-grid">
                <?php foreach ($latestPosts as $post): ?>
                <a href="/blog/<?= e($post['slug']) ?>" class="blog-card">
                    <?php if ($post['image']): ?>
                    <div class="blog-card__image">
                        <img src="<?= e($post['image']) ?>" alt="<?= e($post['title']) ?>" loading="lazy">
                    </div>
                    <?php endif; ?>
                    <div class="blog-card__content">
                        <span class="blog-card__date"><?= format_date($post['created_at']) ?></span>
                        <h3 class="blog-card__title"><?= e($post['title']) ?></h3>
                        <p class="blog-card__excerpt"><?= e(truncate($post['excerpt'] ?: strip_tags($post['content']), 100)) ?></p>
                        <span class="blog-card__link">Ler mais &rarr;</span>
                    </div>
                </a>
                <?php endforeach; ?>
            </div>

            <div class="section__cta">
                <a href="/blog" class="button button--primary">Ver Todos os Artigos</a>
            </div>
        </div>
    </section>
    <?php endif; ?>

    <!-- Why Choose Us -->
    <section class="why-us section">
        <div class="container">
            <div class="section__header">
                <span class="section__subtitle">Por Que Escolher</span>
                <h2 class="section__title">A Altustec?</h2>
            </div>
            <div class="features__grid">
                <div class="feature__item">
                    <div class="feature__number">01</div>
                    <h3 class="feature__title">Experiência Comprovada</h3>
                    <p class="feature__description">Anos de experiência no mercado de TI, atendendo empresas e clientes em Guarulhos e região.</p>
                </div>
                <div class="feature__item">
                    <div class="feature__number">02</div>
                    <h3 class="feature__title">Técnicos Qualificados</h3>
                    <p class="feature__description">Equipe altamente capacitada e certificada para resolver qualquer problema técnico.</p>
                </div>
                <div class="feature__item">
                    <div class="feature__number">03</div>
                    <h3 class="feature__title">Atendimento Personalizado</h3>
                    <p class="feature__description">Cada cliente é único. Oferecemos soluções personalizadas para suas necessidades específicas.</p>
                </div>
                <div class="feature__item">
                    <div class="feature__number">04</div>
                    <h3 class="feature__title">Preços Competitivos</h3>
                    <p class="feature__description">Orçamentos transparentes e preços justos, sem surpresas. Melhor custo-benefício da região.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="cta section">
        <div class="container">
            <div class="cta__content">
                <h2 class="cta__title">Precisa de Suporte Técnico?</h2>
                <p class="cta__description">Entre em contato conosco e receba um orçamento personalizado para suas necessidades.</p>
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
