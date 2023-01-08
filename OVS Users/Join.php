<?PHP
    
include_once("./../Database/connection.php"); 

error_reporting(E_ALL);
ini_set('display_errors', 1);

if(isset($_POST['pollCUID']) && isset($_POST['voterFN']) && isset($_POST['userId']) && isset($_POST['userPass']) && isset($_POST['pollID']) && isset($_POST['selectedElection']) && isset($_POST['pollType'])) {

    date_default_timezone_set('Asia/Kathmandu');
    $pollCretorUID = $_POST['pollCUID'];
    $voterFUllName = ucwords($_POST['voterFN']);
    $userID = $_POST['userId'];
    $userIDCardNo = $_POST['userIDCard'];
    $userPassword = $_POST['userPass'];
    $pollId = $_POST['pollID'];
    $pollType = $_POST['pollType'];
    $pollName = $_POST['selectedElection'];
    $userIDCardNumber = $_POST['userIDCard'];
    $joined_at = date('Y-m-d h:i:s');


    $typeElection = $conn -> query("SELECT * FROM elections WHERE election_id = '$pollId' AND election_name = '$pollName'");
    $checkVoter = $conn -> query("SELECT * FROM election_voters WHERE voter_id = '$userID' AND full_name = '$voterFUllName' AND password = '$userPassword'");
    $permissionCheck = $conn -> query("SELECT * FROM vote_permission WHERE election_id = '$pollId' AND voter_id = '$userID' AND vote_permission = 'No'");
    $getUserImage = $conn->query("SELECT * FROM user_images WHERE user_id = '$userID' AND flag = 'On'");
    if (mysqli_num_rows($getUserImage)>0) {
        while ($CV = mysqli_fetch_assoc($getUserImage)) {
            $userImage = $CV['user_image'];
        }
    }
    $sqlQuery = $conn -> query("INSERT INTO vote_permission (creator_uid, election_id, election_name, voter_id, voter_name, voter_photo, vote_permission, vote_status, voted_time, election_join_date) VALUES ('$pollCretorUID','$pollId','$pollName','$userID','$voterFUllName','$userImage','No','Not Voted','0000-00-00 00:00:00','$joined_at')");
    
      
    if (mysqli_num_rows($checkVoter)>0) {
        while ($CV = mysqli_fetch_assoc($checkVoter)) {
            $citzID = $CV['citizenship_number'];
            $colzID = $CV['college_id'];
            $ofcID = $CV['office_id'];
            $schID = $CV['school_id'];
        }

      
          if (mysqli_num_rows($permissionCheck)>0) {
            echo "RASent";
          }else{
                if($pollType == "National"){ $fieldName = "citizenship_number"; }
                else if ($pollType == "College" || $pollType == "School" || $pollType == "Office") { $fieldName = strtolower($pollType)."_id"; }
                else{ $fieldName = ""; }
    
              
              if($sqlQuery === TRUE){
                  if($fieldName != ""){
                      
                    $updateVoter = $conn -> query("UPDATE election_voters SET $fieldName = '$userIDCardNumber' WHERE voter_id = '$userID' AND password = '$userPassword'");
                    
                    if($updateVoter === TRUE){ echo "Success"; }
                    else{ echo "Unsuccessful"; }
                    
                  }else{
                    echo "Success";
                  }
              }else{
                  echo "Unsuccessful";
              }
          }
      
    }else{
        echo "Sorry! Your information do not matched. Please insert correct information and try again.";
    }

}else{
    echo "Error occour while fetching data";
}
?>