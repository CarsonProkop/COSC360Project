<?php 
	
	include 'Include/db_credentials.php';
	
	session_start();
	if(isset($_POST['Fname']) && isset($_POST['Lname']) && isset($_POST['userid']) && isset($_POST['useremail']) && isset($_POST['userpwd']) && isset($_POST['re_userpwd'])){
		$firstName = $_POST['Fname'];
		$lastName = $_POST['Lname'];
		$email = $_POST['useremail'];
		$un = $_POST['userid'];
		$address = $_POST['address'];		
		$pass = $_POST['userpwd'];
		$rePass = $_POST['re_userpwd'];
		
		
		
		
		$dbconn = sqlsrv_connect($server, $connectionInfo);
		if($dbConn === false){
			die(print_r(sqlsrv_errors(), true));
		}
		
		$sql = "INSERT INTO users (firstName, lastName, email, phonenum, address, city, state, postalCode, country, userid, password)";
		$sql .=  "VALUES ('" . $firstName . "', '" . $lastName . "', '" . $email . "', '" . $phonenum . "', '" . $address ."', '" . $city . "', '" . $state . "', '" . $postalCode . "', '" . $country . "', '" . $userid . "' , '" . $pass . "')";
		
		$results = sqlsrv_query($dbConn, $sql, array());
		
		sqlsrv_close($dbConn);
		
		if($results != false){
			header('location: Login.php');
		}else{
			header('Location: SignUp.php');
		}
	}


?>