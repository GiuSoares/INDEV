<?php
	include "db.php";
	$idusuario = $_GET['idusuario'];
	echo $idususario;
	

	$dados=mysqli_query($conexao, "delete from usuario where idusuario='$idusuario'");
if($dados){
	session_start();

session_unset();
session_destroy();
header('location:page-login.php');
	
}else{
		echo $idusuario;
		
Exit("Ocorreu um erro ao tentar inserir o produto");
}
?>