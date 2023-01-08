<link rel="stylesheet" type="text/css" href="./../Looks/CSS.css">
<link rel="stylesheet" type="text/css" href="./../Looks/HeadBar.css">
<script src="./../JavaScript/JScript.js"></script>	
<script type="text/javascript">
	$(document).ready(function() {
	    setInterval(timestamp, 10);
	});

	function timestamp() {
	    $.ajax({
	        url: 'http://localhost/timestamp.php',
	        success: function(data) {
	            $('#timestamp').html(data);
	        },
	    });
	}
</script>

<?php 

$rootPath = $_SERVER['DOCUMENT_ROOT']."/Online Voting System/Admin CP";
$rootPathForHeader = $_SERVER['HTTP_HOST']."/Online Voting System/Admin CP";

	date_default_timezone_set('Asia/Kathmandu');

	include_once $rootPath."/Database/MainDatabase.php";


		if (isset($_SESSION['email'])) {
			$userInfo = $_SESSION['email'];
			$sessionUser = $connection -> query("SELECT Username FROM admin WHERE Email = '$userInfo'");
			if (mysqli_num_rows($sessionUser)>0) {
				while($row = mysqli_fetch_assoc($sessionUser)) {
				    $row_UID = $row['Username'];
				}
			}
		}
?>


<div class="headerContents" style="background-color: green; color: #fff;">
	<nav class="navbar">

		<div class="brandLogo"><a href="<?php $rootPathForHeader."Index.php"; ?>"><img src="./../Images/icon.png"></a></div>

			<h1 id="webTitle">Online Voting System</h1>

			<div id="timestamp" style="position:absolute;right:240px;top:30px;"><?php echo $timestamp = date('d-M-Y h:i:s'); ?></div>

		<div class="navigationBar">
			<div class="user" onclick="removeBoxShadow()">
						<?php 
						if (isset($_SESSION['email'])) {

						$loggedInUser = $connection -> query("SELECT * FROM admin WHERE Username = '$row_UID'");

						if (mysqli_num_rows($loggedInUser)>0) {

							while($row = mysqli_fetch_assoc($loggedInUser)) {
							    $row_user_id = $row['ID'];
							    $row_user_name = $row['Username'];
							    $row_full_name = $row['fullname'];
							    $row_user_email = $row['Email'];
							    $row_user_img_path = $row['user_image'];
							}
							echo '
							<div class="userAction">
								<img src="'.$row_user_img_path.'" id="user" onclick="displayDropDownMenu()">
								<span id="forLabel" style="color:#fff;">'.$row_full_name.'</span>
							</div>
							';
							}
						}else{
							echo '
							<div class="userAction">
								<div class="userIcon">
									<a href="./../resources/views/login/login.php">
										<img src="./../Images/user_icon.png" id="user">
										<span id="forLabel">Sign in</span>
									</a>
								</div>
							</div>
							';
						}
					 ?>
			</div>
		</div>
	</nav>
</div>

   </div>
</div>

<div class="userDrowdownMenu" id="userDrowdownMenu">
		<div class="menuLists">
			<a href="./views/login/logout.php">
				<div class="leftNavContent" id="logout" onclick="makeChanges(4)">
					<img src="./../Images/icons/logout.png">
					<span id="listLebel" type="submit">Log out</span>	
				</div>
			</a>
		</div>
</div>