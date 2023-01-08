<?PHP

include_once("./../Database/connection.php"); 

error_reporting(E_ALL);
ini_set('display_errors', 1);

if(isset($_POST['voterName']) && !empty(isset($_POST['voterPassword'])) && !empty(isset($_POST['electionType'])) && !empty(isset($_POST['electionName'])) && !empty(isset($_POST['voterUName']))){

  $voterID = md5($_POST['voterUName']);
  $voterName = ucwords($_POST['voterName']);
  $voterIDCardN = hash("SHA3-512", $_POST['voterIDCardNumber']);
  $voterPassword = hash('SHA3-512', $_POST['voterPassword']);
  $electionType = $_POST['electionType'];
  $electionName = $_POST['electionName'];
  $electionID = md5($electionName);

  $alreadyVotedQuery = $conn -> query("SELECT * FROM vote_permission WHERE voter_id = '$voterID' AND election_id = '$electionID'");
  if ($electionType == "College" || $electionType == "School" || $electionType == "Office") {
      if ($electionType == "College") {
        $fieldName = "college_id";
      }elseif ($electionType == "School") {
        $fieldName = "school_id";
      }elseif ($electionType == "Office") {
        $fieldName = "office_id";
      }

        $voterQuery = $conn -> query("SELECT * FROM election_voters WHERE $fieldName = '$voterIDCardN' AND password = '$voterPassword'");
        if (mysqli_num_rows($voterQuery)>0) {
            if (mysqli_num_rows($alreadyVotedQuery)>0) {
              while ($row = mysqli_fetch_assoc($alreadyVotedQuery)) {
                $voteStatus = $row['vote_status'];
              }
              if ($voteStatus == "Voted") { echo "ALready Voted"; }else{ echo "Voter Verified"; }
            }
        }else{ echo "Voter Not Found"; }

  }else{
      $voterQuery = $conn -> query("SELECT * FROM vote_permission WHERE election_id = '$electionID' AND voter_id = '$voterID'");
      if (mysqli_num_rows($voterQuery)>0) {
        while ($row = mysqli_fetch_assoc($alreadyVotedQuery)) {
          $voteStatus = $row['vote_status'];
        } 
        if ($voteStatus == "Voted") { echo "ALready Voted"; }else{ echo "Voter Verified"; }
      }else{ echo "Voter Not Found"; }
  }
  
}else{
  echo "Incorrect Information";
}

?>