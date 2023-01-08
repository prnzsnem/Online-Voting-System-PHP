<?PHP

include_once("./../Database/connection.php"); 

$query =  mysqli_query($conn,"SELECT * FROM user_action_buttons");

if ($query) {
  while($row = mysqli_fetch_array($query)){
    $flag[] = $row;
  }
  print(json_encode($flag));
}
mysqli_close($conn);

?>