<?php
session_start();

if (!isset($_POST['nome']) || !isset($_POST['preco'])) {
    header("Location: ../paginas/nossos_cafes.php");
    exit;
}

$item = [
    "nome" => $_POST['nome'],
    "descricao" => $_POST['descricao'],
    "preco" => floatval($_POST['preco'])
];

if (!isset($_SESSION['carrinho'])) {
    $_SESSION['carrinho'] = [];
}

$_SESSION['carrinho'][] = $item;

header("Location: ../paginas/carrinho.php");
exit;
?>
