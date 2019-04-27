<?php

session_start();

include 'db.php';
include 'header.php';

if(isset($_SESSION['login'])){
	
}
else{
	
	header('location:page-login.php');
}

include 'footer.php';
?>