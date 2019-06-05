<?php
	include "db.php";
	@$query = "SELECT idarea, area FROM area order by area";
	@$consulta = mysqli_query($conexao, $query);
	echo '<form name="area" method="post" action="page-pesquisar-03.php">';
        	echo '<br><br><br><br><center><label>Selecione a área</label><br>';
			echo '<select name="teste">';
	    	while($prod = mysqli_fetch_array($consulta)) { 
	    		echo "<option value=".$prod['idarea'].">".$prod['area']."</option>";
			}
	 		echo "</select></center>";
			echo '<input type="submit" class="black waves-light btn right" name="area">'; 
		echo '</form>';