<form method="POST" action="/admin/configuracoes" enctype="multipart/form-data">
    <?= csrf_field() ?>

    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">

        <!-- Coluna Esquerda -->
        <div class="space-y-6">

            <!-- Identidade do Site -->
            <div class="bg-white rounded-2xl border border-gray-200 shadow-sm p-6">
                <h3 class="text-lg font-bold text-gray-800 mb-4">
                    <svg class="w-5 h-5 inline-block mr-1 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3m9 9a9 9 0 01-9-9m9 9c1.657 0 3-4.03 3-9s-1.343-9-3-9m0 18c-1.657 0-3-4.03-3-9s1.343-9 3-9"/></svg>
                    Identidade do Site
                </h3>

                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700 mb-1">Nome do Site</label>
                    <input type="text" name="site_name" value="<?= e(get_setting('site_name', SITE_NAME)) ?>" class="w-full px-4 py-2 border border-gray-300 rounded-lg text-sm focus:ring-2 focus:ring-blue-500">
                </div>

                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700 mb-1">Descrição do Site</label>
                    <textarea name="site_description" rows="2" class="w-full px-4 py-2 border border-gray-300 rounded-lg text-sm focus:ring-2 focus:ring-blue-500"><?= e(get_setting('site_description')) ?></textarea>
                </div>

                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700 mb-1">Keywords (SEO)</label>
                    <input type="text" name="site_keywords" value="<?= e(get_setting('site_keywords')) ?>" class="w-full px-4 py-2 border border-gray-300 rounded-lg text-sm focus:ring-2 focus:ring-blue-500">
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Logo do Site</label>
                    <?php $currentLogo = get_setting('site_logo', '/logo.png'); ?>
                    <?php if ($currentLogo): ?>
                    <div class="mb-2 p-3 bg-gray-50 rounded-lg inline-block">
                        <img src="<?= e($currentLogo) ?>" alt="Logo atual" class="h-12">
                    </div>
                    <?php endif; ?>
                    <input type="file" name="site_logo" accept="image/png,image/jpeg,image/webp,image/svg+xml" class="w-full px-4 py-2 border border-gray-300 rounded-lg text-sm focus:ring-2 focus:ring-blue-500">
                    <p class="text-xs text-gray-400 mt-1">PNG, JPG, WebP ou SVG. Deixe vazio para manter o atual.</p>
                </div>
            </div>

            <!-- Informações de Contato -->
            <div class="bg-white rounded-2xl border border-gray-200 shadow-sm p-6">
                <h3 class="text-lg font-bold text-gray-800 mb-4">
                    <svg class="w-5 h-5 inline-block mr-1 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/></svg>
                    Informações de Contato
                </h3>

                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700 mb-1">Telefone</label>
                    <input type="text" name="contact_phone" value="<?= e(get_setting('contact_phone', '(11) 98775-6034')) ?>" class="w-full px-4 py-2 border border-gray-300 rounded-lg text-sm focus:ring-2 focus:ring-blue-500" placeholder="(11) 98775-6034">
                </div>

                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700 mb-1">WhatsApp (só números com DDD e código do país)</label>
                    <div class="flex items-center gap-2">
                        <span class="text-gray-400 text-sm">wa.me/</span>
                        <input type="text" name="contact_whatsapp" value="<?= e(get_setting('contact_whatsapp', '5511987756034')) ?>" class="flex-1 px-4 py-2 border border-gray-300 rounded-lg text-sm focus:ring-2 focus:ring-blue-500" placeholder="5511987756034">
                    </div>
                </div>

                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700 mb-1">E-mail</label>
                    <input type="email" name="contact_email" value="<?= e(get_setting('contact_email', 'contato@altusci.com.br')) ?>" class="w-full px-4 py-2 border border-gray-300 rounded-lg text-sm focus:ring-2 focus:ring-blue-500" placeholder="contato@altusci.com.br">
                </div>

                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700 mb-1">Endereço</label>
                    <input type="text" name="contact_address" value="<?= e(get_setting('contact_address', 'Estrada dos Vados, 551')) ?>" class="w-full px-4 py-2 border border-gray-300 rounded-lg text-sm focus:ring-2 focus:ring-blue-500" placeholder="Estrada dos Vados, 551">
                </div>

                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700 mb-1">Cidade / Estado</label>
                    <input type="text" name="contact_city" value="<?= e(get_setting('contact_city', 'Guarulhos, SP')) ?>" class="w-full px-4 py-2 border border-gray-300 rounded-lg text-sm focus:ring-2 focus:ring-blue-500" placeholder="Guarulhos, SP">
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Horário de Funcionamento</label>
                    <input type="text" name="contact_hours" value="<?= e(get_setting('contact_hours', 'Seg a Sex: 9h às 18h | Sáb: 9h às 13h')) ?>" class="w-full px-4 py-2 border border-gray-300 rounded-lg text-sm focus:ring-2 focus:ring-blue-500" placeholder="Seg a Sex: 9h às 18h">
                </div>
            </div>
        </div>

        <!-- Coluna Direita -->
        <div class="space-y-6">

            <!-- Redes Sociais -->
            <div class="bg-white rounded-2xl border border-gray-200 shadow-sm p-6">
                <h3 class="text-lg font-bold text-gray-800 mb-4">
                    <svg class="w-5 h-5 inline-block mr-1 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8h2a2 2 0 012 2v6a2 2 0 01-2 2h-2v4l-4-4H9a1.994 1.994 0 01-1.414-.586m0 0L11 14h4a2 2 0 002-2V6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2v4l.586-.586z"/></svg>
                    Redes Sociais
                </h3>
                <p class="text-sm text-gray-500 mb-4">Cole a URL completa do perfil. Deixe vazio para não exibir.</p>

                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700 mb-1">Instagram</label>
                    <input type="url" name="social_instagram" value="<?= e(get_setting('social_instagram')) ?>" class="w-full px-4 py-2 border border-gray-300 rounded-lg text-sm focus:ring-2 focus:ring-blue-500" placeholder="https://instagram.com/altustec">
                </div>

                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700 mb-1">Facebook</label>
                    <input type="url" name="social_facebook" value="<?= e(get_setting('social_facebook')) ?>" class="w-full px-4 py-2 border border-gray-300 rounded-lg text-sm focus:ring-2 focus:ring-blue-500" placeholder="https://facebook.com/altustec">
                </div>

                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700 mb-1">YouTube</label>
                    <input type="url" name="social_youtube" value="<?= e(get_setting('social_youtube')) ?>" class="w-full px-4 py-2 border border-gray-300 rounded-lg text-sm focus:ring-2 focus:ring-blue-500" placeholder="https://youtube.com/@altustec">
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">LinkedIn</label>
                    <input type="url" name="social_linkedin" value="<?= e(get_setting('social_linkedin')) ?>" class="w-full px-4 py-2 border border-gray-300 rounded-lg text-sm focus:ring-2 focus:ring-blue-500" placeholder="https://linkedin.com/company/altustec">
                </div>
            </div>

            <!-- Códigos Externos -->
            <div class="bg-white rounded-2xl border border-gray-200 shadow-sm p-6">
                <h3 class="text-lg font-bold text-gray-800 mb-4">
                    <svg class="w-5 h-5 inline-block mr-1 text-yellow-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4"/></svg>
                    Códigos Externos
                </h3>

                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700 mb-1">Código AdSense</label>
                    <input type="text" name="adsense_code" value="<?= e(get_setting('adsense_code')) ?>" class="w-full px-4 py-2 border border-gray-300 rounded-lg text-sm focus:ring-2 focus:ring-blue-500" placeholder="ca-pub-XXXXX">
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Código Analytics (colar no head)</label>
                    <textarea name="analytics_code" rows="4" class="w-full px-4 py-2 border border-gray-300 rounded-lg text-sm font-mono focus:ring-2 focus:ring-blue-500"><?= e(get_setting('analytics_code')) ?></textarea>
                </div>
            </div>

            <!-- Alterar Senha -->
            <div class="bg-white rounded-2xl border border-gray-200 shadow-sm p-6">
                <h3 class="text-lg font-bold text-gray-800 mb-4">
                    <svg class="w-5 h-5 inline-block mr-1 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/></svg>
                    Alterar Senha
                </h3>
                <p class="text-sm text-gray-500 mb-4">Deixe em branco para manter a senha atual.</p>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Nova Senha</label>
                    <input type="password" name="new_password" class="w-full px-4 py-2 border border-gray-300 rounded-lg text-sm focus:ring-2 focus:ring-blue-500" placeholder="Nova senha">
                </div>
            </div>
        </div>
    </div>

    <div class="mt-6">
        <button type="submit" class="px-6 py-3 bg-blue-700 text-white rounded-xl font-medium hover:bg-blue-800 transition-colors">Salvar Configurações</button>
    </div>
</form>
