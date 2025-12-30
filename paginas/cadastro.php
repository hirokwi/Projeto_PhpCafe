<?php 

include '../componentes/header.php'; 
?>
<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
?>

<div class="container-principal">
    <section class="conteudo">

        <h2 class="titulo">Criar Conta</h2>

        <div class="form-box">
            <form method="post" action="../php/proc_cadastro.php">

                <div class="mb-3">
                    <label class="form-label">Nome Completo</label>
                    <input type="text" name="nome" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">E-mail</label>
                    <input type="email" name="email" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Usuário</label>
                    <input type="text" name="usuario" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Senha</label>
                    <input type="password" name="senha" class="form-control" required>
                </div>

                <button type="submit" class="btn btn-warning w-100" style="font-weight: bold;">
                    Registrar
                </button>

            </form>
        </div>

    </section>
</div>

<style>
html, body {
    margin: 0;
    padding: 0;
    min-height: 100%;
    font-family: 'Montserrat', sans-serif;
    color: #fff;
    position: relative;
}

/* Fundo com blur (mesma classe da outra página) */
body::before {
    content: "";
    position: fixed;
    top: 0; left: 0;
    width: 100%; height: 100%;
    background-image: url('../imagens/backgr.jpg');
    background-size: cover;
    background-position: center;
    filter: blur(8px);
    opacity: 0.4;
    transform: scale(1.05);
    z-index: -2;
}

/* Overlay escuro */
body::after {
    content: "";
    position: fixed;
    top: 0; left: 0;
    width: 100%; height: 100%;
    background: rgba(0, 0, 0, 0.76);
    z-index: -1;
}

.container-principal {
    display: flex;
    justify-content: center;
    align-items: center;
    padding: 60px 20px;
    min-height: calc(100vh - 100px);
}

.conteudo {
    width: 100%;
    max-width: 550px;
}

.titulo {
    text-align: center;
    font-size: 2.5em;
    margin-bottom: 30px;
    color: #e0e0e0;
}

/* Caixa do formulário */
.form-box {
    background-color: rgba(23, 19, 17, 0.85);
    padding: 35px;
    border-radius: 12px;
    border: 1px solid #333;
    box-shadow: 0 0 15px rgba(0, 0, 0, 0.4);
}

/* Scroll igual ao resto do site */
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
</style>

<?php include '../componentes/footer.php'; ?>
