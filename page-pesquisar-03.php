<title>Buscar - INDEV</title>
<?php
	session_start();
	if((isset($_SESSION['login']))){
		if(@$_POST['area']){
			include "db.php";
			include "header.php";
			include "sidebar.php";
			@$area = $_POST['area'];
			@$query = "SELECT idsubarea, area2 from subarea where idarea in (
    					select idarea from area where idarea='$area')";
			@$consulta = mysqli_query($conexao, $query);
			echo '<form name="subarea" method="post" action="page-resultado-pesquisa.php">';
	        	echo '<br><br><center><label>Selecione a subarea</label><br>';
				echo "<div class='input-field col s5 offset-s4'>";
					echo '<select name="subarea" class="input-field col s5 offset-s4">';
	    				while($prod = mysqli_fetch_array($consulta)) { 
    						// if ($prod['area2']==NULL){
    							// echo "<option value=".$prod['idsubarea'].">Toda a Categoria</option>";
    						// }else{
	    						echo "<option value=".$prod['idsubarea'].">".$prod['area2']."</option>";
							// }
						}
	 				echo "</select></center>";
					echo '<input type="submit" class="black waves-light btn right" name="submit-subarea">'; 
				echo "</div>";
			echo '</form>';

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


		}else{
			header('location:../indevi/page-pesquisar-01.php');
		}
	}else{
		header('location:../indevi/page-index.php');	
	}
	include "footer.php";
?>	