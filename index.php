<?php
ini_set('error_reporting', E_ERROR);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);

	require "Config/Autoload.php";
	require "Config/Config.php";

	use Config\Autoload as Autoload;
	use Config\Router 	as Router;
	use Config\Request 	as Request;
	Autoload::start();
	session_start();
   
	require_once(VIEWS_PATH."header.php");

	Router::Route(new Request());
	
	require_once(VIEWS_PATH."footer.php");
?>