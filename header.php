    
    <link rel="icon" href="images/favicon/favicon-32x32.png" sizes="32x32">
    <link rel="apple-touch-icon-precomposed" href="images/favicon/apple-touch-icon-152x152.png">
    <meta name="msapplication-TileColor" content="#00bcd4">
    <meta name="msapplication-TileImage" content="images/favicon/mstile-144x144.png"> 
    <link href="css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection">
    <link href="css/style.css" type="text/css" rel="stylesheet" media="screen,projection">   
    <link href="js/plugins/perfect-scrollbar/perfect-scrollbar.css" type="text/css" rel="stylesheet" media="screen,projection">
    <link href="js/plugins/jvectormap/jquery-jvectormap.css" type="text/css" rel="stylesheet" media="screen,projection">
    <link href="js/plugins/chartist-js/chartist.min.css" type="text/css" rel="stylesheet" media="screen,projection">

       <!-- navbar -->
<header id="header" class="page-topbar"> 
    <div class="navbar-fixed">
        <nav class="cyan">
            <div class="nav-wrapper black">
                <h1 class="logo-wrapper"><a href="page-index.php" class="brand-logo darken-1"><img src="img/logo.png" ></a> <span class="logo-text"></span></h1>
                <ul class="right hide-on-med-and-down">
                    <li>
                        <a href="javascript:void(0);" class="waves-effect waves-block waves-light"><i class="mdi-action-account-circle"></i></a>
                    </li>                                             
                    <li>
                        <a href="#" data-activates="chat-out" class="waves-effect waves-block waves-light chat-collapse"><i class="mdi-communication-chat"></i></a>
                    </li>
                    <li>
                        <?php if(isset($_SESSION['login'])){ ?>
					    <a href="page-login.php" class="waves-effect waves-block waves-light"><!--<i class="mdi-action-exit-to-app">--></i><?php echo $_SESSION['nome'];?> (sair)</a>
				        <?php } ?>
                    </li>   
                </ul>
            </div>
        </nav>
    </div>

    <!-- CHAT -->
    <div id="main">
        <div class="wrapper"> 
            <aside id="right-sidebar-nav">
                <ul id="chat-out" class="side-nav rightside-navigation">
                    <li class="li-hover">
                    <a href="#" data-activates="chat-out" class="chat-close-collapse right"><i class="mdi-navigation-close"></i></a>
                    <div id="right-search" class="row">
                        <form class="col s12">
                            <div class="input-field">
                                <i class="mdi-action-search prefix"></i>
                                <input id="icon_prefix" type="text" class="validate">
                                <label for="icon_prefix">Pesquisar</label>
                            </div>
                        </form>
                    </div>
                    </li>
                    <li class="li-hover">
                        <ul class="chat-collapsible" data-collapsible="expandable">
                        <li>
                            <div class="collapsible-header teal white-text active"><i class="mdi-editor-insert-invitation"></i>Convites</div>
                            <div class="collapsible-body recent-activity">
                            </div>
                        </li>                        
                        </ul>
                    </li>
                </ul>
            </aside>
        </div>
    </div>
</header>
