<?php 
	if (!defined('__CONFIG__')) {
		exit("You do not have a config file");
	}

	//Our config is below
	
	//include the DB.php file
	include_once "classes/DB.php";

	$con = DB::getConnection();

 ?>