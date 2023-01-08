<?PHP

include_once("./../../Database/connection.php"); 
if(isset($_POST['userId']) && isset($_POST['pollId'])){
    $userId = $_POST['userId'];
    $pollId = $_POST['pollId'];
    
    $query =  mysqli_query($conn,"SELECT * FROM vote_permission WHERE creator_uid = '$userId' AND election_id ='$pollId' AND  vote_permission = 'No'");
    if (mysqli_num_rows($query)>0) {
      while($row = mysqli_fetch_array($query)){
        $flag[] = $row;
      }
      print(json_encode($flag));
    }else{
        echo "FNF";
        mysqli_close($conn);
    }
}

?>