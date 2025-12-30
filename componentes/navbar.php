<?php
if (session_status() == PHP_SESSION_NONE) {
  session_start();
}
?>

<nav class="navbar navbar-expand-lg shadow-sm glass-component">
  <div class="container-fluid">

    <a class="navbar-brand d-flex align-items-center text-white gap-3" 
       href="/projeto_php_cafe/paginas/pagina_inicial.php">
      <img src="../imagens/teste.png" height="60" 
           style="border-radius: 10px; box-shadow: 0 0 10px rgba(255,255,255,0.1); padding: 5px;">
      <span class="logo-text">Café & Cultura</span>
    </a>

    <button class="navbar-toggler text-white" type="button"
      data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">

      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item"><a class="nav-link link-light" href="/projeto_php_cafe/paginas/pagina_02.php">Produtos</a></li>

        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle link-light" href="#" role="button" data-bs-toggle="dropdown">Opções</a>
          <ul class="dropdown-menu dropdown-menu-custom">
            <li><a class="dropdown-item" href="/projeto_php_cafe/paginas/pagina_03.php">Área de Compras</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="/projeto_php_cafe/paginas/pagina_04.php">Seu Carrinho</a></li>
          </ul>
        </li>

        <?php if (isset($_SESSION['usuario']) && $_SESSION['usuario'] === "adm"): ?>
          <li class="nav-item ms-4">
            <a class="nav-link link-light" href="/projeto_php_cafe/paginas/adm.php">
              Área Administrativa
            </a>
          </li>
        <?php else: ?>
          <li class="nav-item">
            <a class="nav-link disabled text-muted">Indisponível</a>
          </li>
        <?php endif; ?>
      </ul>

      <!-- LOGADO -->
      <?php if (isset($_SESSION['usuario_logado']) && $_SESSION['usuario_logado'] == "sim"): ?>

      <div class="d-flex align-items-center gap-4 text-white">

        <span>
          Logado como <strong><?= $_SESSION['usuario']; ?></strong>
        </span>

        <!-- botão que abre o modal corretamente -->
          <a href="/projeto_php_cafe/php/logout.php" 
     class="btn btn-login btn-sm"
     style="background: linear-gradient(45deg, #ff6f00, #e65100); color: #fff;">
    Logout
  </a>

      </div>

      <?php else: ?>

      <!-- NÃO LOGADO -->
      <div class="d-flex align-items-center gap-3">

        <?php if (isset($_GET['erro']) && $_GET['erro'] == 1): ?>
          <p class="text-danger m-0 me-3">Usuário ou senha incorretos!</p>
        <?php endif; ?>

        <form method="post" action="/projeto_php_cafe/php/proc_login.php" class="d-flex gap-3">
          <input class="form-control form-control-sm custom-input" type="text" placeholder="Usuário" name="usuario" required>
          <input class="form-control form-control-sm custom-input" type="password" placeholder="Senha" name="senha" required>
          <button class="btn btn-login btn-sm" type="submit">Login</button>
        </form>

        <a href="/projeto_php_cafe/paginas/cadastro.php" class="btn btn-secondary btn-sm">
          Cadastrar
        </a>

      </div>
      <?php endif; ?>
    </div>
  </div>
</nav>

<!-- MODAL DE CONFIRMAÇÃO DE LOGOUT -->


<style>
.glass-component {
  background: rgba(25,25,25,0.88);
  backdrop-filter: blur(10px);
  border-radius: 14px;
  border: 1px solid rgba(255,255,255,0.08);
  box-shadow: 0 4px 18px rgba(0,0,0,0.35);
  padding: 12px 20px;
}

.logo-text {
  font-weight: 500;
  font-size: 1.3rem;
  color: #fff;
  text-shadow: 0 0 6px rgba(255,255,255,0.2);
  letter-spacing: 0.5px;
}

.navbar-nav .nav-link {
  transition: 0.3s;
  padding: 8px 14px;
  border-radius: 8px;
}

.navbar-nav .nav-link:hover {
  background-color: rgba(255, 255, 255, 0.08);
  color: #ffca2c !important;
  text-shadow: 0 0 6px rgba(255,202,44,0.5);
}

.dropdown-menu-custom {
  background: rgba(30, 30, 30, 0.95);
  border-radius: 10px;
  padding: 10px;
  margin-top: 5px;
  border: 1px solid rgba(255,255,255,0.1);
  box-shadow: 0 4px 12px rgba(0,0,0,0.35);
}

.dropdown-menu-custom .dropdown-item {
  color: #e0e0e0;
  border-radius: 6px;
  transition: 0.25s;
}

.dropdown-menu-custom .dropdown-item:hover {
  background-color: rgba(255, 255, 255, 0.08);
  color: #ffca2c;
}

.btn-login, .btn-logout, .btn-secondary {
  border-radius: 18px;
  padding: 5px 14px;
  font-weight: bold;
  transition: 0.3s;
}

.btn-login {
  background: linear-gradient(45deg, #ffca2c, #ff9800);
  color: #000;
}

.btn-login:hover {
  background: linear-gradient(45deg, #ffb300, #ff6f00);
}

.btn-logout {
  background: linear-gradient(45deg, #ff9d00, #cc6f00);
  color: #fff;
}

.btn-logout:hover {
  background: linear-gradient(45deg, #ffb43b, #ff8100);
}

.custom-input {
  background-color: rgba(255,255,255,0.08);
  border: 1px solid rgba(255,255,255,0.2);
  color: #fff;
  border-radius: 14px;
  padding-left: 10px;
}

.custom-input::placeholder {
  color: #cfcfcf;
}

.navbar-toggler {
  border: none;
}

.navbar-toggler-icon {
  filter: invert(100%);
}

.logout-modal {
  background: rgba(20, 20, 20, 0.92);
  border-radius: 14px;
  padding: 5px;
  backdrop-filter: blur(12px);
  border: 1px solid rgba(255,255,255,0.08);
  box-shadow: 0 4px 25px rgba(0,0,0,0.5);
}

.btn-confirm-logout {
  background: linear-gradient(45deg, #d62828, #b00020);
  border-radius: 18px;
  padding: 6px 18px;
  font-weight: bold;
  border: none;
  transition: 0.25s;
}

.btn-confirm-logout:hover {
  background: linear-gradient(45deg, #ff3b3b, #d40000);
  box-shadow: 0 0 10px rgba(255, 80, 80, 0.5);
}
</style>
