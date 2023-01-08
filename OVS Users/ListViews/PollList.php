<?PHP

include_once("./../../Database/connection.php");

$query =  mysqli_query($conn,"SELECT * FROM elections");

if ($query) {
  while($row = mysqli_fetch_array($query)){
    $flag[] = $row;
  }
  print(json_encode($flag));
}else{
    echo "FNF";
}
mysqli_close($conn);

?>