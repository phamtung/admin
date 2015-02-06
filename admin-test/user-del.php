<?php
	include('user.php');
	$user_id = $_GET['user_id'];
	$User = new user();
	$User->del($user_id);
	header("location:admin.php?page_layout=account");
?>

