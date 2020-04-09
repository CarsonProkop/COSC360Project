<?php 
	include 'Include/db_credentials.php';
	
	session_start();
	if(isset($_POST['Fname']) && isset($_POST['Lname']) && isset($_POST['userid']) && isset($_POST['useremail']) && isset($_POST['userpwd']) && isset($_POST['re_userpwd']) && isset($_POST['birthday'])){
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

		
		// DB operations
		try{
			$conn = openconnection();
			
		}catch(PDOException $e){
			echo '<script>alert("Error: ' . $e->error . '");</script>';
		}
		$sql = "INSERT INTO customers (first_name, last_name, user_name, email, birthday, password, date_signed_up) ";
		$sql .=  "VALUES ('" . $firstName . "', '" . $lastName . "', '" . $un . "', '" . $email . "', '" . $birthday ."', '" . $pass . "', " . $dateCreated . ");";
		
		
		if($conn->query($sql)){
			
		}else{
			echo '<script>alert("Error: '. $sql .'");</script>';
			//header('location: didntwork.php');
			
		}
		closeConn($conn);
		
		
		// create user directory
		mkdir('MEDIA/User/' . $un);
		
		
		header('location: Login.php');
		

	}else{
		echo '<script>alert("Not IN");</script>';
	}
?>