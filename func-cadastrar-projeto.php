<?php
	include 'db.php';
		$nomeusuario = $_POST["nomeusuario"];
        $nomeoportunidade = $_POST["nomeoportunidade"];
        $descricaooportunidade = $_POST["descricaooportunidade"];
        $qtdvagas = $_POST["qtdvagas"];
        $valoroportunidade = $_POST["valoroportunidade"];
        $inseredados = mysqli_query( $conexao, "INSERT INTO oportunidade (idprojeto,nome,descricao,vagas,valor) VALUES ('1', '$nomeoportunidade','$descricaooportunidade','$qtdvagas','$valoroportunidade')");
        
?>