<?php 

include_once("./../../Database/connection.php");


if(isset($_POST['profileImgName']) && isset($_POST['profileImage']) && isset($_POST['bgiName']) && isset($_POST['bgImg']) && isset($_POST['userId'])){
    $profileImage = $_POST['profileImage'];
    $profileImgName = $_POST['profileImgName'];
    
    $bgImage = $_POST['bgImg'];
    $bgiName = $_POST['bgiName'];
    
    $userId = $_POST['userId'];
    
    $imageId = md5($userId.$profileImgName.$bgiName);
    
    if($profileImage != "" && $bgImage != ""){
        $ppUploadPath = "./../../Uploads/user_images/".$profileImgName.".jpg";
        $ppUploadPathUrl = "https://princeitsolution.000webhostapp.com/Uploads/user_images/".$profileImgName.".jpg";
        
        $uploadBGIPath = "./../../Uploads/user_images/".$bgiName.".jpg";
        $uploadBGIPathUrl = "https://princeitsolution.000webhostapp.com/Uploads/user_images/".$bgiName.".jpg";
        
        $updateSql = "UPDATE user_images SET flag = 'Off' WHERE user_id = '$userId'";
        $sql = "INSERT INTO user_images (user_id, user_image, user_bgi, flag) VALUES ('$userId','$ppUploadPathUrl','$uploadBGIPathUrl','On')";
        $uVPI = "UPDATE vote_permission SET voter_photo = '$ppUploadPathUrl' WHERE voter_id = '$userId'";
        
        if(mysqli_query($conn, $updateSql)){
            
            if(mysqli_query($conn,$sql)){
                file_put_contents($ppUploadPath, base64_decode($profileImage));
                file_put_contents($uploadBGIPath, base64_decode($bgImage));
                
                if(mysqli_query($conn,$uVPI)){
                    echo "success";
                }else{
                    echo "User Image in vote permission update failed";   
                }
                
            }else{ echo "Upload Failed"; }
            
        }else{ echo "User Image Update Failled."; }
        
        
    }else if($profileImage != "" && $bgImage == ""){
        $ppUploadPath = "./../../Uploads/user_images/".$profileImgName.".jpg";
        $ppUploadPathUrl = "https://princeitsolution.000webhostapp.com/Uploads/user_images/".$profileImgName.".jpg";
        
        $sql = "UPDATE user_images SET user_image = '$ppUploadPathUrl' WHERE user_id = '$userId'";
        $uVPI = "UPDATE vote_permission SET voter_photo = '$ppUploadPathUrl' WHERE voter_id = '$userId'";
        if(mysqli_query($conn,$sql)){
            file_put_contents($ppUploadPath, base64_decode($profileImage));
            
            if(mysqli_query($conn,$uVPI)){
                echo "success";
            }else{
                echo "User Image in vote permission update failed";   
            }
            
        }else{ echo "Upload Failed"; }
        
        
    }else if($profileImage == "" && $bgImage != ""){
        $uploadBGIPath = "./../../Uploads/user_images/".$bgiName.".jpg";
        $uploadBGIPathUrl = "https://princeitsolution.000webhostapp.com/Uploads/user_images/".$bgiName.".jpg";
        
        $sql = "UPDATE user_images SET user_bgi = '$uploadBGIPathUrl' WHERE user_id = '$userId'";
        if(mysqli_query($conn,$sql)){
            file_put_contents($uploadBGIPath, base64_decode($bgImage));
            
            echo "success";
            
        }else{ echo "Upload Failed"; }
    }
    
}else{ echo "Incomplete Data"; }

?>