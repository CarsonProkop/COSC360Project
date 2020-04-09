<?php 
	session_start();
	
	$firstName = $_POST['Fname'];
	$lastName = $_POST['Lname'];
	$userName = $_POST['userid'];
	$email = $_POST['useremail'];
	$bday = $_POST['birthday'];
	$pw = $_POST['newuserpwd'];
	
	$userName = $_SESSION['authenticatedUser'];
	
	$userDir = 'MEDIA/User/' . $userName . '/';
	
	if(isset($_POST['submit_update'])){
		$name       = $_FILES['newProfPic']['name'];  
		$temp_name  = $_FILES['newProfPic']['tmp_name'];  
		if(isset($name) and !empty($name)){
			$location = '../uploads/';      
			if(move_uploaded_file($temp_name, $userDir . '/prof-pic.jpg')){
				echo '<script>alert("Uploaded prof pic succesfully");</script>';
				
			}
		} else {
			echo '<script>alert("u suck");</script>';
		}
	}
	
	





?>