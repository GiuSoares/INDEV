<title>Cadastrar Oportunidade - INDEV</title>
<?php
session_start();
include 'db.php';
include 'header.php';
include 'sidebar.php';
@$idprojeto=$_GET['codigoprojeto'];
@$area=$_GET['area'];   
$check="SELECT area2 from subarea where idarea='$area'";
$query3=mysqli_query($conexao, $check); 
?>
<!doctype html public "-//w3c//dtd html 3.2//en">
<html>
    <title>Cadastrar Projeto</title>
    <link href="css/materialize.min.css" type="text/css" rel="stylesheet" media="screen,projection">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.6/js/materialize.min.js"></script> 
    <script src="js/jquery.materialize-autocomplete.js"></script>
    <script type="text/javascript" src="js/materialize.min.js"></script>
    <script type="text/javascript" src="js/plugins.js"></script>
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
    <SCRIPT language=JavaScript>
        function reload(form){
            var val=form.area.options[form.area.options.selectedIndex].value;
            self.location='page-cadastrar-oportunidade.php?area=' + val ;
        }
        function disableselect(){
<?Php
            if (mysqli_num_rows($query3)!==0){
                echo "document.f1.subarea.disabled = false;";
            }else{
                echo "document.f1.subarea.disabled = true";
            }
?>
        }
    </script>
    <body onload=disableselect();>
<?php
    if(isset($_SESSION['login'])){
    ?>  	
    	<section id="content">
            <div class="section">
                <div id="basic-form" class="section">
                    <form method="POST" action="func-cadastrar-oportunidade.php" name="projeto" id="projeto">
                        <div id="projeto" class="col s12">
                            <div class="row">
                                <br>
                                <h5><Center>Cadastrar Oportunidade</center></h5>
                                <div class="input-field col s9 offset-s2">
                                    <input id="nomeoportunidade" type="text" name="nomeoportunidade">
                                    <label for="nomeoportunidade">Título</label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="input-field col s9 offset-s2">
                                    <input id="descricaooportunidade" type="text" name="descricaooportunidade">
                                    <label for="descricaooportunidade">Descrição</label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="input-field col s9 offset-s2">
                                    <input id="idprojeto" type="text" name="idprojeto" value="<?=$idprojeto?>">
                                </div>
                            </div>
                            <div class="row">
                                <?php
                                
                                    $query2="SELECT DISTINCT area,idarea FROM area order by area";
                                        echo "<div class='input-field col s9 offset-s2'>";
                                        
                                            echo "<select name='area' onchange=\"reload(this.form)\"><option value=''>Selecione</option>";
                                                        if($stmt = $conexao->query("$query2")){
                                                            while ($row2 = $stmt->fetch_assoc()) {
                                                                if($row2['idarea']==@$area){
                                                                    echo "<option selected value='$row2[idarea]'>$row2[area]</option>";
                                                                }else{
                                                                    echo  "<option value='$row2[idarea]'>$row2[area]</option>";
                                                                }

                                                            }
                                                        }else{
                                                        echo $conexao->error;
                                                        }
                                                    
                                                    echo "</select>";
                                                    echo "<label>Area de atuação</label>";
                                ?>                      
                            </div>
                            <?php
                            if(mysqli_num_rows(@$query3)!==0){
                            ?>
                            <br>
                            <div class="row">
                                <?php
                                echo "<div class='input-field col s9 offset-s2'>";
                                    echo "<select name='subarea'><option value=''>Selecione</option>";
                                    if(isset($area) and strlen($area) > 0){
                                        if($stmt = $conexao->prepare("SELECT DISTINCT area2, idsubarea FROM subarea where idarea=? order by area2")){
                                            $stmt->bind_param('i',$area);
                                            $stmt->execute();
                                            $result = $stmt->get_result();
                                            while ($row1 = $result->fetch_assoc()) {
                                                echo  "<option value='$row1[idsubarea]'>$row1[area2]</option>";
                                            }
                                        }else{
                                            echo $conexao->error;
                                        } 
                                    }else{
                                        $query="SELECT DISTINCT area2, idsubarea FROM subarea order by area2"; 
                                        if($stmt = $conexao->query("$query")){
                                            while ($row1 = $stmt->fetch_assoc()) {  
                                                echo  "<option value='$row1[idsubarea]'>$row1[area2]</option>";
                                            }
                                        }else{
                                            echo $conexao->error;
                                        }
                                    }
                                    echo "</select>";
                                    echo "<label>Sub-area de atuação</label>";
                                ?> 
                                </div>
<?php                               }  
?>
                                <div class="row">
                                    <div class="input-field col s3 offset-s2">
                                        <input id="qtdvagas" type="text" name="qtdvagas">
                                        <label for="qtdvagas">Vagas</label>
                                    </div>
                                    <div class="input-field col s4">
                                        <input id="valor" type="text" name="valor">
                                        <label for="valor">Valor</label>
                                    </div>
                                    <div class="input-field col s2">
                                        <input type="submit" class="black waves-light btn right" name="cadastrar-oportunidade">
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section><?php 
}
?>
</html>
