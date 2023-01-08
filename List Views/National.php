<?PHP

include_once("./../Database/connection.php"); 

$query =  mysqli_query($conn,"SELECT * FROM election_candidates WHERE election_type = 'National'");

if ($query) {
  while($row = mysqli_fetch_array($query)){
    $flag[] = $row;
  }
  print(json_encode($flag));
}
mysqli_close($conn);

?>