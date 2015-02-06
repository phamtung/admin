<?php
session_start();
if(isset($_SESSION["user_name"]) && isset($_SESSION["password"] )){
	session_destroy();
}
header('location:login.php');
?>