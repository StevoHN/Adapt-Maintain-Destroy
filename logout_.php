<?php

	session_start();
	$_SESSION['current_user'] = "null_user";
	$_SESSION['current_account'] = "null_user";
	$_SESSION['permission_level'] = 0;
	$_SESSION['active'] = false;
	
	header('location:index.php');
	exit;
	
?>