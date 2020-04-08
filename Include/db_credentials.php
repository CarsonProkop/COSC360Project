

<?php
	// NEEDS TO BE CHANGED TO FIT OUR DB
	function openconnection(){
		$connectionString = "mysql:host=localhost;dbname=cosc360proj";
		$user="root";
		$pass="";
		$pdo = new PDO($connectionString, $user, $pass);
		return $pdo;
		/*
		$dbhost = "localhost";
		$dbuser = "root";
		$dbpass = "";
		$db = "cosc360proj";
		*/
		
/* 		$conn = new mysqli($dbhost, $dbuser, $dbpass, $db) or die("Failed to connect to " . $db);
		return $conn; */
	}
	
	
	function closeConn($pdo){
		$pdo = null;
		echo "connection closed";
	}
	
?>
