<?php 
	
	session_start();

	include dirname(__FILE__) . '/../functions.php';
	$res = new Users();
	
	session_destroy();	
	$SESSION = array(); /*re-initialize*/
	$res->userLogout();

	header("Location: ../login.php"); /*redirect to login page*/
	die();

?>