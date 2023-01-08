<?php 


class DbConnection {

	private $host="localhost";
	private $username="root";
	private $password="";
	private $dbname="Online_Voting_System";
	protected $conn;


	function __construct() {
		$this->conn=new mysqli($this->host,$this->username,$this->password,$this->dbname);


		if(!$this->conn) {
			echo "Connection failed!";
		}

		return $this->conn;
	}


}

 ?>