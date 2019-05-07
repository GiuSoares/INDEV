<?php 

include 'db.php';

$email = addslashes($_POST['email']);
$senha = md5($_POST['senha']);


$query = "SELECT * FROM usuario WHERE email = '$email' and senha = '$senha'";

$consulta = mysqli_query($conexao, $query);
 
if(mysqli_num_rows($consulta) == 1){
	while($dados = mysqli_fetch_array($consulta)){
		$usuario=$dados['nome'];
		$cpf=$dados['cpf'];
		$saldo=$dados['saldo'];
		$telefone=$dados['telefone'];
		$id=$dados['idusuario'];
	}

	session_start();
	$_SESSION['login'] = true;
	$_SESSION['email'] = $email;
	$_SESSION['nome'] = $usuario;
	$_SESSION['cpf'] = $cpf;
	$_SESSION['saldo'] = $saldo;
	$_SESSION['telefone'] = $telefone;
	$_SESSION['idusuario'] = $id;


	header('location:page-index.php');
}
else{
	header('location:page-login.php?erro');
}