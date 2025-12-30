<?php include '../componentes/header.php' ?>
<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
?>

<div class="container container-principal">

    <h1 class="mt-5 mb-3"></h1>

    <h2 class="mb-3">Política de Privacidade</h2>

    <div class="texto">

        <p>Na <strong>Portal Zé Latte</strong>, respeitamos a sua privacidade e estamos comprometidos em proteger os dados pessoais que você compartilha conosco.</p>

        <hr style="border: 1px solid #555; margin: 25px 0;">

        <h3><strong>Coleta de Dados</strong></h3>
        <p>Coletamos apenas as informações necessárias para oferecer uma <em>melhor experiência</em>, como nome, e-mail e preferências de navegação.</p>

        <h3><strong>Uso das Informações</strong></h3>
        <p>As informações coletadas são utilizadas para <strong>personalizar o conteúdo</strong>, melhorar nossos serviços, processar pedidos e enviar comunicações importantes.</p>

        <h3><strong>Compartilhamento de Dados</strong></h3>
        <p>Não compartilhamos seus dados com terceiros, exceto quando necessário para o <em>cumprimento de obrigações legais ou operacionais</em>.</p>

        <h3><strong>Segurança</strong></h3>
        <p>Adotamos medidas de segurança para proteger suas informações contra <strong>acessos não autorizados, alterações ou divulgação indevida</strong>.</p>

        <h3><strong>Direitos do Usuário</strong></h3>
        <p>Você pode acessar, corrigir ou excluir seus dados a qualquer momento, <em>entrando em contato conosco</em>.</p>

        <hr style="border: 1px solid #555; margin: 25px 0;">

        <p>Ao utilizar nossos serviços, você <strong>concorda com esta Política de Privacidade</strong>.</p>

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

.texto em {
    color: #bbb;
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

</style>

<?php include '../componentes/footer.php' ?>
