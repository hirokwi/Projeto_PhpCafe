<?php
session_start();
session_unset();
session_destroy();

header("Location: /projeto_php_cafe/paginas/pagina_inicial.php");
exit();
?>