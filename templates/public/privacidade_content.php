<section class="article-wrapper">
    <div class="container">
        <div class="article-content" style="max-width: 800px; margin: 0 auto; padding: 40px 0;">
            <h1>Política de Privacidade</h1>
            <p><strong>Última atualização:</strong> <?= date('d/m/Y') ?></p>

            <p>A <strong>Altustec</strong> ("nós", "nosso") opera o site <strong>altusci.com.br</strong>. Esta página informa sobre nossas políticas relativas à coleta, uso e divulgação de informações pessoais quando você utiliza nosso site.</p>

            <h2>1. Informações que Coletamos</h2>

            <h3>1.1. Dados de Navegação</h3>
            <p>Quando você visita nosso site, coletamos automaticamente certas informações, incluindo:</p>
            <ul>
                <li>Endereço IP (anonimizado)</li>
                <li>Tipo de navegador e dispositivo</li>
                <li>Páginas visitadas e tempo de permanência</li>
                <li>URL de referência (site de origem)</li>
                <li>Data e hora do acesso</li>
            </ul>

            <h3>1.2. Cookies</h3>
            <p>Utilizamos cookies para:</p>
            <ul>
                <li><strong>Cookies essenciais:</strong> Necessários para o funcionamento básico do site (sessão, autenticação).</li>
                <li><strong>Cookies analíticos:</strong> Nos ajudam a entender como os visitantes interagem com o site, coletando informações de forma anônima. Incluem um identificador único de visitante para distinguir visitantes novos de recorrentes.</li>
                <li><strong>Cookies de preferência:</strong> Armazenam sua escolha sobre o consentimento de cookies.</li>
            </ul>
            <p>Você pode recusar o uso de cookies analíticos através do banner exibido na primeira visita. Ao recusar, não coletaremos dados de navegação além dos estritamente necessários para o funcionamento do site.</p>

            <h3>1.3. Dados de Contato</h3>
            <p>Quando você entra em contato conosco via formulário, WhatsApp ou e-mail, podemos coletar:</p>
            <ul>
                <li>Nome</li>
                <li>E-mail</li>
                <li>Telefone</li>
                <li>Mensagem enviada</li>
            </ul>

            <h2>2. Como Utilizamos suas Informações</h2>
            <p>Utilizamos as informações coletadas para:</p>
            <ul>
                <li>Manter e melhorar nosso site e serviços</li>
                <li>Analisar o uso do site para otimizar a experiência do usuário</li>
                <li>Responder suas solicitações e dúvidas</li>
                <li>Gerar relatórios estatísticos anônimos sobre o tráfego do site</li>
                <li>Prevenir atividades fraudulentas ou maliciosas</li>
            </ul>

            <h2>3. Compartilhamento de Dados</h2>
            <p>Não vendemos, trocamos ou transferimos suas informações pessoais para terceiros. Podemos compartilhar dados anônimos e agregados com parceiros de negócio para fins estatísticos.</p>
            <p>Nosso site pode utilizar serviços de terceiros como:</p>
            <ul>
                <li><strong>Google AdSense:</strong> Para exibição de anúncios. O Google pode usar cookies próprios para personalização de anúncios.</li>
                <li><strong>Google Fonts:</strong> Para carregamento de fontes tipográficas.</li>
            </ul>

            <h2>4. Armazenamento e Segurança</h2>
            <p>Seus dados são armazenados em servidores seguros. Adotamos medidas técnicas e organizacionais apropriadas para proteger suas informações contra acesso não autorizado, alteração, divulgação ou destruição.</p>
            <p>Os dados analíticos são mantidos por um período máximo de <strong>12 meses</strong>, após o qual são automaticamente excluídos.</p>

            <h2>5. Seus Direitos (LGPD)</h2>
            <p>De acordo com a Lei Geral de Proteção de Dados (Lei nº 13.709/2018), você tem direito a:</p>
            <ul>
                <li>Confirmar a existência de tratamento de dados</li>
                <li>Acessar seus dados pessoais</li>
                <li>Corrigir dados incompletos, inexatos ou desatualizados</li>
                <li>Solicitar a exclusão de dados desnecessários ou tratados em desconformidade</li>
                <li>Revogar o consentimento a qualquer momento</li>
                <li>Obter informações sobre entidades com as quais seus dados foram compartilhados</li>
            </ul>
            <p>Para exercer seus direitos, entre em contato pelo e-mail: <strong><?= e(get_setting('contact_email', 'contato@altusci.com.br')) ?></strong></p>

            <h2>6. Menores de Idade</h2>
            <p>Nosso site não é direcionado a menores de 18 anos. Não coletamos intencionalmente informações de menores de idade.</p>

            <h2>7. Alterações nesta Política</h2>
            <p>Podemos atualizar esta Política de Privacidade periodicamente. Recomendamos que você revise esta página regularmente. Alterações entram em vigor imediatamente após publicação.</p>

            <h2>8. Contato</h2>
            <p>Se você tiver dúvidas sobre esta Política de Privacidade, entre em contato:</p>
            <ul>
                <li><strong>E-mail:</strong> <?= e(get_setting('contact_email', 'contato@altusci.com.br')) ?></li>
                <li><strong>WhatsApp:</strong> <?= e(get_setting('contact_phone', '(11) 98775-6034')) ?></li>
                <li><strong>Endereço:</strong> <?= e(get_setting('contact_address', 'Estrada dos Vados, 551')) ?> - <?= e(get_setting('contact_city', 'Guarulhos, SP')) ?></li>
            </ul>
        </div>
    </div>
</section>
