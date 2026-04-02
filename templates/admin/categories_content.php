<?php $editCategory = $category ?? null; ?>

<div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
    <!-- Formulário -->
    <div class="lg:col-span-1">
        <div class="bg-white rounded-2xl border border-gray-200 shadow-sm p-6">
            <h3 class="text-lg font-bold text-gray-800 mb-4">
                <?= $editCategory ? 'Editar Categoria' : 'Nova Categoria' ?>
            </h3>
            <form method="POST" action="<?= $editCategory ? '/admin/categorias/editar/' . $editCategory['id'] : '/admin/categorias/criar' ?>">
                <?= csrf_field() ?>

                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700 mb-1">Nome</label>
                    <input type="text" name="name" value="<?= e($editCategory['name'] ?? '') ?>" required class="w-full px-4 py-2 border border-gray-300 rounded-lg text-sm focus:ring-2 focus:ring-blue-500" placeholder="Ex: Hardware">
                </div>

                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700 mb-1">Slug</label>
                    <input type="text" name="slug" value="<?= e($editCategory['slug'] ?? '') ?>" class="w-full px-4 py-2 border border-gray-300 rounded-lg text-sm focus:ring-2 focus:ring-blue-500" placeholder="gerado-automaticamente">
                </div>

                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700 mb-1">Descrição</label>
                    <textarea name="description" rows="3" class="w-full px-4 py-2 border border-gray-300 rounded-lg text-sm focus:ring-2 focus:ring-blue-500" placeholder="Descrição da categoria"><?= e($editCategory['description'] ?? '') ?></textarea>
                </div>

                <?php if ($editCategory): ?>
                <div class="mb-4">
                    <label class="flex items-center gap-2">
                        <input type="checkbox" name="active" value="1" <?= $editCategory['active'] ? 'checked' : '' ?> class="w-4 h-4 text-blue-600 rounded">
                        <span class="text-sm text-gray-700">Ativa</span>
                    </label>
                </div>
                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700 mb-1">Ordem</label>
                    <input type="number" name="sort_order" value="<?= $editCategory['sort_order'] ?>" class="w-full px-4 py-2 border border-gray-300 rounded-lg text-sm focus:ring-2 focus:ring-blue-500">
                </div>
                <?php endif; ?>

                <div class="flex gap-2">
                    <button type="submit" class="flex-1 px-4 py-2 bg-blue-700 text-white rounded-lg text-sm font-medium hover:bg-blue-800 transition-colors">
                        <?= $editCategory ? 'Atualizar' : 'Criar Categoria' ?>
                    </button>
                    <?php if ($editCategory): ?>
                    <a href="/admin/categorias" class="px-4 py-2 bg-gray-100 text-gray-600 rounded-lg text-sm font-medium hover:bg-gray-200 transition-colors">Cancelar</a>
                    <?php endif; ?>
                </div>
            </form>
        </div>
    </div>

    <!-- Lista -->
    <div class="lg:col-span-2">
        <div class="bg-white rounded-2xl border border-gray-200 shadow-sm overflow-hidden">
            <div class="p-6 border-b border-gray-100">
                <h3 class="text-lg font-bold text-gray-800">Categorias (<?= count($categories ?? []) ?>)</h3>
            </div>
            <div class="overflow-x-auto">
                <table class="w-full">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-semibold text-gray-500 uppercase">Nome</th>
                            <th class="px-6 py-3 text-left text-xs font-semibold text-gray-500 uppercase">Slug</th>
                            <th class="px-6 py-3 text-left text-xs font-semibold text-gray-500 uppercase">Posts</th>
                            <th class="px-6 py-3 text-left text-xs font-semibold text-gray-500 uppercase">Status</th>
                            <th class="px-6 py-3 text-right text-xs font-semibold text-gray-500 uppercase">Ações</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100">
                        <?php if (empty($categories)): ?>
                        <tr><td colspan="5" class="px-6 py-8 text-center text-gray-400">Nenhuma categoria criada.</td></tr>
                        <?php else: foreach ($categories as $cat): ?>
                        <tr class="hover:bg-gray-50">
                            <td class="px-6 py-4 font-medium text-gray-800"><?= e($cat['name']) ?></td>
                            <td class="px-6 py-4 text-sm text-gray-500"><?= e($cat['slug']) ?></td>
                            <td class="px-6 py-4">
                                <span class="px-2 py-1 text-xs rounded-full font-medium bg-blue-100 text-blue-700"><?= $cat['post_count'] ?> posts</span>
                            </td>
                            <td class="px-6 py-4">
                                <span class="px-2 py-1 text-xs rounded-full font-medium <?= $cat['active'] ? 'bg-green-100 text-green-700' : 'bg-gray-100 text-gray-500' ?>">
                                    <?= $cat['active'] ? 'Ativa' : 'Inativa' ?>
                                </span>
                            </td>
                            <td class="px-6 py-4 text-right space-x-2">
                                <a href="/admin/categorias/editar/<?= $cat['id'] ?>" class="text-blue-600 hover:text-blue-800 text-sm font-medium">Editar</a>
                                <form method="POST" action="/admin/categorias/excluir/<?= $cat['id'] ?>" class="inline" onsubmit="return confirm('Excluir esta categoria? Os posts ficarão sem categoria.')">
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
    </div>
</div>
