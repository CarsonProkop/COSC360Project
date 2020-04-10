<?php 
	
	//include_once "Include/connection.php";
$servername = "localhost:8889";
$username = "root";
$password = "root";
$dbname = "cosc360proj";

// Create connection
$conne = new mysqli($servername, $username, $password, $dbname);
	function debug_to_console($data) {
		$output = $data;
		if (is_array($output))
			$output = implode(',', $output);
	  
		echo "<script>console.log('Debug Objects: " . $output . "' );</script>";
	  }


	if(($_POST['Fname']) !=null && ($_POST['Lname']) != null && ($_POST['userid']) != null && ($_POST['useremail']) != null && ($_POST['userpwd']) != null && ($_POST['re_userpwd'])!= null&& ($_POST['birthday']) != null){
		$firstName = $_POST['Fname'];
		$lastName = $_POST['Lname'];
		$email = $_POST['useremail'];
		$un = $_POST['userid'];		
		$pass = $_POST['userpwd'];
		$rePass = $_POST['re_userpwd'];
		$birthday = $_POST['birthday'];

		// get current date and time
		$todaysDate = date("y-m-d");
		$currentTime = date("h:i:sa");
		$dateCreated = '"' . $todaysDate . " " . substr(substr($currentTime, 0, -1),0,-1) . '"';
		debug_to_console($firstName);
		debug_to_console($lastName);
		debug_to_console($email);
		debug_to_console($un);
		debug_to_console($pass);
		debug_to_console($birthday);


		
		// DB operations
		

// Check connection
if ($conne->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "INSERT INTO customers (first_name, last_name,user_name, email, Birthdate, Password, date_signed_up, about)
VALUES ('$firstName','$lastName','$un','$email','$birthday','$pass','$dateCreated', '')";

if ($conne->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error";
		
}
		
	}	//create user directory
	//	mkdir('MEDIA/User/' . $un);
		
		
		//header('location: Login.php');
		
		//echo "<script> window.location = 'http://localhost:8800/COSC360Project-1/Home.php';</script>"

?>