<!DOCTYPE html>
<?php
	include 'Header.php';
?>


<html>
<head lang="en">
  <meta charset="utf-8">
  <title>Alpacapella. Your words online.</title>
  <link rel="logo icon" href="MEDIA/Logo_base.jpg" />
  <link rel="stylesheet" href="client/css/reset.css">
  <link rel="stylesheet" href="client/css/signup.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src = "client/javascript/jquery-3.1.1.min.js"></script>
  <script type="text/javascript" src="client/javascript/dropdown.js"></script>
  <script type="text/javascript" src="client/javascript/validation.js"></script>
  
  
</head>

<body>
  <div>
    <div id="left_side">
      <h1 class = "left_text"> Write. <h1>
      <h1 class = "left_text"> Share. <h1>
      <h1 class = "left_text"> Grow. <h1>
</div>
<div id = "right_side">
  <form id = "sign_in" name="signin" method = "post" action = "validateLogin.php" onsubmit="return validateSignIn()"/>
      <p id = "top_right"> Sign in here: </p>
      <input class = "signin_input" type="text" name="username" placeholder="Username">
      <input class = "signin_input" type="password" name="password" placeholder="Password">
      <input id = "submit_1" type= "submit" name = "signin" value="Log in">
        <a id = "recovery_link" href = "recovery.php" > Forgot password?</a>
        <a id = "recovery_link" href = "admin_signin.php" > Are you an admin? Log in here.</a>
  </form>
  <section id = "main_right">
<img class = "icons" id = "logo" src="MEDIA/Logo_base.jpg " alt="logo">
  <h1>Express yourself online</h1>
      <h3>Join Alpacapella today.</h3>
      <form id="sign_up" name="signup" method="post" action="Createuser.php" >
        <input class="signup_input1" type="text" name="Fname" placeholder="First name">
        <input class="signup_input1" type="text" name="Lname" placeholder="Last name">
        <input class="signup_input2" type="text" name="userid" placeholder="Username">
            <?php if(isset($name_error)): ?>
        <script> document.forms["signup"]["userid"].style.borderColor = "red"; </script>
        <?php endif ?>
        <input class="signup_input2" type="email" name="useremail" placeholder="Email">
		<p>Birthday: </p><input class="signup_input2" type="date" name="birthday">
        <input class="signup_input2" type="password" name="userpwd" placeholder="Password">
        <input class="signup_input2" type="password" name="re_userpwd" placeholder="Confirm password">
        <input id = 's' type="submit" style="display: none;" name="submit_Signup" >
        </form>
        <button id = "submit_2"  >"Sign me up!"</button>
      
      </section>
      <p id="sneak"> Sneak in with minimum accessibility? <a href="Home.php"> Enter</a> </p>
    </div>
  </div>

</body>

</html>

<?php
	include 'Footer.php';
?>