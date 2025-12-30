<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

/* ============================
   LISTA DE PRODUTOS
================================ */
$produtos = [
    1 => ["nome" => "Café em Grãos", "desc" => "250g — Torra Média", "preco" => 32.90],
    2 => ["nome" => "Cápsulas Premium", "desc" => "Caixa com 10 unidades", "preco" => 24.50],
    3 => ["nome" => "Kit Presente", "desc" => "Caixa especial", "preco" => 49.90],
    4 => ["nome" => "Acessórios", "desc" => "Filtros e moedores", "preco" => 39.00],
    5 => ["nome" => "Cold Brew", "desc" => "Extração fria 12h", "preco" => 18.00],
    6 => ["nome" => "Sachês Individuais", "desc" => "Pacote com 20 unidades", "preco" => 45.00],
    7 => ["nome" => "Café Orgânico", "desc" => "Produção sustentável", "preco" => 29.90],
    8 => ["nome" => "Edição Limitada", "desc" => "Microlote especial", "preco" => 59.00],
];

/* ============================
   ADICIONAR AO CARlh
================================ */
if (isset($_GET["add"])) {
    $id = intval($_GET["add"]);

    if (isset($produtos[$id])) {
        $_SESSION["carrinho"][] = $id;
    }

    header("Location: pagina_04.php");
    exit;
}

/* ============================ 
   REMOVER PRODUTO
================================ */
if (isset($_GET["remove"])) {
    $id = intval($_GET["remove"]);

    if (isset($_SESSION["carrinho"])) {
        foreach ($_SESSION["carrinho"] as $i => $item) {
            if ($item == $id) {
                unset($_SESSION["carrinho"][$i]);
                break;
            }
        }
    }

    header("Location: pagina_04.php");
    exit;
}

/* ============================
   CÁLCULOS
================================ */
$lista = $_SESSION["carrinho"] ?? [];
$subtotal = 0;

foreach ($lista as $id) {
    $subtotal += $produtos[$id]["preco"];
}

$frete = 12.00;
$total = $subtotal + $frete;

/* ============================
   IMPRIMIR HEADER
================================ */
include '../componentes/header.php';
?>


<div class="manokk"></div>

<div class="container-carrinho">

    <h1 class="titulo-carrinho">Meu Carrinho</h1>

    <div class="carrinho-conteudo">

        <div class="lista-itens">

            <?php if (empty($lista)) { ?>
                <p style="font-size: 1.3em; color: #ccc;">Seu carrinho está vazio.</p>
            <?php } ?>

            <?php foreach ($lista as $id) { ?>
                <div class="item-carrinho">
                    <div class="info-item">
                        <h3><?= $produtos[$id]["nome"] ?></h3>
                        <p><?= $produtos[$id]["desc"] ?></p>
                        <span class="preco">R$ <?= number_format($produtos[$id]["preco"], 2, ",", ".") ?></span>
                    </div>

                    <a href="?remove=<?= $id ?>">
                        <button class="btn-remover">Remover</button>
                    </a>
                </div>
            <?php } ?>

        </div>

        <div class="resumo-carrinho">
            <h2>Resumo</h2>

            <div class="linha-resumo">
                <span>Subtotal:</span>
                <span>R$ <?= number_format($subtotal, 2, ",", ".") ?></span>
            </div>

            <div class="linha-resumo">
                <span>Frete:</span>
                <span>R$ <?= number_format($frete, 2, ",", ".") ?></span>
            </div>

            <div class="linha-resumo total">
                <span>Total:</span>
                <span>R$ <?= number_format($total, 2, ",", ".") ?></span>
            </div>

            <button class="btn-finalizar" onclick="checkLogin()">Finalizar Compra</button>

        </div>

    </div>

</div>


<!-- ============================
     POPUP LOGIN
============================ -->
<!-- POPUP PAGAMENTO NOVO -->
<div id="popup-pagamento" class="popup-overlay">
    <div class="popup-pagamento-box">

        <h2 class="pag-title">Pagamento</h2>
        <p class="pag-subtitle">Selecione a forma de pagamento</p>

        <div class="pag-metodos">
            <button onclick="mostrarCartao()" id="btnCartao" class="pag-metodo-select">Cartão</button>
            <button onclick="mostrarPix()" id="btnPix" class="pag-metodo">PIX</button>
        </div>

        <!-- CARTÃO -->
        <div id="area-cartao" class="pag-area" style="display:block;">
            <div class="input-group">
                <label>Nome no cartão</label>
                <input type="text" class="pag-input">
            </div>

            <div class="input-group">
                <label>Número do cartão</label>
                <input type="text" class="pag-input">
            </div>

            <div class="linha-2">
                <div class="input-group">
                    <label>Validade</label>
                    <input type="text" class="pag-input">
                </div>

                <div class="input-group">
                    <label>CVV</label>
                    <input type="text" class="pag-input">
                </div>
            </div>

            <button class="pag-btn-confirmar" onclick="processarPagamento()">Pagar agora</button>
        </div>

        <!-- PIX -->
        <div id="area-pix" class="pag-area" style="display:none;">

            <div class="qr-box">
                <div class="qr-fake"></div>
            </div>

            <p class="pix-text">Chave PIX:<br><strong>cafe@empresa.com</strong></p>

            <button class="pag-btn-confirmar" onclick="processarPagamento()">Confirmar pagamento</button>
        </div>

        <!-- PROCESSANDO -->
        <div id="area-processando" class="pag-area" style="display:none;">
            <div class="loader"></div>
            <p class="processando-text">Processando pagamento...</p>
        </div>

        <!-- APROVADO -->
        <div id="area-sucesso" class="pag-area" style="display:none;">
            <div class="sucesso-icone">✔</div>
            <p class="sucesso-text">Pagamento aprovado!</p>
            <button class="btn-fechar-popup" onclick="fecharPagamento()">Fechar</button>
        </div>

        <button onclick="fecharPagamento()" class="btn-fechar-popup fechar-menor">Cancelar</button>

    </div>
</div>


<script>
function checkLogin() {
    const logado = <?= isset($_SESSION['usuario']) ? 'true' : 'false' ?>;

    if (!logado) {
        document.getElementById('popup-login').style.display = 'flex';
        return;
    }

    // Usuário está logado → abrir popup de pagamento
    document.getElementById('popup-pagamento').style.display = 'flex';
}

function fecharPopup() {
    document.getElementById('popup-login').style.display = 'none';
}

function fecharPagamento() {
    document.getElementById('popup-pagamento').style.display = 'none';
}

function mostrarCartao() {
    document.getElementById('area-cartao').style.display = 'block';
    document.getElementById('area-pix').style.display = 'none';
}

function mostrarPix() {
    document.getElementById('area-cartao').style.display = 'none';
    document.getElementById('area-pix').style.display = 'block';
}

function confirmarPagamento() {
    alert("Pagamento aprovado! (simulação)");
    window.location.href = "finalizar.php";
}
</script>


<?php include '../componentes/footer.php'; ?>



<!-- ============================
     CSS COMPLETO
============================ -->
<style>
html, body {
    margin: 0;
    padding: 0;
    min-height: 100%;
    font-family: 'Montserrat', sans-serif;
    position: relative;
    overflow-x: hidden;
    color: #f0f0f0;
}
/* Overlay */
.popup-overlay {
    position: fixed;
    top: 0; left: 0;
    width: 100%; height: 100%;
    background: rgba(0,0,0,0.65);
    backdrop-filter: blur(6px);
    display: none;
    align-items: center;
    justify-content: center;
    z-index: 9999;
}

/* Caixa principal */
.popup-pagamento-box {
    width: 380px;
    background: rgba(20, 18, 16, 0.92);
    border-radius: 18px;
    padding: 30px;
    border: 1px solid rgba(208,168,92,0.4);
    box-shadow: 0 0 20px rgba(208,168,92,0.15);
    animation: aparecer 0.3s ease;
}

@keyframes aparecer {
    from { transform: translateY(20px); opacity: 0; }
    to { transform: translateY(0); opacity: 1; }
}

.pag-title {
    color: #d0a85c;
    text-align: center;
    margin-bottom: 5px;
    font-size: 1.9em;
}

.pag-subtitle {
    text-align: center;
    color: #bfbfbf;
    margin-bottom: 20px;
}

/* Métodos */
.pag-metodos {
    display: flex;
    gap: 10px;
    margin-bottom: 20px;
}

.pag-metodo, .pag-metodo-select {
    flex: 1;
    padding: 10px 0;
    border-radius: 10px;
    cursor: pointer;
    border: 1px solid #d0a85c;
    background: none;
    color: #d0a85c;
    transition: 0.3s;
}

.pag-metodo-select {
    background: #d0a85c;
    color: #121212;
}

/* Inputs */
.input-group {
    margin-bottom: 12px;
    color: #d0a85c;
    font-size: 0.9em;
}

.pag-input {
    width: 100%;
    padding: 10px;
    background: #1a1a1a;
    border: 1px solid #333;
    border-radius: 10px;
    color: #fff;
}

.linha-2 {
    display: flex;
    gap: 10px;
}

/* QR code fake */
.qr-box {
    width: 160px;
    height: 160px;
    background: #fff;
    margin: 0 auto 15px auto;
    padding: 10px;
    border-radius: 12px;
}

.qr-fake {
    width: 100%;
    height: 100%;
    background: repeating-linear-gradient(45deg, #000 0 10px, #fff 10px 20px);
}

/* Botão pagar */
.pag-btn-confirmar {
    width: 100%;
    margin-top: 5px;
    padding: 12px 0;
    border: none;
    background: #d0a85c;
    color: #121212;
    font-weight: bold;
    border-radius: 14px;
    cursor: pointer;
    font-size: 1.1em;
    transition: 0.25s;
}

.pag-btn-confirmar:hover {
    background: #e8c47d;
}

/* Processando */
.loader {
    border: 5px solid #333;
    border-top: 5px solid #d0a85c;
    border-radius: 50%;
    width: 50px; 
    height: 50px;
    margin: 20px auto;
    animation: giro 0.7s linear infinite;
}

@keyframes giro {
    to { transform: rotate(360deg); }
}

.processando-text {
    text-align: center;
    color: #d0a85c;
    margin-top: 10px;
}

/* Sucesso */
.sucesso-icone {
    font-size: 65px;
    color: #4cd964;
    text-align: center;
}

.sucesso-text {
    text-align: center;
    color: #d0a85c;
    font-size: 1.3em;
    margin: 10px 0;
}

/* Botão fechar */
.fechar-menor {
    margin-top: 15px;
    padding: 8px 0 !important;
}


.popup-overlay {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    backdrop-filter: blur(4px);
    background: rgba(0,0,0,0.6);
    display: none;
    align-items: center;
    justify-content: center;
    z-index: 9999;
}

.popup-box {
    background: rgba(23, 19, 17, 0.95);
    border: 1px solid #d0a85c;
    padding: 30px;
    width: 350px;
    border-radius: 14px;
    text-align: center;
}



.popup-box h2 {
    color: #d0a85c;
    margin-bottom: 10px;
}

.popup-box p {
    color: #ccc;
    margin-bottom: 15px;
    font-size: 1.1em;
}

.btn-fechar-popup {
    padding: px 25px;
    background: none;
    border: 1px solid #d0a85c;
    color: #d0a85c;
    border-radius: 25px;
    cursor: pointer;
    font-weight: bold;
    margin-top: 12px;
}

.metodos-pagamento {
    display: flex;
    justify-content: center;
    gap: 15px;
    margin-bottom: 20px;
}

.btn-metodo {
    padding: 10px 18px;
    background: #d0a85c;
    border: none;
    border-radius: 30px;
    color: #121212;
    font-weight: bold;
    cursor: pointer;
}

.area-metodo {
    display: flex;
    flex-direction: column;
    gap: 10px;
}

.input-pag {
    padding: 10px;
    border-radius: 8px;
    border: none;
    background: #1c1c1c;
    color: #fff;
}

.btn-confirmar {
    padding: 12px 0;
    margin-top: 10px;
    background: #d0a85c;
    border: none;
    border-radius: 30px;
    font-weight: bold;
    cursor: pointer;
    color: #121212;
}

/* Fundo */
body::before {
    content: "";
    position: fixed;
    top: 0; left: 0;
    width: 100%; height: 100%;
    background-image: url('../imagens/backgr.jpg');
    background-size: cover;
    background-position: center;
    filter: blur(8px);
    opacity: 0.4;
    transform: scale(1.05);
    z-index: -2;
}

body::after {
    content: "";
    position: fixed;
    top: 0; left: 0;
    width: 100%; height: 100%;
    background: rgba(0, 0, 0, 0.76);
    z-index: -1;
}

.manokk { height: 100px; }

.container-carrinho {
    max-width: 1000px;
    margin: 0 auto 60px auto;
    padding: 30px 20px;
    background: linear-gradient(to bottom, rgba(18, 18, 18, 0.95) 0%, rgba(18, 18, 18, 0.9) 100%);
    backdrop-filter: blur(3px);
    border-radius: 14px;
}

.titulo-carrinho {
    text-align: center;
    font-size: 2.6em;
    color: #d0a85c;
    margin-bottom: 35px;
}

.carrinho-conteudo {
    display: flex;
    flex-wrap: wrap;
    gap: 30px;
}

.lista-itens {
    flex: 2;
    display: flex;
    flex-direction: column;
    gap: 20px;
}

.item-carrinho {
    display: flex;
    justify-content: space-between;
    align-items: center;
    background: rgba(23, 19, 17, 0.85);
    padding: 20px;
    border-radius: 10px;
    border: 1px solid #333;
    transition: 0.3s;
}

.item-carrinho:hover {
    background: #1c1c1c;
}

.info-item h3 {
    margin: 0;
    font-size: 1.4em;
    color: #f0f0f0;
}

.info-item p {
    margin: 5px 0;
    color: #bbb;
}

.preco {
    font-size: 1.2em;
    color: #d0a85c;
    font-weight: bold;
    margin-top: 5px;
    display: block;
}

.btn-remover {
    background: none;
    border: 1px solid #d0a85c;
    color: #d0a85c;
    padding: 8px 16px;
    border-radius: 30px;
    cursor: pointer;
    transition: 0.3s;
}

.btn-remover:hover {
    background: #d0a85c;
    color: #121212;
}

.resumo-carrinho {
    flex: 1;
    background: rgba(23, 19, 17, 0.6);
    padding: 25px;
    border-radius: 10px;
    border: 1px solid #333;
    height: fit-content;
}

.resumo-carrinho h2 {
    margin-top: 0;
    font-size: 1.8em;
    color: #d0a85c;
    margin-bottom: 20px;
}

.linha-resumo {
    display: flex;
    justify-content: space-between;
    margin-bottom: 12px;
    font-size: 1.05em;
}

.total {
    font-size: 1.2em;
    font-weight: bold;
    border-top: 1px solid #444;
    padding-top: 12px;
    margin-top: 12px;
}

.btn-finalizar {
    width: 100%;
    padding: 14px 0;
    background: #d0a85c;
    border: none;
    color: #121212;
    border-radius: 30px;
    font-weight: bold;
    font-size: 1.05em;
    cursor: pointer;
    margin-top: 25px;
    transition: 0.3s;
}

.btn-finalizar:hover {
    background: #e0b76c;
}

/* Scroll */
body::-webkit-scrollbar {
    width: 8px;
}
body::-webkit-scrollbar-track {
    background: #1f1f1f;
}
body::-webkit-scrollbar-thumb {
    background-color: #d0a85c;
    border-radius: 4px;
    border: 2px solid #1f1f1f;
}
</style>
