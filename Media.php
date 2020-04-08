<?php 
	session_start();
	if(isset($_SESSION["authenticatedUser"])){
		$user = $_SESSION["authenticatedUser"];
	}else{
		$user = null;
	}
?>

<html>	
	
		<head>
			<link rel="stylesheet" href="CSS/Media.css"/>
		</head>
	
	
	
	<div class="media-column">
			<div class="first-block">
				<?php
					if($user != null){
						echo'
							<h2>Hey ' . $user . ' let\'s make a new post</h2>';
							include 'Startblog.php';
						
					}else{
						// not logged in so offer to login
						
						echo 	'<div class="form-wrapper">
									<h2>Wait, don\'t we know you?</h2>
									<form method="POST" action="validateLogin.php">
										<p>Username:</p><input type="text" name="username"/><br>
										<p>Password:</p><input type="password" name="password"/><br><br>
										<input type="submit" value="Log In"/>
									</form>
								</div>';
						
					}
				
				
				?>
				
				
				
			
			</div>
			
			
			<div class="feed-wrapper">
				<div class="twitter-feed">
					<a class="twitter-timeline" href="https://twitter.com/musicfeeds?ref_src=twsrc%5Egoogle%7Ctwcamp%5Eserp%7Ctwgr%5Eauthor">National Park Tweets - Curated tweets by TwitterDev</a>
					<script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
				
				</div>
			</div>
			
			<div class="ads">
				
			
			</div>
		
	</div>
	
</html>