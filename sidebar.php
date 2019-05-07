   
<header id="header" class="page-topbar">
    <div class="navbar-fixed">
    <nav class="black">
        <div class="nav-wrapper">
        <div class="col s12">
        <h1 class="logo-wrapper"><a href="page-index.php" class="brand-logo darken-1"><img src="img/logo.png"></a> </h1>
        <ul class="right hide-on-med-and-down">
            <li>    
                <a href="javascript:void(0);" class="waves-effect waves-light show-search"><i class="mdi-action-account-circle"></i></a>                              
            </li>
            <li>
                <a href="#" data-activates="chat-out" class="waves-effect waves-block waves-light chat-collapse"><i class="mdi-communication-chat"></i></a>
            </li> 
        </ul>
        </div>
        </div>
    </nav>
    </div>
    
</header>

<div id="main">
    <div class="wrapper">
        <aside id="left-sidebar-nav">
            <ul id="slide-out" class="side-nav fixed leftside-navigation">
                <li class="user-details cyan darken-4">
                <div class="row">
                    <div class="col col s4 m4 l4">
                        <img src="img/user-login.png" style="margin-top:17%" class="circle responsive-img valign profile-image">
                    </div>
                    <div class="col col s8 m8 l8">
                        <ul id="profile-dropdown" class="dropdown-content">
                            <li><a href="page-perfil.php"><i class="mdi-action-face-unlock"></i>Perfil</a></li>
                            <li><a href="#"><i class="mdi-action-settings"></i>Carteira</a></li>
                            <li class="divider"></li>
                            <li>
                                <?php if(isset($_SESSION['login'])){ ?>
                                    <a href="page-login.php"><i class="mdi-action-exit-to-app"></i>sair</a>
                                <?php }else{
                                    header ("location: ../page-login.php");
                                } ?>
                            </li>
                        </ul>
                        <a class="btn-flat dropdown-button waves-effect waves-light white-text profile-btn" style="margin-top:20%"
                            data-activates="profile-dropdown"><?php echo $_SESSION['nome'];?><i class="mdi-navigation-arrow-drop-down right"></i>
                        </a>
                        
                    </div>
                    <p class="user-roal"><?php echo $_SESSION['email'];?></p>
                </div>
                </li>
                <li class="no-padding">
                    <ul class="collapsible collapsible-accordion">
                        <li class="bold"><a class="collapsible-header waves-effect waves-cyan"><i class="mdi-action-description"></i>Projeto</a>
                            <div class="collapsible-body">
                                <ul>                                       
                                    <li><a href="#">Criar projeto</a></li>
                                    <li><a href="#">Meus projetos</a></li>
                                </ul>
                            </div>
                        </li>
                        <li class="bold"><a class="collapsible-header waves-effect waves-cyan"><i class="mdi-action-book"></i>Oportunidade</a>
                            <div class="collapsible-body">
                                <ul>
                                    <li><a href="#">Pesquisar oportunidade</a></li>
                                    <li><a href="#">Minhas oportunidades</a></li>
                                </ul>
                            </div>
                        </li>
                    </ul>
                </li>
                <li class="li-hover"><div class="divider"></div></li>
                <li class="li-hover"><p class="ultra-small margin more-text">Suporte</p></li>
                <li><a href="#"><i class="mdi-communication-chat"></i>Reclamação</a></li>
                <li><a href="#"><i class="mdi-communication-live-help"></i>Duvidas</a>
            </ul>
            <a href="#" data-activates="slide-out" class="sidebar-collapse btn-floating btn-medium waves-effect waves-light hide-on-large-only darken-2"><i class="mdi-navigation-menu" ></i></a>
        </aside>
    </div>
</div>
<!-- CHAT -->
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
                        <div class="collapsible-header teal white-text active"><i class="mdi-social-whatshot"></i>Atividades recentes</div>
                            <div class="collapsible-body recent-activity">
                                <div class="recent-activity-list chat-out-list row">
                                    <div class="col s3 recent-activity-list-icon"><i class="mdi-action-add-shopping-cart"></i>
                                    </div>
                                    <div class="col s9 recent-activity-list-text">
                                        <a href="#">Agora</a>
                                        <p>Você se inscreveu no projeto PHP 2.0</p>
                                    </div>
                                </div>
                            </div>
                            </li>
                            <li>
                            <div class="collapsible-header red white-text"><i class="mdi-action-stars"></i>Favoritos</div>
                                <div class="collapsible-body favorite-associates">
                                    <div class="favorite-associate-list chat-out-list row">
                                        <div class="col s4"><img src="img/users/vitor.jpg"  class="circle responsive-img online-user valign profile-image">
                                        </div>
                                        <div class="col s8">
                                            <p>Vitor Avila</p>
                                            <p class="place">Porto Alegre, RS</p>
                                        </div>
                                    </div>
                                    <div class="favorite-associate-list chat-out-list row">
                                        <div class="col s4"><img src="img/users/Giulia.jpg"  class="circle responsive-img online-user valign profile-image">
                                        </div>
                                        <div class="col s8">
                                            <p>Giulia do queijo</p>
                                            <p class="place">Porto Alegre, RS</p>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </li>
                    </ul>
                </li>
            </ul>
        </aside>
<!-- FIM CHAT -->
