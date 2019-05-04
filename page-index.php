<?php

session_start();

include 'db.php';
include 'header.php';
include 'sidebar.php';

if(isset($_SESSION['login'])){
?>
<!--
	<div class="col s12 m12 l6">
	<div class="card-panel">
	  <div class="header2">
	  <div class="row">
		<form class="col s12">
		  <div class="row">
			<div class="input-field col s12">
			  <input placeholder="John Doe" id="name2" type="text">
			  <label for="first_name">Name</label>
			</div>
		  </div>
		  <div class="row">
			<div class="input-field col s12">
			  <input placeholder="john@domainname.com" id="email2" type="email">
			  <label for="email">Email</label>
			</div>
		  </div>
		  <div class="row">
			<div class="input-field col s12">
			  <input placeholder="YourPassword" id="password2" type="password">
			  <label for="password">Password</label>
			</div>
		  </div>
		  <div class="row">
			<div class="input-field col s12">
			  <textarea placeholder="Oh WoW! Let me check this one too." id="message2" class="materialize-textarea"></textarea>
			  <label for="message">Message</label>
			</div>
			<div class="row">
			  <div class="input-field col s12">
				<button class="btn cyan waves-effect waves-light right" type="submit" name="action">Submit
				  <i class="mdi-content-send right"></i>
				</button>
			  </div>
			</div>
		  </div>
		</form>
	  </div>
	</div>
  </div>
  </div>
</div>
</div>
-->
<?php
}
else{
	
	header('location:page-login.php');
}

include 'footer.php';
?>