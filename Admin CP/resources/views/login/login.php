<?php 

	require_once("./../includes/header.php"); 
	require_once("./../../../database/controller.php");
	 
	 session_start();

	if(!empty($_SESSION['user'])){
		$query="SELECT session_id FROM session";
		$crud=new Controller();
		$results=$crud->getData($query);
		// var_dump($_SESSION['user']);
		// echo "session ";
		// var_dump($results);

		$users=[];

		foreach ($results as $result) {
			$users[]=$result['session_id'];
		}

		if(in_array($_SESSION['user'], $users)) {
				// header("location:./../../../../Home.php?user=".$_SESSION['email']);
			header("location:./../../../resources/Home.php");
		}else{
			// header("location:login.php");
		}
	} 


 ?>
<section class="login-signup-container">

	<div class="info"> 
		<a href="./../../../resources/Home.php" id="brandLogo"><p class="sitename">Online Voting System</p></a>
		<h1>Admin Login</h1> <br>
		
	</div>
	<div class="login">
		
		<form action="login-validation.php" method="post">

				<input type="email" placeholder="Email" class="form-control" name="email" autofocus>
				<input type="password" placeholder="Password" class="form-control" id="userPassword" name="password" >
				 <div class="eyeIcon"> 
				 	<img src="./../../../Images/hide_password.png" alt="Eye Opened" id="wideEye" onclick="hidePassword();">
				 	<img src="./../../../Images/eye_closed.png" id="closedEye" onclick="showPassword();" alt="Eye closed icon">
				 </div>
				<p class="forgot-password">
					<a href="forgotpassword.php" >Forgot Password?</a>
				</p>  
				<?php if(@$_GET['Empty']==true) { ?>
					<span class="error"> <?php echo "* ".$_GET['Empty']; ?></span><br><br>

				<?php } ?>

				<?php if(@$_GET['message']==true) {?>
					<span class="error"><?php echo "* ".$_GET['message']; ?></span> <br><br>
				<?php } ?>
				<input type="submit" value="log in" class="btn-submit" name="login"> <br>
				<label class="register">
				<p class="newtonep">OR</p>
				<br>
				<span class="createaccount"><a href="signup.php">Create your OVS admin Account</a></span>

				</label>				
		</form>
		
	</div>


	
	
		
</section>
