<?php
require_once BASE_PATH . '/config.php';

class AdminAnalyticsController {

    public function index(): void {
        require_login();
        $db = get_db();

        $period = $_GET['periodo'] ?? '30';
        $periodDays = in_array($period, ['7', '14', '30', '90', '365']) ? (int)$period : 30;
        $dateFrom = date('Y-m-d H:i:s', strtotime("-{$periodDays} days"));

        // Filtro de tráfego: valid, 404, all
        $filter = $_GET['filtro'] ?? 'valid';
        if (!in_array($filter, ['valid', '404', 'all'])) $filter = 'valid';

        $statusWhere = '';
        if ($filter === 'valid') $statusWhere = " AND status = 'valid'";
        elseif ($filter === '404') $statusWhere = " AND status = '404'";

        // Resumo geral
        $stats = [];

        // Total de pageviews no período
        $stmt = $db->prepare("SELECT COUNT(*) FROM analytics_pageviews WHERE created_at >= :from" . $statusWhere);
        $stmt->execute([':from' => $dateFrom]);
        $stats['pageviews'] = (int)$stmt->fetchColumn();

        // Visitantes únicos no período
        $stmt = $db->prepare("SELECT COUNT(DISTINCT visitor_id) FROM analytics_pageviews WHERE created_at >= :from" . $statusWhere);
        $stmt->execute([':from' => $dateFrom]);
        $stats['unique_visitors'] = (int)$stmt->fetchColumn();

        // Sessões no período
        $stmt = $db->prepare("SELECT COUNT(*) FROM analytics_sessions WHERE started_at >= :from");
        $stmt->execute([':from' => $dateFrom]);
        $stats['sessions'] = (int)$stmt->fetchColumn();

        // Tempo médio de sessão (em segundos)
        $stmt = $db->prepare("SELECT COALESCE(AVG(duration), 0) FROM analytics_sessions WHERE started_at >= :from AND duration > 0");
        $stmt->execute([':from' => $dateFrom]);
        $stats['avg_duration'] = (int)$stmt->fetchColumn();

        // Média de páginas por sessão
        $stmt = $db->prepare("SELECT COALESCE(AVG(pages_viewed), 0) FROM analytics_sessions WHERE started_at >= :from");
        $stmt->execute([':from' => $dateFrom]);
        $stats['pages_per_session'] = round((float)$stmt->fetchColumn(), 1);

        // Taxa de rejeição (sessões com 1 página / total sessões)
        $stmt = $db->prepare("SELECT COUNT(*) FROM analytics_sessions WHERE started_at >= :from AND pages_viewed = 1");
        $stmt->execute([':from' => $dateFrom]);
        $bounceSessions = (int)$stmt->fetchColumn();
        $stats['bounce_rate'] = $stats['sessions'] > 0 ? round(($bounceSessions / $stats['sessions']) * 100, 1) : 0;

        // Contagem de 404s no período
        $stmt = $db->prepare("SELECT COUNT(*) FROM analytics_pageviews WHERE created_at >= :from AND status = '404'");
        $stmt->execute([':from' => $dateFrom]);
        $stats['total_404'] = (int)$stmt->fetchColumn();

        // Páginas mais visitadas
        $stmt = $db->prepare("SELECT page_url, status, COUNT(*) as views, COUNT(DISTINCT visitor_id) as unique_views FROM analytics_pageviews WHERE created_at >= :from" . $statusWhere . " GROUP BY page_url ORDER BY views DESC LIMIT 15");
        $stmt->execute([':from' => $dateFrom]);
        $topPages = $stmt->fetchAll();

        // Visitantes por dia (gráfico)
        $stmt = $db->prepare("SELECT DATE(created_at) as date, COUNT(*) as views, COUNT(DISTINCT visitor_id) as visitors FROM analytics_pageviews WHERE created_at >= :from" . $statusWhere . " GROUP BY DATE(created_at) ORDER BY date ASC");
        $stmt->execute([':from' => $dateFrom]);
        $dailyData = $stmt->fetchAll();

        // Dispositivos
        $stmt = $db->prepare("SELECT device_type, COUNT(*) as total FROM analytics_sessions WHERE started_at >= :from GROUP BY device_type ORDER BY total DESC");
        $stmt->execute([':from' => $dateFrom]);
        $devices = $stmt->fetchAll();

        // Referrers simplificados (domínio)
        $stmt = $db->prepare("SELECT referrer, COUNT(*) as total FROM analytics_sessions WHERE started_at >= :from AND referrer != '' GROUP BY referrer ORDER BY total DESC LIMIT 10");
        $stmt->execute([':from' => $dateFrom]);
        $rawReferrers = $stmt->fetchAll();

        // Agrupar por domínio
        $referrerDomains = [];
        foreach ($rawReferrers as $ref) {
            $host = parse_url($ref['referrer'], PHP_URL_HOST) ?: $ref['referrer'];
            $host = preg_replace('/^www\./', '', $host);
            $referrerDomains[$host] = ($referrerDomains[$host] ?? 0) + $ref['total'];
        }
        arsort($referrerDomains);

        // Sessões com referrer vazio = direto
        $stmt = $db->prepare("SELECT COUNT(*) FROM analytics_sessions WHERE started_at >= :from AND (referrer = '' OR referrer IS NULL)");
        $stmt->execute([':from' => $dateFrom]);
        $directVisits = (int)$stmt->fetchColumn();
        $referrerDomains = array_merge(['Acesso Direto' => $directVisits], $referrerDomains);

        // Visitantes em tempo real (últimos 5 minutos)
        $stmt = $db->prepare("SELECT COUNT(DISTINCT visitor_id) FROM analytics_pageviews WHERE created_at >= datetime('now', '-5 minutes')");
        $stmt->execute();
        $stats['realtime'] = (int)$stmt->fetchColumn();

        // Top páginas 404 (para a seção separada)
        $stmt = $db->prepare("SELECT page_url, COUNT(*) as hits, COUNT(DISTINCT visitor_id) as unique_hits, MAX(created_at) as last_hit FROM analytics_pageviews WHERE created_at >= :from AND status = '404' GROUP BY page_url ORDER BY hits DESC LIMIT 15");
        $stmt->execute([':from' => $dateFrom]);
        $top404 = $stmt->fetchAll();

        $pageTitle = 'Analytics';
        $contentTemplate = BASE_PATH . '/templates/admin/analytics_content.php';
        include BASE_PATH . '/templates/layouts/admin.php';
    }
}
