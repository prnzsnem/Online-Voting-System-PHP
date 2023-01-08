<?php 

include_once("./../../Database/connection.php");


if(isset($_POST['imgName']) && isset($_POST['pollImg']) && isset($_POST['pollId'])){
    $imageName = $_POST['imgName'];
    $pollImage = $_POST['pollImg'];
    
    $pollId = $_POST['pollId'];
    
    $uploadPath = "./../../Uploads/election_image/".$imageName.".jpg";
    $uploadPathUrl = "https://princeitsolution.000webhostapp.com/Uploads/election_image/".$imageName.".jpg";
    
    $sql = "UPDATE elections SET election_icon = '$uploadPathUrl' WHERE election_id = '$pollId'";
        
    if(mysqli_query($conn,$sql)){
        file_put_contents($uploadPath, base64_decode($pollImage));
        echo "success";
    }else{
        echo "unsuccess";
    }
}else{
    echo "Incomplete Data";
}

?>