<?php 
session_start();

include_once './../../database/database.php';
require_once("./../../database/controller.php");

if(isset($_POST['addCandidate'])) {
		
		if(empty($_POST['electionType']) && empty($_POST['electionName']) && empty($_POST['partyName']) && empty($_POST['electionStartDate']) && empty($_POST['electionEndDate']) && empty($_POST['conformationPassword']) ) {
			header("location:./../Home.php?Empty=All Fileds required");
		} else {

		$crud=new Controller();

		$electionType = $_POST['electionType']; 
		$electionName = $_POST['electionName'];
		$partyTitle = $_POST['partyName'];
		$candFN = $_POST['candFN'];
		$candMN = $_POST['candMN'];
		$candLN = $_POST['candLN'];
		$gender = $_POST['gender'];
		$candAge = $_POST['candAge'];
		$candAddress = $_POST['candAddress'];
		$electionID = md5($electionName);

		if ($electionType == "National") {
			$candLogoLocation = "http://192.168.144.144/Online Voting System/Admin CP/Uploads/candidate/National Election/";
			$voteLogoLocation = "http://192.168.144.144/Online Voting System/Admin CP/Uploads/party_logo/National Election/";
		}else{
			$candLogoLocation = "http://192.168.144.144/Online Voting System/Admin CP/Uploads/candidate/Other Election/";
			$voteLogoLocation = "http://192.168.144.144/Online Voting System/Admin CP/Uploads/party_logo/Other Election/";
		}

		if (!empty($_FILES["candidateImage"]["name"])) {
			$candImg = $candLogoLocation.$_FILES["candidateImage"]["name"];
			$target = $candLogoLocation.basename($_FILES["candidateImage"]["name"]);
			echo "<br>Candidate image received";
		}else{ $candImg = $candLogoLocation."candidate/Other Election/default_icon.jpg"; echo "<br>No candidate Image"; }

		if (!empty($_FILES["partySymbol"]["name"])) {
			$voteSymbol = $voteLogoLocation.$_FILES["partySymbol"]["name"];
			$symbolTarget = $voteLogoLocation.basename($_FILES["partySymbol"]["name"]);
			echo "<br>Vote Symbol Received";
		}else{ $voteSymbol = $voteLogoLocation."party_logo/vote_stamp.png"; echo "<br>No vote symbol received"; }

		echo "<br>Election Type: ".$electionType."<br>Election Name: ".$electionName."<br>Party Title: ".$partyTitle."<br>First Name: ".$candFN."<br>Middle Name: ".$candMN."<br>Last Name: ".$candLN."<br>Gender: ".$gender."<br>Age: ".$candAge."<br>Address: ".$candAddress."<br>Candidate Image: ".$candImg."<br>Vote Symbol: ".$voteSymbol."<br>";

		$candName = $candFN." ".$candMN." ".$candLN;
		$userEmail = $_SESSION['email'];
		$candID = md5($candFN.$candMN.$candLN);
		$userPass = hash("SHA3-512", $_POST['conformationPassword']);

		$query= "SELECT * FROM  admin WHERE Email = '$userEmail' AND Password = '$userPass'";
		$result=$crud->getData($query);

		if($result) {

			$insertQuery="INSERT INTO election_candidates (cand_id, election_type, election_id, election_name, cand_name, gender, age, party_name, cand_photo, address, vote_symbol) VALUES ('$candID','$electionType', '$electionID','$electionName','$candName','$gender','$candAge','$partyTitle','$candImg','$candAddress','$voteSymbol')";

			$addCandInfo=$crud->execute($insertQuery);	

		if ($electionType == "National") {
			if (!empty($_FILES["candidateImage"]["name"]) AND (!empty($_FILES["partySymbol"]))) {
			$candLogoFolderLocation = "./../../Uploads/candidate/National Election/".basename($_FILES["candidateImage"]["name"]);
			$voteLogoFileLocation = "./../../Uploads/party_logo/National Election/".basename($_FILES["partySymbol"]["name"]);
			echo $voteLogoFileLocation;
			}
		}else{
			if (!empty($_FILES["candidateImage"]["name"]) AND (!empty($_FILES["partySymbol"]))) {
			$candLogoFolderLocation = "./../../Uploads/candidate/Other Election/".basename($_FILES["candidateImage"]["name"]);
			$voteLogoFileLocation = "./../../Uploads/party_logo/Other Election/".basename($_FILES["partySymbol"]["name"]);
			}
		}

			if (isset($target)) {
				move_uploaded_file($_FILES["candidateImage"]["tmp_name"], $candLogoFolderLocation);
				echo "<br>Candidate Image moved successfully".$candLogoFolderLocation;
			}else{ echo "No Candidate Image";}
			if (isset($symbolTarget)) {
				move_uploaded_file($_FILES["partySymbol"]["tmp_name"], $voteLogoFileLocation);
				echo "<br>Vote Symbol moved successfully".$voteLogoFileLocation;
			}else{ echo "<br>No Voter Logo";}


			if ($addCandInfo) {
				header("location:./../../resources/Home.php?successMessage=New Candidate Added for Election ".$electionName."");
			}else{
				echo "<br><br>error";
				header("location:./../../resources/Home.php?errMessage=Sorry! could not add new candidate, either the candidate already in list or some information might have error while typing. So, please make sure you type correctly or check for the connection");			
			}

		} else {
			header('location:./../Home.php?errMessage=Invalid email or password!');
		}
	}
}
 ?>