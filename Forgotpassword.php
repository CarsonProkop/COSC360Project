<?php 
	include 'header.php';
	
	
	function validateUserEmail(){

		if(isset($_POST["Forgot Password"])){
			//$conn = ; // TODO: insert DB Connection code here
			
			
			
			// SQL Querey statemen here
			$SQL = "SELECT * FROM members WHERE email = " . $_POST["recoveryemail"];
		
			// execute the sql here
			
			
			
			//$user = TODO get the user info here
			
			if(!empty($user)){
				require_once("Sendnewpassword.php");
			}else{
				
			}
		}
	}
	
	
?>



<html>
	<head>
		<link rel="stylesheet" href="Forgotpassword.css">
	
	</head>

	<body>
		<h1>Password Recovery</h1>
		<form method="POST" onSubmit="return ">
			<h2>Enter your email</h2>
			<input type="text" name="recoveryemail"/>
		</form>
		<div id="error-message">
			<?php 
				if(!empty($error_message)){
					echo "<a>" . $error_message . "</a>";
				}
			?>		
		</div>
		
	
	</body>



</html>


<?php 
	include 'footer.php';
?>