<?php 
include_once './../../Database/MainDatabase.php';

session_start();

$userInfo = $_SESSION['email'];
$sessionUser = $connection -> query("SELECT * FROM user_details WHERE Email = '$userInfo'");
if (mysqli_num_rows($sessionUser)>0) {

	while($row = mysqli_fetch_assoc($sessionUser)) {
	    $row_UID = $row['User_ID'];
	    $row_UserName = $row['Username'];
	    $row_Email = $row['Email'];
	    $row_FullName = $row['Full_Name'];
	    $row_Age = $row['Age'];
	    $row_Gender = $row['Gender'];
	    $row_Address = $row['Address'];
	    $row_Contact = $row['Contact'];
	    $row_City = $row['City'];
	    $row_Hometown = $row['Hometown'];
	    $row_Temp_Add = $row['Temporary_address'];
	    $row_memb_since = $row['membership_date'];
	}
}


if (isset($_POST)) {
$up_name = $_POST['myName'];
$up_email = $_POST['u_email'];
$up_gender = $_POST['u_gender'];
$up_age = $_POST['u_age'];
$up_contact = $_POST['u_contact_num'];
$up_address = $_POST['u_address'];
$up_temp_add = $_POST['u_temp_address'];
$up_city = $_POST['u_city'];
$up_homeTown = $_POST['u_home_town'];

$email = $up_email;

$updateInfo = "UPDATE user_details SET Email = '$up_email', Full_Name = '$up_name', Gender = '$up_gender', Address = '$up_address', Contact = '$up_contact', Age = '$up_age', City = '$up_city', Hometown = '$up_homeTown', Temporary_address = '$up_temp_add' WHERE User_ID = '$row_UID' AND Email = '$row_Email'";

$updateSigndUser = "UPDATE signup_users SET Email = '$up_email' WHERE user_id = '$row_UID' AND Email = '$row_Email'";

	if ($connection -> query($updateInfo) === TRUE) {
		echo "User detail updated Successfully";
		if ($connection -> query($updateSigndUser) === TRUE) {
			echo "Signed user details updates successfully";
			$_SESSION['email'];
			$_SESSION['row_UID'];

			header("location:./../profile.php");
		}else{
			echo "Not able to update signed users details";
		}
	}else{
		echo "Sorry! error occour while executing query";
		echo "$up_email";
	}
}

?>