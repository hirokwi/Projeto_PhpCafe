<?php include '../componentes/header.php' ?>
<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
?>

<div class="container container-principal">

    <h1 class="mt-5 mb-3"></h1>

    <h2 class="mb-3">Termos de Uso</h2>

    <div class="texto">

        <p>Seja bem-vindo ao <strong>Portal Zé Latte</strong>. Ao acessar e utilizar este site, o usuário concorda integralmente com as disposições abaixo descritas:</p>

        <hr style="border: 1px solid #555; margin: 25px 0;">

        <h3><strong>Utilização da Plataforma</strong></h3>
        <p>O conteúdo disponibilizado é destinado exclusivamente para <em>consulta e uso pessoal, não comercial</em>. É vedada a reprodução, alteração, distribuição ou qualquer forma de utilização para fins comerciais sem a devida autorização formal e expressa.</p>

        <h3><strong>Cadastro e Responsabilidades do Usuário</strong></h3>
        <p>Ao realizar cadastro no portal, o usuário declara fornecer <strong>informações precisas, completas e atualizadas</strong>, sendo responsável pela veracidade dos dados e pela confidencialidade de suas credenciais de acesso, não podendo compartilhá-las com terceiros.</p>

        <h3><strong>Direitos de Propriedade Intelectual</strong></h3>
        <p>Todo o conteúdo presente neste site, incluindo textos, imagens, logotipos, marcas, gráficos e demais elementos visuais ou sonoros, constitui propriedade exclusiva do <strong>Portal Zé Latte</strong>, protegido pela legislação vigente de direitos autorais e propriedade intelectual.</p>

        <h3><strong>Alterações nos Termos</strong></h3>
        <p>O <strong>Portal Zé Latte</strong> reserva-se o direito de modificar, a qualquer tempo e sem aviso prévio, as disposições destes Termos de Uso. As alterações serão publicadas nesta página, sendo de responsabilidade do usuário consultá-las periodicamente.</p>

        <h3><strong>Limitação de Responsabilidade</strong></h3>
        <p>O portal não se responsabiliza por eventuais danos diretos ou indiretos decorrentes da <strong>utilização inadequada do site</strong>, interrupções de serviço, falhas técnicas ou indisponibilidade temporária.</p>

        <hr style="border: 1px solid #555; margin: 25px 0;">

        <p>Ao prosseguir com a navegação, o usuário declara estar <strong>ciente e de pleno acordo com as condições estabelecidas nestes Termos de Uso</strong>.</p>

        <p style="margin-top: 30px;">Em caso de dúvidas, entre em contato com nossa equipe por meio dos canais oficiais disponibilizados na plataforma.</p>

    </div>

</div>

<style>
html, body {
    height: 100%;
    margin: 0;
    padding: 0;
}

body {
    display: flex;
    flex-direction: column;
    min-height: 100vh;
 background-color:rgba(0, 0, 0, 0.6);
    font-family: 'Montserrat', sans-serif;
}

.container-principal {
    flex: 1;
    padding: 40px 20px;
    color: #fff;
}

h2 {
    text-align: center;
    font-size: 2.2em;
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

.texto h3 {
    margin-top: 25px;
    margin-bottom: 15px;
    color: #e0e0e0;
    font-size: 1.4em;
}

.texto strong {
    color: #d0a85c;
}
.container-principal {
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
.texto em {
    color: #bbb;
}
</style>

<?php include '../componentes/footer.php' ?>
