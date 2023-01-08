<?php 

session_start();

include_once './../../database/database.php';
require_once("./../../database/controller.php");

if(isset($_POST['createElection'])) {
		
		if(empty($_POST['electionType']) && empty($_POST['electionName']) && empty($_POST['noOfCandidates']) && empty($_POST['electionStartDate']) && empty($_POST['electionEndDate']) && empty($_POST['conformationPassword']) ) {
			header("location:./../Home.php?Empty=All Fileds required");
		}
		 else {
		$crud=new Controller();

		$electionType = $_POST['electionType'];
		$electionName = $_POST['electionName'];
		$totalCandidate = $_POST['noOfCandidates'];
		$startDate = $_POST['electionStartDate'];
		$endDate = $_POST['electionEndDate'];

		$userEmail = $_SESSION['email'];
		$userPass = hash("SHA3-512", $_POST['conformationPassword']);
		$query= "SELECT * FROM  admin WHERE Email = '$userEmail' AND Password = '$userPass'";
		$result=$crud->getData($query);

		$imgTargetFolder = "http://192.168.144.144/Online Voting System/Admin CP/Uploads/election_image/";
		if (!empty($_FILES["eleImg"]["name"])) {
			$electionImage = $imgTargetFolder.$_FILES["eleImg"]["name"];
			$target = $imgTargetFolder.basename($_FILES["eleImg"]["name"]);
		}else{
			$electionImage = $imgTargetFolder."/default_ele_img.png";
		}

		if($result) {

			$eleID = md5($electionName);
echo $eleID;
			$checkAvailability = $connection -> query("SELECT * FROM elections WHERE election_id = '$eleID'");
			if (mysqli_num_rows($checkAvailability)>0) {
				header('location:./../Home.php?errMessage=Sorry! Election with similar name like '.$electionName.' already in the list. So, please try again with different election name');
			}else{
				$insertQuery="INSERT INTO elections (election_id, election_type, election_name, no_of_candidates, election_start_date, election_end_date, election_icon) VALUES ('$eleID','$electionType','$electionName','$totalCandidate','$startDate','$endDate','$electionImage')";

				$addElection=$crud->execute($insertQuery);

			if (isset($target)) {
				$fileTarget = "./../../Uploads/election_image/".basename($_FILES["eleImg"]["name"]);
				move_uploaded_file($_FILES["eleImg"]["tmp_name"], $fileTarget);
			}

				if ($addElection) {
					header("location:./../../resources/Home.php?successMessage=New Election Added for date ".$startDate);
				}else{
					echo "Sorry!!! couldn't create new election.";	
					header("location:./../../resources/Home.php?errMessage=Sorry! could not create new election, either the election name already in list or some information might have error while typing. So, please make sure you type correctly or check for the connection");	
				}
			}

		} else {
			header('location:./../Home.php?errMessage=Invalid email or password!');
		}
	}
}
 ?>