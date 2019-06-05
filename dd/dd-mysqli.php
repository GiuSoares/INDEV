<?php

	require 'db.php';
	@$area=$_GET['area'];
	$check="SELECT area2 from subarea where idarea='$area'";
	$query3=mysqli_query($conexao, $check); 
?>

	<!doctype html public "-//w3c//dtd html 3.2//en">
		<html>
			<SCRIPT language=JavaScript>
<!--
				function reload(form){
					var val=form.area.options[form.area.options.selectedIndex].value;
					self.location='dd-mysqli.php?area=' + val ;
				}
				function disableselect(){
					<?Php
					if (mysqli_num_rows($query3)!==0){
						echo "document.f1.subarea.disabled = false;";
					}else{
						echo "document.f1.subarea.disabled = true";
					}
?>
				}
			</script>

		<body onload=disableselect();>

<?Php
		$query2="SELECT DISTINCT area,idarea FROM area order by area"; 
		echo "<form method=post name=f1 action='dd-check.php'>";
			echo "<select name='area' onchange=\"reload(this.form)\"><option value=''>Selecione</option>";
				if($stmt = $conexao->query("$query2")){
					while ($row2 = $stmt->fetch_assoc()) {
						if($row2['idarea']==@$area){echo "<option selected value='$row2[idarea]'>$row2[area]</option>";
						}else{
							echo  "<option value='$row2[idarea]'>$row2[area]</option>";
						}

				  	}
				}else{
				echo $conexao->error;
				}
			echo "</select>";
			echo "<select name='subarea'><option value=''>Selecione</option>";
				if(isset($area) and strlen($area) > 0){
					if($stmt = $conexao->prepare("SELECT DISTINCT area2, idsubarea FROM subarea where idarea=? order by area2")){
						$stmt->bind_param('i',$area);
						$stmt->execute();
				 		$result = $stmt->get_result();
				 		while ($row1 = $result->fetch_assoc()) {
				  			echo  "<option value='$row1[idsubarea]'>$row1[area2]</option>";
						}
					}else{
					 echo $conexao->error;
					} 
				}else{
					$query="SELECT DISTINCT area2, idsubarea FROM subarea order by area2"; 
					if($stmt = $conexao->query("$query")){
						while ($row1 = $stmt->fetch_assoc()) {	
							echo  "<option value='$row1[idsubarea]'>$row1[area2]</option>";
		  				}
					}else{
						echo $conexao->error;
					}
				} 
			echo "</select>";
		echo "<input type=submit value='Submit'>";
		echo "</form>";
?>
