<?PHP

include_once("./../../Database/connection.php"); 
if(isset($_POST['pollId'])){
    $pollId = $_POST['pollId'];
    
    $query =  mysqli_query($conn,"SELECT * FROM election_candidates WHERE election_id ='$pollId'");
    if (mysqli_num_rows($query)>0) {
      while($row = mysqli_fetch_array($query)){
        $flag[] = $row;
      }
      print(json_encode($flag));
    }else{
        echo "Data Not Found";
        mysqli_close($conn);
    }
}

?>