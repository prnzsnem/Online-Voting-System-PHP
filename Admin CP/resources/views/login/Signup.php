<?php require_once("./../includes/header.php"); ?>

<?php session_start();
	require_once("./../../../database/controller.php");
	if(!(empty($_SESSION['user']))) {
		$query="SELECT session_id FROM session";
		$crud=new Controller();
		$results=$crud->getData($query);

		$users=[];

		foreach ($results as $result) {
			$users[]=$result['session_id'];
		}

		if(in_array($_SESSION['user'], $users)) {
				header("location:./../../../public/index.php");	
			}
	}

 ?>
 <section class="login-signup-container">
	<div class="info"> 
		<p class="sitename">Online Voting System</p>
		<h1>Create your Admin Account</h1> <br>
		
	</div>
	<div class="login">
		
		<form action="signup-validation.php" method="post" onload="">
				<input type="text" placeholder="Fullname" class="form-control" name="fullname" autofocus="" onkeyup="hideError()">
				<input type="text" placeholder="Username" class="form-control" name="username">
				<input type="email" placeholder="Email" class="form-control" name="email">
				<input type="text" placeholder="Phone Number" class="form-control" name="phone">
				<select name="gender" class="form-control">
					<option value="Male">Male</option>
					<option value="Female">Female</option>
					<option value="Other">Other</option>
				</select>
				<input type="password" placeholder="Password" class="form-control" name="password"> 
				<div class="agreement">
					By Signing up, you agree to Nepzar's <a href="#">Terms and Conditions</a>. <br> <br><br>
					<?php if(@$_GET['message']==true) { ?>
					<span class="error"><?php echo "* ".$_GET['message']; ?></span> <br><br>

					<?php } ?>

					<?php if((@$_GET['pwlength'])==true) { ?>

						<span class="error"><?php echo "* ".$_GET['pwlength']; ?></span> <br><br>
					<?php } ?>

					<?php if((@$_GET['unable'])==true) { ?>
							<span class="error"><?php echo "* ".$_GET['unable']; ?></span><br><br>
					<?php } ?>
				</div>
				<input type="submit" value="Sign up" name="signup" class="btn-submit"> <br><br>	
				<p>Already have an account? <a href="login.php">Log in > </a></p>		
		</form>
		
	</div>
	
</section> 

<?php require_once("./../includes/footer.php"); ?>