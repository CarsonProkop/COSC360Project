<head>
	<link rel="stylesheet" href="CSS/Header.css"/>
</head>

<body>

	<?php 
		session_start();
		if(isset($_SESSION["authenticatedUser"])){
			$user = $_SESSION["authenticatedUser"];
		}else{
			$user = NULL;
		}
	
	
	
	?>
	
	<header>
		<span class="navlist">
		
			<table>
				<tr>
					<td rowspan="2"><img class="logo" src="MEDIA/logo.jpg"/></td>
					<td colspan = "4" class="siteTitle"><h1>Alpacapella</h1></td>
					<?php 
						if($user == null){
							echo '<td ><a class="userLogin" href="Login.php">login</a> <a>/</a> <a class="userLogin" href="SignUp.php">sign-up</a>';
	
						}else {
			
							echo '<td ><img class="headerProfPic" src=$_SESSION["userPicture"]/><a class="userLogin" href="MyAccount.php">My Account</a>';
						}
					
					
					
					?>
				
				</tr>
				<tr>
					
					<td colspan="7"><input placeholder="Search" class="siteSearch" type="text"></input></td>
					
				</tr>
				<tr>
					<td><a href="Genre.php" >Genre</a></td>
					<td><a href="Artist.php">Artist </a></td>
					<td><a href="Album.php" >Album </a></td>
					<td><a href="Songs.php" >Songs </a></td>
				</tr>
			</table>
			
		</span>
	</header>
	
</body>