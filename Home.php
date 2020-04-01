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
		<div class="media-column">
			<div class="first-block">
				<div class="form-wrapper">
					<h2>Wait, don't we know you?</h2>
					<form>
						<p>Username:</p><input type="text" name="username"/><br>
						<p>Password:</p><input type="password" name="password"/><br><br>
						<input type="submit" value="Log In"/>
					</form>
				</div>
			
			</div>
			
			<div class="twitter-feed">
				<a class="twitter-timeline" href="https://twitter.com/musicfeeds?ref_src=twsrc%5Egoogle%7Ctwcamp%5Eserp%7Ctwgr%5Eauthor">National Park Tweets - Curated tweets by TwitterDev</a>
				<script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
			
			</div>
			
			<div class="ads">
				
			
			</div>
		
		
		</div>
	
	
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
		
		
	</body>
	
</html>