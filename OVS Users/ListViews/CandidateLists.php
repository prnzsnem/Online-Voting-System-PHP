<?PHP

include_once("./../../Database/connection.php");

if(isset($_POST['pollId'])){
    $pollId = $_POST['pollId'];
    
    $query =  mysqli_query($conn,"SELECT * FROM election_candidates WHERE election_id = '$pollId'");

    if ($query) {
      while($row = mysqli_fetch_array($query)){
        $flag[] = $row;
      }
      print(json_encode($flag));
    }
    mysqli_close($conn);
}else{
    echo "Some Data Missing";
}

?>