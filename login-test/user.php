<?php
include_once('database.php');
class user extends database{
	
	protected $user_id;
	protected $user_name;
	protected $password;
	protected $address;
	public $errors;

	public function __construct(){
		
		$this->connect();
	}
	
	public function login($user_name, $password){
		$user_name = $this->fix($user_name);
		$password = $this->fix($password);

		$sql = "SELECT * FROM user 
				WHERE user_name ='".$user_name."' AND password = '".$password."'";
				
		$this->query($sql);
		if($this->numRows() > 0){
			$_SESSION["user_name"] = $user_name;
			$_SESSION["password"] = $password;
			return true;
		}
		else{
			$this->errors = 'Không đăng nhập được!';
			return false;
		}
	}

	public function register($user_name, $password, $address){
		$sql = "SELECT user_name FROM user WHERE user_name = '".$user_name."'";
		$this->query($sql);
		if($this->numRows() > 0){
			return false;
		}
		else{
			$sql = "INSERT INTO user (user_name, password, address) 
					VALUES ('".$user_name."', '".$password."', '".$address."')";
			$this->query($sql);
		}
	}

	public function fix($str) {
		return str_replace("'", "\'", $str);
	}

	public function del($user_id){
		$sql = "DELETE FROM user WHERE user_id = ".$user_id."";
		$this->query($sql);
	}
	
	public function check($user_name, $password, $address){
		if($user_name == '' && $password == '' && $address == ''){
				$this->errors_check = "Nhập đầy đủ thông tin !";
				return true;			
		}
	}
	
	public function edit($user_id, $user_name, $password, $address){
		$sql = "SELECT * FROM user WHERE user_name = '".$user_name."' AND user_id != ".$user_id;
		$this->query($sql);
		if($this->numRows() > 0){
			$this->errors_rep = "Tài khoản đã tồn tại";
			return true;
		}
		else {
			$sql = "UPDATE user SET user_name 	= 	'".$user_name."', 
									password 	= 	'".$password."',
									address 	= 	'".$address."'
					WHERE user_id = '".$user_id."'";
			$this->query($sql);	
		}
	}				
}