<?php
class database{
	
	protected $dbHost = 'localhost';
	protected $dbUser = 'root';
	protected $dbPass = '';
	protected $dbName = 'login';
	
	protected $conn = NULL;
	protected $result = NULL;

	private $cons;

	public static function getInstance()
	{
		if (is_null($this->cons)) {
			$this->cons = new database;
		}
		return $this->cons;
	}
	
	public function connect(){
		
		$this->conn = @mysql_connect($this->dbHost, $this->dbUser, $this->dbPass);
		if($this->conn){
			
			$dbSelect = @mysql_select_db($this->dbName, $this->conn);
			if(!$dbSelect){
				echo 'Not find Database!';
			}
			else{
				$dbLang = @mysql_query("SET NAMES 'utf8'");	
			}
		}
		else{
			die;	
		}
	}
	
	public function query($sql){
		$this->result = @mysql_query($sql);
	}
	
	
	public function numRows(){
		if($this->result){
			$rows = @mysql_num_rows($this->result);
			return $rows;
		}
	}
	
	public function fetch(){
		if($this->result){
			$row = @mysql_fetch_assoc($this->result);
			return $row;
		}
	}
	
}
?>