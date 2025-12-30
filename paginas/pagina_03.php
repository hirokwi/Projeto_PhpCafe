<?php include '../componentes/header.php'; ?>

<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
?>

<div class="container container-principal">

    <h1 class="mt-5 mb-2" style="text-align:center; font-size: 3em; color: #d0a85c;">
        Nossos Cafés
    </h1>

    <p style="text-align:center; font-size: 1.2em; color: #bbb; margin-bottom: 40px;">
        Descubra nossos produtos artesanais selecionados com cuidado.
    </p>

    <!-- LINHA 1 -->
    <div class="produtos-grid">

        <div class="produto-card">
            <img src="../imagens/cafe-em-graos.png" alt="Café em Grãos" />
            <h3>Café em Grãos</h3>
            <p>Grãos selecionados, com torra média.</p>
            <a href="pagina_04.php?add=1"><button>Comprar</button></a>
        </div>

        <div class="produto-card">
            <img src="../imagens/capsu.png" alt="Cápsulas Premium">
            <h3>Cápsulas Premium</h3>
            <p>Café encorpado e prático.</p>
            <a href="pagina_04.php?add=2"><button>Comprar</button></a>
        </div>

        <div class="produto-card">
            <img src="../imagens/presente.png" alt="Kit Presente">
            <h3>Kit Presente</h3>
            <p>Combinação perfeita para presentear.</p>
            <a href="pagina_04.php?add=3"><button>Comprar</button></a>
        </div>

        <div class="produto-card">
            <img src="../imagens/kit.png" alt="Acessórios">
            <h3>Acessórios</h3>
            <p>Filtros, moedores e acessórios.</p>
            <a href="pagina_04.php?add=4"><button>Comprar</button></a>
        </div>

    </div>

    <br>

    <!-- LINHA 2 -->
    <div class="produtos-grid linha-secundaria">

        <div class="produto-card card-claro">
            <img src="../imagens/cold.jpg" alt="Cold Brew">
            <h3>Cold Brew</h3>
            <p>Bebida fria extraída a frio.</p>
            <a href="pagina_04.php?add=5"><button>Comprar</button></a>
        </div>

        <div class="produto-card card-claro">
            <img src="../imagens/sache.png" alt="Sachês Individuais">
            <h3>Sachês Individuais</h3>
            <p>Doses únicas para praticidade.</p>
            <a href="pagina_04.php?add=6"><button>Comprar</button></a>
        </div>

        <div class="produto-card card-claro">
            <img src="../imagens/org.jpg" alt="Café Orgânico">
            <h3>Café Orgânico</h3>
            <p>Produção sustentável.</p>
            <a href="pagina_04.php?add=7"><button>Comprar</button></a>
        </div>

        <div class="produto-card card-claro">
            <img src="../imagens/limitada.jpg" alt="Edição Limitada">
            <h3>Edição Limitada</h3>
            <p>Microlotes especiais.</p>
            <a href="pagina_04.php?add=8"><button>Comprar</button></a>
        </div>

    </div>

</div>

<!-- TODO O CSS AQUI (NÃO ALTEREI NADA) -->
<style>
/* ... O MESMO CSS QUE TE ENVIEI ANTES ... */
</style>

<?php include '../componentes/footer.php'; ?>


<!-- ======================== ESTILO DA PÁGINA ======================== -->
<style>

html, body {
    margin: 0;
    padding: 0;
    min-height: 100%;
    font-family: 'Montserrat', sans-serif;
    position: relative;
    overflow-x: hidden;
}

/* Fundo com blur — igual ao NOS CONHEÇA */
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

/* Overlay escuro igual ao NOS CONHEÇA */
body::after {
    content: "";
    position: fixed;
    top: 0; left: 0;
    width: 100%; height: 100%;
    background: rgba(0, 0, 0, 0.76);
    z-index: -1;
}

body {
    display: flex;
    flex-direction: column;
    min-height: 100vh;
}

.container-principal {
    flex: 1;
    padding: 40px 20px;
    color: #fff;
}

h1 {
    animation: fadeInDown 0.8s ease-in-out;
}

/* GRID DE PRODUTOS */
.produtos-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(240px, 1fr));
    gap: 25px;
    padding: 40px;
    background-color: rgba(23, 19, 17, 0.5);
    border-radius: 10px;
    border: 1px solid #fff;
    animation: fadeIn 1s ease-in-out;
}

.produto-card {
    background-color: #1f1f1f;
    border-radius: 12px;
    overflow: hidden;
    text-align: center;
    transition: transform 0.3s, box-shadow 0.3s;
    border: 1px solid #333;
    opacity: 0;
    animation: fadeInUp 0.5s forwards;
}

.produto-card img {
    width: 100%;
    height: 180px;
    object-fit: cover;
}

.produto-card h3 {
    margin: 15px 0 5px;
    color: #f5f5f5;
}

.produto-card p {
    font-size: 0.95em;
    padding: 0 10px;
    color: #ccc;
    margin-bottom: 15px;
}

.produto-card button {
    background-color: #d0a85c;
    color: #121212;
    border: none;
    padding: 12px 20px;
    border-radius: 30px;
    cursor: pointer;
    font-weight: bold;
    margin-bottom: 20px;
    transition: background-color 0.2s, transform 0.15s;
}

.produto-card button:hover {
    background-color: #e0b76c;
    transform: scale(1.05);
}

.produto-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 6px 16px rgba(0, 0, 0, 0.5);
}

.linha-secundaria .produto-card {
    background-color: #292929;
    border: 1px solid #444;
}

/* Scrollbar */
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

/* Animações */
@keyframes fadeIn {
    from { opacity: 0; transform: translateY(20px); }
    to { opacity: 1; transform: translateY(0); }
}

@keyframes fadeInUp {
    from { opacity: 0; transform: translateY(30px); }
    to { opacity: 1; transform: translateY(0); }
}

@keyframes fadeInDown {
    from { opacity: 0; transform: translateY(-30px); }
    to { opacity: 1; transform: translateY(0); }
}

</style>


