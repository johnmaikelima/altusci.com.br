<?php
/**
 * Seed para inserir os artigos do blog no banco de dados.
 * Executar: php database/seed_blog.php
 */
require_once __DIR__ . '/../config.php';

// Garantir que o banco existe
if (!file_exists(DB_PATH)) {
    require_once __DIR__ . '/migrate.php';
}

$db = get_db();

$articles = [];

// ============================================================
// ARTIGO 1: Como Fazer o Notebook Ficar Mais Rápido
// ============================================================
$articles[] = [
    'title' => 'Como Fazer o Notebook Ficar Mais Rápido',
    'slug' => 'como-fazer-o-notebook-ficar-mais-rapido',
    'excerpt' => 'Seu notebook está lento? Descubra as melhores técnicas para acelerar o desempenho do seu notebook, desde otimizações de software até upgrades de hardware.',
    'meta_title' => 'Como Fazer o Notebook Ficar Mais Rápido [Guia Completo 2025]',
    'meta_description' => 'Aprenda como fazer o notebook ficar mais rápido com dicas práticas de otimização de software, limpeza de disco, upgrade de SSD e RAM. Guia completo e atualizado.',
    'meta_keywords' => 'como fazer notebook ficar mais rapido, notebook lento, acelerar notebook, otimizar notebook, deixar notebook rapido',
    'content' => '
<h2>Por que o notebook fica lento com o tempo?</h2>
<p>É comum que, após meses ou anos de uso, o notebook comece a apresentar lentidão. Isso acontece por diversos motivos: acúmulo de arquivos temporários, programas que iniciam junto com o sistema, disco rígido fragmentado, vírus e malware, ou simplesmente hardware defasado para as demandas atuais.</p>
<p>A boa notícia é que existem diversas soluções — tanto gratuitas quanto com investimento em hardware — que podem <strong>fazer seu notebook ficar significativamente mais rápido</strong>. Neste guia completo, vamos abordar todas elas.</p>

<h2>1. Desinstale programas que você não usa mais</h2>
<p>Com o tempo, acumulamos dezenas de programas que nunca mais abrimos. Esses softwares ocupam espaço no disco e, em muitos casos, rodam processos em segundo plano que consomem memória RAM e processador.</p>
<ul>
    <li>Acesse <strong>Configurações > Aplicativos > Aplicativos instalados</strong></li>
    <li>Ordene por tamanho para encontrar os maiores</li>
    <li>Desinstale tudo que não usa mais</li>
</ul>

<h2>2. Desative programas da inicialização</h2>
<p>Um dos principais motivos de lentidão ao ligar o notebook é a quantidade de programas que iniciam automaticamente com o Windows.</p>
<ul>
    <li>Pressione <strong>Ctrl + Shift + Esc</strong> para abrir o Gerenciador de Tarefas</li>
    <li>Vá na aba <strong>Inicializar</strong></li>
    <li>Desative tudo que não precisa iniciar automaticamente (Spotify, Steam, OneDrive, etc.)</li>
</ul>

<h2>3. Faça uma limpeza de disco</h2>
<p>O Windows acumula arquivos temporários, cache de atualizações e lixeira que podem ocupar gigabytes de espaço desnecessariamente.</p>
<ul>
    <li>Pesquise por <strong>"Limpeza de Disco"</strong> no menu Iniciar</li>
    <li>Selecione a unidade C: e clique em OK</li>
    <li>Marque todas as opções e clique em <strong>"Limpar arquivos do sistema"</strong></li>
    <li>Alternativamente, use <strong>Configurações > Sistema > Armazenamento > Arquivos temporários</strong></li>
</ul>

<h2>4. Verifique se há vírus ou malware</h2>
<p>Vírus e malware consomem recursos do sistema em segundo plano. Faça uma verificação completa com o Windows Defender ou com um antivírus gratuito como o Malwarebytes.</p>

<h2>5. Upgrade de SSD: a melhoria mais impactante</h2>
<p>Se o seu notebook ainda usa um <strong>HD (disco rígido mecânico)</strong>, trocar por um <strong>SSD</strong> é a mudança que mais faz diferença. Um SSD pode ser até 10 vezes mais rápido que um HD convencional.</p>
<p>Com um SSD, o Windows inicia em menos de 15 segundos, programas abrem instantaneamente e a experiência geral é completamente transformada.</p>

<h2>6. Aumente a memória RAM</h2>
<p>Se o seu notebook tem apenas 4GB de RAM, considere aumentar para pelo menos 8GB. Com pouca RAM, o sistema usa o disco como memória virtual, o que causa lentidão extrema.</p>
<p>Para verificar quanta RAM você tem: pressione <strong>Ctrl + Shift + Esc</strong> e vá na aba <strong>Desempenho > Memória</strong>.</p>

<h2>7. Ajuste as configurações de energia</h2>
<p>O Windows pode estar em modo de economia de energia, limitando o desempenho do processador.</p>
<ul>
    <li>Acesse <strong>Painel de Controle > Opções de Energia</strong></li>
    <li>Selecione o plano <strong>"Alto Desempenho"</strong> ou <strong>"Equilibrado"</strong></li>
</ul>

<h2>8. Mantenha o Windows atualizado</h2>
<p>As atualizações do Windows incluem correções de bugs e melhorias de desempenho. Manter o sistema atualizado garante que você tenha a versão mais otimizada.</p>

<h2>9. Reinstale o Windows se necessário</h2>
<p>Quando nada mais funciona, uma instalação limpa do Windows pode resolver. Faça backup dos seus arquivos importantes e reinstale o sistema do zero. Isso elimina todos os problemas de software acumulados.</p>

<h2>Quando procurar assistência técnica?</h2>
<p>Se após todas essas dicas o notebook continuar lento, pode ser um problema de hardware: processador superaquecendo, ventilador com defeito, ou componentes danificados. Nesse caso, procure uma <strong>assistência técnica especializada</strong> para fazer um diagnóstico completo.</p>
<p>A <strong>Altustec</strong> oferece serviços de manutenção e upgrade de notebooks em Guarulhos. Entre em contato para um orçamento sem compromisso!</p>
',
];

// ============================================================
// ARTIGO 2: Como Saber Quantas Polegadas Tem Meu Notebook
// ============================================================
$articles[] = [
    'title' => 'Como Saber Quantas Polegadas Tem Meu Notebook',
    'slug' => 'como-saber-quantas-polegadas-tem-meu-notebook',
    'excerpt' => 'Precisa saber o tamanho da tela do seu notebook? Aprenda métodos simples para descobrir quantas polegadas tem seu notebook sem precisar de ferramentas especiais.',
    'meta_title' => 'Como Saber Quantas Polegadas Tem Meu Notebook [3 Métodos]',
    'meta_description' => 'Descubra como saber quantas polegadas tem seu notebook. Aprenda 3 métodos práticos para medir a tela do notebook corretamente.',
    'meta_keywords' => 'quantas polegadas tem meu notebook, tamanho tela notebook, medir tela notebook, polegadas notebook, como saber tamanho notebook',
    'content' => '
<h2>Por que é importante saber o tamanho da tela?</h2>
<p>Saber quantas polegadas tem a tela do seu notebook é essencial para diversas situações: comprar uma capa ou mochila do tamanho certo, adquirir uma película protetora, ou simplesmente para informar em uma venda ou troca.</p>

<h2>Método 1: Medir com uma régua ou fita métrica</h2>
<p>O método mais direto e confiável é medir fisicamente a tela do notebook.</p>
<ul>
    <li>Pegue uma régua ou fita métrica</li>
    <li>Meça a <strong>diagonal da tela</strong> — do canto inferior esquerdo ao canto superior direito</li>
    <li>Meça apenas a área visível da tela, sem incluir a moldura (bezel)</li>
    <li>O resultado em centímetros, divida por <strong>2,54</strong> para converter em polegadas</li>
</ul>
<p><strong>Exemplo:</strong> Se a diagonal mede 39,6 cm, divida por 2,54 = <strong>15,6 polegadas</strong>.</p>

<h2>Método 2: Verificar o modelo do notebook</h2>
<p>O tamanho da tela geralmente está no nome do modelo do notebook. Veja como descobrir:</p>
<ul>
    <li>Procure uma etiqueta na parte inferior do notebook com o modelo</li>
    <li>Ou pressione <strong>Win + R</strong>, digite <strong>msinfo32</strong> e pressione Enter</li>
    <li>Procure por "Modelo do sistema"</li>
    <li>Pesquise o modelo no Google — as especificações informarão o tamanho da tela</li>
</ul>

<h2>Método 3: Verificar nas configurações do Windows</h2>
<ul>
    <li>Clique com o botão direito na área de trabalho e selecione <strong>Configurações de exibição</strong></li>
    <li>Veja a <strong>resolução da tela</strong> — isso pode indicar o tamanho</li>
    <li>Resoluções comuns e tamanhos correspondentes:</li>
</ul>
<table>
    <tr><th>Resolução</th><th>Tamanho provável</th></tr>
    <tr><td>1366 x 768</td><td>14" ou 15.6"</td></tr>
    <tr><td>1920 x 1080 (Full HD)</td><td>14", 15.6" ou 17.3"</td></tr>
    <tr><td>2560 x 1440 (2K)</td><td>13.3", 14" ou 15.6"</td></tr>
    <tr><td>3840 x 2160 (4K)</td><td>15.6" ou 17.3"</td></tr>
</table>

<h2>Tamanhos mais comuns de notebooks</h2>
<ul>
    <li><strong>11.6"</strong> — Ultraportáteis e Chromebooks</li>
    <li><strong>13.3"</strong> — Ultrabooks premium (MacBook Air, Dell XPS 13)</li>
    <li><strong>14"</strong> — Equilíbrio entre portabilidade e tela</li>
    <li><strong>15.6"</strong> — O tamanho mais comum, ideal para uso geral</li>
    <li><strong>17.3"</strong> — Notebooks maiores, ideais para trabalho e games</li>
</ul>

<h2>Dica extra</h2>
<p>Se você precisa do tamanho exato para comprar acessórios, sempre confira as especificações do fabricante no site oficial. O número de polegadas pode variar ligeiramente entre modelos.</p>
',
];

// ============================================================
// ARTIGO 3: Como Usar um Notebook Como Segundo Monitor
// ============================================================
$articles[] = [
    'title' => 'Como Usar um Notebook Como Segundo Monitor',
    'slug' => 'como-usar-um-notebook-como-segundo-monitor',
    'excerpt' => 'Aprenda como transformar um notebook em segundo monitor para aumentar sua produtividade. Métodos com e sem cabo para Windows e Mac.',
    'meta_title' => 'Como Usar um Notebook Como Segundo Monitor [Guia 2025]',
    'meta_description' => 'Aprenda como usar um notebook como segundo monitor no Windows e Mac. Métodos com cabo e sem fio para aumentar sua produtividade.',
    'meta_keywords' => 'notebook como segundo monitor, usar notebook como monitor, segundo monitor notebook, estender tela notebook, dual monitor notebook',
    'content' => '
<h2>É possível usar um notebook como segundo monitor?</h2>
<p>Sim! Ter uma segunda tela aumenta significativamente a produtividade, e se você tem um notebook parado em casa, pode usá-lo como <strong>segundo monitor</strong> do seu computador principal. Existem métodos nativos do Windows e também softwares de terceiros.</p>

<h2>Método 1: Miracast (Windows 10/11 — sem cabo)</h2>
<p>O Windows tem um recurso nativo chamado <strong>"Projetar para este computador"</strong> que permite usar um notebook como monitor sem fio.</p>
<h3>No notebook que será o monitor:</h3>
<ul>
    <li>Acesse <strong>Configurações > Sistema > Projetando para este computador</strong></li>
    <li>Altere a primeira opção para <strong>"Disponível em todos os lugares"</strong></li>
    <li>Defina as preferências de PIN e conexão</li>
</ul>
<h3>No computador principal:</h3>
<ul>
    <li>Pressione <strong>Win + P</strong></li>
    <li>Selecione <strong>"Estender"</strong></li>
    <li>Clique em <strong>"Conectar a um monitor sem fio"</strong></li>
    <li>Selecione o notebook na lista</li>
</ul>

<h2>Método 2: Usando o software Spacedesk (gratuito)</h2>
<p>O <strong>Spacedesk</strong> é um software gratuito que transforma qualquer dispositivo em segundo monitor via Wi-Fi ou cabo USB.</p>
<ul>
    <li>No computador principal: instale o <strong>Spacedesk Driver</strong></li>
    <li>No notebook secundário: instale o <strong>Spacedesk Viewer</strong></li>
    <li>Ambos precisam estar na mesma rede Wi-Fi</li>
    <li>Abra o Viewer no notebook e ele detectará automaticamente o computador principal</li>
</ul>

<h2>Método 3: Cabo HDMI com placa de captura</h2>
<p>Se precisa de uma conexão estável e sem atraso, pode usar uma <strong>placa de captura USB</strong> conectada ao notebook.</p>
<ul>
    <li>Conecte a saída HDMI do computador principal na placa de captura</li>
    <li>Conecte a placa de captura via USB no notebook</li>
    <li>Use o software OBS Studio ou similar para exibir a imagem</li>
</ul>

<h2>Dicas importantes</h2>
<ul>
    <li>A conexão sem fio pode ter um pequeno atraso — ideal para trabalho, mas não para jogos</li>
    <li>Para melhor desempenho via Wi-Fi, use uma rede 5GHz</li>
    <li>Certifique-se de que ambos os dispositivos estão na mesma rede</li>
</ul>
',
];

// ============================================================
// ARTIGO 4: Como Saber se Meu Notebook Dá pra Trocar de Processador
// ============================================================
$articles[] = [
    'title' => 'Como Saber se Meu Notebook Dá pra Trocar de Processador',
    'slug' => 'como-saber-se-meu-notebook-da-pra-trocar-de-processador',
    'excerpt' => 'Descubra se é possível trocar o processador do seu notebook. Entenda os tipos de soquete, limitações e quando vale a pena o upgrade.',
    'meta_title' => 'Como Saber se Meu Notebook Dá pra Trocar de Processador',
    'meta_description' => 'Descubra se o processador do seu notebook pode ser trocado. Saiba identificar soquetes removíveis vs soldados e quando vale a pena o upgrade.',
    'meta_keywords' => 'trocar processador notebook, upgrade processador notebook, notebook troca processador, processador soldado notebook',
    'content' => '
<h2>A maioria dos notebooks NÃO permite trocar o processador</h2>
<p>Diferente dos computadores desktop, a grande maioria dos notebooks modernos tem o <strong>processador soldado diretamente na placa-mãe</strong>. Isso significa que ele não pode ser removido ou substituído.</p>
<p>No entanto, alguns notebooks mais antigos ou de linhas profissionais permitem a troca. Veja como descobrir se o seu é um deles.</p>

<h2>Como verificar se o processador é removível</h2>

<h3>1. Verifique o tipo de soquete do processador</h3>
<p>Processadores de notebook usam dois tipos de conexão:</p>
<ul>
    <li><strong>BGA (Ball Grid Array)</strong> — Soldado na placa. <strong>NÃO pode ser trocado.</strong></li>
    <li><strong>PGA (Pin Grid Array)</strong> — Encaixado em soquete. <strong>Pode ser trocado.</strong></li>
</ul>

<h3>2. Use o CPU-Z para descobrir</h3>
<ul>
    <li>Baixe e instale o <strong>CPU-Z</strong> (gratuito)</li>
    <li>Abra o programa e veja a aba <strong>"CPU"</strong></li>
    <li>Procure por <strong>"Package"</strong></li>
    <li>Se mostrar <strong>"BGA"</strong> = soldado (não troca)</li>
    <li>Se mostrar <strong>"PGA"</strong> ou <strong>"Socket"</strong> = removível (pode trocar)</li>
</ul>

<h3>3. Pesquise o modelo do notebook</h3>
<p>Procure no Google: <strong>"[modelo do notebook] + processador removível"</strong> ou consulte o manual do fabricante.</p>

<h2>Quais notebooks permitem troca de processador?</h2>
<ul>
    <li>Notebooks mais antigos (antes de 2015) com processadores Intel de soquete PGA988 ou rPGA946</li>
    <li>Algumas estações de trabalho móveis (Dell Precision, HP ZBook, Lenovo ThinkPad série W)</li>
    <li>Notebooks gamers de gerações mais antigas</li>
</ul>

<h2>O que fazer se não puder trocar o processador?</h2>
<p>Se o processador é soldado, existem outras formas de melhorar o desempenho:</p>
<ul>
    <li><strong>Upgrade de SSD</strong> — A melhoria mais impactante</li>
    <li><strong>Mais memória RAM</strong> — Ideal se você tem menos de 8GB</li>
    <li><strong>Limpeza térmica</strong> — Trocar pasta térmica para evitar throttling</li>
    <li><strong>Reinstalar o Windows</strong> — Elimina problemas de software</li>
</ul>

<h2>Consulte um especialista</h2>
<p>Se você não tem certeza, procure uma assistência técnica. Na <strong>Altustec</strong>, fazemos diagnóstico completo do seu notebook e orientamos sobre as melhores opções de upgrade.</p>
',
];

// ============================================================
// ARTIGO 5: Como Verificar a Placa de Vídeo do Notebook
// ============================================================
$articles[] = [
    'title' => 'Como Verificar a Placa de Vídeo do Notebook',
    'slug' => 'como-verificar-a-placa-de-video-do-notebook',
    'excerpt' => 'Aprenda como descobrir qual placa de vídeo o seu notebook tem usando métodos simples no Windows, sem precisar instalar programas.',
    'meta_title' => 'Como Verificar a Placa de Vídeo do Notebook [4 Métodos]',
    'meta_description' => 'Descubra como verificar a placa de vídeo do notebook no Windows. 4 métodos fáceis para saber qual GPU seu notebook tem.',
    'meta_keywords' => 'verificar placa de video notebook, descobrir placa de video, qual placa de video meu notebook tem, gpu notebook, como saber placa de video',
    'content' => '
<h2>Por que saber qual placa de vídeo você tem?</h2>
<p>Conhecer a placa de vídeo (GPU) do seu notebook é importante para saber se ele roda determinados jogos, softwares de edição, ou para atualizar os drivers corretamente.</p>

<h2>Método 1: Gerenciador de Dispositivos</h2>
<ul>
    <li>Clique com o botão direito no <strong>Menu Iniciar</strong></li>
    <li>Selecione <strong>"Gerenciador de Dispositivos"</strong></li>
    <li>Expanda a seção <strong>"Adaptadores de vídeo"</strong></li>
    <li>Você verá o nome da sua placa de vídeo</li>
</ul>
<p>Se aparecerem duas placas, seu notebook tem uma <strong>GPU integrada</strong> (Intel/AMD) e uma <strong>GPU dedicada</strong> (NVIDIA/AMD).</p>

<h2>Método 2: Ferramenta de Diagnóstico DirectX (dxdiag)</h2>
<ul>
    <li>Pressione <strong>Win + R</strong></li>
    <li>Digite <strong>dxdiag</strong> e pressione Enter</li>
    <li>Vá na aba <strong>"Exibição"</strong></li>
    <li>Verá o nome, fabricante e memória da placa de vídeo</li>
</ul>

<h2>Método 3: Configurações do Windows</h2>
<ul>
    <li>Acesse <strong>Configurações > Sistema > Tela</strong></li>
    <li>Role para baixo e clique em <strong>"Configurações avançadas de exibição"</strong></li>
    <li>O nome da placa de vídeo aparecerá no topo</li>
</ul>

<h2>Método 4: Usando o GPU-Z (software gratuito)</h2>
<p>Para informações detalhadas, baixe o <strong>GPU-Z</strong>. Ele mostra:</p>
<ul>
    <li>Nome exato da GPU</li>
    <li>Quantidade de memória VRAM</li>
    <li>Frequência do clock</li>
    <li>Temperatura em tempo real</li>
    <li>Versão do driver instalado</li>
</ul>

<h2>Tipos de placa de vídeo em notebooks</h2>
<ul>
    <li><strong>Integrada (Intel UHD, Intel Iris, AMD Radeon Vega)</strong> — Vem embutida no processador, consome menos energia, suficiente para uso geral</li>
    <li><strong>Dedicada (NVIDIA GeForce, AMD Radeon RX)</strong> — Chip separado com memória própria, ideal para jogos e edição de vídeo</li>
</ul>

<h2>Precisa de mais desempenho gráfico?</h2>
<p>Se a placa de vídeo do seu notebook não atende suas necessidades, considere usar uma <strong>eGPU (GPU externa)</strong> via Thunderbolt, ou consulte a <strong>Altustec</strong> para avaliar suas opções.</p>
',
];

// ============================================================
// ARTIGO 6: Descobrir Qual SSD é Compatível com Meu Notebook
// ============================================================
$articles[] = [
    'title' => 'Descobrir Qual SSD é Compatível com Meu Notebook',
    'slug' => 'descobrir-qual-ssd-e-compativel-com-meu-notebook',
    'excerpt' => 'Guia completo para descobrir qual tipo de SSD é compatível com o seu notebook. Entenda as diferenças entre SATA, M.2 e NVMe.',
    'meta_title' => 'Qual SSD é Compatível com Meu Notebook? [Guia Completo]',
    'meta_description' => 'Descubra qual SSD é compatível com seu notebook. Aprenda a diferença entre SATA, M.2 SATA e M.2 NVMe e como escolher o certo.',
    'meta_keywords' => 'qual ssd compativel notebook, ssd para notebook, ssd m2 notebook, ssd sata notebook, ssd nvme notebook, como saber ssd compativel',
    'content' => '
<h2>Por que trocar para um SSD?</h2>
<p>Trocar o HD do notebook por um SSD é o <strong>upgrade mais impactante</strong> que você pode fazer. O notebook liga mais rápido, programas abrem instantaneamente e a experiência geral é completamente transformada.</p>
<p>Mas antes de comprar, é fundamental saber qual tipo de SSD é compatível com o seu notebook.</p>

<h2>Tipos de SSD para notebook</h2>
<h3>1. SSD SATA 2.5"</h3>
<ul>
    <li>Formato tradicional, mesmo tamanho do HD de notebook</li>
    <li>Conexão SATA III — velocidade máxima de ~550 MB/s</li>
    <li>Compatível com a maioria dos notebooks que têm HD</li>
    <li>Basta remover o HD e colocar o SSD no lugar</li>
</ul>

<h3>2. SSD M.2 SATA</h3>
<ul>
    <li>Formato de "chiclete" — pequeno e fino</li>
    <li>Usa o slot M.2 mas com velocidade SATA (~550 MB/s)</li>
    <li>Conector com <strong>chave B+M</strong></li>
</ul>

<h3>3. SSD M.2 NVMe</h3>
<ul>
    <li>Mesmo formato de "chiclete" do M.2</li>
    <li>Velocidade muito superior — de 1.500 MB/s até 7.000+ MB/s</li>
    <li>Conector com <strong>chave M</strong></li>
    <li>Requer que o notebook suporte NVMe</li>
</ul>

<h2>Como descobrir qual SSD meu notebook aceita</h2>

<h3>Método 1: Pesquise o modelo do notebook</h3>
<ul>
    <li>Descubra o modelo exato do seu notebook (etiqueta na base ou via msinfo32)</li>
    <li>Pesquise no Google: <strong>"[modelo do notebook] SSD compatível"</strong></li>
    <li>O site <strong>Crucial.com</strong> tem uma ferramenta que indica SSDs compatíveis por modelo</li>
</ul>

<h3>Método 2: Use o CrystalDiskInfo</h3>
<ul>
    <li>Baixe e instale o <strong>CrystalDiskInfo</strong> (gratuito)</li>
    <li>Ele mostra o tipo de interface do disco atual (SATA, NVMe)</li>
    <li>Se o disco atual é SATA, o notebook aceita SSD SATA com certeza</li>
</ul>

<h3>Método 3: Abra o notebook e verifique</h3>
<ul>
    <li>Remova os parafusos da parte inferior</li>
    <li>Verifique se há um <strong>slot M.2</strong> disponível (além do HD)</li>
    <li>Verifique o tipo de conector M.2 (chave B, M, ou B+M)</li>
</ul>

<h2>Tabela resumo de compatibilidade</h2>
<table>
    <tr><th>Notebook tem</th><th>SSD compatível</th></tr>
    <tr><td>Apenas HD 2.5" SATA</td><td>SSD 2.5" SATA</td></tr>
    <tr><td>Slot M.2 (chave B+M)</td><td>SSD M.2 SATA</td></tr>
    <tr><td>Slot M.2 (chave M)</td><td>SSD M.2 NVMe ou M.2 SATA</td></tr>
    <tr><td>HD + Slot M.2</td><td>Pode usar os dois!</td></tr>
</table>

<h2>Precisa de ajuda?</h2>
<p>Se não tem certeza sobre a compatibilidade, traga seu notebook na <strong>Altustec</strong>. Fazemos a verificação, recomendamos o melhor SSD e realizamos a instalação com migração dos seus dados.</p>
',
];

// ============================================================
// ARTIGO 7: Como Colocar Ponto de Interrogação no Notebook
// ============================================================
$articles[] = [
    'title' => 'Como Colocar Ponto de Interrogação no Notebook',
    'slug' => 'como-colocar-ponto-de-interrogacao-no-notebook',
    'excerpt' => 'Não consegue digitar o ponto de interrogação no notebook? Descubra os atalhos corretos para diferentes layouts de teclado.',
    'meta_title' => 'Como Colocar Ponto de Interrogação no Notebook [Resolvido]',
    'meta_description' => 'Aprenda como digitar o ponto de interrogação no notebook. Atalhos para teclado ABNT2, internacional e soluções quando a tecla não funciona.',
    'meta_keywords' => 'ponto de interrogacao notebook, como digitar ponto de interrogacao, interrogacao teclado notebook, tecla interrogacao',
    'content' => '
<h2>O atalho depende do layout do seu teclado</h2>
<p>A forma de digitar o ponto de interrogação (?) no notebook varia conforme o <strong>layout do teclado</strong>. Muitas vezes, o problema é simplesmente que o layout configurado no Windows não corresponde ao teclado físico.</p>

<h2>Teclado ABNT2 (padrão brasileiro com Ç)</h2>
<p>No teclado brasileiro ABNT2, o ponto de interrogação fica na mesma tecla do <strong>W</strong>... não! Ele fica assim:</p>
<ul>
    <li>Pressione <strong>Shift + / (barra)</strong> — a tecla fica ao lado do ponto</li>
    <li>Ou pressione <strong>Shift + a tecla que tem o ? impresso</strong></li>
</ul>

<h2>Teclado Internacional (US-International)</h2>
<p>Se o seu notebook tem teclado sem a tecla Ç (layout americano/internacional):</p>
<ul>
    <li>O ponto de interrogação está em <strong>Shift + / (barra)</strong></li>
    <li>A tecla / geralmente fica à esquerda do Shift direito</li>
</ul>

<h2>Quando nenhuma tecla funciona</h2>
<p>Se o ponto de interrogação não aparece de jeito nenhum, o problema pode ser o <strong>layout de teclado configurado no Windows</strong>:</p>
<ul>
    <li>Acesse <strong>Configurações > Hora e idioma > Idioma e região</strong></li>
    <li>Clique no seu idioma e depois em <strong>Opções de idioma</strong></li>
    <li>Verifique qual layout de teclado está ativo</li>
    <li>Se o teclado físico é ABNT2, o layout deve ser <strong>"Português (Brasil ABNT2)"</strong></li>
    <li>Se o teclado é US, use <strong>"Inglês (Estados Unidos - Internacional)"</strong></li>
</ul>

<h2>Atalho universal: código ASCII</h2>
<p>Se nada funcionar, use o atalho universal:</p>
<ul>
    <li>Mantenha <strong>Alt</strong> pressionado</li>
    <li>No teclado numérico, digite <strong>63</strong></li>
    <li>Solte o Alt — o ? aparecerá</li>
</ul>
<p><strong>Nota:</strong> Se o notebook não tem teclado numérico, ative o <strong>Num Lock</strong> (geralmente Fn + alguma tecla) para usar os números embutidos no teclado.</p>

<h2>Dica extra: Mapa de Caracteres</h2>
<p>Se precisar de caracteres especiais com frequência, use o <strong>Mapa de Caracteres</strong> do Windows:</p>
<ul>
    <li>Pressione <strong>Win + .</strong> (ponto) para abrir o painel de emojis e símbolos</li>
    <li>Ou pesquise por <strong>"Mapa de Caracteres"</strong> no menu Iniciar</li>
</ul>
',
];

// ============================================================
// ARTIGO 8: Como Desativar Uma Tecla do Notebook
// ============================================================
$articles[] = [
    'title' => 'Como Desativar Uma Tecla do Notebook',
    'slug' => 'como-desativar-uma-tecla-do-notebook',
    'excerpt' => 'Precisa desativar uma tecla específica do notebook que está com defeito ou atrapalhando? Aprenda métodos simples para desabilitar qualquer tecla.',
    'meta_title' => 'Como Desativar Uma Tecla do Notebook [3 Métodos]',
    'meta_description' => 'Aprenda como desativar uma tecla específica do notebook. Métodos usando software, registro do Windows e remapeamento de teclas.',
    'meta_keywords' => 'desativar tecla notebook, desabilitar tecla notebook, tecla com defeito notebook, remapear tecla notebook, bloquear tecla',
    'content' => '
<h2>Por que desativar uma tecla?</h2>
<p>Existem vários motivos para querer desativar uma tecla do notebook: a tecla está com defeito e fica digitando sozinha, você aperta sem querer (como Caps Lock ou Insert), ou simplesmente quer remapear para outra função.</p>

<h2>Método 1: SharpKeys (gratuito e simples)</h2>
<p>O <strong>SharpKeys</strong> é um programa gratuito que permite remapear ou desativar qualquer tecla do teclado.</p>
<ul>
    <li>Baixe o SharpKeys no GitHub</li>
    <li>Abra o programa e clique em <strong>"Add"</strong></li>
    <li>Na coluna da esquerda, selecione a tecla que deseja desativar</li>
    <li>Na coluna da direita, selecione <strong>"Turn Key Off"</strong></li>
    <li>Clique em <strong>"Write to Registry"</strong></li>
    <li>Reinicie o computador</li>
</ul>

<h2>Método 2: PowerToys Keyboard Manager (Microsoft)</h2>
<ul>
    <li>Instale o <strong>Microsoft PowerToys</strong> (gratuito)</li>
    <li>Abra o PowerToys e vá em <strong>"Keyboard Manager"</strong></li>
    <li>Clique em <strong>"Remap a key"</strong></li>
    <li>Selecione a tecla original e mapeie para <strong>"Disabled"</strong></li>
</ul>

<h2>Método 3: Via Registro do Windows (avançado)</h2>
<p>Para usuários avançados, é possível desativar teclas diretamente no Registro do Windows usando a chave <strong>Scancode Map</strong>. No entanto, recomendamos usar os softwares acima por serem mais seguros e fáceis de reverter.</p>

<h2>Como reativar a tecla depois?</h2>
<ul>
    <li>No SharpKeys: abra o programa, remova a regra e clique em "Write to Registry"</li>
    <li>No PowerToys: remova o mapeamento no Keyboard Manager</li>
    <li>Reinicie o computador após a alteração</li>
</ul>

<h2>Se a tecla está com defeito físico</h2>
<p>Se uma tecla do notebook está digitando sozinha ou travada, desativá-la por software é uma solução temporária. O ideal é <strong>trocar o teclado do notebook</strong>. Na <strong>Altustec</strong>, fazemos a substituição do teclado com peças de qualidade e garantia.</p>
',
];

// ============================================================
// ARTIGO 9: Como Deixar o Seu Notebook Mais Rápido
// ============================================================
$articles[] = [
    'title' => 'Como Deixar o Seu Notebook Mais Rápido',
    'slug' => 'como-deixar-o-seu-notebook-mais-rapido',
    'excerpt' => 'Guia prático com as melhores dicas para deixar seu notebook mais rápido. Otimizações de software e hardware que fazem diferença real.',
    'meta_title' => 'Como Deixar o Seu Notebook Mais Rápido [10 Dicas]',
    'meta_description' => 'Descubra como deixar seu notebook mais rápido com 10 dicas práticas. Otimização de Windows, upgrade de SSD, limpeza e mais.',
    'meta_keywords' => 'deixar notebook mais rapido, notebook lento como resolver, acelerar notebook, otimizar notebook windows, melhorar desempenho notebook',
    'content' => '
<h2>10 dicas para deixar seu notebook voando</h2>
<p>Se o seu notebook está lento, não se preocupe. Com algumas otimizações simples, é possível recuperar boa parte do desempenho original — ou até superá-lo. Confira nossas 10 dicas:</p>

<h2>1. Troque o HD por um SSD</h2>
<p>Esta é, sem dúvida, a <strong>mudança mais impactante</strong>. Um SSD é até 10x mais rápido que um HD convencional. O notebook liga em segundos, programas abrem instantaneamente.</p>

<h2>2. Aumente a memória RAM</h2>
<p>Se tem 4GB, aumente para 8GB. Se tem 8GB e usa programas pesados, considere 16GB. Mais RAM = mais programas abertos simultaneamente sem travamento.</p>

<h2>3. Desative programas na inicialização</h2>
<p>Abra o <strong>Gerenciador de Tarefas</strong> (Ctrl + Shift + Esc), vá na aba <strong>Inicializar</strong> e desative programas desnecessários.</p>

<h2>4. Faça limpeza de disco regularmente</h2>
<p>Use a <strong>Limpeza de Disco</strong> do Windows ou acesse <strong>Configurações > Armazenamento</strong> para remover arquivos temporários.</p>

<h2>5. Desative efeitos visuais</h2>
<ul>
    <li>Pesquise por <strong>"Desempenho"</strong> no menu Iniciar</li>
    <li>Clique em <strong>"Ajustar a aparência e o desempenho do Windows"</strong></li>
    <li>Selecione <strong>"Ajustar para obter um melhor desempenho"</strong></li>
</ul>

<h2>6. Mantenha o Windows atualizado</h2>
<p>Atualizações incluem correções de desempenho e segurança importantes.</p>

<h2>7. Verifique se há vírus e malware</h2>
<p>Faça uma verificação completa com o Windows Defender ou Malwarebytes.</p>

<h2>8. Limpe a ventilação do notebook</h2>
<p>Poeira acumulada causa superaquecimento, que faz o processador reduzir a velocidade (throttling). Uma limpeza interna resolve esse problema.</p>

<h2>9. Troque a pasta térmica</h2>
<p>Se o notebook tem mais de 2 anos, a pasta térmica pode ter secado, causando superaquecimento e perda de desempenho.</p>

<h2>10. Reinstale o Windows</h2>
<p>Uma instalação limpa elimina anos de acúmulo de software, registro corrompido e problemas diversos.</p>

<h2>Precisa de ajuda profissional?</h2>
<p>A <strong>Altustec</strong> realiza upgrades de SSD, memória RAM, limpeza interna e manutenção completa de notebooks em Guarulhos. Solicite um orçamento!</p>
',
];

// ============================================================
// ARTIGO 10: Como Desativar Teclado Notebook
// ============================================================
$articles[] = [
    'title' => 'Como Desativar Teclado Notebook',
    'slug' => 'como-desativar-teclado-notebook',
    'excerpt' => 'Precisa desativar o teclado interno do notebook para usar um teclado externo? Aprenda métodos temporários e permanentes.',
    'meta_title' => 'Como Desativar o Teclado do Notebook [Temporário e Permanente]',
    'meta_description' => 'Aprenda como desativar o teclado interno do notebook no Windows 10 e 11. Métodos temporários e permanentes, com e sem software.',
    'meta_keywords' => 'desativar teclado notebook, desabilitar teclado notebook, bloquear teclado notebook, teclado notebook com defeito',
    'content' => '
<h2>Quando desativar o teclado do notebook?</h2>
<p>Os motivos mais comuns para desativar o teclado interno do notebook são:</p>
<ul>
    <li>O teclado está com defeito e digitando sozinho</li>
    <li>Líquido caiu no teclado e ele está funcionando errado</li>
    <li>Você prefere usar um teclado externo USB</li>
    <li>Precisa limpar o teclado sem desligar o notebook</li>
</ul>

<h2>Método 1: Gerenciador de Dispositivos (temporário)</h2>
<ul>
    <li>Clique com o botão direito no <strong>Menu Iniciar</strong></li>
    <li>Selecione <strong>"Gerenciador de Dispositivos"</strong></li>
    <li>Expanda <strong>"Teclados"</strong></li>
    <li>Clique com o botão direito no teclado interno (geralmente "Teclado padrão PS/2")</li>
    <li>Selecione <strong>"Desabilitar dispositivo"</strong> ou <strong>"Desinstalar dispositivo"</strong></li>
</ul>
<p><strong>Nota:</strong> O Windows pode reinstalar o driver automaticamente ao reiniciar. Para evitar isso, use o Método 2.</p>

<h2>Método 2: Prompt de Comando (temporário até reiniciar)</h2>
<ul>
    <li>Abra o <strong>Prompt de Comando como Administrador</strong></li>
    <li>Digite: <strong>sc config i8042prt start= disabled</strong></li>
    <li>Reinicie o notebook</li>
    <li>Para reativar: <strong>sc config i8042prt start= auto</strong></li>
</ul>

<h2>Método 3: Política de Grupo (permanente — Windows Pro)</h2>
<ul>
    <li>Pressione <strong>Win + R</strong>, digite <strong>gpedit.msc</strong></li>
    <li>Navegue até <strong>Configuração do Computador > Modelos Administrativos > Sistema > Instalação de dispositivos > Restrições de instalação de dispositivos</strong></li>
    <li>Configure para impedir a instalação do driver do teclado interno</li>
</ul>

<h2>Importante</h2>
<p>Antes de desativar o teclado interno, certifique-se de ter um <strong>teclado externo USB</strong> conectado, caso contrário não conseguirá digitar nada!</p>

<h2>Se o teclado está com defeito</h2>
<p>Desativar por software é uma solução paliativa. O ideal é <strong>trocar o teclado do notebook</strong>. Na <strong>Altustec</strong>, realizamos a troca do teclado com peças de qualidade e garantia.</p>
',
];

// ============================================================
// ARTIGO 11: Qual SSD é Compatível com Meu Notebook
// ============================================================
$articles[] = [
    'title' => 'Qual SSD é Compatível com Meu Notebook',
    'slug' => 'qual-ssd-e-compativel-com-meu-notebook',
    'excerpt' => 'Saiba exatamente qual tipo e modelo de SSD é compatível com o seu notebook. Guia prático com ferramentas e dicas de compra.',
    'meta_title' => 'Qual SSD é Compatível com Meu Notebook? Descubra Agora',
    'meta_description' => 'Descubra qual SSD é compatível com seu notebook. Guia prático com ferramentas online, especificações técnicas e dicas de compra.',
    'meta_keywords' => 'qual ssd compativel notebook, ssd notebook compatibilidade, como saber ssd certo, ssd para meu notebook, comprar ssd notebook',
    'content' => '
<h2>Passo a passo para encontrar o SSD certo</h2>
<p>Comprar o SSD errado é um problema comum. Para evitar isso, siga este guia prático para descobrir exatamente qual SSD funciona no seu notebook.</p>

<h2>Passo 1: Descubra o modelo exato do notebook</h2>
<ul>
    <li>Veja a etiqueta na parte inferior do notebook</li>
    <li>Ou pressione <strong>Win + R</strong>, digite <strong>msinfo32</strong> e veja "Modelo do Sistema"</li>
    <li>Anote o modelo completo (ex: "Lenovo IdeaPad 3 15ALC6")</li>
</ul>

<h2>Passo 2: Use a ferramenta da Crucial</h2>
<p>O site da <strong>Crucial</strong> tem uma ferramenta gratuita que analisa seu notebook e indica SSDs compatíveis. Você pode pesquisar por modelo ou baixar o scanner automático.</p>

<h2>Passo 3: Verifique o tipo de interface</h2>
<ul>
    <li><strong>SATA III</strong> — Velocidade até 550 MB/s (SSD 2.5" ou M.2 SATA)</li>
    <li><strong>NVMe (PCIe)</strong> — Velocidade de 1.500 a 7.000+ MB/s (M.2 NVMe)</li>
</ul>

<h2>Passo 4: Verifique o formato físico</h2>
<ul>
    <li><strong>2.5" SATA</strong> — Substitui o HD diretamente</li>
    <li><strong>M.2 2280</strong> — O formato M.2 mais comum (22mm x 80mm)</li>
    <li><strong>M.2 2242</strong> — Mais curto (22mm x 42mm), menos comum</li>
</ul>

<h2>SSDs recomendados por faixa de preço</h2>
<table>
    <tr><th>Faixa</th><th>Modelo sugerido</th><th>Tipo</th></tr>
    <tr><td>Econômico</td><td>Kingston A400 240GB</td><td>2.5" SATA</td></tr>
    <tr><td>Custo-benefício</td><td>WD Green SN350 500GB</td><td>M.2 NVMe</td></tr>
    <tr><td>Desempenho</td><td>Samsung 980 1TB</td><td>M.2 NVMe</td></tr>
    <tr><td>Premium</td><td>Samsung 990 Pro 1TB</td><td>M.2 NVMe Gen4</td></tr>
</table>

<h2>Instalação profissional</h2>
<p>A <strong>Altustec</strong> faz a instalação do SSD no seu notebook com migração completa do sistema e dados. Atendemos em Guarulhos e região.</p>
',
];

// ============================================================
// ARTIGO 12: Como Aumentar o Volume do Notebook
// ============================================================
$articles[] = [
    'title' => 'Como Aumentar o Volume do Notebook',
    'slug' => 'como-aumentar-o-volume-do-notebook',
    'excerpt' => 'O som do seu notebook está muito baixo? Descubra como aumentar o volume além do máximo com configurações e softwares.',
    'meta_title' => 'Como Aumentar o Volume do Notebook Além do Máximo',
    'meta_description' => 'Aprenda como aumentar o volume do notebook além do limite padrão. Configurações do Windows, equalizadores e dicas para melhorar o som.',
    'meta_keywords' => 'aumentar volume notebook, som baixo notebook, volume maximo notebook, melhorar som notebook, equalizar som notebook',
    'content' => '
<h2>Por que o som do notebook é tão baixo?</h2>
<p>Notebooks possuem alto-falantes pequenos com potência limitada. Além disso, configurações de software podem estar limitando o volume. Veja como resolver:</p>

<h2>1. Verifique o volume do sistema</h2>
<ul>
    <li>Clique no ícone de som na barra de tarefas e aumente para 100%</li>
    <li>Clique com o botão direito no ícone de som > <strong>Abrir Mixer de Volume</strong></li>
    <li>Verifique se algum aplicativo está com volume reduzido</li>
</ul>

<h2>2. Ative o aprimoramento de áudio do Windows</h2>
<ul>
    <li>Clique com o botão direito no ícone de som</li>
    <li>Selecione <strong>"Configurações de som"</strong></li>
    <li>Clique no dispositivo de saída</li>
    <li>Ative <strong>"Aprimorar áudio"</strong></li>
    <li>Explore as opções de equalização e volume alto</li>
</ul>

<h2>3. Use o equalizador do Windows</h2>
<ul>
    <li>Nas configurações de som, clique em <strong>"Propriedades adicionais do dispositivo"</strong></li>
    <li>Vá na aba <strong>"Aprimoramentos"</strong></li>
    <li>Ative <strong>"Equalização de volume"</strong></li>
</ul>

<h2>4. Software de amplificação: Equalizer APO + Peace</h2>
<p>O <strong>Equalizer APO</strong> com interface <strong>Peace</strong> permite aumentar o volume além do limite do Windows:</p>
<ul>
    <li>Instale o Equalizer APO (gratuito)</li>
    <li>Instale o Peace GUI (interface amigável)</li>
    <li>Aumente o pré-amplificador (Pre-amp) em até +10dB</li>
    <li>Cuidado: volumes muito altos podem distorcer o som</li>
</ul>

<h2>5. Use uma caixa de som externa ou fone</h2>
<p>Se precisa de volume realmente alto, a melhor solução é usar uma <strong>caixa de som Bluetooth</strong> ou um <strong>fone de ouvido de qualidade</strong>. Os alto-falantes internos do notebook sempre terão limitações físicas.</p>

<h2>6. Atualize os drivers de áudio</h2>
<p>Drivers desatualizados podem causar problemas de volume. Acesse o site do fabricante do notebook e baixe o driver de áudio mais recente.</p>
',
];

// ============================================================
// ARTIGO 13: Como Desativar o Fn do Notebook
// ============================================================
$articles[] = [
    'title' => 'Como Desativar o Fn do Notebook',
    'slug' => 'como-desativar-o-fn-do-notebook',
    'excerpt' => 'A tecla Fn do notebook está invertida? Aprenda como desativar ou inverter a função da tecla Fn para usar F1-F12 normalmente.',
    'meta_title' => 'Como Desativar o Fn do Notebook [Todos os Fabricantes]',
    'meta_description' => 'Aprenda como desativar a tecla Fn do notebook. Tutorial para Dell, Lenovo, HP, Acer, Asus e Samsung.',
    'meta_keywords' => 'desativar fn notebook, tecla fn notebook, inverter fn notebook, fn lock notebook, f1 f2 sem fn',
    'content' => '
<h2>O que a tecla Fn faz?</h2>
<p>A tecla <strong>Fn (Function)</strong> permite acessar funções secundárias das teclas F1 a F12, como ajustar brilho, volume, Wi-Fi, etc. Em muitos notebooks, as teclas F1-F12 já vêm configuradas para executar essas funções multimídia por padrão, exigindo que você pressione Fn + F5, por exemplo, para usar o F5 real.</p>

<h2>Método 1: Fn Lock (atalho rápido)</h2>
<p>Muitos notebooks têm um atalho para inverter a função:</p>
<ul>
    <li>Pressione <strong>Fn + Esc</strong> — funciona na maioria dos notebooks</li>
    <li>Alguns modelos usam <strong>Fn + Caps Lock</strong></li>
    <li>Procure um ícone de cadeado na tecla Esc ou Caps Lock</li>
</ul>

<h2>Método 2: Configurar na BIOS</h2>
<ul>
    <li>Reinicie o notebook e pressione <strong>F2</strong> ou <strong>Del</strong> para entrar na BIOS</li>
    <li>Procure por <strong>"Function Key Behavior"</strong>, <strong>"Action Keys Mode"</strong> ou <strong>"HotKey Mode"</strong></li>
    <li>Altere para <strong>"Function Key"</strong> ou <strong>"Disabled"</strong></li>
    <li>Salve e reinicie</li>
</ul>

<h2>Por fabricante</h2>
<h3>Dell</h3>
<p>BIOS > Post Behavior > Fn Lock Options > Fn Lock > desativar</p>

<h3>Lenovo</h3>
<p>BIOS > Configuration > HotKey Mode > desativar. Ou use o <strong>Lenovo Vantage</strong>.</p>

<h3>HP</h3>
<p>BIOS > System Configuration > Action Keys Mode > desativar.</p>

<h3>Acer</h3>
<p>Use o atalho <strong>Fn + Esc</strong>. Ou na BIOS em Main > Function Key Lock.</p>

<h3>Asus</h3>
<p>Use <strong>Fn + Esc</strong>. Ou configure na BIOS ou no software ASUS Armoury Crate.</p>

<h2>Dica</h2>
<p>Após a alteração, as teclas F1-F12 funcionarão normalmente sem precisar segurar Fn. Para usar as funções multimídia, aí sim será necessário pressionar Fn.</p>
',
];

// ============================================================
// ARTIGO 14: Como Baixar Música no Notebook
// ============================================================
$articles[] = [
    'title' => 'Como Baixar Música no Notebook',
    'slug' => 'como-baixar-musica-no-notebook',
    'excerpt' => 'Descubra as melhores formas legais de baixar música no notebook para ouvir offline. Apps de streaming, conversores e plataformas gratuitas.',
    'meta_title' => 'Como Baixar Música no Notebook [Métodos Seguros 2025]',
    'meta_description' => 'Aprenda como baixar música no notebook de forma segura e legal. Spotify, YouTube Music, plataformas gratuitas e dicas de segurança.',
    'meta_keywords' => 'baixar musica notebook, como baixar musica no notebook, download musica notebook, musica offline notebook',
    'content' => '
<h2>Formas seguras e legais de baixar música</h2>
<p>Existem várias maneiras de ter músicas no seu notebook para ouvir offline. Vamos mostrar as opções mais seguras, evitando sites que podem instalar vírus no seu computador.</p>

<h2>1. Spotify (download offline com Premium)</h2>
<ul>
    <li>Instale o <strong>Spotify</strong> no notebook</li>
    <li>Com a assinatura <strong>Premium</strong>, você pode baixar músicas para ouvir offline</li>
    <li>Clique no botão de download ao lado da playlist ou álbum</li>
    <li>As músicas ficam disponíveis mesmo sem internet</li>
</ul>

<h2>2. YouTube Music</h2>
<ul>
    <li>Acesse o <strong>YouTube Music</strong> pelo navegador ou app</li>
    <li>Com a assinatura <strong>Premium</strong>, é possível baixar para ouvir offline</li>
</ul>

<h2>3. Amazon Music</h2>
<p>Se você tem Amazon Prime, o <strong>Amazon Music</strong> oferece um catálogo de músicas para download offline incluído na assinatura.</p>

<h2>4. Plataformas gratuitas e legais</h2>
<ul>
    <li><strong>Jamendo</strong> — Músicas com licença Creative Commons</li>
    <li><strong>Free Music Archive</strong> — Biblioteca de músicas gratuitas</li>
    <li><strong>SoundCloud</strong> — Muitos artistas disponibilizam downloads gratuitos</li>
    <li><strong>Bandcamp</strong> — Artistas independentes, muitos com opção "pague quanto quiser"</li>
</ul>

<h2>5. Converter vídeos do YouTube (atenção)</h2>
<p>Existem sites que convertem vídeos do YouTube em MP3. No entanto:</p>
<ul>
    <li>Isso viola os Termos de Serviço do YouTube</li>
    <li>Muitos sites de conversão contêm malware e anúncios perigosos</li>
    <li>Recomendamos usar as opções legais acima</li>
</ul>

<h2>Dicas de segurança</h2>
<ul>
    <li>Nunca baixe músicas de sites desconhecidos</li>
    <li>Evite clicar em botões de "Download" suspeitos — podem ser anúncios</li>
    <li>Mantenha o antivírus ativo</li>
    <li>Se um arquivo baixado termina em .exe, <strong>não abra</strong> — músicas são .mp3, .flac, .m4a ou .ogg</li>
</ul>
',
];

// ============================================================
// ARTIGO 15: Como Limpar Telas de Notebook
// ============================================================
$articles[] = [
    'title' => 'Como Limpar Telas de Notebook',
    'slug' => 'como-limpar-telas-de-notebook',
    'excerpt' => 'Aprenda a forma correta de limpar a tela do notebook sem danificá-la. Produtos certos, técnicas seguras e o que nunca usar.',
    'meta_title' => 'Como Limpar Telas de Notebook Corretamente [Sem Danificar]',
    'meta_description' => 'Aprenda como limpar a tela do notebook sem riscar ou danificar. Produtos recomendados, técnica correta e o que evitar.',
    'meta_keywords' => 'limpar tela notebook, como limpar tela notebook, limpeza tela notebook, produto limpar tela, tela notebook suja',
    'content' => '
<h2>Cuidados importantes antes de limpar</h2>
<ul>
    <li><strong>Desligue o notebook</strong> e desconecte da tomada</li>
    <li>Espere a tela esfriar se estava em uso</li>
    <li>Nunca borrife líquido diretamente na tela</li>
    <li>Nunca use papel toalha, papel higiênico ou panos ásperos</li>
</ul>

<h2>O que você vai precisar</h2>
<ul>
    <li>Um <strong>pano de microfibra</strong> (aquele que vem com óculos)</li>
    <li>Água destilada (opcional)</li>
    <li>Produto específico para telas (opcional)</li>
</ul>

<h2>Passo a passo</h2>

<h3>Para poeira e sujeira leve:</h3>
<ul>
    <li>Use o pano de microfibra <strong>seco</strong></li>
    <li>Faça movimentos suaves e circulares</li>
    <li>Não pressione com força</li>
</ul>

<h3>Para manchas e gordura:</h3>
<ul>
    <li>Umedeça levemente o pano de microfibra com <strong>água destilada</strong></li>
    <li>O pano deve estar úmido, não molhado — torça bem</li>
    <li>Limpe com movimentos suaves em uma direção</li>
    <li>Seque com a parte seca do pano</li>
</ul>

<h3>Para manchas persistentes:</h3>
<ul>
    <li>Misture <strong>50% água destilada + 50% álcool isopropílico 70%</strong></li>
    <li>Borrife no pano (nunca na tela)</li>
    <li>Limpe suavemente</li>
</ul>

<h2>O que NUNCA usar</h2>
<ul>
    <li><strong>Álcool comum</strong> (pode danificar o revestimento anti-reflexo)</li>
    <li><strong>Limpadores multiuso</strong> (Ajax, Veja, etc.)</li>
    <li><strong>Limpa-vidros</strong></li>
    <li><strong>Papel toalha ou tecidos ásperos</strong> (riscam a tela)</li>
    <li><strong>Esponjas</strong></li>
</ul>

<h2>Com que frequência limpar?</h2>
<p>Limpe a tela a cada <strong>1-2 semanas</strong> para manter a visibilidade e evitar acúmulo de gordura. Se você usa o notebook com as mãos sujas ou em ambientes com poeira, limpe com mais frequência.</p>
',
];

// ============================================================
// ARTIGO 16: Como Saber se Meu Notebook Tem SSD
// ============================================================
$articles[] = [
    'title' => 'Como Saber se Meu Notebook Tem SSD',
    'slug' => 'como-saber-se-meu-notebook-tem-ssd',
    'excerpt' => 'Descubra rapidamente se seu notebook tem SSD ou HD. Métodos simples usando o próprio Windows, sem instalar nada.',
    'meta_title' => 'Como Saber se Meu Notebook Tem SSD ou HD [Rápido]',
    'meta_description' => 'Descubra como saber se seu notebook tem SSD ou HD mecânico. 3 métodos rápidos sem instalar programas.',
    'meta_keywords' => 'notebook tem ssd, como saber se tenho ssd, verificar ssd notebook, ssd ou hd notebook, descobrir tipo disco notebook',
    'content' => '
<h2>SSD vs HD: qual a diferença?</h2>
<ul>
    <li><strong>SSD (Solid State Drive)</strong> — Sem partes mecânicas, muito mais rápido, silencioso e durável</li>
    <li><strong>HD (Hard Disk Drive)</strong> — Disco magnético com partes mecânicas, mais lento, faz barulho</li>
</ul>

<h2>Método 1: Desfragmentador do Windows</h2>
<ul>
    <li>Pesquise por <strong>"Desfragmentar"</strong> no menu Iniciar</li>
    <li>Abra <strong>"Desfragmentar e Otimizar Unidades"</strong></li>
    <li>Na coluna <strong>"Tipo de mídia"</strong> você verá:</li>
    <li><strong>"Unidade de estado sólido"</strong> = SSD</li>
    <li><strong>"Unidade de disco rígido"</strong> = HD</li>
</ul>

<h2>Método 2: Gerenciador de Tarefas</h2>
<ul>
    <li>Pressione <strong>Ctrl + Shift + Esc</strong></li>
    <li>Vá na aba <strong>"Desempenho"</strong></li>
    <li>Clique em <strong>"Disco 0"</strong></li>
    <li>No canto superior direito, verá o modelo do disco</li>
    <li>Se tiver "SSD" no nome, é SSD. Se tiver "HDD" ou uma capacidade grande (500GB, 1TB) sem "SSD", provavelmente é HD</li>
</ul>

<h2>Método 3: PowerShell</h2>
<ul>
    <li>Abra o <strong>PowerShell</strong> como administrador</li>
    <li>Digite: <strong>Get-PhysicalDisk | Select-Object MediaType, FriendlyName</strong></li>
    <li>O resultado mostrará "SSD" ou "HDD" ao lado do nome do disco</li>
</ul>

<h2>Por que isso importa?</h2>
<p>Se o seu notebook tem HD, trocar por SSD é o <strong>melhor upgrade</strong> que você pode fazer. A diferença de velocidade é impressionante — o notebook fica como novo.</p>
<p>Precisa fazer o upgrade? A <strong>Altustec</strong> instala SSD com migração completa dos seus dados.</p>
',
];

// ============================================================
// ARTIGO 17: Como Testar a Bateria do Notebook
// ============================================================
$articles[] = [
    'title' => 'Como Testar a Bateria do Notebook',
    'slug' => 'como-testar-a-bateria-do-notebook',
    'excerpt' => 'A bateria do notebook dura pouco? Aprenda como testar a saúde da bateria e descobrir se está na hora de trocar.',
    'meta_title' => 'Como Testar a Bateria do Notebook [Relatório Completo]',
    'meta_description' => 'Aprenda como testar a bateria do notebook e gerar um relatório completo de saúde. Descubra se está na hora de trocar.',
    'meta_keywords' => 'testar bateria notebook, saude bateria notebook, bateria notebook durando pouco, verificar bateria notebook, relatorio bateria',
    'content' => '
<h2>Sinais de que a bateria precisa de atenção</h2>
<ul>
    <li>O notebook desliga sozinho mesmo mostrando carga</li>
    <li>A bateria dura muito menos que antes</li>
    <li>O notebook só funciona na tomada</li>
    <li>A bateria está estufada (inchada)</li>
    <li>O carregamento não chega a 100%</li>
</ul>

<h2>Método 1: Relatório de bateria do Windows (powercfg)</h2>
<p>O Windows tem uma ferramenta nativa que gera um relatório completo da bateria:</p>
<ul>
    <li>Abra o <strong>Prompt de Comando como Administrador</strong></li>
    <li>Digite: <strong>powercfg /batteryreport</strong></li>
    <li>Pressione Enter</li>
    <li>O relatório será salvo em <strong>C:\\Users\\SeuUsuário\\battery-report.html</strong></li>
    <li>Abra o arquivo no navegador</li>
</ul>

<h3>O que observar no relatório:</h3>
<ul>
    <li><strong>Design Capacity</strong> — Capacidade original da bateria (quando nova)</li>
    <li><strong>Full Charge Capacity</strong> — Capacidade atual</li>
    <li>Se a Full Charge Capacity for <strong>menos de 50%</strong> da Design Capacity, é hora de trocar</li>
</ul>

<h2>Método 2: Verificar no Windows</h2>
<ul>
    <li>Clique no ícone da bateria na barra de tarefas</li>
    <li>Acesse <strong>Configurações > Sistema > Energia e bateria</strong></li>
    <li>Veja informações sobre uso e tempo estimado</li>
</ul>

<h2>Método 3: Software BatteryInfoView</h2>
<p>O <strong>BatteryInfoView</strong> (gratuito) mostra informações detalhadas:</p>
<ul>
    <li>Capacidade projetada vs capacidade atual</li>
    <li>Número de ciclos de carga</li>
    <li>Status de saúde da bateria</li>
    <li>Taxa de descarga em tempo real</li>
</ul>

<h2>Quando trocar a bateria?</h2>
<ul>
    <li>Quando a capacidade cai abaixo de <strong>50%</strong> do original</li>
    <li>Quando o notebook não sustenta mais de 1 hora sem tomada</li>
    <li>Se a bateria estiver <strong>estufada</strong> — troque imediatamente (risco de segurança!)</li>
</ul>

<h2>Troca de bateria</h2>
<p>A <strong>Altustec</strong> realiza troca de bateria de notebook com baterias de qualidade e garantia. Solicite um orçamento!</p>
',
];

// ============================================================
// ARTIGO 18: Como Desbugar o Notebook
// ============================================================
$articles[] = [
    'title' => 'Como Desbugar o Notebook',
    'slug' => 'como-desbugar-o-notebook',
    'excerpt' => 'Notebook travando, lento ou com erros? Aprenda como fazer um "debug" completo para resolver problemas de software e hardware.',
    'meta_title' => 'Como Desbugar o Notebook [Resolver Travamentos e Erros]',
    'meta_description' => 'Aprenda como desbugar o notebook e resolver travamentos, lentidão e erros. Guia completo de diagnóstico e correção.',
    'meta_keywords' => 'desbugar notebook, notebook travando, notebook com erro, consertar notebook lento, diagnostico notebook, resolver problemas notebook',
    'content' => '
<h2>O que significa "desbugar" o notebook?</h2>
<p>"Desbugar" (de "debug") significa <strong>identificar e corrigir problemas</strong> que estão causando mau funcionamento no notebook — seja lentidão, travamentos, tela azul ou erros diversos.</p>

<h2>Passo 1: Identifique o tipo de problema</h2>
<ul>
    <li><strong>Lentidão geral</strong> — Pode ser falta de RAM, HD cheio, muitos programas na inicialização</li>
    <li><strong>Travamentos frequentes</strong> — Pode ser problema de RAM, superaquecimento ou driver</li>
    <li><strong>Tela azul (BSOD)</strong> — Geralmente driver incompatível ou hardware com defeito</li>
    <li><strong>Não liga</strong> — Pode ser bateria, fonte, ou problema na placa-mãe</li>
</ul>

<h2>Passo 2: Verificações básicas</h2>
<ul>
    <li>Reinicie o notebook (resolve muitos problemas temporários)</li>
    <li>Verifique se o espaço em disco não está cheio</li>
    <li>Feche programas desnecessários</li>
    <li>Desconecte dispositivos USB que não está usando</li>
</ul>

<h2>Passo 3: Atualize os drivers</h2>
<ul>
    <li>Acesse o site do fabricante do notebook</li>
    <li>Baixe os drivers mais recentes para o seu modelo</li>
    <li>Priorize: chipset, placa de vídeo e rede</li>
</ul>

<h2>Passo 4: Verifique o disco</h2>
<ul>
    <li>Abra o <strong>Prompt de Comando como Administrador</strong></li>
    <li>Digite: <strong>chkdsk C: /f /r</strong></li>
    <li>Confirme a verificação no próximo reinício</li>
    <li>Reinicie o notebook e aguarde a verificação</li>
</ul>

<h2>Passo 5: Verifique os arquivos do sistema</h2>
<ul>
    <li>Abra o <strong>Prompt de Comando como Administrador</strong></li>
    <li>Digite: <strong>sfc /scannow</strong></li>
    <li>Aguarde a verificação e correção automática</li>
    <li>Se encontrar erros, execute também: <strong>DISM /Online /Cleanup-Image /RestoreHealth</strong></li>
</ul>

<h2>Passo 6: Teste a memória RAM</h2>
<ul>
    <li>Pesquise por <strong>"Diagnóstico de Memória do Windows"</strong></li>
    <li>Selecione <strong>"Reiniciar agora e verificar problemas"</strong></li>
    <li>O teste será executado durante a reinicialização</li>
</ul>

<h2>Passo 7: Verifique a temperatura</h2>
<p>Superaquecimento causa travamentos e redução de desempenho. Use o <strong>HWMonitor</strong> para verificar as temperaturas. Se o processador estiver acima de 90°C, é necessário limpeza interna e troca de pasta térmica.</p>

<h2>Se nada resolver</h2>
<p>Considere uma <strong>reinstalação limpa do Windows</strong> ou procure assistência técnica. A <strong>Altustec</strong> faz diagnóstico completo e manutenção de notebooks em Guarulhos.</p>
',
];

// ============================================================
// ARTIGO 19: Como Travar o Teclado do Notebook
// ============================================================
$articles[] = [
    'title' => 'Como Travar o Teclado do Notebook',
    'slug' => 'como-travar-o-teclado-do-notebook',
    'excerpt' => 'Precisa travar o teclado do notebook para limpar ou evitar toques acidentais? Aprenda métodos rápidos e seguros.',
    'meta_title' => 'Como Travar o Teclado do Notebook [Rápido e Fácil]',
    'meta_description' => 'Aprenda como travar o teclado do notebook para limpeza ou evitar toques acidentais. Métodos com atalhos e software.',
    'meta_keywords' => 'travar teclado notebook, bloquear teclado notebook, desativar teclado temporariamente, teclado notebook travar',
    'content' => '
<h2>Por que travar o teclado?</h2>
<p>Existem situações em que travar temporariamente o teclado do notebook é útil: limpar as teclas sem desligar, evitar que crianças ou pets apertem teclas, ou quando o teclado está com defeito.</p>

<h2>Método 1: Atalho Win + L (bloquear o PC)</h2>
<p>A forma mais simples é bloquear o Windows inteiro:</p>
<ul>
    <li>Pressione <strong>Win + L</strong></li>
    <li>O Windows será bloqueado, e nenhuma tecla terá efeito</li>
    <li>Para desbloquear, digite sua senha ou PIN</li>
</ul>

<h2>Método 2: Software KeyFreeze (gratuito)</h2>
<ul>
    <li>Baixe e instale o <strong>KeyFreeze</strong></li>
    <li>Clique em <strong>"Lock Keyboard & Mouse"</strong></li>
    <li>Após 5 segundos, teclado e mouse são bloqueados</li>
    <li>Para desbloquear: pressione <strong>Ctrl + Alt + Del</strong> e depois Esc</li>
</ul>

<h2>Método 3: Toddler Keys (para crianças)</h2>
<p>Se o objetivo é evitar que crianças mexam no notebook, o <strong>Toddler Keys</strong> bloqueia teclado, mouse e até o botão de energia.</p>

<h2>Método 4: Gerenciador de Dispositivos</h2>
<p>Para uma solução mais permanente:</p>
<ul>
    <li>Abra o <strong>Gerenciador de Dispositivos</strong></li>
    <li>Expanda <strong>"Teclados"</strong></li>
    <li>Clique com o botão direito no teclado interno</li>
    <li>Selecione <strong>"Desabilitar dispositivo"</strong></li>
</ul>
<p><strong>Lembre-se:</strong> tenha um teclado USB conectado antes de desabilitar o interno!</p>
',
];

// ============================================================
// ARTIGO 20: Como Desativar o Mouse do Notebook
// ============================================================
$articles[] = [
    'title' => 'Como Desativar o Mouse do Notebook',
    'slug' => 'como-desativar-o-mouse-do-notebook',
    'excerpt' => 'O touchpad do notebook está atrapalhando enquanto digita? Aprenda como desativar o mouse (touchpad) do notebook.',
    'meta_title' => 'Como Desativar o Mouse (Touchpad) do Notebook',
    'meta_description' => 'Aprenda como desativar o touchpad do notebook no Windows 10 e 11. Atalhos, configurações e soluções para cada fabricante.',
    'meta_keywords' => 'desativar mouse notebook, desativar touchpad notebook, touchpad atrapalhando, desligar touchpad, mouse notebook desativar',
    'content' => '
<h2>Por que desativar o touchpad?</h2>
<p>O touchpad (mouse do notebook) pode atrapalhar quando você está digitando, movendo o cursor acidentalmente. Se você usa um mouse USB ou Bluetooth, pode desativar o touchpad.</p>

<h2>Método 1: Atalho de teclado</h2>
<p>A maioria dos notebooks tem um atalho para ativar/desativar o touchpad:</p>
<ul>
    <li>Procure uma tecla F com um ícone de touchpad (geralmente F5, F6, F7 ou F9)</li>
    <li>Pressione <strong>Fn + essa tecla</strong></li>
    <li>Um indicador aparecerá na tela confirmando</li>
</ul>

<h2>Método 2: Configurações do Windows</h2>
<ul>
    <li>Acesse <strong>Configurações > Bluetooth e dispositivos > Touchpad</strong></li>
    <li>Desative o botão do touchpad</li>
    <li>Opcionalmente, ative <strong>"Deixar o touchpad ativado quando um mouse estiver conectado"</strong> — desativando esta opção, o touchpad desliga automaticamente ao conectar um mouse</li>
</ul>

<h2>Método 3: Gerenciador de Dispositivos</h2>
<ul>
    <li>Abra o <strong>Gerenciador de Dispositivos</strong></li>
    <li>Expanda <strong>"Mouses e outros dispositivos apontadores"</strong></li>
    <li>Clique com o botão direito no touchpad</li>
    <li>Selecione <strong>"Desabilitar dispositivo"</strong></li>
</ul>

<h2>Dica: desativar apenas ao digitar</h2>
<p>Se não quer desativar completamente, configure para desativar <strong>apenas enquanto digita</strong>:</p>
<ul>
    <li>Acesse <strong>Configurações > Touchpad</strong></li>
    <li>Em <strong>"Toque"</strong>, ajuste a sensibilidade</li>
    <li>Ou use o software do fabricante (Synaptics, ELAN) que geralmente tem essa opção</li>
</ul>
',
];

// ============================================================
// ARTIGO 21: Como Destravar o Teclado do Notebook
// ============================================================
$articles[] = [
    'title' => 'Como Destravar o Teclado do Notebook',
    'slug' => 'como-destravar-o-teclado-do-notebook',
    'excerpt' => 'O teclado do notebook parou de funcionar? Descubra como destravar e resolver problemas comuns de teclado.',
    'meta_title' => 'Como Destravar o Teclado do Notebook [Soluções]',
    'meta_description' => 'O teclado do notebook travou? Aprenda como destravar e resolver problemas de teclado que não funciona.',
    'meta_keywords' => 'destravar teclado notebook, teclado notebook travado, teclado notebook nao funciona, consertar teclado notebook, teclado parou',
    'content' => '
<h2>Por que o teclado travou?</h2>
<p>O teclado do notebook pode travar por vários motivos: tecla de filtro ativada acidentalmente, Num Lock ligado, driver corrompido, ou problema físico.</p>

<h2>Solução 1: Verifique as teclas de filtro</h2>
<p>O Windows tem um recurso de acessibilidade chamado <strong>"Teclas de Filtro"</strong> que pode fazer o teclado parecer travado:</p>
<ul>
    <li>Acesse <strong>Configurações > Acessibilidade > Teclado</strong></li>
    <li>Desative <strong>"Teclas de Filtro"</strong></li>
    <li>Desative também <strong>"Teclas de Aderência"</strong></li>
</ul>

<h2>Solução 2: Verifique o Num Lock</h2>
<p>Se algumas teclas estão digitando números em vez de letras, o <strong>Num Lock</strong> pode estar ativo:</p>
<ul>
    <li>Procure a tecla <strong>Num Lock</strong> ou <strong>Num Lk</strong></li>
    <li>Pressione <strong>Fn + Num Lock</strong> para desativar</li>
</ul>

<h2>Solução 3: Reinicie o notebook</h2>
<p>Uma simples reinicialização resolve muitos problemas de teclado travado:</p>
<ul>
    <li>Se conseguir, clique no Menu Iniciar > Reiniciar</li>
    <li>Se não conseguir usar o mouse, segure o <strong>botão de energia</strong> por 10 segundos</li>
</ul>

<h2>Solução 4: Atualize ou reinstale o driver</h2>
<ul>
    <li>Conecte um mouse USB se necessário</li>
    <li>Abra o <strong>Gerenciador de Dispositivos</strong></li>
    <li>Expanda <strong>"Teclados"</strong></li>
    <li>Clique com o botão direito > <strong>"Desinstalar dispositivo"</strong></li>
    <li>Reinicie o notebook — o Windows reinstalará o driver automaticamente</li>
</ul>

<h2>Solução 5: Teste com teclado externo</h2>
<p>Conecte um teclado USB externo. Se funcionar normalmente, o problema é no teclado interno do notebook (pode ser hardware).</p>

<h2>Se for problema físico</h2>
<p>Se líquido caiu no teclado, uma tecla quebrou, ou o flat cable desconectou, será necessário reparo técnico. A <strong>Altustec</strong> realiza troca de teclado de notebook com garantia.</p>
',
];

// ============================================================
// ARTIGO 22: Como Desvirar Tela do Notebook
// ============================================================
$articles[] = [
    'title' => 'Como Desvirar Tela do Notebook',
    'slug' => 'como-desvirar-tela-do-notebook',
    'excerpt' => 'A tela do notebook virou de cabeça para baixo ou ficou de lado? Aprenda como corrigir a rotação da tela rapidamente.',
    'meta_title' => 'Como Desvirar a Tela do Notebook [Solução Rápida]',
    'meta_description' => 'A tela do notebook virou de cabeça para baixo? Aprenda como desvirar a tela do notebook com atalhos simples.',
    'meta_keywords' => 'desvirar tela notebook, tela notebook de cabeca para baixo, girar tela notebook, rotacao tela notebook, tela virada notebook',
    'content' => '
<h2>Por que a tela virou?</h2>
<p>Isso geralmente acontece quando você pressiona acidentalmente um <strong>atalho de teclado</strong> que gira a tela. É um recurso do Windows para telas que podem ser rotacionadas.</p>

<h2>Solução rápida: atalho de teclado</h2>
<p>O atalho mais comum para girar a tela é:</p>
<ul>
    <li><strong>Ctrl + Alt + seta para cima</strong> — Tela normal (paisagem)</li>
    <li><strong>Ctrl + Alt + seta para baixo</strong> — Tela de cabeça para baixo</li>
    <li><strong>Ctrl + Alt + seta para a esquerda</strong> — Tela virada para a esquerda</li>
    <li><strong>Ctrl + Alt + seta para a direita</strong> — Tela virada para a direita</li>
</ul>
<p>Pressione <strong>Ctrl + Alt + seta para cima</strong> para voltar ao normal.</p>

<h2>Se o atalho não funcionar</h2>
<p>Nem todos os notebooks suportam esse atalho. Nesse caso, use as Configurações:</p>
<ul>
    <li>Clique com o botão direito na <strong>área de trabalho</strong></li>
    <li>Selecione <strong>"Configurações de exibição"</strong></li>
    <li>Procure por <strong>"Orientação da tela"</strong></li>
    <li>Selecione <strong>"Paisagem"</strong></li>
    <li>Clique em <strong>"Manter alterações"</strong></li>
</ul>

<h2>Desativar rotação automática (notebooks 2 em 1)</h2>
<p>Se o notebook é conversível (2 em 1), a tela pode girar automaticamente:</p>
<ul>
    <li>Acesse <strong>Configurações > Sistema > Tela</strong></li>
    <li>Desative <strong>"Bloqueio de rotação"</strong></li>
    <li>Ou ative o bloqueio para impedir rotações acidentais</li>
</ul>

<h2>No painel da placa de vídeo</h2>
<p>Se usa Intel:</p>
<ul>
    <li>Clique com o botão direito na área de trabalho</li>
    <li>Abra o <strong>Intel Graphics Control Panel</strong></li>
    <li>Vá em <strong>Display > Rotation</strong> e selecione 0°</li>
</ul>
',
];

// ============================================================
// ARTIGO 23: Como Encontrar Informações Sobre Bateria Notebook
// ============================================================
$articles[] = [
    'title' => 'Como Encontrar Informações Sobre Bateria Notebook',
    'slug' => 'como-encontrar-informacoes-sobre-bateria-notebook',
    'excerpt' => 'Aprenda a encontrar todas as informações sobre a bateria do seu notebook: capacidade, ciclos, saúde e especificações para compra.',
    'meta_title' => 'Como Encontrar Informações Sobre a Bateria do Notebook',
    'meta_description' => 'Descubra como encontrar informações completas sobre a bateria do notebook: capacidade, ciclos de carga, saúde e modelo para substituição.',
    'meta_keywords' => 'informacoes bateria notebook, capacidade bateria notebook, ciclos bateria, modelo bateria notebook, especificacoes bateria',
    'content' => '
<h2>Que informações você precisa sobre a bateria?</h2>
<p>Dependendo do seu objetivo, você pode precisar de diferentes informações:</p>
<ul>
    <li><strong>Saúde/capacidade</strong> — Para saber se precisa trocar</li>
    <li><strong>Modelo/especificações</strong> — Para comprar uma bateria nova</li>
    <li><strong>Ciclos de carga</strong> — Para avaliar o desgaste</li>
    <li><strong>Tempo restante</strong> — Para planejar o uso</li>
</ul>

<h2>1. Relatório completo com powercfg</h2>
<p>O método mais completo para informações de bateria:</p>
<ul>
    <li>Abra o <strong>Prompt de Comando como Administrador</strong></li>
    <li>Digite: <strong>powercfg /batteryreport</strong></li>
    <li>Abra o arquivo HTML gerado</li>
</ul>
<h3>O relatório mostra:</h3>
<ul>
    <li><strong>Design Capacity</strong> — Capacidade original (mWh)</li>
    <li><strong>Full Charge Capacity</strong> — Capacidade atual</li>
    <li><strong>Cycle Count</strong> — Número de ciclos de carga</li>
    <li><strong>Battery Life Estimates</strong> — Estimativa de duração</li>
    <li><strong>Usage History</strong> — Histórico de uso nos últimos dias</li>
</ul>

<h2>2. Informações na etiqueta da bateria</h2>
<p>Se o notebook tem bateria removível:</p>
<ul>
    <li>Desligue o notebook e remova a bateria</li>
    <li>Na etiqueta da bateria você encontrará:</li>
    <li><strong>Modelo</strong> (ex: PA5185U-1BRS)</li>
    <li><strong>Voltagem</strong> (ex: 14.8V)</li>
    <li><strong>Capacidade</strong> (ex: 2800mAh ou 45Wh)</li>
    <li><strong>Tipo</strong> (Li-ion, Li-polymer)</li>
</ul>

<h2>3. Informações via software</h2>
<h3>BatteryInfoView (gratuito)</h3>
<ul>
    <li>Mostra fabricante, modelo, capacidades, ciclos e status</li>
</ul>
<h3>HWiNFO64 (gratuito)</h3>
<ul>
    <li>Informações detalhadas de todos os componentes, incluindo bateria</li>
    <li>Mostra taxa de descarga em tempo real</li>
</ul>

<h2>4. Para baterias internas (não removíveis)</h2>
<p>Se a bateria é interna, use o <strong>powercfg</strong> ou softwares acima para identificar o modelo. Para comprar a substituição, pesquise pelo <strong>modelo do notebook</strong> + "bateria".</p>

<h2>Quando trocar?</h2>
<ul>
    <li>Full Charge Capacity abaixo de <strong>50%</strong> da Design Capacity</li>
    <li>Mais de <strong>500 ciclos</strong> de carga</li>
    <li>Bateria estufada — troque <strong>imediatamente</strong></li>
</ul>

<h2>Troca profissional</h2>
<p>A <strong>Altustec</strong> realiza troca de bateria de todos os modelos de notebook. Usamos baterias de qualidade com garantia. Atendemos em Guarulhos e região!</p>
',
];

// ============================================================
// INSERIR ARTIGOS NO BANCO
// ============================================================

$stmt = $db->prepare("INSERT OR IGNORE INTO blog_posts (title, slug, excerpt, content, meta_title, meta_description, meta_keywords, author, active, featured, created_at) VALUES (:title, :slug, :excerpt, :content, :meta_title, :meta_description, :meta_keywords, 'Altustec', 1, :featured, :created_at)");

$count = 0;
$baseDate = new DateTime('2025-03-01');

foreach ($articles as $i => $article) {
    // Distribuir datas para parecer publicação gradual
    $date = clone $baseDate;
    $date->modify('+' . ($i * 3) . ' days');

    // Primeiros 6 artigos como destaque
    $featured = $i < 6 ? 1 : 0;

    $stmt->execute([
        ':title' => $article['title'],
        ':slug' => $article['slug'],
        ':excerpt' => $article['excerpt'],
        ':content' => trim($article['content']),
        ':meta_title' => $article['meta_title'],
        ':meta_description' => $article['meta_description'],
        ':meta_keywords' => $article['meta_keywords'],
        ':featured' => $featured,
        ':created_at' => $date->format('Y-m-d H:i:s'),
    ]);

    $count++;
    echo "[$count/23] Inserido: {$article['title']}\n";
}

echo "\nTotal: $count artigos inseridos com sucesso!\n";
