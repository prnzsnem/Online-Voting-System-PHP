<?php 

	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "Online_Voting_System";

	$connection = new mysqli($servername, $username, $password, $dbname);

	if ($connection -> connect_error) {
		die("Connection Failed; ".$connection -> connect_error);

	}
	
?>	