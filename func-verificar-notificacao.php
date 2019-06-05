<?php
	include "db.php";
	$id = $_SESSION['idusuario'];
	$notifica = mysqli_query($conexao, "SELECT * from notificacao where idusuario='$id'");
	$linhas=mysqli_num_rows($notifica);
	if($linhas>0){
		echo "Você possui uma nova notificação! Visualizar";
	}
?>