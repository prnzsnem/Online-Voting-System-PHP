<?php 
		session_start();

		require_once("./../../../database/controller.php");

		if(isset($_POST['login'])) {
				
				if(empty($_POST['email']) && empty($_POST['password']) ) {
					header("location:login.php?Empty=Both Email and Password are required!");
				} else {

				$crud=new Controller();

				$userEmail = $_POST['email'];
				$userPass = hash("SHA3-512", $_POST['password']);

				$query= "SELECT * FROM  admin WHERE Email = '$userEmail' AND Password = '$userPass'";

				$result=$crud->getData($query);
				if($result) {

				    $user=md5($_POST['email'].$_POST['password']);
					$_SESSION['user'] = $user;
					$_SESSION['email'] = $_POST['email'];
					$session_start_time = date('Y-m-d h:i:s');
					$checkSession = "SELECT * FROM session WHERE session_id = '$user'";

					if ($crud->checkDataIfAvailable($checkSession)) {
						$sessionQuery = "UPDATE session SET session_start_time = '$session_start_time' WHERE session_id = '$user'";
					}else{
						$sessionQuery = "INSERT INTO session (session_id, session_start_time) VALUES ('$user','$session_start_time')";
					}

					$sessionQuery = $crud->execute($sessionQuery);
					if ($sessionQuery) {
						header("location:./../../Home.php?user=".$_POST['email']);
					} else {
						header("location:./login.php?message=Oops Something went wrong. Please try again...");
					}
					
				} else {
					header("location:./login.php?message=Invalid email or pasword!");
				}
			}
		}
 ?>