
<?php
    session_start();
    include "header.php";
    include "sidebar.php";


if(isset($_SESSION['login'])){
	$idusuario=$_SESSION['idusuario'];
?>

<section id="content">        
    <div class="container">
        <div id="profile-page" class="section">
            <div id="profile-page-header" class="card">
                <div class="card-image waves-effect waves-block waves-light">
                    <img class="activator" src="img/black.jpg" alt="user background"  style="width:100%; height:40%">                    
                </div>
                <figure class="card-profile-image" style="margin-bottom: -10%;">
                    <img src="img/user-login.png" alt="profile image" style="width: 8%;" class="circle z-depth-1 responsive-img activator">
                </figure>
                <div class="card-content" style="margin-top: 1%;">
                    <div class="row">                    
                        <div class="col s3 offset-s2">                        
                        <h4 class="card-title grey-text text-darken-4"><?php echo $_SESSION['nome'];?></h4>
                        <p class="medium-small grey-text">Project Manager</p>                        
                    </div>
                    <div class="col s2 center-align">
                        <h4 class="card-title grey-text text-darken-4">10+</h4>
                        <p class="medium-small grey-text">Experiencia de trabalho</p>                        
                    </div>
                    <div class="col s2 center-align">
                        <h4 class="card-title grey-text text-darken-4">6</h4>
                        <p class="medium-small grey-text">Projetos participados</p>                        
                    </div>                    
                    <div class="col s2 center-align">
                        <h4 class="card-title grey-text text-darken-4">R$<?php echo $_SESSION['saldo'];?></h4>
                        <p class="medium-small grey-text">Carteira</p>                        
                    </div>                    
                    <div class="col s1 right-align">
                        <a class="btn-floating activator waves-effect waves-light darken-2 right">
                            <i class="mdi-action-perm-identity"></i>
                        </a>
                    </div>
                </div>
            </div>
            <div class="card-reveal" style="display: none; transform: translateY(0px);">
                <p>
                    <span class="card-title grey-text text-darken-4"><?php echo $_SESSION['nome'];?><i class="mdi-navigation-close right"></i></span>
                    <span><i class="mdi-action-perm-identity cyan-text text-darken-2"></i>Cargo</span>
                </p>
                <p>Descrição</p>

                <p><i class="mdi-action-perm-phone-msg cyan-text text-darken-2"></i><?php echo $_SESSION['telefone'];?></p>
                <p><i class="mdi-communication-email cyan-text text-darken-2"></i><?php echo $_SESSION['email'];?></p>
            </div>
        </div>
            <div id="profile-page-content" class="row">
                <div id="profile-page-sidebar" class="col s12 m4">
                    <div class="card blue darken-1">
                        <div class="card-content white-text">
                            <span class="card-title">Sobre mim</span>
                            <p>Descrição</p>
                        </div>                  
                    </div>
                    <ul id="profile-page-about-details" class="collection z-depth-1">
                        <li class="collection-item">
                            <div class="row">
                                <div class="col s5 grey-text darken-1"><i class="mdi-social-poll"></i>Habilidades</div>
                                    <div class="col s7 grey-text text-darken-4 right-align">HTML, CSS, PHP, JavaScript</div>
                                </div>
                        </li>
                        <li class="collection-item">
                            <div class="row">
                                <div class="col s5 grey-text darken-1"><i class="mdi-social-domain"></i>Localidade</div>
                                    <div class="col s7 grey-text text-darken-4 right-align">Porto Alegre, Brasil</div>
                                </div>
                        </li>
                    </ul>
                    <ul id="profile-page-about-feed" class="collection z-depth-1">
                        <li class="collection-item avatar">
                            <i class="mdi-file-folder circle"></i>
                            <span class="title">Projeto 01</span>
                            <p>data da ultima atualização<br>
                                <span class="ultra-small">Second Line</span>
                            </p>
                            <a href="#!" class="secondary-content"><i class="mdi-action-grade"></i></a>
                        </li>
                        <li class="collection-item avatar">
                            <i class="mdi-file-folder circle"></i>
                            <span class="title">Projeto 02</span>
                            <p>data da ultima atualização <br>
                                <span class="ultra-small">Second Line</span>
                            </p>
                            <a href="#!" class="secondary-content"><i class="mdi-action-grade"></i></a>
                        </li>
                        <li class="collection-item avatar">
                            <i class="mdi-file-folder circle"></i>
                            <span class="title">Projeto 03</span>
                            <p>data da ultima atualização <br>
                                <span class="ultra-small">$ 3,684.00</span>
                            </p>
                            <a href="#!" class="secondary-content"><i class="mdi-action-grade"></i></a>
                        </li>
                        <li class="collection-item avatar">
                            <i class="mdi-file-folder circle"></i>
                                <span class="title">Latest News</span>
                            <p>company management news <br>
                                <span class="ultra-small">Second Line</span>
                            </p>
                            <a href="#!" class="secondary-content"><i class="mdi-action-grade"></i></a>
                        </li>
                    </ul>
                    <div class="card center-align">
                        <div class="card-content white black-text">
                            <p class="card-stats-title">Avaliação</p>
                            <!--<h4 class="mdi-action-star-rate Large"><?php //echo $_SESSION['nota'];?></h4>-->
                            <img src="img/avaliacao/1.jpg" >
                            </p>
                        </div>
                    </div>
                </div>
                <div id="profile-page-wall" class="col s12 m8">
                    <div id="profile-page-wall-share" class="row">
                        <div class="col s12">
                            <ul class="tabs tab-profile z-depth-1 blue darken-1" style="width: 100%;">
                                <li class="tab col s3">
                                    <a class="white-text waves-effect waves-light active" href="#descricao"><i class="mdi-editor-border-color"></i> Atualizar descrição</a>
                                </li>
                                <li class="tab col s3">
                                    <a class="white-text waves-effect waves-light" href="#editaperfil"><i class="mdi-action-assignment-ind"></i> Editar perfil</a>
                                </li>
                                <li class="tab col s3">
                                    <a class="white-text waves-effect waves-light" href="#trasacoes"><i class="mdi-image-photo-album"></i> Ver transações</a>
                                </li>                      
                                <div class="indicator" style="right: 920px; left: 0px;"></div>
                            </ul>
                                <div id="descricao" class="tab-content col s12  grey lighten-4">
                                    <div class="row">
                                        <div class="col s2">
                                            <img src="images/avatar.jpg" alt="" class="circle responsive-img valign profile-image-post">
                                        </div>
                                        <div class="input-field col s12">
                                            <textarea id="textarea" row="2" class="materialize-textarea"></textarea>
                                            <label for="textarea" class="">Atualizar descrição</label>
                                        </div>
                                    </div>
                                    <div class="col s12  right-align">
                                        <a class="waves-effect black waves-light btn"><i class="mdi-maps-rate-review left"></i>Atualizar</a>
                                    </div>
                                </div>

                                <div id="editaperfil" class="tab-content col s12  grey lighten-4">
                                    <div class="row">
                                        <div class="input-field col s12">
                                            <div id="basic-form" class="section">
                                                <form method="POST" action="func-edit-perfil.php" class="col s12">
                                                    <div class="row">
                                                            <div class="input-field col s8">
                                                                <input id="idusuario" type="hidden" name="idusuario" value="<?php echo $_SESSION['idusuario'];?>">
                                                            </div>
                                                        <div class="row">
                                                            <div class="input-field col s8">
                                                                <input id="nome" type="text" name="nome" value="<?php echo $_SESSION['nome'];?>">
                                                                <label for="nome">Nome</label>
                                                            </div>
                                                            <div class="input-field col s4">
                                                                <input id="cpf" disabled type="text" name="cpf" value="<?php echo $_SESSION['cpf'];?>">
                                                                <label for="cpf">CPF</label>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="input-field col s12">
                                                                <input id="email" disabled type="email" name="email" value="<?php echo $_SESSION['email'];?>">
                                                                <label for="email">Email</label>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="input-field col s12">
                                                                <input id="telefone" type="text" name="telefone" value="<?php echo $_SESSION['telefone'];?>">
                                                                <label for="telefone">Telefone</label>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="input-field col s12">
                                                                <input id="senha" type="password" name="senha">
                                                                <label for="senha">Senha</label>
                                                            </div>
                                                        </div>      
                                                    </div>
                                                    <div class="col s12  right-align">
														<button type="submit" class="red waves-light btn left"><a href="func-excluir-cadastro.php?idusuario=<?=$idusuario?>"><i class="mdi-action-highlight-remove left"></i>Excluir</button>
                                                        <button type="submit" class="black waves-light btn"><i class="mdi-maps-rate-review left"></i>Atualizar</button>
                                                    </div>
                                                </form>
                                            </div>                                                 
                                        </div>
                                    </div>
                                </div>
                                <div id="trasacoes" class="tab-content col s12  grey lighten-4">
                                    <div class="row">
                                        <div class="input-field col s12">
                                            <table id="data-table-simple" class="responsive-table display" cellspacing="0">
                                                <thead>
                                                    <tr>
                                                        <th>Remetente</th>
                                                        <th>Projeto</th>
                                                        <th>Data de recebimento</th>
                                                        <th>salario</th>
                                                    </tr>
                                                </thead>
                                            
                                                <tfoot>
                                                    <tr>
                                                    <th>Remetente</th>
                                                        <th>Projeto</th>
                                                        <th>Data de recebimento</th>
                                                        <th>salario</th>
                                                    </tr>
                                                </tfoot>
                                            
                                                <tbody>
                                                    <tr>
                                                        <td>Andrey</td>
                                                        <td>Arquitetura de sistema</td>
                                                        <td>04/05/2019</td>
                                                        <td>$320,800</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Vitor</td>
                                                        <td>Desenvolvimento web</td>
                                                        <td>04/05/2019</td>
                                                        <td>$170,750</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Giulia</td>
                                                        <td>Design HTML/CSS</td>
                                                        <td>04/05/2019</td>
                                                        <td>$86,000</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div> 
                                    </div>
                                </div>    
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<?php
}
else{
	
	header('location:page-login.php');
}

include 'footer.php';
?>