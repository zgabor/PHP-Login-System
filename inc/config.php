<?php 
	if (!defined('__CONFIG__')) {
		exit("You do not have a config file");
	}

	//Sessions are always turned on
	if (!isset($_SESSION)) {
		session_start();
	}

	//Our config is below
	
	//include the DB.php file
	include_once "classes/DB.php";
	include_once "classes/filter.php";
	include_once "functions.php";

	$con = DB::getConnection();

 ?>