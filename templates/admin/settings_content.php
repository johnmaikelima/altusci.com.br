<form method="POST" action="/admin/configuracoes">
    <?= csrf_field() ?>

    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
        <div class="bg-white rounded-2xl border border-gray-200 shadow-sm p-6">
            <h3 class="text-lg font-bold text-gray-800 mb-4">Configurações do Site</h3>

            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700 mb-1">Nome do Site</label>
                <input type="text" name="site_name" value="<?= e(get_setting('site_name', SITE_NAME)) ?>" class="w-full px-4 py-2 border border-gray-300 rounded-lg text-sm focus:ring-2 focus:ring-blue-500">
            </div>
            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700 mb-1">Descrição do Site</label>
                <textarea name="site_description" rows="3" class="w-full px-4 py-2 border border-gray-300 rounded-lg text-sm focus:ring-2 focus:ring-blue-500"><?= e(get_setting('site_description')) ?></textarea>
            </div>
            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700 mb-1">Keywords</label>
                <input type="text" name="site_keywords" value="<?= e(get_setting('site_keywords')) ?>" class="w-full px-4 py-2 border border-gray-300 rounded-lg text-sm focus:ring-2 focus:ring-blue-500">
            </div>
            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700 mb-1">Código AdSense</label>
                <input type="text" name="adsense_code" value="<?= e(get_setting('adsense_code')) ?>" class="w-full px-4 py-2 border border-gray-300 rounded-lg text-sm focus:ring-2 focus:ring-blue-500">
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Código Analytics (colar no head)</label>
                <textarea name="analytics_code" rows="4" class="w-full px-4 py-2 border border-gray-300 rounded-lg text-sm font-mono focus:ring-2 focus:ring-blue-500"><?= e(get_setting('analytics_code')) ?></textarea>
            </div>
        </div>

        <div class="bg-white rounded-2xl border border-gray-200 shadow-sm p-6">
            <h3 class="text-lg font-bold text-gray-800 mb-4">Alterar Senha</h3>
            <p class="text-sm text-gray-500 mb-4">Deixe em branco para manter a senha atual.</p>
            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700 mb-1">Nova Senha</label>
                <input type="password" name="new_password" class="w-full px-4 py-2 border border-gray-300 rounded-lg text-sm focus:ring-2 focus:ring-blue-500" placeholder="Nova senha">
            </div>
        </div>
    </div>

    <div class="mt-6">
        <button type="submit" class="px-6 py-3 bg-blue-700 text-white rounded-xl font-medium hover:bg-blue-800 transition-colors">Salvar Configurações</button>
    </div>
</form>

<?php
function get_setting_local(string $key, string $default = ''): string {
    $db = get_db();
    $stmt = $db->prepare('SELECT value FROM settings WHERE key = :key');
    $stmt->execute([':key' => $key]);
    $row = $stmt->fetch();
    return $row ? $row['value'] : $default;
}
?>
