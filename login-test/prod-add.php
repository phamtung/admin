<?php
include_once('prod.php');
if(isset($_POST['submit'])){
    $product_name = isset($_POST["product_name"]) ? $_POST["product_name"] : '';
    $product_price = isset($_POST["product_price"]) ? $_POST["product_price"] : '';
    $product_detail = isset($_POST["product_detail"]) ? $_POST["product_detail"] : '';
    $product_image = isset($_FILES['product_image']['name']) ? $_FILES['product_image']['name'] : '';
        
    move_uploaded_file($_FILES['product_image']['tmp_name'],'themes/images/'.$product_image);
    $Prod = new prod();
    if($Prod->check($product_name, $product_price, $product_image, $product_detail) == true){
        $error = $Prod->errors_check;
    }
    else{
        if($Prod->add($product_name, $product_price, $product_image, $product_detail) == true){
            $error = $Prod->errors;
        }
        else {
            header("location:admin.php?page_layout=product");
        }
    }
    
}
?>

<h2>Thêm sản phẩm</h2>
<?php if(isset($error)){echo $error;}?>
<div class = "add">
    <form method="post" enctype="multipart/form-data">
    <table id="add-prd" border="0" cellpadding="0" cellspacing="0">
        <tr>
            <td><label>Tên sản phẩm</label><br /><input type="text" name="product_name" /></td>
        </tr>        
        <tr>
            <td><label>Giá sản phẩm</label><br /><input type="text" name="product_price" /></td>
        </tr>
        <tr>
            <td><label>Ảnh sản phẩm</label><br /><input type="file" name="product_image" /></td>
        </tr>
        <tr>
            <td><label>Chi tiết sản phẩm</label><br /><textarea name="product_detail"></textarea></td>
        </tr>
        <tr>
            <td><input type="submit" name="submit" value="Thêm mới" /></td>
        </tr>
    </table>
    </form>
</div>