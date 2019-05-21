<?php
	include 'db.php';
		$nomeusuario = $_POST["nomeusuario"];
        $nomeprojeto = $_POST["nomeprojeto"];
        $descricaoprojeto = $_POST["descricaoprojeto"];
        $qtdvagas = $_POST["qtdvagas"];
        $valorprojeto = $_POST["valorprojeto"];
        $inseredados = mysqli_query( $conexao, "INSERT INTO projeto (idprojeto,nome,descricao,vagas,valor) VALUES ('1', '$nomeoportunidade','$descricaooportunidade','$qtdvagas','$valoroportunidade')");
        
?>