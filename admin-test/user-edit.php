<?php
include_once('user.php');
$user_id = $_GET['user_id'];
if(isset($_POST['submit'])){
    $user_name = isset($_POST["user_name"]) ? $_POST["user_name"] : '';
    $password = isset($_POST["password"]) ? $_POST["password"] : '';
    $address = isset($_POST["address"]) ? $_POST["address"] : '';
    
    $User = new user();
    if($User->check($user_name, $password, $address) == true){
            $error = $User->errors_check;
    }
    else {
        if($User->edit($user_id, $user_name, $password, $address)==true){
            $error = $User->errors_rep;
        }
        else{    
        header("location:admin.php?page_layout=account");
        }
    }
}
?>
<h2>Sửa tài khoản</h2>
<?php if(isset($error)){echo $error;}?>
<div class = "add">
    <form method="post" enctype="multipart/form-data">
    <table id="add-prd" border="0" cellpadding="0" cellspacing="0">
        <tr>
            <td><label>Tài khoản</label><br /><input type="text" name="user_name" /></td>
        </tr>        
        <tr>
            <td><label>Mật khẩu</label><br /><input type="password" name="password" /></td>
        </tr>
        <tr>
            <td><label>Địa chỉ</label><br /><input type="text" name="address" /></td>
        </tr>
        <tr>
            <td><input type="submit" name="submit" value="Cập nhật" /></td>
        </tr>
    </table>
    </form>
</div>
