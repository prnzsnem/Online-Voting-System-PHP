<!DOCTYPE html>
<html>
<head>
	<title>NepZar | Admin Login</title>
	<link rel="stylesheet" type="text/css" href="./CSS/CSS.css">
	<link rel="icon" type="icon" href="./../Images/ic_nepzar_logo.png">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="./JavaScript/JS.js"></script>	
</head>
<body>

<div class="backgroundVideo">
	<video src="./Images/wave.mp4" autoplay loop></video>
</div>

	<form name="loginForm" action="./Database/database.php" method="post">
		<div class="layerOne">
			<img src="./../Images/admin_user.png">
		</div>
		<div class="mainForm">

				<h1 class="titleOfSite">NepZar</h1>

			<div class="minFormInnerContent">				
				  
				  <div class="input-container">
				    <i class="fa fa-user icon"></i>
				    <input class="input-field" type="text" placeholder="Username">
				  </div><br>

					<div class="input-container">
					    <i class="fa fa-key icon"></i>
					    <input class="input-field" type="password" placeholder="Password" id="userPassword">
					   <div class="eyeIcon" style="position: absolute; right: 0;">
						   	<img src="./../Pictures/hide_white_password.png" id="iconHPW" onclick="hidePassword()">
						    <img src="./../Pictures/eye_white_closed.png" id="iconSPW" onclick="showPassword()">
					   </div>
					 </div>
				<label id="forgotPW"><a href="#">Forgot password...?</a></label>
				<br><br>
				<input id="submitBtn" type="submit" value="Sign in">

			</div>
			
		</div>
	</form>

</body>
</html>