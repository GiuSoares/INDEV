 <title>Resultado da busca - INDEV</title>
<?php
	session_start();
	include 'db.php';
	include 'header.php';
	include 'sidebar.php';
	if((isset($_SESSION['login']))){
		if(@$_POST['subarea']){
			$busca=$_SESSION['tipo-de-busca'];
			$subarea=@$_POST['subarea'];
			echo "<center><h4>Resultados</h4></center>";
			if($busca=="prestador"){
				$buscaprestador = "SELECT * FROM prestador where idsubarea='$subarea'";
				$queryp=mysqli_query($conexao, $buscaprestador);
				if (mysqli_num_rows($queryp)>0){
					while($dados = mysqli_fetch_array($queryp)){
?>			
						<div style="margin-left:250px">
							<table style="width:80%">
								<thead>
									<tr>
										<th><?php echo $dados['nome']?></th>
										<th></th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td><?php echo $dados['descricao']?></td>
									</tr>
									<tr>
										<td>Criado em: <?php echo $dados['data_cadastro']?></td>
										<td><button> <a href="page-editar-projeto.php?codigoprojeto=<?=$dados['idprojeto']?>">Editar Projeto</button></a>
										<button> <a href="page-cadastrar-oportunidade.php?codigoprojeto=<?=$dados['idprojeto']?>">Cadastrar Oportunidade</button></a></td>
									</tr>
								</tbody>
							</table>
							<div class="divider" style="width:80%"></div>
						</div>
<?php

					}
				}else{
					echo "Sua busca não retornou nenhum registro.";
				}
			}else if ($busca=='oportunidade'){
				$buscaoportunidade = "SELECT * FROM oportunidade where idsubarea='$subarea'";
				$queryo=mysqli_query($conexao, $buscaoportunidade);
				if (mysqli_num_rows($queryo)>0){
					while($dados = mysqli_fetch_array($queryo)){
?>			
						<div style="margin-left:250px">
							<table style="width:80%">
								<thead>
									<tr>
										<th><?php echo $dados['nome']?></th>
										<th></th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td><?php echo $dados['descricao']?></td>
									</tr>
									<tr>
										<td>Criado em: <?php echo $dados['data_cadastro']?></td>
										<td><button> <a href="page-editar-projeto.php?codigoprojeto=<?=$dados['idprojeto']?>">Editar Projeto</button></a>
										<button> <a href="page-cadastrar-oportunidade.php?codigoprojeto=<?=$dados['idprojeto']?>">Cadastrar Oportunidade</button></a></td>
									</tr>
								</tbody>
							</table>
							<div class="divider" style="width:80%"></div>
						</div>
<?php
					}
				}else{
					echo "Sua busca não retornou nenhum registro.";
				}
			}
		// }else{
		// 	header('location:../indevi/page-pesquisar-01.php');
		}
	}else{
		header('location:../indevi/page-index.php');
	}
	include 'footer.php';
?>
