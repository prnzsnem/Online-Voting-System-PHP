<?php 

include_once("./../../Database/connection.php");


if(isset($_POST['canName']) && isset($_POST['canImage']) && isset($_POST['voteStampName']) && isset($_POST['voteStamp']) && isset($_POST['canId'])){
    $canName = $_POST['canName'];
    $canImage = $_POST['canImage'];
    
    $canVSName = $_POST['voteStampName'];
    $canVS = $_POST['voteStamp'];
    
    $canId = $_POST['canId'];
    
    $uploadPath = "./../../Uploads/candidate/".$canName.".jpg";
    $uploadPathUrl = "https://princeitsolution.000webhostapp.com/Uploads/candidate/".$canName.".jpg";
    
    $uploadVSPath = "./../../Uploads/party_logo/".$canVSName.".jpg";
    $uploadVSPathUrl = "https://princeitsolution.000webhostapp.com/Uploads/party_logo/".$canVSName.".jpg";
    
    $sql = "UPDATE election_candidates SET cand_photo = '$uploadPathUrl', vote_symbol = '$uploadVSPathUrl' WHERE cand_id = '$canId'";
        
    if(mysqli_query($conn,$sql)){
        file_put_contents($uploadPath, base64_decode($canImage));
        file_put_contents($uploadVSPath, base64_decode($canVS));
        echo "success";
    }else{
        echo "unsuccess";
    }
}else{
    echo "Incomplete Data";
}

?>