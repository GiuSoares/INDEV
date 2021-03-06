<title>Cadastrar Projeto</title>
    <link href="css/materialize.min.css" type="text/css" rel="stylesheet" media="screen,projection">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.6/js/materialize.min.js"></script> 
    <script src="js/jquery.materialize-autocomplete.js"></script>

<style>
    .autocomplete {
        display: -ms-flexbox;
        display: flex;
    }
    .autocomplete .ac-users {
        padding-top: 10px;
    }
    .autocomplete .ac-users .chip {
        -ms-flex: auto;
        flex: auto;
        margin-bottom: 10px;
        margin-right: 10px;
    }
    .autocomplete .ac-users .chip:last-child {
        margin-right: 5px;
    }
    .autocomplete .ac-dropdown .ac-hover {
        background: #eee;
    }
    .autocomplete .ac-input {
        -ms-flex: 1;
        flex: 1;
        min-width: 150px;
        padding-top: 0.6rem;
    }
    .autocomplete .ac-input input {
        height: 2.4rem;
    }
</style>

<?php
	
session_start();

include 'db.php';
include 'header.php';
include 'sidebar.php';

if(isset($_SESSION['login'])){
?>  	
	<section id="content">
        <div class="section">
            <div id="basic-form" class="section">
                <form method="POST" action="func-cadastrar-projeto.php" name="projeto" id="projeto">
                    <div id="projeto" class="col s12">
                        <div class="row">
                            <br>
                            <h5><Center>Cadastrar Projeto</center></h5>
                            <div class="input-field col s9 offset-s2">
                                <input id="nomeprojeto" type="text" required name="nomeprojeto">
                                <label for="nomeprojeto">Título</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s9 offset-s2">
                                <input id="descricaoprojeto" type="text" required name="descricaoprojeto"></textarea>
                                <label for="descricaoprojeto">Descrição</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s2 offset-s9">
                                <button class="black waves-light btn right" type="submit" name="cadastrar-projeto">Cadastrar</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>

<script id="adicionarcampo">
    $(function() {
        var scntDiv = $('#p_scents');
        var i = $('#p_scents p').size() + 1;
        
        $('#addScnt').live('click', function() {
                $('<div class="input-field col s9 offset-s2">\
									<select id="area" name="area">\
										<option value=""></option>\
										<option value="1">Engenheiro de arquitetura</option>\
 						 				<option value="2">Analiste de testes</option>\
  										<option value="3">Desenvolvedor</option>\
  										<option value="4">Designer web</option>\
  									</select>\
									<label>Area de atuação</label>\
								</div>\
                            </div><div class="input-field col s4 offset-s2"><input id="vagas" type="text"><label for="vagas">Quantidade de vagas</label></div>\
                                <div class="input-field col s5"> <input id="valor" type="text"><label for="valor">Valor/Hora</label></div>\
          <a href="#" class="remove">Remover</a>\
           </div>').appendTo(scntDiv);
                i++;
                return false;
        });
        
        $('#remScnt').live('click', function() { 
                if( i > 2 ) {
                        $(this).parents('p').remove();
                        i--;
                }
                return false;
        });
    });
        $('#idDiv').append(
            i++;
        }
    });
    
        $('#idDiv').on("click",".remove",function(e) {
        e.preventDefault();
        $(this).parent('div').remove();
        i--;
        });
    });

</script>


<script id="tags">

    $(function () {
        var single = $('#singleInput').materialize_autocomplete({
            multiple: {
                enable: false
            },
            dropdown: {
                el: '#singleDropdown',
                itemTemplate: '<li class="ac-item" data-id="<%= item.id %>" data-text=\'<%= item.text %>\'><a href="javascript:void(0)"><%= item.highlight %></a></li>'
            },
            onSelect: function (item) {
                console.log(item.text + ' was selected');
            }
        });

        var multiple = $('#multipleInput').materialize_autocomplete({
            multiple: {
                enable: true
            },
            appender: {
                el: '.ac-users'
            },
            dropdown: {
                el: '#multipleDropdown'
            }
        });

        var resultCache = {
            'P': [
                {
                    id: 'php',
                    text: 'php',
                },
                {
                    id: 'Python',
                    text: 'Python',    
                }
						],
						'J': [
                {
                    id: 'Java',
                    text: 'Java',
                }
                
						],
						
            'C': [
                {
                    id: 'C',
                    text: 'C',
                },
                {
                    id: 'C#',
                    text: 'C#',
                },
                {
                    id: 'C++',
                    text: 'C++',
                }
            ]
            
        };

        single.resultCache = resultCache;
        multiple.resultCache = resultCache;
    });

</script>
			
<?php
}else{	
	header('location:indevi/page-login.php');
}
?>