<?php
session_start();
include 'conexao.php'; // ajuste se o nome do arquivo for outro

if (!isset($_POST['usuario']) || !isset($_POST['senha'])) {
    header("Location: ../paginas/pagina_inicial.php?erro=1");
    exit();
}

$usuario = trim($_POST['usuario']);
$senha   = trim($_POST['senha']);

$sql = $conn->prepare("SELECT * FROM usuario WHERE usuario = ? AND senha = ?");
$sql->bind_param("ss", $usuario, $senha);
$sql->execute();
$result = $sql->get_result();

if ($result->num_rows == 1) {
    $dados = $result->fetch_assoc();

    $_SESSION['usuario_logado'] = 'sim';
    $_SESSION['usuario'] = $dados['usuario'];  
    $_SESSION['id_usuario'] = $dados['id'];

    header("Location: ../paginas/pagina_inicial.php");
    exit();
} 
else {
    header("Location: ../paginas/pagina_inicial.php?erro=1");
    exit();
}
?>
