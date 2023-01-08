<?php

$allowedExts = array("gif", "jpeg", "jpg", "png");
$extension = end(explode(".", $_FILES["file"]["name"]));
if ((($_FILES["file"]["type"] == "image/gif")
|| ($_FILES["file"]["type"] == "image/jpeg")
|| ($_FILES["file"]["type"] == "image/jpg")
|| ($_FILES["file"]["type"] == "image/pjpeg")
|| ($_FILES["file"]["type"] == "image/x-png")
|| ($_FILES["file"]["type"] == "image/png"))
&& ($_FILES["file"]["size"] < 200000)
&& in_array($extension, $allowedExts)) {
    
      if ($_FILES["file"]["error"] > 0){
            echo "Error Code: " . $_FILES["file"]["error"];
        } else {
    
            if (file_exists("/Uploads/candidate/" . $_FILES["file"]["name"])) {
                echo $_FILES["file"]["name"] . " already exists. ";
                
            } else {
                move_uploaded_file($_FILES["file"]["tmp_name"], "/Uploads/candidate/" . $_FILES["file"]["name"]);
            }
        }
        
  } else {
    echo "Invalid file";
  }
 
?>