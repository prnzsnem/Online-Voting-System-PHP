<?PHP

include_once("./../../Database/connection.php"); 
if(isset($_POST['userId'])){
    $userId = $_POST['userId'];
    
    $query =  mysqli_query($conn,"SELECT * FROM user_images WHERE user_id = '$userId' AND flag = 'On'");
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