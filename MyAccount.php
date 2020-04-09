<!DOCTYPE html>



<HTML>
<?php
	//	GET USER DATA FROM DB //
	
	include 'Header.php';
	include 'Include/db_credentials.php';
	
	// open db connection
	try{
		$con = openconnection();
	}catch (PDOException $e){
		die($e->getMessage());
	}
	
	$sql = 'SELECT * FROM customers WHERE user_name = "' . $_SESSION["authenticatedUser"] .' "';
	$results = $con->query($sql);
	$userData = $results->fetch();
	
	$firstName = $userData['first_name'];
	$lastName = $userData['last_name'];
	$userName = $userData['user_name'];
	$email = $userData['email'];
	$birthday = $userData['birthday'];
	$password = $userData['password'];
	$firstName = $userData['date_signed_up'];
	$about = $userData['about'];
	if(file_exists('MEDIA/User/' . $userName . '/prof-pic.jpg')){
		$profPic = fopen('MEDIA/User/' . $userName . '/prof-pic.jpg', 'r+');
	}	
	
?>

	<h1>Account info for <?php echo $userName;?><h1>





<?php
	include 'Footer.php';
?>
<HTML>