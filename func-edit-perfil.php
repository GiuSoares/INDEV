<?php
session_start();

include 'db.php';
$ID = $_SESSION['idusuario'];

if($ID){
    $nome = $_POST['nome'];
    $cpf = $_POST['cpf'];		
    $email = $_POST['email'];
    $telefone = $_POST['telefone'];
    $insert = "UPDATE usuario SET nome='$nome',cpf='$cpf',email='$email',telefone='$telefone' where idusuario = $ID";

    if ($conexao->query($insert) === TRUE){
        
        echo "Não foi possivel ALTERAR os dados, devido ao erro: ";
    }else{
        include ("header.php");
        echo "Não foi possivel ALTERAR os dados, devido ao erro: " . $conexao->error;
        include ("sidebar.php");
        include ("footer.php");
    }
}

?>