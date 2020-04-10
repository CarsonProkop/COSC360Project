<?php 
function debug_to_console($data) {
	$output = $data;
	if (is_array($output))
		$output = implode(',', $output);
  
	echo "<script>console.log('Debug Objects: " . $output . "' );</script>";
  }
    session_start();  
	include 'Tools.php';
    $authenticatedUser = validateLogin();
	if($authenticatedUser != null){
		header('Location: Home.php');
	}else{
		//echo'<script>alert("Username or password not found");</script>';
		header('Location: Login.php?message="Username or Password not found"');
	}
    
	function validateLogin()
	{	  
	    $user = $_POST["username"];	 
		$pw = $_POST["password"];
		debug_to_console($user);
		$retStr = null;

		if ($user == null || $pw == null)
			return null;
		if ((strlen($user) == 0) || (strlen($pw) == 0))
			return null;

		include 'Include/db_credentials.php';
		try{
			$con = openconnection();
			
		}catch (PDOException $e){
			echo "<h3> Connection failed</h3>";
			die($e->getMessage());
		}
		
		
		// TODO: Check if userId and password match some customer account. If so, set retStr to be the username.
		if($_POST['admin'] == 'true'){
			
			//query from admins
			$sql = 'SELECT adminUN,adminPW From admin';
			
			$results = $con->query($sql);
        
			while ($row = $results->fetch()) {
				$uid = $row['adminUN'];
				$pas = $row['adminPW'];
			}
			
		}else{
		
			// query from standard users
			$sql = "SELECT user_name, Password FROM customers;";
			
			$results = $con->query($sql);
        
			while ($row = $results->fetch()) {
				$uid = $row['user_name'];
				$pas = $row['Password'];

				if($user == $uid && $pw == $pas){
					$retStr = "validated";
				break;
				}else{
					$retStr = null;
				}
			}
		}
		
		
		
		
        

		closeConn($con);
        
		if ($retStr != null){	
			
			$_SESSION['admin'] = $_POST['admin'];
			
			$_SESSION["loginMessage"] = null;
	       	$_SESSION["authenticatedUser"] = $user;
			
			
			$_SESSION["profPic"] = "MEDIA/User/" . $user . "/prof-pic.jpg";
		}
		else
		    $_SESSION["loginMessage"] = "Could not connect to the system using that username/password.";

		return $retStr;
	}	
?>