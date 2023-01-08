<?php 

include_once("./../../Database/connection.php");
		
if(isset($_POST['userId']) && isset($_POST['canId']) && isset($_POST['pollId'])) {
    
    $userId = $_POST['userId'];
    $canId = $_POST['canId'];
    $pollId = $_POST['pollId'];

    $deleteSelectedCan = "DELETE FROM election_candidates WHERE creator_uid = '$userId' AND cand_id = '$canId' AND election_id = '$pollId'";

	if ($conn->query($deleteSelectedCan) === TRUE) {
        echo "success";
    }else{
        echo "unsuccessful";
    }  
}else{
    echo "Some data missing please check every field is filled";
}
 ?>