<!DOCTYPE html>
<html lang="en">


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
  <!-- Favicons-->
  <link rel="apple-touch-icon-precomposed" href="images/favicon/apple-touch-icon-152x152.png">
  <!-- For iPhone -->
  <meta name="msapplication-TileColor" content="#00bcd4">
  <meta name="msapplication-TileImage" content="images/favicon/mstile-144x144.png">
  <!-- For Windows Phone -->


  <!-- CORE CSS-->
  
  <link href="css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection">
  <link href="css/style.css" type="text/css" rel="stylesheet" media="screen,projection">
  <link href="css/page-center.css" type="text/css" rel="stylesheet" media="screen,projection">

  <!-- INCLUDED PLUGIN CSS ON THIS PAGE -->
  <link href="css/prism.css" type="text/css" rel="stylesheet" media="screen,projection">
  <link href="js/plugins/perfect-scrollbar/perfect-scrollbar.css" type="text/css" rel="stylesheet" media="screen,projection">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>

<body class="cyan  blue-grey lighten-1">

  <div id="login-page" class="row">
    <div class="col s12 z-depth-8 card-panel">
      <form class="login-form">
        <div class="row">
          <div class="input-field col s12 center">
            <h4>Registrar</h4>
          </div>
        </div>
        <div class="row margin">
          <div class="input-field col s12">
            <i class="mdi-social-person-outline prefix"></i>
            <input id="nome" type="text">
            <label for="nome" class="center-align">Nome</label>
          </div>
        </div>
        <div class="row margin">
          <div class="input-field col s12">
            <i class="mdi-communication-email prefix"></i>
            <input id="email" type="email">
            <label for="email" class="center-align">Email</label>
          </div>
        </div>
          <div class="row margin">
            <div class="input-field col s12">
              <i class="mdi-action-perm-contact-cal prefix"></i>
              <input id="cpf" type="text">
              <label for="cpf">CPF</label>
            </div>
          </div>
          <div class="row margin">
            <div class="input-field col s12">
            <i class="mdi-communication-phone prefix"></i>
              <input id="telefone" type="text">
              <label for="telefone">Telefone</label>
            </div>
          </div>
          <div class="row margin">
            <div class="input-field col s12">
              <i class="mdi-action-lock-outline prefix"></i>
              <input id="senha" type="password">
              <label for="senha">Senha</label>
            </div>
          </div>
        
        <div class="row">
          <div class="input-field col s12">
            <a href="index.html" class="btn waves-effect waves-light col s12">Registar Agora</a>
          </div>
          <div class="input-field col s12">
            <p class="margin center medium-small sign-up">Você já possui conta ?<a href="page-login.php"> Entrar</a></p>
          </div>
        </div>
      </form>
    </div>
  </div>

  <!-- jQuery Library -->
  <script type="text/javascript" src="js/jquery-1.11.2.min.js"></script>
  <!--materialize js-->
  <script type="text/javascript" src="js/materialize.js"></script>
  <!--prism-->
  <script type="text/javascript" src="js/prism.js"></script>
  <!--scrollbar-->
  <script type="text/javascript" src="js/plugins/perfect-scrollbar/perfect-scrollbar.min.js"></script>

  <!--plugins.js - Some Specific JS codes for Plugin Settings-->
  <script type="text/javascript" src="js/plugins.js"></script>

</body>

</html>