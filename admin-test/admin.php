<?php
    ob_start();
    session_start();
	include_once ('pagination.php');
    include_once ('user.php'); 
 	error_reporting(E_ALL & ~E_NOTICE & ~E_DEPRECATED);
?>

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Trang quản lý</title>
    <link rel="stylesheet" type="text/css" href="themes/css/style.css" />
    <link href="themes/css/bootstrap.min.css" rel="stylesheet" >
</head>

<body>
	<div class = "container">
		<div id = "header">
			<div class="row">
				<div class = "col-md-12">
					<img width = "100%" src="themes/images/banner.jpg">
				</div>
			</div>
			<div class = "navbar">
				<div class="col-md-8">
					<ul>
						<li><a href="admin.php?page_layout=account">Thành viên</a></li>
						<li><a href="admin.php?page_layout=product">Sản phẩm</a></li>
						<li><a href="admin.php?page_layout=list-product">Danh mục sản phẩm</a></li>
						<li><a href="admin.php?page_layout=present">Giới thiệu</a></li>
					</ul>
				</div>
				<div class="col-md-4">
					<?php
						if(isset($_SESSION["user_name"]) && isset($_SESSION["password"] )){
					        echo "Xin chào <a href=''>".$_SESSION["user_name"]."</a>	!	";
		        			echo "<a href='logout.php'>	Thoát</a>";       
					    }
					    else {
					        header('location:login.php');
					    }
					?>
				</div>
			</div>
		</div>

		<div id = "main">
			<?php
				switch($_GET['page_layout']){
					case 'account': include_once('account.php');
					break;

					case 'user-del': include_once('user-del.php');
					break;

					case 'user-edit': include_once('user-edit.php');
					break;

					case 'product': include_once('product.php');
					break;

					case 'prod-add': include_once('prod-add.php');
					break;

					case 'prod-edit': include_once('prod-edit.php');
					break;

					case 'prod-del': include_once('prod-del.php');
					break;

					case 'list-product': include_once('list-product.php');
					break;

					default: include_once('present.php');					
				}
			?>
		</div>
	</div>