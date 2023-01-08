<?php 
	require_once("./../../../Database/database.php");
	require_once("./../../../Database/controller.php");

	session_start();

	if(isset($_POST['update'])) {
		if(empty($_POST['adminName']) || empty($_POST['email']) || empty($_POST['phone']) || empty($_POST['conformationPassword'])) {
			header("location:./../../home.php?message=All field values are required!");
		} else {	
			$sessionuser = $_SESSION['email'];	
			$fullname=$_POST['adminName'];
			$email=$_POST['email'];
			$phone=$_POST['phone'];
			$gender=$_POST['gender'];
			$age=$_POST['age'];
			$address=$_POST['address'];
			$temp_add=$_POST['temp_address'];
			$city=$_POST['city'];
			$home_town=$_POST['home_town'];
			$updated_date = date('Y-m-d h:i:s');
			$password= hash("SHA3-512", $_POST['conformationPassword']);
		
			$passwordQuery = $connection -> query("SELECT * FROM admin WHERE Email = '$sessionuser' AND password = '$password'");
				if (mysqli_num_rows($passwordQuery)>0) {
					while($row = mysqli_fetch_assoc($passwordQuery)) {
						$row_adminID = $row['admin_id'];
					    $row_password = $row['password'];
					    echo "<br><br>ID: ".$row_adminID;
					}
					echo "<br><br>Session user confirm: ".$sessionuser." Password is :".$password."<br><br>";
				}else{ echo "Sorry! Error occour while executing query";}

				if ($password == $row_password) {

					$updateUserInfo = "UPDATE `admin` SET `Email`='$email',`fullname`='$fullname',`Gender`='$gender',`Address`='$address',`Contact`='$phone',`Age`='$age',`City`='$city',`Hometown`='$home_town',`Temporary_address`='$temp_add',`last_acc_updated_date`='$updated_date' WHERE admin_id = '$row_adminID'";
					$crud=new Controller();
					$status=$crud->execute($updateUserInfo);
					header("location:./../../home.php");
				}else{
					header("location:./../../home.php?errMessage=Password do not match!");
				}
		}
	}else{
		echo "Sorry! could not complete request";
	}


 ?>