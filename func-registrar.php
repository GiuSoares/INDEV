<?php
	include 'db.php';
        $nome = $_POST["nome"];
        $cpf = $_POST["cpf"];
        $email = $_POST["email"];
        $senha = md5($_POST['senha']);
    	$telefone = $_POST["telefone"];

        $query = "SELECT * FROM usuario WHERE email = '$email'";
        $query1 = "SELECT * FROM usuario WHERE cpf ='$cpf'";

        $verifica = mysqli_query($conexao, $query);
        $verifica1 = mysqli_query($conexao, $query1);

        if(mysqli_num_rows($verifica) == 1){
            header('location:page-registrar.php?erro1');

        }elseif(mysqli_num_rows($verifica1) == 1){
            header('location:page-registrar.php?erro2');
        }else{

            $inseredados = mysqli_query( $conexao, "INSERT INTO usuario (nome,cpf,email,senha,telefone) VALUES ('$nome','$cpf','$email','$senha','$telefone')");
            echo "<script language=javascript>alert('Parabéns $nome, Seu perfil foi criado com sucesso !');location.href = \"page-login.php\";</script>";
        }	

?>