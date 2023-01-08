<?php 

	session_start();

$rootPath = getcwd();
$rootFolder = $_SERVER['DOCUMENT_ROOT']."/Online Voting System/Admin CP";

include_once $rootFolder.'/Database/MainDatabase.php';

$email = null;
	if (!isset($_SESSION['email'])) { header("location:./views/login/login.php"); }
	else{ $email = $_SESSION['email']; }

	if (isset($_POST['upload'])) {		
		$target = "./../Uploads/user_images/".basename($_FILES['userImage']['name']);
		$image = "./../Uploads/user_images/".$_FILES['userImage']['name'];
		if (isset($image)) {
			$uploadImage = "UPDATE admin SET user_image = '$image' WHERE Email = '$email'";
			mysqli_query($connection, $uploadImage);
			if (move_uploaded_file($_FILES['userImage']['tmp_name'], $target)) {
				echo '<div id="uploadMsg">Image Uploaded successfully</div>';
			}else{
				echo '<div id="uploadMsg">Image upload unsuccessful</div>';
			}
		}else{ echo "No image";}
	}

?>
<!DOCTYPE html>
<html>
<head>
	<title id="pageTitle">Online Voting System | Admin Dashboard</title>
	<link rel="icon" type="icon" href="./../Images/icon.png">
	<link rel="stylesheet" type="text/css" href="./../Looks/Home.css">
	<link rel="stylesheet" type="text/css" href="./../Looks/HomeLeftNavbar.css">
	<script src="./../JavaScript/JScript.js"></script>
	<script type="text/javascript" src="./../JavaScript/jquery.js"></script>
</head>
<body onscroll="onscrl()">

	<?php include_once './../Header&Footer/Header.php'; ?>
<!------------------ This section is for shoing the messages------------------->
<div class="allScreen" id="allScreen"></div>
<div class="alertMessage" id="alertScreen">
	<div class="oneMore">
		<h3>Message</h3>
		<span class="alertMsg" id="anyMsg"></span>
		<div class="userAction">
			<div class="cancelbtn" onclick="showProcessResult(0)"><h4>Okay</h4>
			</div>
		</div>		
	</div>
</div>

<?php 
if (@$_GET['successMessage'] == TRUE) {
	$suErMsg = $_GET['successMessage'];
		echo '<script type="text/javascript">',
			'showProcessResult(1, "'.$suErMsg.'");',
		 '</script>';

}else if(@$_GET['errMessage'] == TRUE) {
	$suErMsg = $_GET['errMessage'];
		echo '<script type="text/javascript">',
			'showProcessResult(1, "'.$suErMsg.'");',
		 '</script>';
}
?>
<!-----------------------------FOR SHOWING MESSAGE------------------------------->

<div class="EveryContent" onmouseover="hideDropDownMenu()">
<div class="fullBodySection">
	<div class="leftNavigationBar" id="LeftNavbar">
		<div class="dashMenuContains">
			<?php 	

			$userInfo = $_SESSION['email'];
			$sessionUser = $connection -> query("SELECT Username FROM admin WHERE Email = '$userInfo'");
			if (mysqli_num_rows($sessionUser)>0) {

				while($row = mysqli_fetch_assoc($sessionUser)) {
				    $row_UID = $row['Username'];
				}
			}

			$userSql = $connection -> query("SELECT * FROM admin WHERE Username = '$row_UID'");

			if (mysqli_num_rows($userSql)>0) {

				while($row = mysqli_fetch_assoc($userSql)) {
				    $row_user_id = $row['ID'];
				    $row_user_name = $row['Username'];
				    $row_full_name = $row['fullname'];
				    $row_user_email = $row['Email'];
				    $row_user_img_path = $row['user_image'];
				}
			}else{ echo "Sorry! user is not available";}

			echo '
				<div class="categoryNavigation" id="HomeLeftNavbar">';

?>
<form enctype="multipart/form-data" id="changeProfilePicture" action="<?php echo htmlentities($_SERVER['PHP_SELF']);?>" method="post">
  <input type="hidden" name="MAX_FILE_SIZE" value="99999999" />
  <div id="uploadUserImg" title="Click to change your profile picture"><input name="userImage" type="file"  onclick="showPostBtn()" /></div>
  <div id="uploadBtn" title="Click to upload your new profile picture"><button type="submit" name="upload"><img src="./../Images/cam.png"></button></div>
 </form>
<?php				
	echo '
	<div class="userDashMenu">
		<img id="usrImg" src="'."$row_user_img_path".'" alternet="Profile picture of '."$row_user_name".'" title="Profile picture of '."$row_full_name".'">
	</div><label>'."$row_full_name<br>@$row_user_name".'</label><hr><br>';
?>

		<div class="menuLists">
			<div class="leftNavContent" id="dashboard" onclick="makeChanges(0)">
				<img src="./../Images/icons/home.png">
				<span id="listLebel">Dashboard</span>				
			</div>
				<?php 
					$notify = $connection -> query("SELECT COUNT(vote_permission) FROM vote_permission WHERE vote_permission = 'No'");
					if (mysqli_num_rows($notify)>0) {
						while ($row = mysqli_fetch_assoc($notify)) {
							$notCount = $row['COUNT(vote_permission)'];
						}
						if ($notCount>0) {
						?>
						<div class="leftNavContent" id="dashboard" onclick="makeChanges(6)" title="<?php echo "You have ".$notCount." notifications"; ?>">
							<img src="./../Images/icons/notificationBell.png">
							<?php
						}else{
							?>
							<div class="leftNavContent" id="dashboard" onclick="makeChanges(6)" title="<?php echo "You have ".$notCount." notifications"; ?>">
							<img src="./../Images/icons/notification.png">
							<?php
						}
					}
				?>
				
				<span id="listLebel">Notification</span>				
			</div>
			<div class="leftNavContent" id="myProfile" onclick="makeChanges(1)">
				<img src="./../Images/icons/profile.png">
				<span id="listLebel">Profile Setting</span>				
			</div>
			<div class="leftNavContent" id="newElection" onclick="makeChanges(2)">
				<img src="./../Images/icons/add.png">
				<span id="listLebel">Add new election</span>				
			</div>
			<div class="leftNavContent" id="NewCandidate" onclick="makeChanges(3)">
				<img src="./../Images/icons/addUser.png">
				<span id="listLebel">Add new Candidate</span>				
			</div>
			<div class="leftNavContent" id="addNewVoter" onclick="makeChanges(4)">
				<img src="./../Images/icons/addUser.png">
				<span id="listLebel">Add New Voter</span>				
			</div>
			<div class="leftNavContent" id="showVoteResult" onclick="makeChanges(5)">
				<img src="./../Images/icons/result.png">
				<span id="listLebel">Show Vote Results</span>				
			</div>
			<a href="./views/login/logout.php">
				<div class="leftNavContent" id="logout">
					<img src="./../Images/icons/logout.png">
					<span id="listLebel" name="logout" type="submit">Log out</span>	
				</div>
			</a><br><br><br><br><br><br><br>
		</div>
</div>
</div>
</div>


<!-- From below the main page starts -->
<?php 

	$about = $connection -> query("SELECT * FROM elections WHERE election_type = 'National'");
	if (mysqli_num_rows($about)>0) {
		while($row = mysqli_fetch_assoc($about)) {
			$ele_type = $row['election_type'];
		    $ele_name = $row['election_name'];
		    $ele_start_time = $row['election_start_date'];
		    $ele_end_time = $row['election_end_date'];
		}
	}

?>

	<div class="mainSection">

		<div class="divider" id="divider"><?php echo $ele_type; ?> Election</div><hr>

		<div class="dashBoardContent" id="dashBoardContent">
			<div class="topContainer">	

<?php 

	$candidate_information = $connection -> query("SELECT * FROM election_candidates WHERE election_type = '$ele_type'");
	if (mysqli_num_rows($candidate_information)>0) {
		while($row = mysqli_fetch_assoc($candidate_information)) {
		    $cand_name = $row['cand_name'];
		    $party_name = $row['party_name'];
		    $cand_img = $row['cand_photo'];
		    $vote_sign = $row['vote_symbol'];
		    $obtained_votes = $row['obtained_votes'];

		   echo '
				<div class="dashMainContainer">
					<h4>'.$party_name.'</h4>
					<div class="postedContent">
						<img id="canImg" src="'.$cand_img.'">
						<div class="postedContentData">
							<label id="canName">'.$cand_name.'</lable>
							<lable id="votes">Votes </lable>
					   ';		
					   if ($obtained_votes>0) {
					   		echo '<span id="totalPosts">'.$obtained_votes.'</span>';
					   }else{
					   		echo '<span id="totalPosts" style="color:red;">0</span>';
					   }
		   echo '</div></div></div>';
		}
	}

?>

	</div>	
</div>

			<div class="notificationPage" id="notificationpage">
				<?php include './Notification.php'; ?>
			</div>

			<div class="profileSetting" id="profilesetting">
				<?php include './profile.php'; ?>
			</div>

			<div class="createNewElection" id="createNewElection">
				<?php include './CreateElection.php'; ?>
			</div>

			<div class="addNewCandidate" id="addNewCandidate">
				<?php include './AddCandidate.php'; ?>
			</div>

			<div class="addVoter" id="addVoter">
				<?php include './AddVoter.php'; ?>
			</div>

			<div class="voteResult" id="voteResult">
				<?php include './VoteResult.php'; ?>
			</div>

		</div>
	</div>
</div>

<div class="footerSection" id="footerSection">
	<?php include_once './../Header&Footer/Footer.php'; ?>	
</div>

</body>
</html>