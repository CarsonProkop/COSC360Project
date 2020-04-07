<?php 

	include "header.php";

?>

<!DOCTYPE html>
<html>
	<head>
		<title>Login</title>
		<link rel="stylesheet" href="CSS/login.css" />
	</head>
	
	<div class="login-block">
		<div class="block-wrapper">
		<h1>Welcome Back!</h1>
			<form method="GET" action="">
				<p>Username:</p><input type="text" name="username"/><br>
				<p>Password:</p><input type="password" name="password"/><br><br>
				<input type="submit" value="Log In"/>
				
			</form>
			<br>
			<div class="aux">
				<a href="Forgotpassword.php">Forgot your Password?</a> <a>/ </a><a href="Signup.php">Don't have an account?</a>
			</div>
		</div>
	
	</div>

	<?php 
		include "footer.php";
	?>
</html>