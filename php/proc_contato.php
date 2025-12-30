<?php
include 'conexao.php';

$nome = $_POST['nome'];
$email = $_POST['email'];
$mensagem = $_POST['mensagem'];

$sql = "INSERT INTO contato (nome, email, mensagem) VALUES ('$nome', '$email', '$mensagem')";

if ($conn->query($sql) === TRUE) {
    echo "<script>
        alert('Mensagem enviada com sucesso!');
        window.location.href = '../paginas/contato.php';
    </script>";
} else {
    echo "<script>
        alert('Erro ao enviar. Tente novamente.');
        window.location.href = '../paginas/contato.php';
    </script>";
}

$conn->close();
?>
