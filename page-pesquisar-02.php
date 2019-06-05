<title>Buscar - INDEV</title>
<?php
	session_start();
	if((isset($_SESSION['login']))){
		if(@$_POST['tipo']){
			$_SESSION['tipo-de-busca'] = $_POST['tipo'];
			include "db.php";
			include "header.php";
			// include "sidebar.php";
			@$query = "SELECT idarea, area FROM area order by area";
			@$consulta = mysqli_query($conexao, $query);
			echo '<form name="area" method="post" action="page-pesquisar-03.php">';
	        	echo '<br><br><center><label>Selecione a área</label><br>';
				echo "<div class='input-field col s5 offset-s4'>";
					echo '<select name="area" class="input-field col s5 offset-s4">';
	    				while($prod = mysqli_fetch_array($consulta)) { 
	    					echo "<option value=".$prod['idarea'].">".$prod['area']."</option>";
						}
	 				echo "</select></center>";

	//  echo "<div class='input-field col s9 offset-s2'>";
	// 			echo "<select name='teste'><option value=''>Selecione</option>";
	//                                                 if($stmt = $conexao->query("$query")){
	//                                                     while ($row2 = $stmt->fetch_assoc()) {
	//                                                         if($row2['idarea']==@$area){
	//                                                             echo "<option selected value='$row2[idarea]'>$row2[area]</option>";
	//                                                         }else{
	//                                                             echo  "<option value='$row2[idarea]'>$row2[area]</option>";
	//                                                         }

	//                                                     }
	//                                                 }else{
	//                                                 echo $conexao->error;
	//                                                 }

	//                                             echo "</select>";
	// echo "</div>";



					echo '<input type="submit" class="black waves-light btn right" name="submit-area">'; 
				echo '</form>';
			echo "</div>";
		}else{
			header('location:../indevi/page-pesquisar-01.php');
		}
	}else{
		header('location:../indevi/page-index.php');
	}
	include "footer.php";
?>	