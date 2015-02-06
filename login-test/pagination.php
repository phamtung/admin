<?php
	function __autoload($class){
		include_once "$class.php";
	}


	class pagination extends user {
		public $page;
		public $totalPage;
		public $totalRow;
		public $rowPerPage;
		public $firstRow;

		function __construct(){
	
			$this->connect();	
		}

		function totalRow($table_name){
			$sql = "SELECT * FROM ".$table_name;
			$this->query($sql);
			$this->totalRow = $this->numRows();
		}

		function totalPage($rowPerPage){
			return $this->totalPage = ceil($this->totalRow/$rowPerPage);
		}

		function firstRow($page, $rowPerPage){
			$this->firstRow = $page * $rowPerPage;
			return $this->firstRow;
		}

		function page(){
		
			if(isset($_GET['page'])){
				$this->page = $_GET['page'];
			}
			else{
				$this->page = 0;	
			}
			return $this->page;
		}
	}
?>