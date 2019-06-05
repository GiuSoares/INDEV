<title>Pagina Inicial - INDEV</title>
<?php
	session_start();
	include 'db.php';
	include 'header.php';
	@$area=$_GET['area'];
	@$tipo=$_GET['tipo-de-busca'];    
	@$check="SELECT area2 from subarea where idarea='$area'";
	$query3=mysqli_query($conexao, $check); 
?>
<!doctype html public "-//w3c//dtd html 3.2//en">
<html>
<!-- Links comentados 
    <link href="css/materialize.min.css" type="text/css" rel="stylesheet" media="screen,projection">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.6/js/materialize.min.js"></script> 
    <script src="js/jquery.materialize-autocomplete.js"></script>
    <script type="text/javascript" src="js/materialize.min.js"></script>
    <script type="text/javascript" src="js/plugins.js"></script>
	-->  
<script language="JavaScript">
	function reload(form){
		var val=form.area.options[form.area.options.selectedIndex].value;
		self.location='page-index.php?area=' + val ;
	}
	function disableselect(){
		<?php
		if (mysqli_num_rows($query3)!==0){
			echo "document.f1.subarea.disabled = false;";
		}else{
			echo "document.f1.subarea.disabled = true";
		}
		?>
	}
</script>
    <body onload=disableselect();>
		<?php
		if(isset($_SESSION['login'])){
			include 'sidebar.php';
		?>

<section id="content">
	<div class="section">
		<div class="row">
			<?php 			
			include "func-verificar-notificacao.php";
			?>
			<form class="col s12" action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST">
				<div class="row">
					<?php
					if ($tipo==1){
					?>
						<p><center>Tipo de Pesquisa:
							<?echo $tipo;?><br>
							<input type="radio" class="filled-in" id="prestador" name="tipo-de-busca" value="1" checked>
							<label for="prestador">Prestador</label>
							<input type="radio" class="filled-in" id="oportunidade" name="tipo-de-busca" value="2">
							<label for="oportunidade">Oportunidade</label>
						</p></center>
					<?php
					}else if ($tipo==2){
					?>
						<p><center>Tipo de Pesquisa:
							<?echo $tipo;?><br>
							<input type="radio" class="filled-in" id="prestador" name="tipo-de-busca" value="1">
							<label for="prestador">Prestador</label>
							<input type="radio" class="filled-in" id="oportunidade" name="tipo-de-busca" value="2" checked>
							<label for="oportunidade">Oportunidade</label>
						</p></center>
					<?php
					}else{
					?>
						<p><center>Tipo de Pesquisa:
							<?echo $tipo;?><br>
							<input type="radio" class="filled-in" id="prestador" name="tipo-de-busca" value="1">
							<label for="prestador">Prestador</label>
							<input type="radio" class="filled-in" id="oportunidade" name="tipo-de-busca" value="2">
							<label for="oportunidade">Oportunidade</label>
						</p></center>
					<?php
					}      
					@$query2="SELECT DISTINCT area,idarea FROM area order by area";
					echo "<div class='input-field col s9 offset-s2'>";
						echo "<select name='area' onchange=\"reload(this.form)\"><option value=''>Selecione</option>";
							if($stmt = $conexao->query("$query2")){
								while ($row2 = $stmt->fetch_assoc()) {
									if($row2['idarea']==@$area){
										echo "<option selected value='$row2[idarea]'>$row2[area]</option>";
									}else{
										echo  "<option value='$row2[idarea]'>$row2[area]</option>";
									}
								}
							}else{
								echo $conexao->error;
							}
						echo "</select>";
						if(mysqli_num_rows(@$query3)!==0){
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
						?> 
								
						<?php
						}
						?>			
						<button type="submit" class="waves-effect waves-light btn black" style="margin-top: 1%;" name="pesquisar" value="submit">Pesquisar</button>
					</div>
				</div>   
			</form>
		</div>
		<?php	
			if (isset($_POST['pesquisar'])) {		
				$oportunidade=@$_POST['nome'];
				$result = mysqli_query($conexao,"SELECT * FROM oportunidade WHERE nome like '%$oportunidade%'");	
		?>
		<div class="col s7 offset-s5">
			<h5>
			Resultado(s) encontrado(s): valor.
			</h5>
		</div>
		<div id="row">	
			<?php
			while($dados = mysqli_fetch_array($result)){
			?>	
			<ul id="resultados" class="repo-list" cellspacing="0" width="100%">
				<li class="repo-list pt-4 border">
					<div>
						<div><h5>
							<?php echo $dados['nome']?>
						</h5></div>
						<p >
							<?php echo $dados['descricao']?>
						</p>
						<div>
							<p>
								<?php echo $dados['area']?>, <?php echo $dados['area2']?>, <?php echo $dados['area3']?>
							</p>
								<button class="waves-effect waves-light btn blue"  name="inscrever">Inscrever-se</button>
						</div>
							<div>
								<p >
									Publicado <relative-time datetime="2019-12-31T23:59:59-02:00" ><?php echo $dados['data_cadastro']?></relative-time>
								</p>
							</div>
					</div>
				</li>
			</ul>		
		</div>
	</div>
		<?php  
		}
		}
		?>
</section>

<?php
}
else{
header('location:../indevi/page-login.php');
}

include 'footer.php';
?>