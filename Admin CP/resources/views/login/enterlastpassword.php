<?php require_once("./../includes/header.php"); ?>

<section class="login-signup-container">
	 
	<link rel="stylesheet" href="./../../resources/assets/css/login-signup.css">
	<div class="info"> 
		<p class="sitename">&#120081;&#8495;&#120161;&#119989;&#10670;&#120111;</p>
		<h1>Last Remembered Password</h1> <br>
		
	</div>
	<div class="login">
		
		<form action="codeverify.php" method="post">
				
				<input type="password" placeholder="Last Password" class="form-control" name="last-password" tabindex="1" autofocus required class="userPassword">	 <div class="remember-password">
				 	<img src="./../images/hide_password.png" alt="Eye Opened" class="wideEye" onclick="hidePassword();">
				 	<img src="./../images/eye_closed.png" class="closedEye" onclick="showPassword();" alt="Eye closed icon">
				 </div>

				<input type="submit" value="Submit" class="btn-submit" tabindex="2"><br><br><br><br>	
				 
		</form>
		
	</div>
	
	
	
</section>

<?php require_once("./../includes/footer.php"); ?>