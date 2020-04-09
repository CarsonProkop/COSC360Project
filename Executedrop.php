<?php
	include 'Tools.php';
	include 'Include/db_credentials.php';
	if(isset($_GET['selected'])){
		$selected = $_GET['selected'];
	}
	
	if(isset($_GET['table'])){
		$table = $_GET['table'];
	}
	if(isset($_GET['entity'])){
		$entity = $_GET['entity'];
	}
	if(isset($_GET['isuser'])){
		$isuser = $_GET['isuser'];	
	}

	
	//SQL STUFF
	try{
		$conn = openconnection();
	}catch(PDOException $e){
		die($e->getMessage());
	}
	
	$sql = 'DELETE FROM ' . $table . ' WHERE ' . $entity . ' = "' . $selected . '";';
	echo ("SQL: " . $sql);
	$results = $conn->query($sql);
	
	
	
	// REMOVE USER DIRECTORY IF USER IS SELECTED
	
	if(file_exists('MEDIA/User/' . $selected)){
		if($isuser){
			deleteDirectory('MEDIA/User/' . $selected);	
		}
	}
	
	
		

	closeConn($conn);
	header("Location: Sitestuff.php");
?>