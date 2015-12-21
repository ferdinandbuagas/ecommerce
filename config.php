<?php

	/*MYSQLI Connection: Object Oriented Style*/

	$my_host = "localhost";
	$my_user = "root";
	$my_pass = "";
	$my_db = "db_windowshoppingv2";
	

	defined("MODAL_PATH")
    or define("MODAL_PATH", realpath(dirname(__FILE__) . '/views/modal'));


	 
	/*
	    Error reporting.
	*/
	ini_set("error_reporting", "true");
	error_reporting(E_ALL|E_STRCT);

?>




