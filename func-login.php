<?php 

include 'db.php';

$email = addslashes($_POST['email']);
$senha = md5($_POST['senha']);

$query = "SELECT * FROM usuarios WHERE email = '$email' and senha = '$senha'";

$consulta = mysqli_query($conexao, $query);

if(mysqli_num_rows($consulta) == 1){

	session_start();
	$_SESSION['login'] = true;
	$_SESSION['email'] = $email;

	header('location:page-index.php');
}
else{
	header('location:page-login.php?erro');
}