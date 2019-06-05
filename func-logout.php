<?php

session_start();

session_unset();
session_destroy();

header("location: ../indevi/page-login.php");
exit;
?>