<?php
$server = "localhost";
$user = "root"; 
$pass = ""; 
$db = "portalzelatte"; 

$conn = new mysqli($server, $user, $pass, $db);

if ($conn->connect_error) {
    die("Erro na conexão: " . $conn->connect_error);
}
?>
