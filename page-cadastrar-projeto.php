<?php
	session_start();
    include "header.php";
    include "sidebar.php";
?>

	<html>
		<h5><Center>Cadastrar Projeto</center></h5>
            <form class="col s8" method="POST" action="func-cadastrar-oportunidade.php">
                <div class="row">
					<div class="input-field col s6 offset-s3">
						<input id="nomeoportunidade" type="text">
                        <label for="nomeoportunidade">Nome da Oportunidade</label>
                    </div>
					<input id="nomeusuario" type="hidden" value="<?$_SESSION['idusuario'];?>">
                </div>
				<div class="row">
				  <div class="input-field col s6 offset-s3">
					<input id="descricaooportunidade" type="text">
					<label for="descricaooportunidade">Descrição</label>
				  </div>
				</div>
				<div class="row">
					<div class="input-field col s2 offset-s3">
						<input id="qtdvagas" type="text">
						<label for="qtdvagas">Vagas</label>
					</div>
					<div class="input-field col s2">
						<input id="valoroportunidade" type="text">
						<label for="valoroportunidade">Valor (Opcional)</label>
					</div>
					<button type="submit" class=" waves-light btn"><i class="mdi-maps-rate-review left"></i>Cadastrar</button>
				</div>
			</form>

 <?php
	include"footer.php"
?>