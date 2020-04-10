<?php 

	include "header.php";
	include 'Tools.php';
?>

<!DOCTYPE html>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src = "client/javascript/jquery-3.1.1.min.js"></script>
  <script type="text/javascript" src="client/javascript/dropdown.js"></script>
  <script type="text/javascript" src="client/javascript/validation.js"></script>
<html>
	<head>
		<title>Login</title>
		<link rel="stylesheet" href="CSS/login.css" />
	</head>
	<body>
		<?php 
			
			if (isset($_SESSION['authenticatedUser'])){
				$authenticated = $_SESSION['authenticatedUser'];
			}else{
				$authenticated = false;
			}
			

			if ($authenticated)
			{
				$Message = "You are already logged in.";
				$_SESSION['LIMessage']  = $Message;        
				header('Location: Home.php');
			}
		?>
	
	</body>
	
	<div class="login-block">
		<div class="block-wrapper">
		<h1>Welcome Back!</h1>			
			<form id = "login" name= "signinin" method="POST" action="validateLogin.php" >
				<p>Username:</p><input type="text" name="username"/><br>
				<p>Password:</p><input type="password" name="password"/><br><br>
				<?php
					if(isset($_GET['message'])){
						echo '<font color="red">' . $_GET['message'] . '</font>';
					}
				?>
				<p>Admin?</p>
				Nope!<input type="radio" name="admin" value="false" checked>
				yep<input type="radio" name="admin" value="true" 
					<?php if(isset($_GET['admin'])){
						if($_GET['admin'] == "true"){
							echo "checked";
						}
					}	
					?>>
				<br>
				<input id = 'l' type="submit" style="display: none;"/>
				
			</form>
		<button id="signin">Log In</button>
			<br>
			<div class="aux">
				<a href="Forgotpassword.php">Forgot your Password?</a> <a>/ </a><a href="Signup.php">Don't have an account?</a>
			</div>
		</div>
	
	</div>

	<?php 
		include "Footer.php";
	?>
</html>