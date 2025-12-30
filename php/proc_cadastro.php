<?php
include 'conexao.php';

$nome = $_POST['nome'];
$email = $_POST['email'];
$usuario = $_POST['usuario'];
$senha = $_POST['senha'];

// verifica se usuário ou email já existem
$check = "SELECT * FROM usuario WHERE usuario='$usuario' OR email='$email'";
$result = $conn->query($check);

if ($result->num_rows > 0) {
    echo "<script>
        alert('Usuário ou e-mail já cadastrado!');
        window.location.href = '../paginas/cadastro.php';
    </script>";
    exit;
}

// inserir no BD sem criptografia
$sql = "INSERT INTO usuario (nome, email, usuario, senha)
        VALUES ('$nome', '$email', '$usuario', '$senha')";

if ($conn->query($sql) === TRUE) {
    echo "<script>
        alert('Cadastro realizado com sucesso!');
        window.location.href = '../paginas/pagina_inicial.php';
    </script>";
} else {
    echo "<script>
        alert('Erro ao cadastrar. Tente novamente.');
        window.location.href = '../paginas/cadastro.php';
    </script>";
}

$conn->close();
?>
