<?php
session_start();

include 'db.php';
$ID = $_SESSION['idusuario'];

if($ID){
    $idusuario = $_POST['idusuario'];
    $nome = $_POST['nome'];
    $telefone = $_POST['telefone'];
    $insert = "UPDATE usuario SET nome='$nome',telefone='$telefone' where idusuario = $idusuario";

    if ($conexao->query($insert) === TRUE){
        echo "Dados alterados com sucesso!";
        header ("Location: page-index.php");
        $_SESSION['nome']=$nome;
    }else{
        include ("header.php");
        echo "Não foi possivel ALTERAR os dados, devido ao erro: " . $conexao->error;
        include ("sidebar.php");
        include ("footer.php");
    }
}

?>