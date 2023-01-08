<?php 

include_once("./../../Database/connection.php");
        
if(isset($_POST['userId']) && isset($_POST['pollId'])) {
    
    $userId = $_POST['userId'];
    $pollId = $_POST['pollId'];
    
    $deleteSelectedPoll = "DELETE FROM elections WHERE creator_uid = '$userId' AND election_id = '$pollId'";
    $deleteCandidates = "DELETE FROM election_candidates WHERE creator_uid = '$userId' AND election_id = '$pollId'";
    $deleteVoters = "DELETE FROM vote_permission WHERE creator_uid = '$userId' AND election_id = '$pollId'";

    if ($conn->query($deleteSelectedPoll) && $conn->query($deleteCandidates) && $conn->query($deleteVoters) === TRUE) {
        echo "deleted";
    }else{
        echo "unsuccessful";
    }
    
}else{
    echo "Some data missing please check every field is filled";
}

?>