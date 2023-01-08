<?php require_once("./../includes/header.php"); ?>

<section class="login-signup-container">
	<link rel="stylesheet" href="./../../resources/assets/css/login-signup.css">
	<div class="info"> 
		<p class="sitename">&#120081;&#8495;&#120161;&#119989;&#10670;&#120111;</p>
		<h1>Find Your Account</h1> <br>
		
	</div>
	<div class="login">
		
		<form action="enterlastpassword.php" method="post">
				<p>Please enter your email to search for your account</p>
				<input type="email" placeholder="Email" class="form-control" name="email" tabindex="1" autofocus required>
				<input type="submit" value="Search" class="btn-submit" tabindex="2"><br><br><br><br>	
				 
		</form>
		
	</div>
	
	
	
</section>
<?php require_once("./../includes/footer.php"); ?>