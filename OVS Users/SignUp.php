<?PHP
    
include_once("./../Database/connection.php"); 

error_reporting(E_ALL);
ini_set('display_errors', 1);

if(isset($_POST['userFN']) && isset($_POST['userName']) && isset($_POST['userEmail']) && isset($_POST['userPhone']) && isset($_POST['userGender']) && isset($_POST['userDOB']) && isset($_POST['userPass'])){ 

    $userFullName = ucwords($_POST['userFN']);
    $userName = strtolower($_POST['userName']);
    $userEmail = strtolower($_POST['userEmail']);
    $userGender = strtolower($_POST['userGender']);
    
    $dob = $_POST['userDOB'];
    $dob = explode("/", $dob);
    $age = (date("md", date("U", mktime(0, 0, 0, $dob[0], $dob[1], $dob[2]))) > date("md")
    ? ((date("Y") - $dob[2]) - 1)
    : (date("Y") - $dob[2]));
    
    $userPhoneNumber = $_POST['userPhone'];
    $userPassword = $_POST['userPass'];
    $userID = md5($userName);
    $account_created_at = date('Y-m-d h:i:s');
    $userImage = "https://princeitsolution.000webhostapp.com/Uploads/user_images/user.jpg";
    $userBGI = "https://princeitsolution.000webhostapp.com/Uploads/user_images/bg_art.jpg";

    $sqlQuery = "INSERT INTO election_voters (voter_id, full_name, username, email, phone, gender, age, address, citizenship_number, college_id, office_id, school_id, password, acc_created_date) VALUES ('$userID','$userFullName','$userName','$userEmail','$userPhoneNumber','$userGender','$age','','','','','','$userPassword','$account_created_at')";
    $updateImages = "Insert INTO user_images (user_id, user_image, user_bgi, flag) VALUES ('$userID','$userImage','$userBGI','On')";

   if ($conn->query($sqlQuery) === TRUE) {
       if($conn->query($updateImages) === TRUE){
           echo "User ";
       }
        echo "Added";
   }else{
        echo "User could not be added"; 
   }
}else{
    echo "Error occour while fetching data";
}
?>