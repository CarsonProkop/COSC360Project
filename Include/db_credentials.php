

<?php
	// NEEDS TO BE CHANGED TO FIT OUR DB
	function openconnection(){
		$dbhost = "localhost";
		$dbuser = "root";
		$dbpass = "";
		$db = "cosc360proj";
		
		$conn = new mysqli($dbhost, $dbuser, $dbpass, $db) or die("Failed to connect to " . $db);
		return $conn;
	}
	
	
	function closeConn($conn){
		$conn -> close();
	}
	
?>
