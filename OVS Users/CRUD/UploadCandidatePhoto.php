<?php 

include_once("./../../Database/connection.php");


if(isset($_POST['canName']) && isset($_POST['canImage']) && isset($_POST['canId'])){
    $canName = $_POST['canName'];
    $canImage = $_POST['canImage'];
    
    $canId = $_POST['canId'];
    
    $uploadPath = "./../..//Uploads/candidate/".$canName.".jpg";
    $uploadPathUrl = "https://princeitsolution.000webhostapp.com/Uploads/candidate/".$canName.".jpg";
    
    $sql = "UPDATE election_candidates SET cand_photo = '$uploadPathUrl' WHERE cand_id = 'cf87d0fdcfc3fad338833fb8679189cc'";
		
	if(mysqli_query($conn,$sql)){
	    file_put_contents($uploadPath, base64_decode($canImage));
	    echo "success";
	}else{
	    echo "unsuccess";
	}
}else{
    echo "Incomplete Data";
}

?>