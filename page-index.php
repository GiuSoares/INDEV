
  <title>Pagina principal</title>
<?php

session_start();

include 'db.php';
include 'header.php';
include 'sidebar.php';

if(isset($_SESSION['login'])){
?>


<section id="content">
	<div class="section">
		<div class="row">
			<form class="col s12" action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST">
				<div class="row">
				<br>
                	<div class="input-field col s8 offset-s2">
						<input id="nome" name="nome" type="text">
						<label for="nome" class="center-align">Projeto,tags...</label>
                	</div>
                	<button type="submit" class="waves-effect waves-light btn black" style="margin-top: 1%;" name="pesquisar" value="submit">Pesquisar</button>
              	</div>   
            </form>
		</div>

		<div id="input-checkboxes" class="section">
			<div class="row">
				<div class="col s12">
					<form action="#">
						<p>
							<input type="checkbox" class="filled-in" id="1" >
							<label for="1">JavaScript</label>
							
							<input type="checkbox" class="filled-in" id="2" >
							<label for="2">Python</label>
						</p>
						<p>
							<input type="checkbox" class="filled-in" id="3" >
							<label for="3">HTML/CSS</label>
							
							<input type="checkbox" class="filled-in" id="4" >
							<label for="4">Perl</label>
						</p>
					</form>	
		
		<div class="divider"></div>
		<?php	
				if (isset($_POST['pesquisar'])) {		
					$oportunidade=$_POST['nome'];
					$result = mysqli_query($conexao,"SELECT * FROM oportunidade WHERE nome like '%$oportunidade%'");	
			?>
		<div class="section">
			<h5>
			Resultado(s) encontrado(s): valor.
			</h5>
		</div>
		
			<div id="row-grouping" >
			
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
	</div>
</section>
<?php
}
else{
	
	header('location:../INDEV/func-logout.php');
}

include 'footer.php';
?>