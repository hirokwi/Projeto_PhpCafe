<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Protege a página para admin
if (!isset($_SESSION['usuario']) || $_SESSION['usuario'] !== 'adm') {
    header("Location: /projeto_php_cafe/paginas/pagina_inicial.php");
    exit;
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

// Adicionar novo produto
if (isset($_POST['adicionar'])) {
    $titulo = $conn->real_escape_string($_POST['titulo']);
    $nome = $conn->real_escape_string($_POST['nome']);
    $descricao = $conn->real_escape_string($_POST['descricao']);
    $mini_descri = $conn->real_escape_string($_POST['mini_descri']);
    $conn->query("INSERT INTO produtos (titulo, nome, descricao, mini_descri) VALUES ('$titulo','$nome','$descricao','$mini_descri')");
}

// Editar produto
if (isset($_POST['editar'])) {
    $id = intval($_POST['id']);
    $titulo = $conn->real_escape_string($_POST['titulo']);
    $nome = $conn->real_escape_string($_POST['nome']);
    $descricao = $conn->real_escape_string($_POST['descricao']);
    $mini_descri = $conn->real_escape_string($_POST['mini_descri']);
    $conn->query("UPDATE produtos SET titulo='$titulo', nome='$nome', descricao='$descricao', mini_descri='$mini_descri' WHERE id=$id");
}

// Excluir produto
if (isset($_POST['excluir'])) {
    $id = intval($_POST['id']);
    $conn->query("DELETE FROM produtos WHERE id=$id");

    // Resetar IDs
    $conn->query("SET @count = 0");
    $conn->query("UPDATE produtos SET id = @count:=@count+1 ORDER BY id");
    $conn->query("ALTER TABLE produtos AUTO_INCREMENT = 1");
}

// Buscar produtos
$result = $conn->query("SELECT * FROM produtos ORDER BY id ASC");
?>

<?php include '../componentes/header.php'; ?>

<div class="container container-principal">
    <section class="conteudo">
        <h2 class="titulo">Área Administrativa</h2>

        <div class="texto">
            <p>Bem-vindo, <strong><?= $_SESSION['usuario']; ?></strong>! Gerencie os produtos abaixo:</p>

            <!-- Formulário para adicionar novo produto -->
            <form method="post" style="margin-bottom:30px; display:flex; gap:10px; flex-wrap:wrap;">
                <input type="text" name="titulo" placeholder="Título" required style="flex:1;">
                <input type="text" name="nome" placeholder="Nome" required style="flex:1;">
                <input type="text" name="descricao" placeholder="Descrição" required style="flex:2;">
                <input type="text" name="mini_descri" placeholder="Mini Descrição" required style="flex:1;">
                <button type="submit" name="adicionar" style="padding:5px 12px; border:none; border-radius:8px; background:#4caf50; color:#fff; cursor:pointer;">Adicionar</button>
            </form>

            <!-- Lista de produtos existentes -->
            <table style="width:100%; border-collapse: collapse; margin-top: 20px;">
                <thead>
                    <tr style="background-color: #333; color:#fff;">
                        <th style="padding: 10px; text-align:left;">ID</th>
                        <th style="padding: 10px; text-align:left;">Título</th>
                        <th style="padding: 10px; text-align:left;">Nome</th>
                        <th style="padding: 10px; text-align:left;">Descrição</th>
                        <th style="padding: 10px; text-align:left;">Mini Descrição</th>
                        <th style="padding: 10px; text-align:center;">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while($row = $result->fetch_assoc()): ?>
                    <tr style="background-color: rgba(255,255,255,0.05);">
                        <form method="post" style="display:flex; gap:10px; flex-wrap:wrap;">
                            <td style="padding:8px;"><?= $row['id']; ?>
                                <input type="hidden" name="id" value="<?= $row['id']; ?>">
                            </td>
                            <td style="padding:8px;">
                                <input type="text" name="titulo" value="<?= htmlspecialchars($row['titulo']); ?>" style="width:100%;">
                            </td>
                            <td style="padding:8px;">
                                <input type="text" name="nome" value="<?= htmlspecialchars($row['nome']); ?>" style="width:100%;">
                            </td>
                            <td style="padding:8px;">
                                <input type="text" name="descricao" value="<?= htmlspecialchars($row['descricao']); ?>" style="width:100%;">
                            </td>
                            <td style="padding:8px;">
                                <input type="text" name="mini_descri" value="<?= htmlspecialchars($row['mini_descri']); ?>" style="width:100%;">
                            </td>
                            <td style="padding:8px; text-align:center; display:flex; gap:5px; justify-content:center;">
                                <button type="submit" name="editar" class="btn-salvar" style="padding:5px 10px; border:none; border-radius:8px; background:#ffca2c; color:#000; cursor:pointer;">Salvar</button>
                                <button type="submit" name="excluir" style="padding:5px 10px; border:none; border-radius:8px; background:#f44336; color:#fff; cursor:pointer;">Excluir</button>
                            </td>
                        </form>
                    </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        </div>
    </section>
</div>

<script>
// Apenas o botão "Salvar" tem alert e desaparece
document.querySelectorAll('.btn-salvar').forEach(btn => {
    btn.addEventListener('click', function(){
        alert('Produto salvo com sucesso!');
        this.style.display = 'none';
    });
});
</script>

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

.container-principal {
    display: flex;
    justify-content: center;
    align-items: flex-start;
    padding: 60px 20px;
    min-height: calc(100vh - 100px);
}

.conteudo {
    max-width: 950px;
    width: 100%;
}

.titulo {
    text-align: center;
    font-size: 2.5em;
    margin-bottom: 30px;
    color: #e0e0e0;
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

table input {
    background-color: rgba(255, 255, 255, 0.1);
    border: 1px solid #444;
    color: #fff;
    padding: 4px 6px;
    border-radius: 6px;
}

table button:hover {
    opacity: 0.85;
}
</style>

<?php include '../componentes/footer.php'; ?>
