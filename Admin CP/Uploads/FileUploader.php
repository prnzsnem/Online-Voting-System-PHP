<?php

$rootPath = $_SERVER['DOCUMENT_ROOT']."/Online Voting System/Admin CP";
require_once $rootPath."/Database/connection.php";

		class FileUploader extends DbConnection{

			public function __construct() {
				parent::__construct();
			}

			public function UploadThisFile($uploadType, $uploadFile, $credential){
				
				$rootPath = $_SERVER['DOCUMENT_ROOT']."/Online Voting System/Admin CP/";
				require_once $rootPath."Database/controller.php";

				if ($uploadType == "user") { $target_dir = "./../Uploads/user_images/"; }
				else if($uploadType == "pollImg"){ $target_dir = "./../Uploads/election_image/"; }
				else if ($uploadType == "candidate") { $target_dir = "./../Uploads/candidate/"; }
				else if ($uploadType == "logo") { $target_dir = "./../Uploads/party_logo/"; }
				else{ $target_dir = "./../Uploads/voter_images/"; }

				$target_file = $target_dir.basename($_FILES["fileToUpload"]["name"]);
				$uploadOk = 1;
				$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

				// Check if image file is a actual image or fake image
				if(isset($_POST["submit"])) {
				  $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
				  if($check !== false) {
				    echo "File is an image - " . $check["mime"] . ".";
				    $uploadOk = 1;
				  } else {
				    echo "File is not an image.";
				    $uploadOk = 0;
				  }
				}

				// Check if file already exists
				if (file_exists($target_file)) {
				  echo "Sorry, file already exists.";
				  $uploadOk = 0;
				}

				// Check file size
				if ($_FILES["fileToUpload"]["size"] > 10000000) {
				  echo "Sorry, your file is too large.";
				  $uploadOk = 0;
				}

				// Allow certain file formats
				if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
				&& $imageFileType != "gif" ) {
				  echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
				  $uploadOk = 0;
				}

				// Check if $uploadOk is set to 0 by an error
				if ($uploadOk == 0) {
				  echo " File upload failed.";
				// if everything is ok, try to upload file
				} else {
				  if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
					$crud=new Controller();

					if ($uploadType == "user") { 
						$uploadImage = "UPDATE admin SET user_image = '$target_file' WHERE Email = '$credential'"; 
					} else if ($uploadType == "pollImg") { 
						$uploadImage = "UPDATE election SET election_icon = '$target_file' WHERE election_id = '$credential'"; 
					} else if ($uploadType == "candidate") { 
						$uploadImage = "UPDATE election_candidates SET cand_photo = '$target_file' WHERE cand_id = '$credential'"; 
					} else if ($uploadType == "logo") { 
						$uploadImage = "UPDATE election_candidates SET vote_symbol = '$target_file' WHERE Email = '$credential'"; 
					}
					$crud->execute($uploadImage);

				  } else {
				    echo "Sorry, there was an error uploading your file.";
				  }	
				}
			}
		}
?>