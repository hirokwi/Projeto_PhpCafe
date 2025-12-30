<?php include '../componentes/header.php'; ?>

<div class="container container-principal">
    <section class="conteudo">
        <h2 class="titulo">Bem-vindo ao Café & Cultura</h2>

        <div class="texto">
            <?php if (isset($_SESSION['usuario_logado']) && $_SESSION['usuario_logado'] == 'sim'): ?>
                <div class="alert alert-success welcome-alert">
                    <h4>👋 Olá, <?php echo $_SESSION['usuario']; ?>!</h4>
                    <p class="mb-0">É bom ter você de volta. Aproveite nossa seleção especial de cafés!</p>
                </div>
            <?php endif; ?>

            <p><strong>O café vai muito além de uma simples bebida.</strong> 
               Ele é um <em>símbolo de encontros, conversas e tradições</em> que atravessam gerações e culturas.</p>

            <p>Neste espaço, celebramos a <strong>história e a cultura do café</strong>, 
               desde as suas origens até as novas formas de preparo que conquistam apreciadores ao redor do mundo.</p>

            <p><strong>Descubra curiosidades</strong> sobre o cultivo, os métodos de extração e os rituais que transformam o simples ato de tomar café em uma verdadeira arte.</p>

            <hr>

            <div class="features-grid">
                <div class="feature-item">
                    <h4>🌱 Produtos Selecionados</h4>
                    <p>Grãos especiais de origem controlada com torra artesanal</p>
                </div>
                <div class="feature-item">
                    <h4>☕ Métodos de Preparo</h4>
                    <p>Descubra as melhores técnicas para extrair o sabor perfeito</p>
                </div>
                <div class="feature-item">
                    <h4>📚 Cultura do Café</h4>
                    <p>História, tradições e curiosidades sobre o universo cafeeiro</p>
                </div>
            </div>

            <hr>

            <p>Além disso, destacamos como o café influencia <strong>expressões culturais</strong> como <em>literatura, música e artes visuais</em>, sendo fonte de inspiração e criatividade.</p>

            <p>Queremos que você sinta o <strong>aroma da tradição</strong> e descubra novos sabores, experiências e histórias que só o universo do café proporciona.</p>

            <?php if (!isset($_SESSION['usuario_logado']) || $_SESSION['usuario_logado'] != 'sim'): ?>
                <div class="call-to-action">
                    <h4>Junte-se à nossa comunidade!</h4>
                    <p>Registre-se para acompanhar nossos conteúdos exclusivos, compartilhar suas experiências e fazer parte dessa jornada cheia de sabor e cultura.</p>
                    <div class="cta-buttons">
                        <a href="cadastro.php" class="btn btn-cta-primary">Criar Conta</a>
                        <a href="pagina_02.php" class="btn btn-cta-secondary">Conhecer Produtos</a>
                    </div>
                </div>
            <?php else: ?>
                <div class="call-to-action">
                    <h4>Continue Explorando!</h4>
                    <p>Agora que você está conectado, aproveite todos os nossos recursos e descubra o melhor do mundo do café.</p>
                    <div class="cta-buttons">
                        <a href="pagina_02.php" class="btn btn-cta-primary">Ver Produtos</a>
                        <a href="pagina_03.php" class="btn btn-cta-secondary">Área de Compras</a>
                        <a href="contato.php" class="btn btn-cta-outline">Fale Conosco</a>
                    </div>
                </div>
            <?php endif; ?>

            <p class="boas-vindas"><em>Seja muito bem-vindo! Sirva-se de um café e aproveite a experiência.</em></p>
        </div>
    </section>
</div>

<style>
html, body {
    margin: 0;
    padding: 0;
    min-height: 100%;
    font-family: 'Montserrat', sans-serif;
    color: #fff;
    position: relative;
    overflow-x: hidden;
}

/* Fundo imagem com blur */
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

/* Overlay escuro */
body::after {
    content: "";
    position: fixed;
    top: 0; left: 0;
    width: 100%; height: 100%;
    background: rgba(0, 0, 0, 0.76);
    z-index: -1;
}

.container-principal {
    display: flex;
    justify-content: center;
    align-items: center;
    padding: 60px 20px;
    min-height: calc(100vh - 100px);
}

.conteudo {
    max-width: 900px;
    width: 100%;
}

.titulo {
    text-align: center;
    font-size: 2.8em;
    margin-bottom: 30px;
    color: #d0a85c;
    font-weight: 300;
}

.texto {
    background-color: rgba(23, 19, 17, 0.85);
    padding: 40px;
    border-radius: 12px;
    border: 1px solid #333;
    line-height: 1.75;
    font-size: 1.1em;
    box-shadow: 0 0 15px rgba(0, 0, 0, 0.4);
}

.texto p {
    margin-bottom: 20px;
}

.texto strong {
    color: #d0a85c;
    font-weight: bold;
}

.texto em {
    color: #bbb;
    font-style: italic;
}

.texto hr {
    border: none;
    border-top: 1px solid #444;
    margin: 30px 0;
}

.welcome-alert {
    background: rgba(40, 167, 69, 0.1);
    border: 1px solid #28a745;
    color: #d4edda;
    border-radius: 8px;
}

.features-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
    gap: 20px;
    margin: 30px 0;
}

.feature-item {
    background: rgba(255, 255, 255, 0.05);
    padding: 20px;
    border-radius: 8px;
    border-left: 4px solid #d0a85c;
}

.feature-item h4 {
    color: #d0a85c;
    margin-bottom: 10px;
    font-size: 1.1em;
}

.feature-item p {
    margin: 0;
    font-size: 0.95em;
    color: #ccc;
}

.call-to-action {
    background: linear-gradient(135deg, rgba(208, 168, 92, 0.1), rgba(139, 69, 19, 0.1));
    padding: 30px;
    border-radius: 10px;
    border: 1px solid #d0a85c;
    text-align: center;
    margin: 30px 0;
}

.call-to-action h4 {
    color: #d0a85c;
    margin-bottom: 15px;
    font-size: 1.4em;
}

.cta-buttons {
    display: flex;
    gap: 15px;
    justify-content: center;
    flex-wrap: wrap;
    margin-top: 20px;
}

.btn-cta-primary {
    background: #d0a85c;
    color: #121212;
    padding: 12px 25px;
    border-radius: 25px;
    text-decoration: none;
    font-weight: bold;
    transition: all 0.3s;
    border: none;
}

.btn-cta-primary:hover {
    background: #e0b76c;
    color: #000;
    transform: translateY(-2px);
}

.btn-cta-secondary {
    background: transparent;
    color: #d0a85c;
    padding: 12px 25px;
    border-radius: 25px;
    text-decoration: none;
    font-weight: bold;
    border: 2px solid #d0a85c;
    transition: all 0.3s;
}

.btn-cta-secondary:hover {
    background: #d0a85c;
    color: #121212;
    transform: translateY(-2px);
}

.btn-cta-outline {
    background: transparent;
    color: #fff;
    padding: 12px 25px;
    border-radius: 25px;
    text-decoration: none;
    font-weight: bold;
    border: 2px solid #fff;
    transition: all 0.3s;
}

.btn-cta-outline:hover {
    background: #fff;
    color: #121212;
    transform: translateY(-2px);
}

.texto .boas-vindas {
    text-align: center;
    font-size: 1.1em;
    margin-top: 30px;
    padding-top: 20px;
    border-top: 1px solid #444;
}

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

@media (max-width: 768px) {
    .titulo {
        font-size: 2.2em;
    }
    
    .texto {
        padding: 25px;
    }
    
    .features-grid {
        grid-template-columns: 1fr;
    }
    
    .cta-buttons {
        flex-direction: column;
        align-items: center;
    }
    
    .btn-cta-primary,
    .btn-cta-secondary,
    .btn-cta-outline {
        width: 200px;
    }
}
</style>

<?php include '../componentes/footer.php'; ?>