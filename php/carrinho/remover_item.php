<?php
session_start();

if (isset($_GET['id']) && isset($_SESSION['carrinho'][$_GET['id']])) {
    unset($_SESSION['carrinho'][$_GET['id']]);
    $_SESSION['carrinho'] = array_values($_SESSION['carrinho']); 
}

header("Location: ../paginas/carrinho.php");
exit;
?>
