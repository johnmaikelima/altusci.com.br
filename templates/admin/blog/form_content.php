<?php $isEdit = !empty($post['id']); ?>

<div class="max-w-5xl">
    <a href="/admin/blog" class="inline-flex items-center gap-2 text-sm text-gray-500 hover:text-blue-600 mb-6">
        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/></svg>
        Voltar para lista
    </a>

    <form method="POST" action="<?= $isEdit ? '/admin/blog/editar/' . $post['id'] : '/admin/blog/criar' ?>" enctype="multipart/form-data">
        <?= csrf_field() ?>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
            <!-- Main content -->
            <div class="lg:col-span-2 space-y-6">
                <div class="bg-white rounded-2xl border border-gray-200 shadow-sm p-6">
                    <h3 class="text-lg font-bold text-gray-800 mb-4">Conteúdo</h3>

                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700 mb-1">Título</label>
                        <input type="text" name="title" value="<?= e($post['title']) ?>" required class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-blue-500 text-lg font-medium" placeholder="Título do artigo">
                    </div>

                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700 mb-1">Slug (URL)</label>
                        <div class="flex items-center gap-2">
                            <span class="text-gray-400 text-sm">/blog/</span>
                            <input type="text" name="slug" value="<?= e($post['slug']) ?>" class="flex-1 px-4 py-2 border border-gray-300 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-blue-500 text-sm" placeholder="gerado-automaticamente">
                        </div>
                    </div>

                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700 mb-1">Resumo (excerpt)</label>
                        <textarea name="excerpt" rows="3" class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-blue-500 text-sm" placeholder="Breve descrição do artigo..."><?= e($post['excerpt']) ?></textarea>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Conteúdo (HTML)</label>
                        <div id="editor-toolbar" class="bg-gray-50 border border-gray-300 border-b-0 rounded-t-xl p-2 flex flex-wrap gap-1">
                            <button type="button" onclick="insertTag('h2')" class="px-3 py-1 text-xs font-bold bg-white border border-gray-200 rounded hover:bg-gray-100" title="Título H2">H2</button>
                            <button type="button" onclick="insertTag('h3')" class="px-3 py-1 text-xs font-bold bg-white border border-gray-200 rounded hover:bg-gray-100" title="Título H3">H3</button>
                            <button type="button" onclick="insertTag('p')" class="px-3 py-1 text-xs bg-white border border-gray-200 rounded hover:bg-gray-100" title="Parágrafo">P</button>
                            <button type="button" onclick="insertTag('strong')" class="px-3 py-1 text-xs font-bold bg-white border border-gray-200 rounded hover:bg-gray-100" title="Negrito">B</button>
                            <button type="button" onclick="insertTag('em')" class="px-3 py-1 text-xs italic bg-white border border-gray-200 rounded hover:bg-gray-100" title="Itálico">I</button>
                            <button type="button" onclick="insertList('ul')" class="px-3 py-1 text-xs bg-white border border-gray-200 rounded hover:bg-gray-100" title="Lista">UL</button>
                            <button type="button" onclick="insertList('ol')" class="px-3 py-1 text-xs bg-white border border-gray-200 rounded hover:bg-gray-100" title="Lista numerada">OL</button>
                            <button type="button" onclick="insertLink()" class="px-3 py-1 text-xs bg-white border border-gray-200 rounded hover:bg-gray-100" title="Link">Link</button>
                            <button type="button" onclick="insertImg()" class="px-3 py-1 text-xs bg-white border border-gray-200 rounded hover:bg-gray-100" title="Imagem">Img</button>
                        </div>
                        <textarea name="content" id="content-editor" rows="20" required class="w-full px-4 py-3 border border-gray-300 rounded-b-xl focus:ring-2 focus:ring-blue-500 focus:border-blue-500 text-sm font-mono" placeholder="Conteúdo em HTML..."><?= e($post['content']) ?></textarea>
                    </div>
                </div>
            </div>

            <!-- Sidebar -->
            <div class="space-y-6">
                <div class="bg-white rounded-2xl border border-gray-200 shadow-sm p-6">
                    <h3 class="text-lg font-bold text-gray-800 mb-4">Publicação</h3>

                    <div class="mb-4">
                        <label class="flex items-center gap-2">
                            <input type="checkbox" name="active" value="1" <?= $post['active'] ? 'checked' : '' ?> class="w-4 h-4 text-blue-600 rounded focus:ring-blue-500">
                            <span class="text-sm text-gray-700">Publicar (ativo)</span>
                        </label>
                    </div>
                    <div class="mb-4">
                        <label class="flex items-center gap-2">
                            <input type="checkbox" name="featured" value="1" <?= $post['featured'] ? 'checked' : '' ?> class="w-4 h-4 text-yellow-500 rounded focus:ring-yellow-500">
                            <span class="text-sm text-gray-700">Destaque na home</span>
                        </label>
                    </div>
                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700 mb-1">Categoria</label>
                        <select name="category_id" class="w-full px-3 py-2 border border-gray-300 rounded-lg text-sm focus:ring-2 focus:ring-blue-500">
                            <option value="">Sem categoria</option>
                            <?php foreach (($categories ?? []) as $cat): ?>
                            <option value="<?= $cat['id'] ?>" <?= ($post['category_id'] ?? '') == $cat['id'] ? 'selected' : '' ?>><?= e($cat['name']) ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700 mb-1">Autor</label>
                        <input type="text" name="author" value="<?= e($post['author']) ?>" class="w-full px-3 py-2 border border-gray-300 rounded-lg text-sm focus:ring-2 focus:ring-blue-500">
                    </div>

                    <button type="submit" class="w-full px-5 py-3 bg-blue-700 text-white rounded-xl font-medium hover:bg-blue-800 transition-colors">
                        <?= $isEdit ? 'Atualizar Post' : 'Publicar Post' ?>
                    </button>
                </div>

                <div class="bg-white rounded-2xl border border-gray-200 shadow-sm p-6">
                    <h3 class="text-lg font-bold text-gray-800 mb-4">Imagem de Capa</h3>
                    <?php if ($post['image']): ?>
                    <img src="<?= e($post['image']) ?>" class="w-full h-32 object-cover rounded-lg mb-3" alt="">
                    <?php endif; ?>
                    <input type="file" name="image_file" accept="image/*" class="w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-sm file:font-medium file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100">
                    <input type="hidden" name="image" value="<?= e($post['image']) ?>">
                    <p class="text-xs text-gray-400 mt-2">Ou cole a URL da imagem no campo oculto</p>
                </div>

                <div class="bg-white rounded-2xl border border-gray-200 shadow-sm p-6">
                    <h3 class="text-lg font-bold text-gray-800 mb-4">SEO</h3>

                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700 mb-1">Meta Title</label>
                        <input type="text" name="meta_title" value="<?= e($post['meta_title']) ?>" class="w-full px-3 py-2 border border-gray-300 rounded-lg text-sm focus:ring-2 focus:ring-blue-500" placeholder="Título para o Google">
                    </div>
                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700 mb-1">Meta Description</label>
                        <textarea name="meta_description" rows="3" class="w-full px-3 py-2 border border-gray-300 rounded-lg text-sm focus:ring-2 focus:ring-blue-500" placeholder="Descrição para o Google (até 160 chars)"><?= e($post['meta_description']) ?></textarea>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Meta Keywords</label>
                        <input type="text" name="meta_keywords" value="<?= e($post['meta_keywords']) ?>" class="w-full px-3 py-2 border border-gray-300 rounded-lg text-sm focus:ring-2 focus:ring-blue-500" placeholder="palavra1, palavra2, palavra3">
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>

<script>
const editor = document.getElementById('content-editor');

function insertTag(tag) {
    const start = editor.selectionStart;
    const end = editor.selectionEnd;
    const selected = editor.value.substring(start, end) || 'Texto aqui';
    const replacement = `<${tag}>${selected}</${tag}>\n`;
    editor.value = editor.value.substring(0, start) + replacement + editor.value.substring(end);
    editor.focus();
}

function insertList(tag) {
    const start = editor.selectionStart;
    const end = editor.selectionEnd;
    const replacement = `<${tag}>\n    <li>Item 1</li>\n    <li>Item 2</li>\n    <li>Item 3</li>\n</${tag}>\n`;
    editor.value = editor.value.substring(0, start) + replacement + editor.value.substring(end);
    editor.focus();
}

function insertLink() {
    const url = prompt('URL do link:');
    if (!url) return;
    const start = editor.selectionStart;
    const end = editor.selectionEnd;
    const text = editor.value.substring(start, end) || 'Texto do link';
    const replacement = `<a href="${url}">${text}</a>`;
    editor.value = editor.value.substring(0, start) + replacement + editor.value.substring(end);
    editor.focus();
}

function insertImg() {
    const url = prompt('URL da imagem:');
    if (!url) return;
    const alt = prompt('Texto alternativo (alt):') || '';
    const start = editor.selectionStart;
    const replacement = `<img src="${url}" alt="${alt}" loading="lazy">\n`;
    editor.value = editor.value.substring(0, start) + replacement + editor.value.substring(editor.selectionEnd);
    editor.focus();
}

// Auto-generate slug from title
document.querySelector('input[name="title"]').addEventListener('input', function() {
    const slugInput = document.querySelector('input[name="slug"]');
    if (!slugInput.value || !<?= $isEdit ? 'true' : 'false' ?>) {
        slugInput.value = this.value.toLowerCase()
            .normalize('NFD').replace(/[\u0300-\u036f]/g, '')
            .replace(/[^a-z0-9\s-]/g, '')
            .replace(/[\s-]+/g, '-')
            .replace(/^-+|-+$/g, '');
    }
});
</script>
