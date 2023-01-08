<?php

		require_once("connection.php");

		class Controller extends DbConnection{

			public function __construct() {
				parent::__construct();
			}

			function getData($query) {
				$results=$this->conn->query($query);
				if(!$results) {
					return false;
				}

				$rows=[];

				while ($row=$results->fetch_assoc()) {
					$rows[]=$row;
				}
				return $rows;

			}

			public function checkDataIfAvailable($query)
			{
				$result = $this->conn->query($query);
				if(mysqli_num_rows($result)>0) {		
					return true;
				}else {
					return false;
				}

			}


			public function execute($query) {
				$result=$this->conn->query($query);

				if(!$result) {
					
					return false;
				}else {
					return true;
				}

			}
		}
?>