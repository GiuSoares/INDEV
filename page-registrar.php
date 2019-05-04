<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="msapplication-tap-highlight" content="no">
  <meta name="description" content="Materialize is a Material Design Admin Template,It's modern, responsive and based on Material Design by Google. ">
  <meta name="keywords" content="materialize, admin template, dashboard template, flat admin template, responsive admin template,">
  <title>Pagina de Registro</title>

  <!-- Favicons-->
  <link rel="icon" href="images/favicon/favicon-32x32.png" sizes="32x32">
  <link href="css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection">
  <link href="css/style.css" type="text/css" rel="stylesheet" media="screen,projection">
  <link href="css/page-center.css" type="text/css" rel="stylesheet" media="screen,projection">
  <link href="css/prism.css" type="text/css" rel="stylesheet" media="screen,projection">
  <link href="js/plugins/perfect-scrollbar/perfect-scrollbar.css" type="text/css" rel="stylesheet" media="screen,projection">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>
<script type="javascript"></script>
<body class="cyan  blue-grey lighten-1">

  <div id="login-page" class="row">
    <div class="col s12 z-depth-8 card-panel">
      <form class="login-form" method="POST" action="func-registrar.php">
        <div class="row">
          <div class="input-field col s12 center">
            <h4>Registrar</h4>
          </div>
        </div>
        <?php if(isset($_GET['erro1'])){ ?>
            <div class="msg msg-error scale-transition">
              <div class="mdi-alert-error"></div>
                Email já cadastrado.
              </div>
          <?php } ?>
          <?php if(isset($_GET['erro2'])){ ?>
            <div class="msg msg-error scale-transition">
              <div class="mdi-alert-error" alt="mensagem de erro" toast></div>
                CPF já cadastrado.
              </div>
          <?php } ?>
        <div class="row margin">
          <div class="input-field col s12">
            <i class="mdi-social-person-outline prefix"></i>
            <input id="nome" name="nome" required minlength="4" pattern="[a-z\s]+{4}" type="text">
            <label for="nome" class="center-align">Nome</label>
          </div>
        </div>
        <div class="row margin">
          <div class="input-field col s12">
            <i class="mdi-communication-email prefix"></i>
            <input id="email" name="email" required pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$"  type="email">
            <label for="email" class="center-align">Email</label>
          </div>
        </div>
          <div class="row margin">
            <div class="input-field col s12">
              <i class="mdi-action-perm-contact-cal prefix"></i>
              <input id="cpf" name="cpf" required type="text">
              <label for="cpf">CPF</label>
            </div>
          </div>
          <div class="row margin">
            <div class="input-field col s12">
            <i class="mdi-communication-phone prefix"></i>
              <input id="telefone" name="telefone" required maxlength="11"  type="text">
              <label for="telefone">Telefone</label>
            </div>
          </div>
          <div class="row margin">
            <div class="input-field col s12">
              <i class="mdi-action-lock-outline prefix"></i>
              <input id="senha" name="senha" required type="password">
              <label for="senha">Senha</label>
            </div>
          </div>
          <div class="input-field col s12">
            <button type="submit" class="btn waves-effect waves-light col s12 black">Registar Agora</button>
          </div>
          <div class="input-field col s12">
            <p class="margin center medium-small sign-up">Você já possui conta ?<a href="page-login.php"> Entrar</a></p>
          </div>
        </div>
      </form>
    </div>
  </div>
</body>
<?php
  include ("footer.php");
?>