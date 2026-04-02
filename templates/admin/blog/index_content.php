<div class="flex items-center justify-between mb-6">
    <p class="text-gray-500"><?= count($posts) ?> post(s)</p>
    <a href="/admin/blog/criar" class="px-5 py-2.5 bg-blue-700 text-white rounded-xl text-sm font-medium hover:bg-blue-800 transition-colors flex items-center gap-2">
        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
        Novo Post
    </a>
</div>

<div class="bg-white rounded-2xl border border-gray-200 shadow-sm overflow-hidden">
    <div class="overflow-x-auto">
        <table class="w-full">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-semibold text-gray-500 uppercase">Título</th>
                    <th class="px-6 py-3 text-left text-xs font-semibold text-gray-500 uppercase">Categoria</th>
                    <th class="px-6 py-3 text-left text-xs font-semibold text-gray-500 uppercase">Views</th>
                    <th class="px-6 py-3 text-left text-xs font-semibold text-gray-500 uppercase">Status</th>
                    <th class="px-6 py-3 text-left text-xs font-semibold text-gray-500 uppercase">Data</th>
                    <th class="px-6 py-3 text-right text-xs font-semibold text-gray-500 uppercase">Ações</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100">
                <?php if (empty($posts)): ?>
                <tr><td colspan="5" class="px-6 py-12 text-center text-gray-400">Nenhum post criado ainda.</td></tr>
                <?php else: foreach ($posts as $post): ?>
                <tr class="hover:bg-gray-50">
                    <td class="px-6 py-4">
                        <div class="flex items-center gap-3">
                            <?php if ($post['image']): ?>
                            <img src="<?= e($post['image']) ?>" class="w-12 h-12 rounded-lg object-cover" alt="">
                            <?php endif; ?>
                            <div>
                                <div class="font-medium text-gray-800"><?= e(truncate($post['title'], 60)) ?></div>
                                <div class="text-xs text-gray-400">/blog/<?= e($post['slug']) ?></div>
                            </div>
                        </div>
                    </td>
                    <td class="px-6 py-4">
                        <?php if (!empty($post['category_name'])): ?>
                        <span class="px-2 py-1 text-xs rounded-full font-medium bg-blue-100 text-blue-700"><?= e($post['category_name']) ?></span>
                        <?php else: ?>
                        <span class="text-xs text-gray-400">—</span>
                        <?php endif; ?>
                    </td>
                    <td class="px-6 py-4 text-sm text-gray-600"><?= number_format($post['views']) ?></td>
                    <td class="px-6 py-4">
                        <?php if ($post['featured']): ?>
                        <span class="px-2 py-1 text-xs rounded-full font-medium bg-yellow-100 text-yellow-700 mr-1">Destaque</span>
                        <?php endif; ?>
                        <span class="px-2 py-1 text-xs rounded-full font-medium <?= $post['active'] ? 'bg-green-100 text-green-700' : 'bg-gray-100 text-gray-500' ?>">
                            <?= $post['active'] ? 'Ativo' : 'Rascunho' ?>
                        </span>
                    </td>
                    <td class="px-6 py-4 text-sm text-gray-500"><?= date('d/m/Y H:i', strtotime($post['created_at'])) ?></td>
                    <td class="px-6 py-4 text-right space-x-2">
                        <a href="/blog/<?= e($post['slug']) ?>" target="_blank" class="text-gray-400 hover:text-blue-600 text-sm">Ver</a>
                        <a href="/admin/blog/editar/<?= $post['id'] ?>" class="text-blue-600 hover:text-blue-800 text-sm font-medium">Editar</a>
                        <form method="POST" action="/admin/blog/excluir/<?= $post['id'] ?>" class="inline" onsubmit="return confirm('Excluir este post?')">
                            <?= csrf_field() ?>
                            <button type="submit" class="text-red-500 hover:text-red-700 text-sm font-medium">Excluir</button>
                        </form>
                    </td>
                </tr>
                <?php endforeach; endif; ?>
            </tbody>
        </table>
    </div>
</div>
