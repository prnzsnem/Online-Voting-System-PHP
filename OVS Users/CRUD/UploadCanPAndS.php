<?php 

include_once("./../../Database/connection.php");

if(isset($_POST['name']) && isset($_FILES['image']['name']) && isset($_POST['userId']) && isset($_POST['canId']) && isset($_POST['pollType']) && isset($_POST['operation'])){
    $creatorId = $_POST['userId'];
    $canId = $_POST['canId'];
    $name = $_POST['pollIcon'];
    $pollType = $_POST['pollType'];
    $operation = $_POST['operation'];
    $canPhotoUrl = "https://princeitsolution.000webhostapp.com/Uploads/candidate/";
    $voteSymbolUrl = "https://princeitsolution.000webhostapp.com/Uploads/party_logo/";
    
	$fileinfo = pathinfo($_FILES['image']['name']);
	$extension = $fileinfo['extension'];
	
	if($pollType == "national"){
	    $imgTargetFolder = $canPhotoUrl;
	    $symbolTargetFolder = $voteSymbolUrl;
	    if($operation == "photo"){ $imgTargetFolder = $canPhotoUrl."National Election/"; }
    	else{ $imgTargetFolder = $voteSymbolUrl."National Election/"; }
	}else {
	    if($operation == "photo"){ $imgTargetFolder = $canPhotoUrl; }
	    else{ $imgTargetFolder = $voteSymbolUrl; }
	}
	
	
	$canPhoto = $imgTargetFolder.$name . '.' . $extension;
	$canVoteSymbol = $symbolTargetFolder.$name . '.' . $extension;
	
	try{
		move_uploaded_file($_FILES['image']['tmp_name'],$canPhoto);
		$sql = "UPDATE election_candidates SET cand_photo = '$canPhoto' WHERE creator_uid = '$creatorId' AND cand_id = '$canId'";
		
		if(mysqli_query($con,$sql)){
			$response['error'] = false; 
			$response['url'] = $file_url; 
			$response['name'] = $name;
		}
	}catch(Exception $e){
		$response['error']=true;
		$response['message']=$e->getMessage();
	}
	echo json_encode($response);
	mysqli_close($con);
}

?>