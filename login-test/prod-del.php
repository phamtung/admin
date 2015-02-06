<?php
	include('prod.php');
	$product_id = $_GET['product_id'];
	$Prod = new prod();
	$Prod->del($product_id);
	header("location:admin.php?page_layout=product");
?>

