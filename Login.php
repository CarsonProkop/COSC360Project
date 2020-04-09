<?php 

	include "header.php";

?>

<!DOCTYPE html>
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
			<form method="POST" action="validateLogin.php">
				<p>Username:</p><input type="text" name="username"/><br>
				<p>Password:</p><input type="password" name="password"/><br><br>
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
				<input type="submit" value="Log In"/>
				
			</form>
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