<?php 
    session_start();          
    $authenticatedUser = validateLogin();
	if($authenticatedUser != null){
		
		header('Location: Home.php');
	}else{
		echo'<script>alert("Username or password not found");</script>';
	}
    
	function validateLogin()
	{	  
	    $user = $_POST["username"];	 
	    $pw = $_POST["password"];
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
		$sql = "SELECT user_name, Password FROM customers;";
		$results = $con->query($sql);
        
       while ($row = $results->fetch()) {
            $uid = $row['user_name'];
            $pas = $row['Password'];
        }
        
        if($user == $uid && $pw == $pas){
            $retStr = "validated";
        }else{
            $retStr = null;
        }

		closeConn($con);
        
		if ($retStr != null)
		{	$_SESSION["loginMessage"] = null;
	       	$_SESSION["authenticatedUser"] = $user;
			$_SESSION["profPic"] = "MEDIA/User/" . $user . "/prof-pic.jpg";
		}
		else
		    $_SESSION["loginMessage"] = "Could not connect to the system using that username/password.";

		return $retStr;
	}	
?>