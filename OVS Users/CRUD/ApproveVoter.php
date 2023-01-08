<?php 

include_once("./../../Database/connection.php");
        
if(isset($_POST['userId']) && isset($_POST['pollId']) && isset($_POST['requesterId']) && isset($_POST['operation'])) {
    
    $userId = $_POST['userId'];
    $pollId = $_POST['pollId'];
    $requesterId = $_POST['requesterId'];
    $operation = $_POST['operation'];
    
    if($operation == "delete"){
        $deleteSelectedPoll = "DELETE FROM vote_permission WHERE creator_uid = '$userId' AND election_id = '$pollId' AND voter_id = '$requesterId'";
    
        if ($conn->query($deleteSelectedPoll) === TRUE) {
            // echo "success";
            echo $userId.", ".$pollId.", ".$requesterId.", ".$operation;
        }else{
            echo "unsuccessful";
        }  
        
    }else{
        $approveVoter = "UPDATE vote_permission SET vote_permission = 'Yes' WHERE creator_uid = '$userId' AND election_id = '$pollId' AND voter_id = '$requesterId'";
    
        if ($conn->query($approveVoter) === TRUE) {
            echo "success";
        }else{
            echo "unsuccessful";
        }
    }
    
}else{
    echo "Some data missing please check every field is filled";
}
 ?>