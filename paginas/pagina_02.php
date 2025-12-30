<?php require '../componentes/header.php'; ?>

<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Conexão com o banco
$host = "localhost";
$user = "root";
$pass = "";
$db   = "portalzelatte"; 
$conn = new mysqli($host, $user, $pass, $db);
if ($conn->connect_error) {
    die("Falha na conexão: " . $conn->connect_error);
}

// Buscar produtos
$result = $conn->query("SELECT * FROM produtos ORDER BY id ASC");
$produtos = [];
if ($result) {
    while ($row = $result->fetch_assoc()) {
        $produtos[] = $row;
    }
}
?>

<div class="conteudo">
    <div class="area-gradiente">

        <h1 class="mt-5 mb-4" style="text-align:center; font-size: 2.8em; color: #d0a85c;">Portfólio de Produtos</h1>
        <p style="text-align:center; font-size: 1.15em; color: #bbb; margin-bottom: 50px;">
            Conheça nossa linha completa de cafés especiais e soluções para preparo.
        </p>

        <div class="lista-produtos">
            <?php foreach($produtos as $index => $produto): ?>
            <div class="produto-item" style="animation-delay: <?= 0.1 * ($index+1) ?>s;">
                <h3><?= htmlspecialchars($produto['titulo']); ?></h3>
                <p><?= htmlspecialchars($produto['descricao']); ?></p>
                <a href="#" class="btn-detalhes"
                   data-titulo="<?= htmlspecialchars($produto['titulo']); ?>"
                   data-nome="<?= htmlspecialchars($produto['nome']); ?>"
                   data-descricao="<?= htmlspecialchars($produto['descricao']); ?>"
                   data-mini="<?= htmlspecialchars($produto['mini_descri']); ?>"
                >Detalhes</a>
            </div>
            <?php endforeach; ?>
        </div>

    </div>
</div>

<?php include '../componentes/footer.php'; ?>

<script>
  const botoes = document.querySelectorAll('.btn-detalhes');

  botoes.forEach(btn => {
    btn.addEventListener('click', function(e) {
      e.preventDefault();

      const titulo = this.getAttribute('data-titulo');
      const nome = this.getAttribute('data-nome');
      const descricao = this.getAttribute('data-descricao');
      const mini = this.getAttribute('data-mini');

      alert(
        "Título: " + titulo + "\n" +
        "Nome: " + nome + "\n\n" +
        "Descrição: " + descricao + "\n\n" +
        "Mini Descrição: " + mini
      );
    });
  });
</script>

<style>
  html,
  body {
    height: 100%;
    margin: 0;
    padding: 0;
    background: url('../imagens/bg-cafe.jpg') no-repeat center center fixed;
    background-size: cover;
    font-family: 'Montserrat', sans-serif;
    color: rgba(0, 0, 0, 0.74);
  }

  body {
    display: flex;
    flex-direction: column;
    min-height: 100vh;
  }

  .conteudo {
    flex: 1; /* Faz o footer ficar colado no fundo */
    display: flex;
    flex-direction: column;
  }

  .area-gradiente {
    padding: 50px 20px;
    background: linear-gradient(to bottom,
        rgba(18, 18, 18, 0.4) 0%,
        rgba(18, 18, 18, 0.3) 50%,
        rgba(18, 18, 18, 0.1) 85%,
        rgba(0, 0, 0, 0) 100%);
    border-radius: 0 0 20px 20px;
  }

  .lista-produtos {
    max-width: 800px;
    margin: 0 auto;
    display: flex;
    flex-direction: column;
    gap: 30px;
  }

  .produto-item {
    padding: 25px;
    border: 1px solid #333;
    border-radius: 12px;
    background-color: rgba(23, 19, 17, 0.85);
    transition: background-color 0.3s, border 0.3s, transform 0.4s ease, opacity 0.4s ease;
    opacity: 0;
    transform: translateY(20px);
    animation: fadeInItem 0.8s forwards;
  }

  .produto-item:hover {
    background-color: #1c1c1c;
    border-color: #d0a85c;
  }

  .produto-item h3 {
    margin: 0 0 12px;
    font-size: 1.5em;
    color: #d0a85c;
  }

  .produto-item p {
    font-size: 1.05em;
    color: #ccc;
    margin-bottom: 20px;
    line-height: 1.6;
  }

  .btn-detalhes {
    display: inline-block;
    padding: 10px 18px;
    background-color: #d0a85c;
    color: #121212;
    border-radius: 30px;
    text-decoration: none;
    font-weight: bold;
    transition: background-color 0.25s;
  }

  .btn-detalhes:hover {
    background-color: #e0b76c;
  }

  @keyframes fadeInItem {
    to {
      opacity: 1;
      transform: translateY(0);
    }
  }

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
