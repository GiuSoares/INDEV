<?php
	include 'db.php';
		$usuario = $_POST["nome"];
        $email = $_POST["email"];
    	$cpf = $_POST["cpf"];
        $senha = md5($_POST['senha']);

        $query = "SELECT * FROM usuarios WHERE email = '$email'";
        $query1 = "SELECT * FROM usuarios WHERE cpf ='$cpf'";

        $verifica = mysqli_query($conexao, $query);
        $verifica1 = mysqli_query($conexao, $query1);

        if(mysqli_num_rows($verifica) == 1){
            header('location:page-registrar.php?erro1');

        }elseif(mysqli_num_rows($verifica1) == 1){
            header('location:page-registrar.php?erro2');
        }else{

            $inseredados = mysqli_query( $conexao, "INSERT INTO usuarios (usuario,email,cpf,senha) VALUES ('$usuario','$email','$cpf','$senha')");
            echo "<script language=javascript>alert('Parabéns $usuario, Seu perfil foi criado com sucesso !');location.href = \"page-login.php\";</script>";
        }	

?>