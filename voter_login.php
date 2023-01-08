<?PHP

include_once("./Database/connection.php"); 

error_reporting(E_ALL);
ini_set('display_errors', 1);

if(isset($_POST['citizenName']) && !empty(isset($_POST['citizenship_number']))){ 

    $modifiedName = ucwords($_POST['citizenName']);
    $citizenName = hash('SHA3-512', $modifiedName); 
    $citizenship_number = hash('SHA3-512', $_POST['citizenship_number']);     

    $sqlQuery = "SELECT Name, citizenship_number, vote_status FROM citizens WHERE Name = '$citizenName' AND citizenship_number = '$citizenship_number'"; 

    $rows = $conn->query($sqlQuery);

    if (mysqli_num_rows($rows)>0) {

      while ($row = mysqli_fetch_assoc($rows)) {
        $row_status = $row['vote_status'];

        if ($row_status == "Voted") {
          echo "Already Voted";

        }else{
            echo "Citizen Verified";   
        }
      }

    }else{  
      echo "Citizen Not Found"; 
    } 

}
?>