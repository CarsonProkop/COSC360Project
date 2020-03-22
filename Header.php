<style>
.logo{
	width:100px;
	height:100px;
}

header .siteSearch{
	height:2em;
	background-color:#6E6788;
	
	
	border-radius:10px;
}

header{
	background-color:#9D7189;
	margin:0;
	padding:0;
}
header a{
	font-size:2em;
}

.navlist li{
	display: inline-block;
	padding: .5em;
	margin:0em;
}
.navlist li a{
	text-decoration:none;
	color: purple;
}
</style>



<body>

	<?php 
		session_start();
		if(isset($_SESSION["authenticatedUser"])){
			$user = $_SESSION["authenticatedUser"];
		}else{
			$user = NULL;
		}
	
	
	
	?>
	
	<div class="topnav">
		<a class="<?php echo ($_SERVER['PHP_SELF'] == "http://localhost/COSC360Project/Genre.php" ? "active" : "");?>" href="Genre.php">Home</a>
        <a class="<?php echo ($_SERVER['PHP_SELF'] == "COSC360Project/listprod.php" ? "active" : "");?>" href="listprod.php">Shop</a>
        <a class="<?php echo ($_SERVER['PHP_SELF'] == "COSC360Project/showcart.php" ? "active" : "");?>" href="showcart.php">Shopping Cart</a>
        <a class="<?php echo ($_SERVER['PHP_SELF'] == "COSC360Project/listorder.php" ? "active" : "");?>" href="listorder.php">All Orders</a>
	
	
	</div>
	

	<span class="navlist">
		<ul>
			<li><img class="logo" src="MEDIA/logo.jpg"/></li>
			<li><a href="" >Genre </a></li>
			<li><a href="" >Artist </a></li>
			<li><a href="" >Album </a></li>
			<li><a href="" >Songs </a></li>
			<li><a>Search: </a><input class="siteSearch" type="text"></input></li>
			
		</ul>
	</span>
</body>