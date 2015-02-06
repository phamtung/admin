<?php
ob_start();
session_start();
	function __autoload($class){
		include_once "$class.php";
	}
    if(isset($_SESSION["user_name"]) && isset($_SESSION["password"] )){
        
        include_once('index.php');
    }
    else{
    	include_once('login.php');
    }
    
?>