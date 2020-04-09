<?php 
	session_start();
	include "Include/db_credentials.php";
	
	$lastName = $_POST['Lname'];
	$userName = $_POST['userid'];
	$email = $_POST['useremail'];
	$bday = $_POST['birthday'];
	
	$oldUN = $_SESSION['authenticatedUser'];
	$userName = $_SESSION['authenticatedUser'];
	$userDir = 'MEDIA/User/' . $userName . '/';
	
	
	// UPDATE USER INFO
	$toUpdate = array();
	
	if(isset($_POST['Fname'])){
		$firstName = $_POST['Fname'];
		$toUpdate['first_name'] = $firstName;
	}
	if(isset($_POST['Lname'])){
		$lastName = $_POST['Lname'];
		$toUpdate['last_name'] = $lastName;
	}
	if(isset($_POST['userid'])){
		
		$userName = $_POST['userid'];
		if($userName != $oldUN && file_exists($userDir)){
			rename($userDir, 'MEDIA/User/' . $userName . '/');
			$_SESSION['authenticatedUser'] = $userName;
		}
		
		
		$toUpdate['user_name'] = $userName;
	}
	
	if(isset($_POST['useremail'])){
		$email = $_POST['useremail'];
		$toUpdate['email'] = $email;
	}
	if(isset($_POST['birthday'])){
		$bday = $_POST['birthday'];
		$toUpdate['birthday'] = $bday;
	}
	if(isset($_POST['about'])){
		$about = $_POST['about'];
		$toUpdate['about'] = $about;
	}if(isset($_POST['olduserpwd']) && isset($_POST['newuserpwd']) && isset($_POST['re_userpwd'])){
		if($_POST['olduserpwd'] != "" && $_POST['newuserpwd'] != "" && $_POST['re_userpwd'] != ""){
			$password = $_POST['newuserpwd'];
			$toUpdate['password'] = $password;	
			
		}
	}
	
	
	
	// SQL STUFF
	try{
		$conn = openconnection();
	}catch(PDOException $e){
		die($e->getMessage());
	}

	// BUILD STATEMENT
	$sql = 'UPDATE customers SET ';
	
	foreach(array_keys($toUpdate) as $attribute){
		
		$add = $attribute . ' = "' . $toUpdate[$attribute] . '" , ';
		$sql .= $add;
	}
	
	$sql = substr(substr($sql,0,-1),0,-1);
	
	$sql .= ' WHERE user_name = "' . $oldUN . '";'; 
	
	//echo "<h3>" . $sql ."</h3>";

	// EXECUTE QUERY
	
	$results = $conn->query($sql);
	
	
	
	
	
	
	
	
	
	
	
	
	//	PROFILE PICTURE UPDATE
	if(isset($_POST['submit_update'])){
		$name       = $_FILES['newProfPic']['name'];  
		$temp_name  = $_FILES['newProfPic']['tmp_name'];  
		if(isset($name) and !empty($name)){
			$location = '../uploads/';      
			if(move_uploaded_file($temp_name, $userDir . '/prof-pic.jpg')){
				echo '<script>alert("Uploaded prof pic succesfully");</script>';
				header("Location: MyAccount.php");
			}
		} else {
			echo '<script>alert("ERROR: Upload failed");</script>';
		}
	}
	
	header("Location: MyAccount.php");
	
	

?>