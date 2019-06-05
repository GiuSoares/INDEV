<?php
	session_start();
	include 'db.php';
	
	
	if($_POST['cadastrar-oportunidade']){
		$nomeoportunidade = @$_POST["nomeoportunidade"];
    	$descricaooportunidade = @$_POST["descricaooportunidade"];
    	$idprojeto=$_POST['idprojeto'];
    	$subarea=$_POST['subarea'];
    	$vagas=$_POST['qtdvagas'];
    	$valor=$_POST['valor'];
    	$cadastraroportunidade = "INSERT INTO oportunidade (idprojeto, idsubarea, nome, descricao, vagas, valor) VALUES ('$idprojeto', '$subarea', '$nomeoportunidade', '$descricaooportunidade', '$vagas', '$valor')";
	    if ($conexao->query($cadastraroportunidade) === TRUE){
	        echo "<script language=javascript>alert('Parabéns $usuario, Sua oportunidade foi criado com sucesso!');location.href = \"page-listar-projetos.php\";</script>";
	    }else{
			include 'header.php';
			include ("sidebar.php");
			echo "<div style='margin-left:25%'>";
	        echo "Não foi possivel cadastrar a oportunidade, devido ao erro: " . $conexao->error;echo"<br>";	
	        echo "idprojeto: ".$idprojeto;echo"<br>";
	        echo "subarea: ".$subarea;echo"<br>";
	        echo "Titulo: ".$nomeoportunidade;echo"<br>";
	        echo "Descrição: ".$descricaooportunidade;echo"<br>";
	        echo "Vagas: ".$vagas;echo"<br>";
			echo "Valor: ".$valor;echo"<br>";
			
			include ("footer.php");
			echo "</div>";

	    }
	}else{
		header('location:../indevi/page-index.php');
	}
?>