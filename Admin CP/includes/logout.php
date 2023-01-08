<?php 
	
	session_start();

	if($_SESSION['email']) {
		session_destroy();
		header("location:./../Index.php");
		var_dump($_SESSION['email']);
		var_dump($_SESSION['user']);
	}


?>