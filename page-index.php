
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
			<form class="col s12">
				<div class="row">
				<br>
                	<div class="input-field col s8 offset-s2">
						<input id="nome" name="nome" type="text">
						<label for="nome" class="center-align">Projeto,tags...</label>
                	</div>
                	<button type="submit" class="waves-effect waves-light btn black" style="margin-top: 1%; name="pesquisar" value="submit">Pesquisar</button>
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

					
		<div class="divider"></div>

		<div class="section">
			<h5>
			Resultado(s) encontrado(s): valor.
			</h5>
		</div>
			<div id="row-grouping" >
				<div class="col s12">
					<ul id="resultados" class="repo-list" cellspacing="0" width="100%">
					<li class="repo-list pt-4 border">
						<div class="col-12 col-md-8 pr-md-3">
						<a href="#"><h5>
								Projeto Integrado
							</h5></a>
							<p class="col-12 col-md-9 d-inline-block text-gray mb-2 pr-4">
								Vestibulum luctus ut mauris ut ultrices. Etiam euismod eget nulla eu auctor. Maecenas blandit maximus ornare. Mauris quis placerat tortor, id egestas sapien. Aenean volutpat ipsum vitae ullamcorper commodo. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc facilisis risus neque, sed fermentum orci sagittis fringilla. Curabitur efficitur ullamcorper lacus at fringilla. Quisque arcu erat, condimentum in magna sollicitudin, lacinia egestas ligula.
							</p>
							<div class="d-flex flex-wrap ">
								<p class="f6 text-gray mr-3 mb-0 mt-2">
								Publicado <relative-time datetime="2019-05-02T18:57:50Z" title="2 de mai de 2019 15:57 BRT">08/05/2019.</relative-time>
								</p>
							</div>
						</div>
					</li>
					<li class="repo-list pt-4 border-bot">
						<div class="col-12 col-md-8 pr-md-3">
							<a href="#"><h5>
								Arquitetura de Software
							</h5></a>
							<p class="col-12 col-md-9 d-inline-block text-gray mb-2 pr-4">
								Ut non velit metus. In maximus lobortis elit accumsan gravida. Mauris tincidunt felis tempor, convallis neque id, pulvinar sapien. Aliquam at est sit amet erat vehicula porttitor. Proin et ligula eu ligula sollicitudin sodales sed fermentum mauris. Praesent posuere ullamcorper mauris quis aliquam. Donec hendrerit orci erat, at elementum nisi porttitor id. Donec sagittis id nisl fringilla mattis. Nam commodo interdum ex. Ut tempor finibus dui.
							</p>
							<div class="d-flex flex-wrap">
								<p class="f6 text-gray mr-3 mb-0 mt-2">
								Publicado <relative-time datetime="2019-05-02T18:57:50Z" title="2 de mai de 2019 15:57 BRT">07/05/2019.</relative-time>
								</p>
							</div>
						</div>
					</li>				
        		</div>
			</div>
		</div>
	</div>
</section>
<?php
}
else{
	
	header('location:page-login.php');
}

include 'footer.php';
?>