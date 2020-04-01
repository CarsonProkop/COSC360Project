<?php 
	
	include 'Include/db_credentials.php';
	
	session_start();
	if(isset($_POST['firstName']) && isset($_POST['lastName']) && isset($_POST['email']) && isset($_POST['phonenum']) && isset($_POST['address']) && isset($_POST['city']) && isset($_POST['state']) && isset($_POST['postalCode']) && isset($_POST['country']) && isset($_POST['userid']) && isset($_POST['pass'])){
		$firstName = $_POST['firstName'];
		$lastName = $_POST['lastName'];
		$email = $_POST['email'];
		$phonenum = $_POST['phonenum'];
		$address = $_POST['address'];
		$city = $_POST['city'];
		$state = $_POST['state'];
		$postalCode = $_POST['postalCode'];
		$country = $_POST['country'];
		$userid = $_POST['userid'];
		$pass = $_POST['pass'];
		
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