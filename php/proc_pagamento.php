<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

include 'conexao.php'; // seu arquivo de conexão $con

if (!isset($_SESSION['usuario'])) {
    header("Location: ../paginas/login.php");
    exit;
}

// Pegar usuário logado
$usuario = $_SESSION['usuario'];

// Lista de produtos do carrinho
$lista = $_SESSION['carrinho'] ?? [];

if (empty($lista)) {
    echo "Carrinho vazio!";
    exit;
}

// Produtos e preços
$produtos = [
    1 => ["nome" => "Café em Grãos", "preco" => 32.90],
    2 => ["nome" => "Cápsulas Premium", "preco" => 24.50],
    3 => ["nome" => "Kit Presente", "preco" => 49.90],
    4 => ["nome" => "Acessórios", "preco" => 39.00],
    5 => ["nome" => "Cold Brew", "preco" => 18.00],
    6 => ["nome" => "Sachês Individuais", "preco" => 45.00],
    7 => ["nome" => "Café Orgânico", "preco" => 29.90],
    8 => ["nome" => "Edição Limitada", "preco" => 59.00],
];

// Calcular total
$subtotal = 0;
foreach ($lista as $id) {
    if (isset($produtos[$id])) {
        $subtotal += $produtos[$id]['preco'];
    }
}
$frete = 12.00;
$total = $subtotal + $frete;

// Método de pagamento enviado via POST
$metodo = $_POST['metodo'] ?? 'PIX';

foreach ($lista as $id) {
    if (isset($produtos[$id])) {
        $nome = $produtos[$id]['nome'];
        $preco = $produtos[$id]['preco'];

        $sql = "INSERT INTO pagamentos (usuario, produto, preco, frete, total, metodo) 
                VALUES (?, ?, ?, ?, ?, ?)";
        $stmt = $con->prepare($sql);
        $stmt->bind_param("ssddds", $usuario, $nome, $preco, $frete, $total, $metodo);
        $stmt->execute();
    }
}

// Limpar carrinho após pagamento
unset($_SESSION['carrinho']);

// Redirecionar para página de sucesso
header("Location: ../paginas/finalizado.php");
exit;
?>
