<!--<?PHP

	// $loginPath = $_SERVER['HTTP_HOST'].'/Online Voting System/Admin CP/resources/views/login/login.php';
	// header("Location: http://".$loginPath);
	// exit();

?>
-->

<!DOCTYPE html>
<meta http-equiv="refresh" content="4;/Online Voting System/Admin CP/resources/views/login/login.php">
<html>
<head>
	<title>Welcome to Online Voting System</title>
	<link rel="icon" type="icon" href="icons/icon.png">

<style type="text/css">
	.centerLogo{
	  	width: auto;
	  	height: 120px;
	  	position: absolute;
	  	left: 50%;
	  	top: 50%;
	  	transform: translate(-50%, -50%);  	
	}
	#logo{
	  	width: auto;
	  	height: 120px;
	  	position: relative;
	  	left: 50%;
	  	top: 50%;
	  	transform: translate(-50%, -50%);  
	}
	.loader {
		position: absolute;
		border: 14px solid #f3f3f3;
		border-top: 14px solid blue;
		border-bottom: 14px solid red;
		border-left: 14px solid lime;

		border-radius: 50%;
		width: 140px;
		height: 140px;
		animation: spin .4s linear infinite;
	  	left: 50%;
	  	top: 50%;
	  	transform: translate(-50%, -50%);  
	  	margin-top: -86px;
	  	margin-left: -84px;
	}

	@keyframes spin {
	   0% { transform: rotate(0deg); }
	   100% { transform: rotate(360deg); }
	}
</style>

</head>
<body bgcolor="green">
	<div class="loader"></div>

	<div class="centerLogo">
		<img src="icons/icon.png" id="logo" height="100px" width="100px"><br><br><br>
		<label style="color: white; font-family: monospace; font-size: 20px;">Loading please wait...</label>
	</div>

</body>
</html>

