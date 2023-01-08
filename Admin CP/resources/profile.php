<?php 

include_once './../Database/MainDatabase.php';

$userInfo = $_SESSION['email'];
$sessionUser = $connection -> query("SELECT * FROM admin WHERE Email = '$userInfo'");
if (mysqli_num_rows($sessionUser)>0) {

	while($row = mysqli_fetch_assoc($sessionUser)) {
	    $row_UID = $row['admin_id'];
	    $row_UserName = $row['Username'];
	    $row_Email = $row['Email'];
	    $row_FullName = $row['fullname'];
	    $row_Age = $row['Age'];
	    $row_Gender = $row['Gender'];
	    $row_Address = $row['Address'];
	    $row_Contact = $row['Contact'];
	    $row_City = $row['City'];
	    $row_Hometown = $row['Hometown'];
	    $row_Temp_Add = $row['Temporary_address'];
	    $row_memb_since = $row['account_created_date'];
	}
}

?>

<html>
<head>
	<title>Online Voting System | Profile</title>
	<link rel="stylesheet" type="text/css" href="./../Looks/profile.css">
</head>
<body>	
	<div class="seperator">About Me</div>


	<form class="OuterLayer" action="./views/login/user_update.php" method="post">
		
		<div class="myDetails">

			<div class="leftPart">
				<span>Basic Info</span>
			</div>

			<div class="middlePart">
				<div class="fields">
					<label id="inputFieldsWithLabel">Name</label><span id="colonSeperator">:</span><input type="text" name="adminName" required id="updateName" disabled value="<?php echo "$row_FullName"; ?>">
				</div>
				<div class="fields">
					<label id="inputFieldsWithLabel">Username</label><span id="colonSeperator">:</span><input type="text" name="username" id="unchangable" disabled value="<?php echo "$row_UserName"; ?>">
				</div>
				<div class="fields">
					<label id="inputFieldsWithLabel">Email</label><span id="colonSeperator">:</span><input type="text" name="email" id="updateEmail" required disabled value="<?php echo "$row_Email"; ?>">
				</div>
				<div class="fields">
					<label id="inputFieldsWithLabel">Gender</label><span id="colonSeperator">:</span>
					<select disabled id="genderSelector" name="gender">
						<option value="Male">Male</option>
						<option value="Female">Female</option>
						<option value="Other">Other</option>
						<option value="N/A">Better not to specify</option>
					</select>
					<!-- <input type="text" name="" id="updateGender" disabled value="<?php echo "$row_Gender"; ?>"> -->
				</div>
				<div class="fields">
					<label id="inputFieldsWithLabel">Age</label><span id="colonSeperator">:</span><input type="text" name="age" id="updateAge" disabled value="<?php echo "$row_Age"; ?>">
				</div>
				<div class="fields">
					<label id="inputFieldsWithLabel">Contact Number</label><span id="colonSeperator">:</span><input type="text" name="phone" id="updateContact" disabled value="<?php echo "$row_Contact"; ?>">
				</div>
				<div class="fields">
					<label id="inputFieldsWithLabel">Address</label><span id="colonSeperator">:</span><input type="text" name="address" id="updateAddress" disabled value="<?php echo "$row_Address"; ?>">
				</div>
				<div class="fields">
					<label id="inputFieldsWithLabel">Temporary Address</label><span id="colonSeperator">:</span><input type="text" name="temp_address" id="updateTempAddress" disabled value="<?php echo "$row_Temp_Add"; ?>">
				</div>
				<div class="fields">
					<label id="inputFieldsWithLabel">City</label><span id="colonSeperator">:</span><input type="text" name="city" id="updateCity" disabled value="<?php echo "$row_City"; ?>">
				</div>
				<div class="fields">
					<label id="inputFieldsWithLabel">Home Town</label><span id="colonSeperator">:</span><input type="text" name="home_town" id="updateHomeTown" disabled value="<?php echo "$row_Hometown"; ?>">
				</div>
				<div class="fields">
					<label id="inputFieldsWithLabel">Account Created Date</label><span id="colonSeperator">:</span><input type="text" name="" id="unchangable" disabled value="<?php echo "$row_memb_since"; ?>">
				</div>
			</div>
		</div>

		

		<div class="infoUpdater" id="infoUpdater"><br>			
				<div class="fields">
					<label id="passwordInputFieldsWithLabel">* Confirm your password</label><span id="colonSeperator">:</span><input type="password" name="conformationPassword" placeholder="Password" id="confirmPasswordField" required>
				</div>
			<button type="submit" name="update">Update Info</button>
		</div>
	</form>
	<button onclick="showNameEditField()" id="infoUpdateBtn">Change Info</button>

</body>
</html>