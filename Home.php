<?php 
	include 'header.php';

	if(isset($_SESSION["registeredUser"])){
		$user = $_SESSION["registeredUser"];
	}else{
		$user = null;
	}


?>


<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<link rel="stylesheet" href="CSS/Home.css"/>
		<title>Alpacapella</title>
	</head>
	
	<body>
		<div id="main">
			<div class="featureContent">
			<h1>Feature Content	</h1>
				<div id="mainElement">
					<figure>
						<img src="MEDIA/Drake.jpg"> 
						<figcaption>Who is the real drizzy shady</figcaption>
					</figure>
				</div>
			</div>
		</div>
		
		<div class="auxContent">
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
				<tr>
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
		
	
		
		<footer>
			<div class="links">
				<ul>
					<li><a href="#">About Us</a></li>
					<li><a href="#">Contact</a></li>
					<li><a href="https://www.reddit.com/r/dankmemes/">More Memes</a></li>
					<li><a href="#">Contact</a></li>
				
				</ul>
				
				
				
				
			</div>
			
			<div class="Social">
				<h2>Developer Social Media</h2>
				<img src="MEDIA/instagram.png"> Carson Prokopuik </img>
				<img src="MEDIA/instagram.png"> Tahmeed Hossain </img>
				
			</div>
		</footer>
	</body>
	
</html>