<?php
	// Remove the user from the session to log them out	
    session_start();
	$_SESSION['authenticatedUser'] = null;
	$_SESSION['admin'] = null;
	header('Location: Home.php');	
?>

