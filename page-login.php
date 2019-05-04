
<head>

  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  
  <link rel="icon" href="img/favicon/favicon-32x32.png" sizes="32x32">
  <link href="css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection">
  <link href="css/style.css" type="text/css" rel="stylesheet" media="screen,projection">
  <link href="css/page-center.css" type="text/css" rel="stylesheet" media="screen,projection">
  
  <title>Pagina de Login</title>
 
</head>
<body class="blue-grey lighten-1">
  <div id="login-page" class="row">
    <form class="login-form" method="POST" action="func-login.php">
      <div class="col s12 z-depth-4 card-panel">
          <div class="row">
            <div class="input-field col s12 center">
              <img src="img/user-login.png" alt="" class="responsive-img valign profile-image-login"> 
            </div>
          </div>
          <?php if(isset($_GET['erro'])){ ?>
            <div class="msg msg-error scale-transition">
              <div class="mdi-alert-error"></div>
                Usuário e/ou senha inválidos.
              </div>
          <?php } ?>
          <div class="row margin">
            <div class="input-field col s12">
              <i class="mdi-social-person-outline prefix"></i>
              <input id="email" name="email" type="text">
              <label for="email" class="center-align">Email</label>
            </div>
          </div>
          <div class="row margin">
            <div class="input-field col s12">
              <i class="mdi-action-lock-outline prefix"></i>
              <input id="senha" name="senha" type="password">
              <label for="senha">Senha</label>
            </div>
          </div>  
          <div class="row">
            <div class="input-field col s12">
              <button type="submit" class="btn waves-effect waves-light col s12 black">Login</button>
            </div>
          </div>
          <div class="row">
            <div class="input-field col s6 m6 l6">
              <p class="margin medium-small"><a href="page-registrar.php">Registrar-se</a></p>
            </div>
            <div class="input-field col s6 m6 l6">
                <p class="margin right-align medium-small"><a href="#">Esqueceu a Senha?</a></p>
            </div>         
          </div>
      </div>
    </form>
  </div>

</body>
<?php
  include("footer.php");
?>