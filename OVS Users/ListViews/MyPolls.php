<?PHP

include_once("./../../Database/connection.php"); 
if(isset($_POST['userName'])){
    $userId = $_POST['userName'];
    $query =  mysqli_query($conn,"SELECT * FROM elections WHERE creator_uid = '$userId'");
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