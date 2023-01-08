<?php 

include_once("./../../Database/connection.php");
		
if(isset($_POST['userId']) && isset($_POST['canId'])  && isset($_POST['pollType']) && isset($_POST['pollId'])  && isset($_POST['pollName']) && isset($_POST['canName']) && isset($_POST['gender']) && isset($_POST['age']) && isset($_POST['partyName']) && isset($_POST['canPhoto']) && isset($_POST['address']) && isset($_POST['voteSymbol']) ) {
    
    $userId = $_POST['userId'];
    $canId = $_POST['canId'];
	$pollType = $_POST['pollType'];
	$pollId = $_POST['pollId'];
	$pollName = ucwords($_POST['pollName']);
	$canName = $_POST['canName'];
	$canGender = $_POST['gender'];
	$canAge = $_POST['age'];
	$partyName = $_POST['partyName'];
	$canPhoto = $_POST['canPhoto'];
	$canAddress = $_POST['address'];
	$voteSymbol = $_POST['voteSymbol'];
	$pollJoinedDate = date("Y-m-d h:i:s");
	$totalCandidates = null;
            
            
	$checkAvailability = $conn -> query("SELECT * FROM election_candidates WHERE cand_id = '$canId'");
	if (mysqli_num_rows($checkAvailability)>0) {
	    echo "CAExist";
	}else{
		$addCandidate = "INSERT INTO election_candidates (creator_uid, cand_id, election_type, election_id, election_name, cand_name, gender, age, party_name, cand_photo, address, vote_symbol, obtained_votes, joined_date) VALUES ('$userId','$canId','$pollType','$pollId','$pollName','$canName','$canGender','$canAge','$partyName','$canPhoto','$canAddress','$voteSymbol','0','$pollJoinedDate')";
		if ($conn->query($addCandidate) === TRUE) {
        
        $getTotalCandidate = "SELECT * FROM election_candidates WHERE election_id = '$pollId'";
        $result = mysqli_query($conn, $getTotalCandidate);
        if($result){ $totalCandidates = mysqli_num_rows($result); }
        
		    $updateElection = $conn -> query("UPDATE elections SET no_of_candidates = '$totalCandidates' WHERE election_id = '$pollId'");
		    if($updateElection){
		        echo "success";
		    }
        }else{
            echo "unsuccessful";
        }
	}
}else{
    echo "Some data missing please check every field is filled";
}
 ?>