 <title>Meus Projetos - INDEV</title>
<?php
	session_start();
	include 'db.php';
	include 'header.php';
	include 'sidebar.php';
	$usuario=$_SESSION['idusuario'];
	$verificaprojeto="SELECT * from projeto where idusuario='$usuario'";
	$query=mysqli_query($conexao, $verificaprojeto);
	if (mysqli_num_rows($query)>0){
?> 		
		<center><h4>Meus Projetos</h4></center>
<?php
		while($dados = mysqli_fetch_array($query)){
			@$idprojeto=$dados['idprojeto'];
?>			
			<div style="margin-left:25%">
				<table style="width:80%">
					<thead>
						<tr>
							<th>Projeto: <?php echo $dados['nome']?></th>
							<th></th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td>Descrição: <?php echo $dados['descricao']?></td>
						</tr>
						<tr>
							<td>Criado em: <?php echo $dados['data_cadastro']?></td>
						</tr>
						<tr>
						<td>
							<center>
								<!--<button> <a  href="page-editar-projeto.php?codigoprojeto=<?=$dados['idprojeto']?>">Editar Projeto</button> -->
								<button> <a  href="page-cadastrar-oportunidade.php?codigoprojeto=<?=$dados['idprojeto']?>">Cadastrar Oportunidade</button>
							<center>
						</td>
						</tr>
					</tbody>
				</table>
				<div class="divider" style="width:80%"></div>
				<div >
<?php 				
					$verificaoportunidade="SELECT * from oportunidade where idprojeto='$idprojeto'";
					$query2=mysqli_query($conexao, $verificaoportunidade);
					if (mysqli_num_rows($query2)>0){
?>						
						<br><h5 style="margin-left: 25%">Oportunidades <?php echo $dados['nome']?></h5><br>
 						<table style="width: 80%">
 							<thead>
 								<tr>
 									<th>Nome</th>
	 								<th>Descrição</th>
	 								<th>Vagas</th>
	 								<th>Data</th>
	 								<th>Valor</th>
	 							</tr>
	 						</thead>
	 						<tbody>
<?php 							
								while($dados2 = mysqli_fetch_array($query2)){
?>		 							
									<tr>
		 								<td><?php echo $dados2['nome']?></td>
		 								<td><?php echo $dados2['descricao']?></td>
		 								<td><?php echo $dados2['vagas']?></td>
		 								<td><?php echo $dados2['data_cadastro']?></td>
		 								<td><?php echo $dados2['valor']?></td>
		 							</tr>
<?php 							
								}
?>	 						
							</tbody>
						</table>	
								
<?php				
					}else{
?>						
						<br><h5>Não existem oportunidades cadastradas para o projeto <?php echo $dados['nome']?></h5>
<?php					
					}	
?>				
				</div>
			<div class="divider" style="width:80%"></div>
			<br><br>
			</div>
<?php	
		}	
	}else{
?>
	<h5><Center>Você ainda não possui nenhum projeto... Que tal criar um agora mesmo?</Center></h5>
<?php	
	}
	include 'footer.php';
?>
