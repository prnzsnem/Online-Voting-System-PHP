<?PHP
    
include_once("./../Database/connection.php"); 

date_default_timezone_set('Asia/Kathmandu');
error_reporting(E_ALL);
ini_set('display_errors', 1);

if(isset($_POST['userName']) && isset($_POST['candidateID']) && isset($_POST['eleName']) && isset($_POST['userPass'])) {
  $electName = $_POST['eleName'];
  $electionID = md5($_POST['eleName']);
  $candidateID = $_POST['candidateID'];
  $userName = strtolower($_POST['userName']);
  $voterID = md5($userName);
  $userPassword = hash('SHA3-512', $_POST['userPass']);
  $votedDate = date('Y-m-d h:i:s');

  $candidateCheck = $conn -> query("SELECT * FROM election_candidates WHERE election_id = '$electionID' AND cand_id = '$candidateID'");
    if (mysqli_num_rows($candidateCheck)>0) {
      while ($row = mysqli_fetch_assoc($candidateCheck)) {
        $obtVote = $row['obtained_votes'];
      }

      $checkVoteStatus = $conn -> query("SELECT * FROM vote_permission WHERE voter_id = '$voterID' AND election_id = '$electionID'");
      if (mysqli_num_rows($checkVoteStatus)>0) {
        while ($rows = mysqli_fetch_assoc($checkVoteStatus)) {
          $votPermit = $rows['vote_permission'];
          $votStat = $rows['vote_status'];          
        }
        if ($votPermit == "Yes" AND $votStat == "Not Voted") {
          $voterQuery = $conn -> query("SELECT * FROM election_voters WHERE voter_id = '$voterID' AND username = '$userName' AND password = '$userPassword'");

          if (mysqli_num_rows($voterQuery)>0) { while ($data = mysqli_fetch_assoc($voterQuery)) { $FN = $data['full_name'];}}

            $updateVoter = $conn -> query("UPDATE vote_permission SET vote_status = 'Voted', voted_time = '$votedDate' WHERE election_id = '$electionID' AND voter_id = '$voterID'");
            if ($updateVoter) {
              $updateVote = $conn -> query("UPDATE election_candidates SET obtained_votes = $obtVote + 1 WHERE election_id = '$electionID' AND cand_id = '$candidateID'");
              if ($updateVote) {
                $updateVotedVoter = $conn -> query("INSERT INTO voted_voters (voter_id, full_name, election_id, vote_status, vote_date) VALUES ('$voterID', '$FN', '$electionID', 'Voted', '$votedDate')");
                if ($updateVoter) {
                  echo "Vote Successful";
                }else{
                  echo "Voted_voter table unable to update";
                }
              }else{
                echo "vote_permission table could not be updated";
              }
            }else{
              echo "Sorry! your vote is unsuccessful";
            }
        }else{
          echo "Already Voted";
        }
      }else{
        echo "Sorry! you don't have vote permission";
      }

    }else{
      echo "You cannot vote on this election";
    }
}else{
  echo "Transmission Error";
}
?>