<?php
	if(isset($_POST["Forgot Password"])){
		//$conn = ; // TODO: insert DB Connection code here
		
		
		
		// SQL Querey statemen here
		$SQL = "SELECT * FROM members WHERE email = " . $_POST["Member Email"];
	
		// execute the sql here
		
		
		
		//$user = TODO get the user info here
		
		if(!empty($user)){
			require_once("Sendnewpassword.php");
		}else{
			echo "No user Found"
		}
	}

?>