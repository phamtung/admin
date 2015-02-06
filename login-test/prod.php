<?php
include_once('database.php');
class prod extends database{
	public function __construct(){
		
		$this->connect();
	}

	public function add($product_name, $product_price, $product_image, $product_detail){
		
		$sql = "SELECT * FROM product WHERE product_name = '".$product_name."'";
		$this->query($sql);
		if($this->numRows() > 0){
			$this->errors = "Sản phẩm đã tồn tại !!";
			return true;
		}
		else{
			$sql = "INSERT INTO product(product_name,product_price,product_image,product_detail) 
					VALUES('".$product_name."', '".$product_price."', '".$product_image."', '".$product_detail."')";
			$this->query($sql);
		}		
	}
	
	public function del($product_id){
		
		$sql = "DELETE FROM product WHERE product_id = ".$product_id."";
		$this->query($sql);
	}
	
	public function check($product_name, $product_price, $product_image, $product_detail){
		if($product_name == '' && $product_price == '' && $product_image == '' && $product_detail == ''){
				$this->errors_check = "Nhập đầy đủ thông tin !";
				return true;			
		}
	}
	
	public function edit($product_id, $product_name, $product_price, $product_image, $product_detail){
		$sql = "SELECT * FROM product WHERE product_name = '".$product_name."' AND product_id != ".$product_id;
		$this->query($sql);
		if($this->numRows() > 0){
			$this->errors_rep = "Sản phẩm đã tồn tại";
			return true;
		}
		else {
			$sql = "UPDATE product SET product_name 	= 	'".$product_name."', 
									   product_price 	= 	'".$product_price."',
									   product_image 	= 	'".$product_image."',
									   product_detail 	= 	'".$product_detail."'
					WHERE product_id = '".$product_id."'";
			$this->query($sql);	
		}
	}

	public function remove($text){
		return htmlentities($text);
	}							 
}



?>