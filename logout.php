<?php 
	session_start();

	include 'functions.php';
	$res = new Users();
	
	session_destroy();	
	$SESSION = array(); /*re-initialize*/
	$res->userLogout();

	header("Location: login.php"); /*redirect to login page*/
	die();
?>