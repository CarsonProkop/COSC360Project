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
	$dateSignedUp = $userData['date_signed_up'];
	$about = $userData['about'];
	if(file_exists('MEDIA/User/' . $userName . '/prof-pic.jpg')){
		$profPic = 'MEDIA/User/' . $userName . '/prof-pic.jpg';
	}else{
		$profPic = null;
	}	
	
?>

<head lang="en">
  <meta charset="utf-8">
  <title>Alpacapella. Your words online.</title>
  <link rel="logo icon" href="MEDIA/Logo_base.jpg" />
  <link rel="stylesheet" href="client/css/reset.css">
  <link rel="stylesheet" href="CSS/MyAccount.css">
  <script type="text/javascript" src="client/javascript/dropdown.js"></script>
  <script type="text/javascript" src="client/javascript/validation.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src = "client/javascript/jquery-3.1.1.min.js"></script>
</head>

<body>
	<div>
		<div id="left_side">
		  <h1 class = "left_text"> Write. </h1>
		  <h1 class = "left_text"> Share. </h1>
		  <h1 class = "left_text"> Grow. </h1>
		</div>
		<div id = "right_side">
			<section id = "main_right">
			<?php
				// figure out what image to display
				if($profPic!=null){
					$toDisplay = $profPic;
				}else{
					$toDisplay = "MEDIA/Anonymous.png";
				}
			?>
			
			

			<h1>User settings for <?php echo $userName;?>:</h1>
			<img class = "icons" id = "logo" src="<?php echo $toDisplay; ?>" alt="logo"/>
			<form id="edit_prof" method="post" action="Updatecust.php" enctype="multipart/form-data">
				<p id="Change-pic"> Change profile picture: <input type="file" name="newProfPic"/> </p>
				<input class="signup_input1" type="text" placeholder="First name" name="Fname" value="<?php echo $firstName;?>">
				<input class="signup_input1" type="text" placeholder="Last name" name="Lname" value="<?php echo $lastName;?>">
				<input class="signup_input2" type="text" placeholder="Username" name="userid" value="<?php echo $userName;?>">
					<?php if(isset($name_error)): ?>
				<script> document.forms["signup"]["userid"].style.borderColor = "red"; </script>
				<?php endif ?>
				<input class="signup_input2" type="email" placeholder="Email" name="useremail" value="<?php echo $email;?>"/>
				<p>Birthday: </p><input class="signup_input2" type="date" name="birthday" value="<?php echo $birthday;?>"/>
				<p>Tell us about your self</p><textarea class="signup_input2" name="about" cols="30" rows="5"><?php echo $about;?></textarea>
				<input class="signup_input2" type="password" name="olduserpwd" placeholder="Old password"/>
				<input class="signup_input2" type="password" name="newuserpwd" placeholder="New password"/>
				<input class="signup_input2" type="password" name="re_userpwd" placeholder="Confirm password"/>
				<input id="submit_2" type="submit" name="submit_update" value="SubmitChanges"/>
			</form>

		  </section>
		</div>
	</div>

</body>





<?php
	include 'Footer.php';
?>
</HTML>