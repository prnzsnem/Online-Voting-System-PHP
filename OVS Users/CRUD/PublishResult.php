<?php 

include_once("./../../Database/connection.php");
        
if(isset($_POST['userId']) && isset($_POST['pollId'])) {
    
    $userId = $_POST['userId'];
    $pollId = $_POST['pollId'];
    
    $publishResultOfSelPoll = "UPDATE elections SET res_pub_status = 'Published' WHERE creator_uid = '$userId' AND election_id = '$pollId'";

    if ($conn->query($publishResultOfSelPoll) === TRUE) {
        echo "success";
    }else{
        echo "unsuccessful";
    }
    
}else{
    echo "Some data missing please check every field is filled";
}

?>