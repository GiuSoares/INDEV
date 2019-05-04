<?php 

include 'db.php';

$email = addslashes($_POST['email']);
$senha = md5($_POST['senha']);


$query = "SELECT * FROM usuario WHERE email = '$email' and senha = '$senha'";

$consulta = mysqli_query($conexao, $query);
 
if(mysqli_num_rows($consulta) == 1){
	while(@$dados = mysqli_fetch_array(@$consulta)){
		@$usuario=@$dados['usuario'];
	}
	session_start();
	$_SESSION['login'] = true;
	$_SESSION['email'] = $email;
	$_SESSION['usuario'] = $usuario;


	header('location:page-index.php');
}
else{
	header('location:page-login.php?erro');
}