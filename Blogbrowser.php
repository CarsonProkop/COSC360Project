



<?php
	include 'Header.php';
	
	if(isset($_GET["Send"])){
		$SentFrom = $_GET["Send"];
	}


?>



<html>
	<head>
		<meta charset="utf-8">
		<title><?php echo $SentFrom . "s"?></title>
		<link rel="stylesheet" href="CSS/Blogbrowser.css">
	</head>
	
	<body>
	<?php 
		include 'Media.php';
	?>
		<div class="Sort">
			<table>
				<tr>
					<td><a>Newest</a></td>
					<td><a>Oldest</a></td>
					<td><a>Title</a></td>
					<td><a>Highest Rated</a></td>					
				</tr>
			</table>
		</div>
		
		<div class="Blog-List">
		
		
			<div class="entry">
				<figure>
				  <img src="MEDIA/Drake.jpg" alt="" />
				  <figcaption>Drake</figcaption>
			   </figure>
			   <div>
				  <h2>Who is the real drizzy shady</h2>
				  <p>Li Europan lingues es membres del sam familie. Lor separat existentie es un myth. Por scientie, musica, sport etc, litot Europa usa li sam vocabular. Li lingues differe solmen in li grammatica, li pronunciation e li plu commun vocabules.</p>
				  <div class="right">
					 <a href="#" class="linkbutton">Read More</a>
				  </div>
			   </div>
			</div>
			
			<div class="entry">
				<figure>
				  <img src="MEDIA/Drake.jpg" alt="" />
				  <figcaption>Drake</figcaption>
			   </figure>
			   <div>
				  <h2>Who is the real drizzy shady</h2>
				  <p>Li Europan lingues es membres del sam familie. Lor separat existentie es un myth. Por scientie, musica, sport etc, litot Europa usa li sam vocabular. Li lingues differe solmen in li grammatica, li pronunciation e li plu commun vocabules.</p>
				  <div class="right">
					 <a href="#" class="linkbutton">Read More</a>
				  </div>
			   </div>
			</div>
		</div>
		
	</body>
</html>






<?php 
	include 'footer.php'

?>