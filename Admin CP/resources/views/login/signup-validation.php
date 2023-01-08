<?php 
$rootPath = getcwd();
$homePath = $_SERVER['HTTP_HOST']."/Online Voting System/Admin CP/resources/Home.php";

	require_once("./../../../database/controller.php");

	if(isset($_POST['signup'])) {
		if(empty($_POST['fullname']) || empty($_POST['email']) || empty($_POST['phone']) || empty($_POST['password'])) {
			header("location:./signup.php?message=All field values are required!");
		} else {
			if(strlen($_POST['password']) < 8 ) {
				header("location:./signup.php?pwlength=At least 8 characters are required in password!");
			} else {
				$admin_id = md5($_POST['username'].$_POST['email']);
				$username=$_POST['username'];
				$fullname=$_POST['fullname'];
				$email=$_POST['email'];
				$phone=$_POST['phone'];
				$gender=$_POST['gender'];
				$join_date = date('Y-m-d h:i:s');
				$user_image = "./../Uploads/user_images/user.jpg";
				$password= hash("SHA3-512", $_POST['password']);

				$insertQuery="INSERT INTO admin (admin_id,Username,Email,Password,fullname,Gender,Contact,user_image,account_created_date) VALUES ('$admin_id','$username','$email','$password','$fullname','$gender','$phone','$user_image','$join_date')";
				$crud=new Controller();
				$status=$crud->execute($insertQuery);
				

				if($status) {
					$user=md5($_POST['email'].$_POST['password']);
					$_SESSION['user']=$user;
					$session_start_time=date('Y-m-d h:i:s');
					$insertQuery="INSERT INTO session (session_id, session_start_time) VALUES ('$user','$session_start_time')";
					$crud->execute($insertQuery);
					header("location:http://".$homePath);
				}else {
					var_dump($status);
					header("location:http://".$homePath."?email=".$_POST['email']);
				}
			}
		}
	}


 ?>