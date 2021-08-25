<?php
class Connection{
	protected $conn ="";

	public function __construct()
	{
		                     
		$this->conn = new mysqli("localhost","root","","fashion_jalsa");
		//$this->conn = new mysqli("185.28.21.1","u525569677_fashion_jalsa","Jalsa@12345","u525569677_fashion_jalsa");
	}

	public function __destruct(){
		$this->conn->close();
	}
}

?>