<title>Buscar - INDEV</title>
<?php
	session_start();
	include 'db.php';
	include 'header.php';
	if(isset($_SESSION['login'])){
		include 'sidebar.php';
?>
		<section id="content">
			<div class="section">
				<div class="row">
					<form class="col s12" action="page-pesquisar-02.php" method="POST" name="tipo-de-busca">
						<div class="row">
							<center>
						    	<select class="col s4 offset-s3" name="tipo">
						      		<option value="" disabled selected>Selecione</option>
						      		<option value="prestador">Prestador</option>
						      		<option value="oportunidade">Oportunidade</option>
								</select>
								<input type="submit" class="black waves-light btn right" name="tipo-de-busca">
							</center>
						</div>
					</form>
				</div>
			</div>
		</section>
<?php
	}else{
		header('location:../indevi/page-index.php');
	}
	include "footer.php";
?>