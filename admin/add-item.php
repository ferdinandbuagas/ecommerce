<?php 
	
	session_start();

	include dirname(__FILE__) . '/../functions.php';
	$res = new Users();
	


	$res->uploadItem();



?>