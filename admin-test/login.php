<?php 

	ob_start();
	session_start();
	include_once('user.php'); 
	if(isset($_SESSION["user_name"]) && isset($_SESSION["password"] )){
        
        header('location:admin.php');
    }
    else {
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>login</title>
	<link rel="stylesheet" type="text/css" href="themes/css/style.css" />
</head>

<body>
	<?php	

	if(isset($_POST["submit"])){
		$user_name = isset($_POST["user_name"]) ? $_POST["user_name"] : '';
		$password = isset($_POST["password"]) ? $_POST["password"] : '';
		
		if($user_name != '' && $password != ''){
			$User = new user();

			if($User->login($user_name, $password) == true){
				header("location:admin.php");
			}
			else{
				$error = $User->errors;
			}
		}
	}	
	?>

	<form name="frm" method="post">
		<div id="login">
			<h3><?php
				if(isset($error)){
					echo $error;
				}
				else{
					echo "Đăng nhập hệ thống";
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
					<td colspan="2" align="center"><input type="submit" name="submit" value="Đăng nhập" />
						<a href="register.php"><input type="button" name="reg" value="Đăng ký" /></a>
					</td>
				</tr>
			</table>
		</div>
	</form>
</body>
</html>
<?php
	}
?>