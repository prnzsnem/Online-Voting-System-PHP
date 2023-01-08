<?php 

session_start();

include_once './../../database/database.php';
require_once("./../../database/controller.php");

if(isset($_POST['addVoter'])) {
		
		if(empty($_POST['voterFN']) && empty($_POST['gender'])) {
			header("location:./../Home.php?Empty=All Fileds required");
		} else {

		$crud=new Controller();

		$voterFN = ucwords($_POST['voterFN']);
		$voterMN = ucwords($_POST['voterMN']);
		$voterLN = ucwords($_POST['voterLN']);
		$voterName = $voterFN." ".$voterMN." ".$voterLN;
		$gender = $_POST['gender'];
		$voterAge = $_POST['voterAge'];
		$voterAddress = $_POST['voterAddress'];
		$acc_created_date = date("Y-m-d h:i:s");
		$eleType = $_POST['electionType'];
		$eleName = $_POST['electionName'];

		// $imgTargetFolder = "https://princeitsolution.000webhostapp.com/Online Voting System/Admin CP/Uploads/voter_images/";
		$imgTargetFolder = "http://192.168.144.144/Online Voting System/Admin CP/Uploads/voter_images/";

		if (!empty($_FILES["userImg"]["name"])) {
			$voterPhoto = $imgTargetFolder.$_FILES["userImg"]["name"];
			$target = $imgTargetFolder.basename($_FILES["userImg"]["name"]);
		}else{
			$voterPhoto = $imgTargetFolder."default_user.jpg";
		}

		$userEmail = $_SESSION['email'];
		$voterID = md5($voterFN.$voterMN.$voterLN);
		$encryptedUserName = hash("SHA3-512", $voterName);
		$userPass = hash("SHA3-512", $_POST['conformationPassword']);

		$electionListQuery = $connection -> query("SELECT * FROM elections WHERE election_name = '$eleName'");
		if (mysqli_num_rows($electionListQuery)>0) {
			while ($row = mysqli_fetch_assoc($electionListQuery)) {
				$selectedElectionID = $row['election_id'];
			}
		}

		if ($eleType == "National") {
			$sessionUser = $connection -> query("SELECT * FROM citizens WHERE voter_id = '$voterID'");
		}else{ 
			$sessionUser = $connection -> query("SELECT * FROM other_election_voters WHERE voter_id = '$voterID'"); }

	if (mysqli_num_rows($sessionUser)>0) {
			header("location:./../../resources/Home.php?successMessage=Voter $voterName is alredy registered");
	}else{

	if(!empty($_POST['vColzIDNo'])){	
		$clzID = hash("SHA3-512", $_POST['vColzIDNo']); $officeID = ""; $schoolID = ""; $conPW = "";
	}elseif (!empty($_POST['vSchID'])) {
		$clzID = ""; $officeID = ""; $schoolID = hash("SHA3-512", $_POST['vSchID']); $conPW = "";
	}elseif (!empty($_POST['vOfcID'])) {
		$clzID = ""; $officeID = hash("SHA3-512", $_POST['vOfcID']); $schoolID = ""; $conPW = "";
	}elseif (!empty($_POST['conformationPassword'])) {
		$clzID = ""; $officeID = ""; $schoolID = ""; $conPW = hash("SHA3-512", $_POST['conformationPassword']);
	}		

echo "<br>Name: ".$voterName."<br>Citizenship Number: ".$_POST['vCitzNum']."<br>College ID: ".$clzID."<br>School ID: ".$schoolID."<br>Office ID: ".$officeID."<br>Gender: ".$gender."<br>Age: ".$voterAge."<br>Address: ".$voterAddress."<br>Password: ".$conPW."<br>";

		if(!empty($_POST['vCitzNum'])){	
			$citizenID = hash("SHA3-512", $_POST['vCitzNum']);		
			$insertQuery="INSERT INTO citizens (Name, Citizenship_Number, voter_id, Vote_Status) VALUES ('$encryptedUserName','$citizenID','$voterID','Not Voted')";
			$addCandInfo=$crud->execute($insertQuery);	

		}else{
			$insertQuery="INSERT INTO election_voters (voter_id, full_name, gender, age, address, voter_photo, college_id, office_id, school_id, password, acc_created_date) VALUES ('$voterID','$voterName','$gender','$voterAge','voterAddress','$voterPhoto','$clzID','$officeID','$schoolID','$conPW','$acc_created_date')";
			$addCandInfo=$crud->execute($insertQuery);	

			$newPerMission = $connection -> query("SELECT * FROM vote_permission WHERE voter_id = '$voterID' AND election_id ='$selectedElectionID'");
			if (mysqli_num_rows($newPerMission)>0) {
				header("location:./../../resources/Home.php?errMessage=Sorry! this voter is already in the list");
			}else{
				$permissionQuery="INSERT INTO vote_permission (election_id, election_name, voter_id, voter_name, voter_photo, vote_permission, vote_status, election_join_date) VALUES ('$selectedElectionID','$eleName','$voterID','$voterName','$voterPhoto','Yes','Not Voted','$acc_created_date')";
				$addCandInfo=$crud->execute($permissionQuery);	
			}
		}

		if (isset($target)) {
			// $fileTarget = "https://princeitsolution.000webhostapp.com/Online Voting System/Admin CP/Uploads/voter_images/".basename($_FILES["userImg"]["name"]);
			$fileTarget = "./../../Uploads/voter_images/".basename($_FILES["userImg"]["name"]);
			move_uploaded_file($_FILES["userImg"]["tmp_name"], $fileTarget);
		}
			if (isset($addCandInfo)) {
				header("location:./../../resources/Home.php?successMessage=New Voter $voterName Added successfully");
			}else{
				header("location:./../../resources/Home.php?errMessage=Sorry! new voter $voterName could not be added");	
			}
		}
	}
}

?>