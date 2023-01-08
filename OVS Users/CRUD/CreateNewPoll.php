<?php 

include_once("./../../Database/connection.php");
		
if(isset($_POST['userId']) && isset($_POST['pollId']) && isset($_POST['pollType']) && isset($_POST['pollName']) && isset($_POST['pollIcon']) && isset($_POST['pollStartDateTime']) && isset($_POST['pollEndDateTime'])) {
    
    $userId = $_POST['userId'];
	$pollID = $_POST['pollId'];
	$pollType = $_POST['pollType'];
	$pollName = ucwords($_POST['pollName']);
	$startDate = $_POST['pollStartDateTime'];
	$endDate = $_POST['pollEndDateTime'];
	$pollImage = $_POST['pollIcon'];
	$pollCreatedDate = date("Y-m-d h:i:s");

	$checkAvailability = $conn -> query("SELECT * FROM elections WHERE election_id = '$pollID'");
	if (mysqli_num_rows($checkAvailability)>0) {
	    echo "SPAExist";
	}else{
		$createPoll = "INSERT INTO elections (creator_uid, election_id, election_type, election_name, no_of_candidates, election_start_date, election_end_date, election_icon, election_created_date, res_pub_status, poll_status) VALUES ('$userId','$pollID','$pollType','$pollName','0','$startDate','$endDate','$pollImage','$pollCreatedDate','Waiting','Waiting')";
		if ($conn->query($createPoll) === TRUE) {
            echo "success";
        }else{
            echo "unsuccessful";
        }
	}
}else{
    echo "Some data missing please check every field is filled";
}
 ?>