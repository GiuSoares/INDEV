<?php
	session_start();
	include 'db.php';
	include 'header.php';
		$nomeprojeto = @$_POST["nomeprojeto"];
    	$descricaoprojeto = @$_POST["descricaoprojeto"];
    	$idusuario=$_SESSION['idusuario'];
    	$usuario=$_SESSION['nome'];
    	$cadastrarprojeto = "INSERT INTO projeto (idusuario, nome, descricao) VALUES ('$idusuario', '$nomeprojeto', '$descricaoprojeto')";
	    if ($conexao->query($cadastrarprojeto) === TRUE){
	        echo "<script language=javascript>alert('Parabéns $usuario, Seu projeto foi criado com sucesso!');location.href = \"page-listar-projetos.php\";</script>";
	    }else{
	        include ("header.php");
	        echo "Não foi possivel cadastrar o projeto, devido ao erro: " . $conexao->error;
	        include ("sidebar.php");
	        include ("footer.php");
	    }
?>