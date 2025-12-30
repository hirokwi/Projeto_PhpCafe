<?php include '../componentes/header.php' ?>
<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
?>

<div class="container container-principal">

    <h1 class="mt-5 mb-3">Fale Conosco</h1>

    <div class="texto">

        <p>Entre em contato com o <strong>Portal Zé Latte</strong>. Adoramos ouvir sugestões, tirar dúvidas e compartilhar boas ideias sobre o mundo do café!</p>

        <form method="POST" action="../php/proc_contato.php" class="mt-4">

            <div class="mb-3">
                <label for="nome" class="form-label">Nome</label>
                <input type="text" class="form-control" id="nome" name="nome" required>
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">E-mail</label>
                <input type="email" class="form-control" id="email" name="email" required>
                <div id="emailHelp" class="form-text text-light mt-1">
                    <em>Prometemos não compartilhar seu e-mail com ninguém.</em>
                </div>
            </div>

            <div class="mb-3">
                <label for="mensagem" class="form-label">Mensagem</label>
                <textarea class="form-control" id="mensagem" name="mensagem" rows="5" required></textarea>
            </div>

            <button type="submit" class="btn btn-enviar">Enviar</button>

        </form>

        <p class="mt-4">Ou, se preferir, visite nossa loja física para um <strong>café especial</strong> e um bate-papo!</p>

    </div>

</div>

<?php include '../componentes/footer.php' ?>

<style>
html, body {
    height: 100%;
    margin: 0;
    padding: 0;
}.container-principal {
    flex: 1;
    padding: 40px 20px;
    color: #fff;
}

body::-webkit-scrollbar {
    width: 8px;
}

body::-webkit-scrollbar-track {
    background: #1f1f1f;
}

body::-webkit-scrollbar-thumb {
    background-color: #d0a85c;
    border-radius: 4px;
    border: 2px solid #1f1f1f;
}
.texto .form-control, 
.texto textarea {
    background-color: #1e1e1e;
    color: #f0f0f0;
    border: 1px solid #555;
}

.texto .form-control::placeholder,
.texto textarea::placeholder {
    color: #999;
}

.texto .form-control:focus, 
.texto textarea:focus {
    background-color: #2c2c2c;
    color: #fff;
    border-color: #d0a85c;
    box-shadow: none;
}

body {
    display: flex;
    flex-direction: column;
    min-height: 100vh; background-color:rgba(0, 0, 0, 0.6);
    font-family: 'Montserrat', sans-serif;
}

.container-principal {
    flex: 1;
    padding: 40px 20px;
    color: #fff;
}

h1 {
    text-align: center;
    font-size: 2.4em;
    color: #e0e0e0;
    margin-bottom: 30px;
}

.texto {
    background-color: rgba(23, 19, 17, 0.9);
    padding: 40px;
    border-radius: 10px;
    color: #f0f0f0;
    font-family: 'Arial', sans-serif;
    line-height: 1.7;
    border: 1px solid #333;
}

.texto p {
    margin-bottom: 18px;
    font-size: 1.05em;
}

.texto strong {
    color: #d0a85c;
}

.texto em {
    color: #bbb;
}

.form-text {
    font-size: 0.9em;
}

.btn-enviar {
    background-color: #d0a85c;
    border: none;
    color: #121212;
    padding: 12px 30px;
    font-size: 1.1em;
    border-radius: 8px;
    transition: 0.3s;
}

.btn-enviar:hover {
    background-color: #c3964f;
    color: #fff;
    cursor: pointer;
}
</style>
