<?php
function format_duration(int $seconds): string {
    if ($seconds < 60) return $seconds . 's';
    $min = floor($seconds / 60);
    $sec = $seconds % 60;
    return $min . 'min ' . $sec . 's';
}
?>

<!-- Filtro de Período -->
<div class="flex items-center justify-between mb-6">
    <div class="flex items-center gap-2">
        <span class="text-sm text-gray-500">Período:</span>
        <?php foreach ([7 => '7 dias', 14 => '14 dias', 30 => '30 dias', 90 => '90 dias', 365 => '1 ano'] as $days => $label): ?>
        <a href="/admin/analytics?periodo=<?= $days ?>" class="px-3 py-1.5 rounded-lg text-sm font-medium transition-colors <?= ($period ?? '30') == $days ? 'bg-blue-700 text-white' : 'bg-gray-100 text-gray-600 hover:bg-gray-200' ?>">
            <?= $label ?>
        </a>
        <?php endforeach; ?>
    </div>
    <?php if ($stats['realtime'] > 0): ?>
    <div class="flex items-center gap-2 px-3 py-1.5 bg-green-50 border border-green-200 rounded-lg">
        <span class="w-2 h-2 bg-green-500 rounded-full animate-pulse"></span>
        <span class="text-sm font-medium text-green-700"><?= $stats['realtime'] ?> visitante<?= $stats['realtime'] > 1 ? 's' : '' ?> agora</span>
    </div>
    <?php endif; ?>
</div>

<!-- Stats Cards -->
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-6 gap-4 mb-8">
    <div class="bg-white rounded-2xl p-5 border border-gray-200 shadow-sm">
        <div class="flex items-center gap-3">
            <div class="w-10 h-10 bg-blue-100 rounded-xl flex items-center justify-center">
                <svg class="w-5 h-5 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/></svg>
            </div>
            <div>
                <p class="text-xl font-bold text-gray-800"><?= number_format($stats['pageviews']) ?></p>
                <p class="text-xs text-gray-500">Pageviews</p>
            </div>
        </div>
    </div>
    <div class="bg-white rounded-2xl p-5 border border-gray-200 shadow-sm">
        <div class="flex items-center gap-3">
            <div class="w-10 h-10 bg-green-100 rounded-xl flex items-center justify-center">
                <svg class="w-5 h-5 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/></svg>
            </div>
            <div>
                <p class="text-xl font-bold text-gray-800"><?= number_format($stats['unique_visitors']) ?></p>
                <p class="text-xs text-gray-500">Visitantes Únicos</p>
            </div>
        </div>
    </div>
    <div class="bg-white rounded-2xl p-5 border border-gray-200 shadow-sm">
        <div class="flex items-center gap-3">
            <div class="w-10 h-10 bg-purple-100 rounded-xl flex items-center justify-center">
                <svg class="w-5 h-5 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/></svg>
            </div>
            <div>
                <p class="text-xl font-bold text-gray-800"><?= number_format($stats['sessions']) ?></p>
                <p class="text-xs text-gray-500">Sessões</p>
            </div>
        </div>
    </div>
    <div class="bg-white rounded-2xl p-5 border border-gray-200 shadow-sm">
        <div class="flex items-center gap-3">
            <div class="w-10 h-10 bg-yellow-100 rounded-xl flex items-center justify-center">
                <svg class="w-5 h-5 text-yellow-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
            </div>
            <div>
                <p class="text-xl font-bold text-gray-800"><?= format_duration($stats['avg_duration']) ?></p>
                <p class="text-xs text-gray-500">Tempo Médio</p>
            </div>
        </div>
    </div>
    <div class="bg-white rounded-2xl p-5 border border-gray-200 shadow-sm">
        <div class="flex items-center gap-3">
            <div class="w-10 h-10 bg-indigo-100 rounded-xl flex items-center justify-center">
                <svg class="w-5 h-5 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z"/></svg>
            </div>
            <div>
                <p class="text-xl font-bold text-gray-800"><?= $stats['pages_per_session'] ?></p>
                <p class="text-xs text-gray-500">Págs/Sessão</p>
            </div>
        </div>
    </div>
    <div class="bg-white rounded-2xl p-5 border border-gray-200 shadow-sm">
        <div class="flex items-center gap-3">
            <div class="w-10 h-10 bg-red-100 rounded-xl flex items-center justify-center">
                <svg class="w-5 h-5 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"/></svg>
            </div>
            <div>
                <p class="text-xl font-bold text-gray-800"><?= $stats['bounce_rate'] ?>%</p>
                <p class="text-xs text-gray-500">Taxa Rejeição</p>
            </div>
        </div>
    </div>
</div>

<!-- Gráfico de Visitantes por Dia -->
<div class="bg-white rounded-2xl border border-gray-200 shadow-sm p-6 mb-6">
    <h3 class="text-lg font-bold text-gray-800 mb-4">Visitantes por Dia</h3>
    <?php if (!empty($dailyData)): ?>
    <?php
        $maxViews = max(array_column($dailyData, 'views'));
        $maxViews = $maxViews ?: 1;
    ?>
    <div class="overflow-x-auto">
        <div class="flex items-end gap-1 min-w-full" style="height: 200px;">
            <?php foreach ($dailyData as $day): ?>
            <?php $height = ($day['views'] / $maxViews) * 100; ?>
            <div class="flex-1 min-w-[20px] flex flex-col items-center gap-1 group relative">
                <div class="absolute bottom-full mb-2 hidden group-hover:block bg-gray-800 text-white text-xs rounded-lg px-2 py-1 whitespace-nowrap z-10">
                    <?= date('d/m', strtotime($day['date'])) ?>: <?= $day['views'] ?> views, <?= $day['visitors'] ?> visitantes
                </div>
                <div class="w-full bg-blue-500 rounded-t-sm hover:bg-blue-600 transition-colors cursor-pointer" style="height: <?= max($height, 2) ?>%"></div>
                <?php if (count($dailyData) <= 31): ?>
                <span class="text-[10px] text-gray-400 rotate-0"><?= date('d/m', strtotime($day['date'])) ?></span>
                <?php endif; ?>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
    <?php else: ?>
    <p class="text-gray-400 text-center py-12">Nenhum dado disponível neste período.</p>
    <?php endif; ?>
</div>

<div class="grid grid-cols-1 lg:grid-cols-3 gap-6 mb-6">
    <!-- Páginas Mais Visitadas -->
    <div class="lg:col-span-2 bg-white rounded-2xl border border-gray-200 shadow-sm overflow-hidden">
        <div class="p-6 border-b border-gray-100">
            <h3 class="text-lg font-bold text-gray-800">Páginas Mais Visitadas</h3>
        </div>
        <div class="overflow-x-auto">
            <table class="w-full">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-semibold text-gray-500 uppercase">Página</th>
                        <th class="px-6 py-3 text-right text-xs font-semibold text-gray-500 uppercase">Views</th>
                        <th class="px-6 py-3 text-right text-xs font-semibold text-gray-500 uppercase">Únicos</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                    <?php if (empty($topPages)): ?>
                    <tr><td colspan="3" class="px-6 py-8 text-center text-gray-400">Sem dados.</td></tr>
                    <?php else: foreach ($topPages as $page): ?>
                    <tr class="hover:bg-gray-50">
                        <td class="px-6 py-3">
                            <span class="text-sm text-gray-800 font-medium"><?= e($page['page_url']) ?></span>
                        </td>
                        <td class="px-6 py-3 text-right text-sm text-gray-600"><?= number_format($page['views']) ?></td>
                        <td class="px-6 py-3 text-right text-sm text-gray-600"><?= number_format($page['unique_views']) ?></td>
                    </tr>
                    <?php endforeach; endif; ?>
                </tbody>
            </table>
        </div>
    </div>

    <!-- Sidebar: Dispositivos + Referrers -->
    <div class="space-y-6">
        <!-- Dispositivos -->
        <div class="bg-white rounded-2xl border border-gray-200 shadow-sm p-6">
            <h3 class="text-lg font-bold text-gray-800 mb-4">Dispositivos</h3>
            <?php if (empty($devices)): ?>
            <p class="text-gray-400 text-center py-4">Sem dados.</p>
            <?php else: ?>
            <?php
                $totalDevices = array_sum(array_column($devices, 'total'));
                $deviceIcons = ['desktop' => 'M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z', 'mobile' => 'M12 18h.01M8 21h8a2 2 0 002-2V5a2 2 0 00-2-2H8a2 2 0 00-2 2v14a2 2 0 002 2z', 'tablet' => 'M12 18h.01M7 21h10a2 2 0 002-2V5a2 2 0 00-2-2H7a2 2 0 00-2 2v14a2 2 0 002 2z'];
                $deviceLabels = ['desktop' => 'Desktop', 'mobile' => 'Mobile', 'tablet' => 'Tablet'];
                $deviceColors = ['desktop' => 'blue', 'mobile' => 'green', 'tablet' => 'purple'];
            ?>
            <div class="space-y-3">
                <?php foreach ($devices as $device):
                    $pct = $totalDevices > 0 ? round(($device['total'] / $totalDevices) * 100, 1) : 0;
                    $color = $deviceColors[$device['device_type']] ?? 'gray';
                ?>
                <div>
                    <div class="flex items-center justify-between mb-1">
                        <div class="flex items-center gap-2">
                            <svg class="w-4 h-4 text-<?= $color ?>-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="<?= $deviceIcons[$device['device_type']] ?? $deviceIcons['desktop'] ?>"/></svg>
                            <span class="text-sm font-medium text-gray-700"><?= $deviceLabels[$device['device_type']] ?? ucfirst($device['device_type']) ?></span>
                        </div>
                        <span class="text-sm text-gray-500"><?= $pct ?>%</span>
                    </div>
                    <div class="w-full bg-gray-100 rounded-full h-2">
                        <div class="bg-<?= $color ?>-500 h-2 rounded-full" style="width: <?= $pct ?>%"></div>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
            <?php endif; ?>
        </div>

        <!-- Origem do Tráfego -->
        <div class="bg-white rounded-2xl border border-gray-200 shadow-sm p-6">
            <h3 class="text-lg font-bold text-gray-800 mb-4">Origem do Tráfego</h3>
            <?php if (empty($referrerDomains)): ?>
            <p class="text-gray-400 text-center py-4">Sem dados.</p>
            <?php else: ?>
            <div class="space-y-2">
                <?php $i = 0; foreach ($referrerDomains as $domain => $count): if ($i >= 8) break; ?>
                <div class="flex items-center justify-between py-1.5">
                    <span class="text-sm text-gray-700 truncate max-w-[180px]"><?= e($domain) ?></span>
                    <span class="text-sm font-medium text-gray-800"><?= number_format($count) ?></span>
                </div>
                <?php $i++; endforeach; ?>
            </div>
            <?php endif; ?>
        </div>
    </div>
</div>
