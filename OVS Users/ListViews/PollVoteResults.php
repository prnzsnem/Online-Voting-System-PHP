<?php

include_once("./../../Database/connection.php"); 
if(isset($_POST['userId']) && isset($_POST['pollId'])){
    $userId = $_POST['userId'];
    $pollId = $_POST['pollId'];
    
    $queryPermission = mysqli_query($conn, "SELECT * FROM vote_permission WHERE election_id ='$pollId' AND voter_id = '$userId' AND vote_status = 'Voted'");
    $queryPubStat = mysqli_query($conn, "SELECT * FROM elections WHERE election_id ='$pollId' AND res_pub_status = 'Published'");
    $query =  mysqli_query($conn,"SELECT * FROM election_candidates WHERE election_id ='$pollId'");
    
    if (mysqli_num_rows($queryPermission)>0){
        
        if (mysqli_num_rows($queryPubStat)>0){
            
            if (mysqli_num_rows($query)>0) {
                
              while($row = mysqli_fetch_array($query)){
                $flag[] = $row;
              }
              print(json_encode($flag));
              
            }else{
                echo "Data Not Found";
            }
            
        }else{
            echo "NPub";
        }
        
    }else{
        echo "NPer";
    }
    
    mysqli_close($conn);
}

?>