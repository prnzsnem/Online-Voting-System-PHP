<?PHP
    
include_once("./../Database/connection.php"); 

error_reporting(E_ALL);
ini_set('display_errors', 1);

if(isset($_POST['pollId']) && isset($_POST['pollType']) && isset($_POST['userId']) && isset($_POST['userFN']) && isset($_POST['userPass'])) {
  $electionID = $_POST['pollId'];
  $pollType = $_POST['pollType'];
  $userId = strtolower($_POST['userId']);
  $userFN = ucwords($_POST['userFN']);
  $userPassword = $_POST['userPass'];

  $checkVoterInPermission = $conn -> query("SELECT * FROM vote_permission WHERE election_id = '$electionID' AND voter_name = '$userFN' AND voter_id = '$userId'");
  if (mysqli_num_rows($checkVoterInPermission)>0) {
    while ($rows = mysqli_fetch_assoc($checkVoterInPermission)) {
      $permission = $rows['vote_permission'];
      $status = $rows['vote_status'];
    }
      if ($permission == "Yes") {
        if ($status == "Not Voted") {
          $returnElectionType = $conn -> query("SELECT election_type FROM elections WHERE election_id = '$electionID'");
          if (mysqli_num_rows($returnElectionType)>0) {
            while ($eleType = mysqli_fetch_assoc($returnElectionType)) {
              $electType = $eleType['election_type'];
            }
            echo "success";
          }
        }else{
          echo "Already Voted";
        }
      }else{
        echo "Not Granted";
      }
  }else{
    echo "NRT";
  }
}else{
    echo "Transmission Error";
}
?>