<?php
include 'conexao.php';

if (!isset($_GET['produto'])) {
    echo "Nenhum produto enviado.";
    exit;
}

$produto = $_GET['produto'];

$sql = "SELECT descricao FROM produtos WHERE nome = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $produto);
$stmt->execute();
$stmt->bind_result($descricao);
$stmt->fetch();

if ($descricao) {
    echo $descricao;
} else {
    echo "Nenhuma informação encontrada para este produto.";
}

$stmt->close();
$conn->close();
?>
