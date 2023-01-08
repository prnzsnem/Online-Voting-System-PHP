<?PHP
    
include_once("./../Database/connection.php"); 

error_reporting(E_ALL);
ini_set('display_errors', 1);

if(isset($_POST['userEmail']) && (isset($_POST['userPass']))){ 

    $userNameEmail = strtolower($_POST['userEmail']);
    $userPassword = $_POST['userPass'];

    $sqlQuery = $conn->query("SELECT * from election_voters WHERE username = '$userNameEmail' AND password = '$userPassword'");

    if (mysqli_num_rows($sqlQuery)>0) {
    	while ($row = mysqli_fetch_assoc($sqlQuery)) {
            $response = new \stdClass();
            $response->ErrorCode = "0";
            $response->Message = "Success";
            $response->UserId = $row['voter_id'];
            $response->VoterName = $row['full_name'];
            $response->Phone = $row['phone'];
            $response->Password = $row['password'];

            $responseJson = json_encode($response);
            $flag[] = new \stdClass();
            $flag[] = $row;
    	}
        $result = json_encode($flag);
        // echo "{Result:".$responseJson.",UserList:".$result."}";
        echo "{Result:".$responseJson."}";

    }else{  
        $response = new \stdClass();
        $response->ErrorCode = "1";
        $response->Message = "User Not Found";
        $response->UserId = "";
        $response->VoterName = "";
        $response->Phone = "";
        $response->Password = "";

        $responseJson = json_encode($response);
        echo "{Result:".$responseJson."}";
    } 
}else{
    echo "There is connection problem.";
}
?>