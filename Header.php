	<?php 
		session_start();
		if(isset($_SESSION["authenticatedUser"])){
			$user = $_SESSION["authenticatedUser"];
		}else{
			$user = NULL;
		}	
	?>

<head>
	<link rel="stylesheet" href="CSS/Default.css"/>
	<link rel="stylesheet" href="CSS/Header.css"/>
</head>

<body>


	
	<header>
		<div class="navlist">
		
			<table>
				<tr>
					<td rowspan="2"><a href="Home.php"><img class="logo" src="MEDIA/logo.jpg"/></a></td>
					<td colspan = "2" class="siteTitle"><h1>Alpacapella</h1></td>
					<?php 
						if($user == null){
							echo '<td><a class="userLogin" href="Login.php">login</a> <a>/</a> <a class="userLogin" href="SignUp.php">sign-up</a></td>';
	
						}else {
			
							echo '<td><img class="headerProfPic" src=$_SESSION["userPicture"]/><a class="userLogin" href="MyAccount.php">My Account</a></td>';
						}
					
					
					
					?>
				
				</tr>
				<tr>
					
					<td colspan="2" class="search-cell">
						<form action="search.php" method="POST">
							<input placeholder="Search" class="siteSearch" type="text" name="searchString"/>
							<input type="submit" value="SEARCH">
						</form>
					</td>
					
				</tr>
				<tr>
					<td><a href="./Blogbrowser.php?Send=Genre" >Genre</a></td>
					<td><a href="Blogbrowser.php?Send=Artist">Artist </a></td>
					<td><a href="Blogbrowser.php?Send=Album" >Album </a></td>
					<td><a href="Blogbrowser.php?Send=Songs" >Songs </a></td>
				</tr>
			</table>
			
		</div>
	</header>
	
</body>