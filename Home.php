<?php
include 'header.php';

		$user;
		if(isset($_SESSION["authenticatedUser"])){
			$user = $_SESSION["authenticatedUser"];
			debug_to_console($_SESSION["authenticatedUser"]);
		}else{
			$user = NULL;
		}


function debug_to_console($data) {
	$output = $data;
	if (is_array($output))
		$output = implode(',', $output);
  
	echo "<script>console.log('Debug Objects: " . $output . "' );</script>";
  }
// param1 = blogtitle
//param2 = userid 
// param3 = date yy/mm/dd
//param 4 = date am/pm 
//param 5 = content 
// param 6 = photo
// param 7 = blog id 
function displayContent_blogs($param1, $param2, $param3, $param4, $param5, $param6, $param7)
{
	debug_to_console($param2);
	//if ($param2 != null) {
		echo '<a href="MyAccount.php?username=' . $param2 . '"><div class="post">
		  <h3 style = " border-bottom: 1px solid black;" id = "blog_title">' . $param1 . '</h3>
		  <p> <img class = "profilepic" src="client/images\005-man-user.svg" alt="Profile"/> by ' . $param2 . ' on ' . $param3 . ' at ' . $param4 . '</p>
		  <img id = "blog_pic" src="' . $param6 . '" alt="Profile"/>
		  <p>' . $param5 . ' </p>
		  <div class="numOfLikes"></div>Likes <p class="blogIdlike" style="display: none">' . $param7 . '</p>
		</div>
		<div class="comments">
		 <a class="newlike" href="include/newLikePost.php" id="' . $param7 .'-'.$param2. '"><img src="client/images\002-thumbs-up-hand-symbol.svg" width = "50" height = "50"  /></a>
		 <form id="' . $param7 . '"class="comment-form" method="post" action="include/insertComments.php">
		   <p class="blogId" style="display: none">' . $param7 .'-'.$param2. '</p>
		   <p style = "text-align: left;"> Comment Section <p>
		   <textarea id="' . $param7 . '" type="text" class="commentContent" placeholder="Add a Comment"></textarea>
		   <div>
			 <input type="submit" class="btn-submit" id="submitComment" value="Post" />
		   </div>
		 </form>
		 <div class="output">
		 </div>
	   </div>
	   <hr>';
	// } else {
	// 	echo '<div class="post">
	// 	 <h3 style = " border-bottom: 1px solid black;" id = "blog_title">' . $param1 . '</h3>
	// 	 <p> <a href="Profile-noaccess.php"> <img class = "profilepic" src="client/images\005-man-user.svg" alt="Profile"/></a> by ' . $param2 . ' on ' . $param3 . ' at ' . $param4 . '</p>
	//    <img id = "blog_pic" src="' . $param6 . '" alt="Profile"/>
	// 	 <p>' . $param5 . ' </p>
	//    </div>
	//    <div class="comments">
	//  <a href="#"><img onclick="on()" src="client/images\002-thumbs-up-hand-symbol.svg" class="candl"/></a>
	// 	 <p>Log in to view comments!</p>
	//    </div>
	//   <hr>';
	// }
}

function query_all()
{
	include 'Include/db_credentials.php';
		try{
			$conn = openconnection();
			
		}catch (PDOException $e){
			echo "<h3> Connection failed</h3>";
			die($e->getMessage());
		}
	$sql = "     			  SELECT *
							  FROM blogpost
							  ORDER BY upload_date DESC";
	$result = $conn->query($sql);
	//debug_to_console($result);
	return $result;
}

function query_blogLikes($param7)
{
	include 'include/db_credentials.php';
	$conn = openconnection();
	if ($conn->connect_error) {
		die("Connection failed:" . $conn->connect_error);
	}
	$sql = "SELECT COUNT(likeId) AS numOfLikes FROM LikePost WHERE blogId=" . $param7 . ";";
	$result = mysqli_query($conn, $sql);
	$count = mysqli_fetch_assoc($result);
	return $count['numOfLikes'];
}
function trending_posts()
{
	include 'include/db_credentials.php';
	$conn = openconnection();
	if ($conn->connect_error) {
		die("Connection failed:" . $conn->connect_error);
	}
	$sql = "SELECT blogId,userName,COUNT(*) AS numOfLikes FROM LikePost GROUP BY LikePost.blogId ORDER BY numOfLikes DESC LIMIT 8;";
	// SELECT COUNT(likeId) AS numOfLikes,blogPost.userName,blogPost.blogDate FROM LikePost,blogPost WHERE blogPost.blogId=LikePost.blogId GROUP BY blogId ORDER BY numOfLikes DESC LIMIT 8
	$result = mysqli_query($conn, $sql);
	return $result;
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<link rel="stylesheet" href="CSS/Default.css" />
	<link rel="stylesheet" href="CSS/Home.css" />
	<link rel="stylesheet" href="client/css/reset.css">
  <link rel="stylesheet" href="client/css/home.css">
  <link rel="stylesheet" href="client/css/styling1.css">
  <link rel="stylesheet" href="client/css/Profile.css">
  <script
  src="https://code.jquery.com/jquery-3.4.1.min.js"
  integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
  crossorigin="anonymous"></script>
  <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script> -->
  <!-- <script src = "client/javascript/jquery-3.1.1.min.js"></script> -->
 <!-- // <script type="text/javascript" src="client/javascript/dropdown.js"></script> -->
  <script type="language="JavaScript" src="client/javascript/validation.js"></script>
 
	<title>Alpacapella</title>
</head>

<body>
	<?php
	include 'Media.php';
	?>

<div id= "home">
	<div id="main">
		<div class="featureContent">
			
			<h1>Feature Content </h1>
			<div id="mainElement">
				<figure>
					<img src="MEDIA/Drake.jpg">
					<figcaption>Who is the real drizzy shady</figcaption>
				</figure>
			</div>
		</div>
	</div>


	<div class="auxContent" >
		<table>
			<tr>
				<td class="aux1-img">
					<figure>
						<img src="MEDIA/Justin.jpg">
						<figcaption>Lorem Ipsum</figcaption>
					</figure>
				</td>
				<td class="aux2-img">
					<figure>
						<img src="MEDIA/Tpain.jpg">
						<figcaption>Lorem Ipsum</figcaption>
					</figure>
				</td>
				<td class="aux3-img">
					<figure>
						<img src="MEDIA/SummerSalt.jpg">
						<figcaption>Lorem Ipsum</figcaption>
					</figure>
				</td>


			</tr>
			<tr class="auxrow">
				<td class="aux1-article">
					<a class="aux-link" href="">Justin Beiber comeback</a>
				</td>
				<td class="aux2-article">
					<a class="aux-link" href="">Tpain's tiny desk concert is heat</a>
				</td>
				<td class="aux3-article">
					<a class="aux-link" href="">Texas' take on Hawaii</a>
				</td>
			</tr>

		</table>
	</div>
	<div class = blogs>
	<?php
			//debug_to_console("dead");
			$result = query_all();
		//	debug_to_console($result);
			//$resultCheck = mysqli_num_rows($result);
			//if ($resultCheck > 0) {
				$noblog = true;
				while ($row = $result->fetch()) {
					$noblog = false;
					displayContent_blogs($row['title'], $row['opID'], date('Y-m-d', strtotime($row['upload_date'])), date('h:i a', strtotime($row['upload_date'])), $row['content'], $row['image_path'], $row['blogId']);
				}
			 if ($noblog == true) 
				echo "<h1 style ='border-bottom: 1px solid black;'> No blogs at the moment! <br> Check back again to see if someone posts.</h1>";
			
			?>

	<div class="memes">



	</div>




	<div class="other">
		<h1>Other Blogs</h1>
		<div class="entry">
			<figure>
				<img src="MEDIA/Travis.jpg" alt="" />
				<figcaption>Travis scott: The king of autotune?</figcaption>
			</figure>
			<div>
				<h2>Travis scott: The king of autotune? - By John Doe</h2>
				<p>Ma quande lingues coalesce, li grammatica del resultant lingue es plu simplic e regulari quam ti del coalescent lingues. Li nov lingua franca va esser plu simplic e regulari quam li existent Europan lingues. It va esser tam simplic quam Occidental in fact, it va esser Occidental.</p>
				<div class="right">
					<a href="#" class="linkbutton">Read More</a>
				</div>
			</div>
		</div>

		<div class="entry">
			<figure>
				<img src="MEDIA/Stevie.jpg" alt="" />
				<figcaption>Texas Flood: My Thoughts</figcaption>
			</figure>
			<div>
				<h2>Texas Flood: My Thoughts - Will Johnson</h2>
				<p>Omnicos directe al desirabilite de un nov lingua franca: On refusa continuar payar custosi traductores. At solmen va esser necessi far uniform grammatica, pronunciation e plu sommun paroles.</p>
				<div class="right">
					<a href="#" class="linkbutton">Read More</a>
				</div>
			</div>
		</div>
	</div>

	<?php
	include 'Footer.php';
	?>
<script type="text/javascript" src="client/javascript/ajax.js"></script>
 <script type="text/javascript" src="client/javascript/ajaxLikes.js"></script>
	</div>
</body>

</html>