<?php require_once("./../includes/header.php"); ?>
<link rel="stylesheet" href="./../../resources/assets/css/login-signup.css">
 <section class="login-signup-container">
	<div class="info"> 
		<p class="sitename">&#120081;&#8495;&#120161;&#119989;&#10670;&#120111;</p>
		<h1>Verify Code</h1> <br>
		
	</div>
	<div class="login">
		<p>Enter varification code sent to <a href="">email</a></p>
		<form action="resetpassword.php" method="post">
				<input type="number" placeholder="Verification Code" class="form-control" name="varification-code" maxlength="6">  
				<input type="submit" value="Submit" class="btn-submit"> <br><br>	
	
		</form>
		
	</div>

</div>
	
</section> 

<?php require_once("./../includes/footer.php"); ?>
