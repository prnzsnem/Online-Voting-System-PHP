<?PHP
    
include_once("./../../Database/connection.php");

date_default_timezone_set('Asia/Kathmandu');
error_reporting(E_ALL);
ini_set('display_errors', 1);

if(isset($_POST['userId']) && isset($_POST['canId']) && isset($_POST['pollId'])) {
    $userId = $_POST['userId'];
    $canId = $_POST['canId'];
    $pollId = $_POST['pollId'];
    $votedDate = date('Y-m-d h:i:s');

  $candidateCheck = $conn -> query("SELECT * FROM election_candidates WHERE election_id = '$pollId' AND cand_id = '$canId'");
    if (mysqli_num_rows($candidateCheck)>0) {
      while ($row = mysqli_fetch_assoc($candidateCheck)) {
        $obtVote = $row['obtained_votes'];
      }

      $checkVoteStatus = $conn -> query("SELECT * FROM vote_permission WHERE voter_id = '$userId' AND election_id = '$pollId'");
      if (mysqli_num_rows($checkVoteStatus)>0) {
        while ($rows = mysqli_fetch_assoc($checkVoteStatus)) {
          $votPermit = $rows['vote_permission'];
          $votStat = $rows['vote_status'];          
        }
        if ($votPermit == "Yes" AND $votStat == "Not Voted") {
          $voterQuery = $conn -> query("SELECT * FROM election_voters WHERE voter_id = '$userId'");

          if (mysqli_num_rows($voterQuery)>0) {
            while ($data = mysqli_fetch_assoc($voterQuery)) { 
              $FN = $data['full_name'];}
            }

            $updateVoter = $conn -> query("UPDATE vote_permission SET vote_status = 'Voted', voted_time = '$votedDate' WHERE election_id = '$pollId' AND voter_id = '$userId'");
            if ($updateVoter) {
              $updateVote = $conn -> query("UPDATE election_candidates SET obtained_votes = $obtVote + 1 WHERE election_id = '$pollId' AND cand_id = '$canId'");
              if ($updateVote) {
                $updateVotedVoter = $conn -> query("INSERT INTO voted_voters (voter_id, full_name, election_id, vote_status, vote_date) VALUES ('$userId', '$FN', '$pollId', 'Voted', '$votedDate')");
                if ($updateVotedVoter) {
                  echo "success";
                }else{
                  $unChangeVoter = $conn -> query("UPDATE vote_permission SET vote_status = 'Not Voted', voted_time = '0000-00-00 00:00:00' WHERE election_id = '$pollId' AND voter_id = '$userId'");
                  $unchangeVote = $conn -> query("UPDATE election_candidates SET obtained_votes = $obtVote - 1 WHERE election_id = '$pollId' AND cand_id = '$canId'");
                  if ($unChangeVoter AND $unchangeVote) {
                    echo "Sorry due to some internal proble your vote could not be successful. Please try again after a while";
                  }else{
                    echo "Your vote is successful but will be discarded because some problem occourd while sending your vote. Appology for the inconvinience";
                  }                  
                }
              }else{                
                  $unChangeVoter = $conn -> query("UPDATE vote_permission SET vote_status = 'Not Voted', voted_time = '0000-00-00 00:00:00' WHERE election_id = '$pollId' AND voter_id = '$userId'");
                echo "unsuccessful";
              }
            }else{
              echo "vote_permission table could not be updated";
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