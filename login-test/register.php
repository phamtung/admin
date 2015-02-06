<?php 
	include_once('user.php'); 
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>register</title>
	<link rel="stylesheet" type="text/css" href="themes/css/style.css" />
</head>

<body>
	<?php	

	if(isset($_POST["submit"])){
		if($_POST["user_name"] == ""){
			$error = "Vui long nhập đầy đủ thông tin";
		}
		else{
			$user_name = $_POST["user_name"];
		}

		if($_POST["password"] == ""){
			$error = "Vui lòng nhập đầy đủ thông tin";
		}
		else{
			$password = $_POST["password"];
		}

		if($_POST["address"] == ""){
			$error = "Vui lòng nhập đầy đủ thông tin";
		}
		else{
			$address = $_POST["address"];
		}

		if(isset($user_name) && isset($password) && isset($address)){
			$User = new user();
			
			if($User->register($user_name, $password, $address) == false){
				$error = "Tài khoản đã tồn tại";
			}
			else{
				echo 	"<script type='text/javascript' language='Javascript'>
							alert('Bạn đã đăng ký thành công!');
							window.location.href = 'log.php';
						</script>";

				// header("location:index.php");
			}

		}
	}	
	?>

	<form name="frm2" method="post">
		<div id="register">
			<h3><?php
				if(isset($error)){
					echo $error;
				}
				else{
					echo "Đăng ký tài khoản";
				}
			?></h3>
			
			<table>
				<tr>
					<td width="100px"><label>Tài khoản</label></td>
					<td><input type="text" name="user_name" /></td>
				</tr>
				<tr>
					<td><label>Mật khẩu</label></td>
					<td><input type="password" name="password" /></td>
				</tr>
				<tr>
					<td><label>Địa chỉ</label></td>
					<td><input type="text" name="address" /></td>
				</tr>
				<tr>
					<td colspan="2" align="center"><input type="submit" name="submit" value="Đăng ký" /></td>
				</tr>
			</ul>
		</div>
	</form>
</body>
</html>