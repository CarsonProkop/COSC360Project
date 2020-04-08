<?php 
	include "Header.php";
	include "Include/db_credentials.php";
	if(isset($_POST["searchString"])){
		$searchString = $_POST["searchString"];
		
		try{
			$conn = openconnection();
			
			$sql = "SELECT * FROM blogpost WHERE title LIKE " . $searchString .";";
			$results = $conn->query($sql);
			
			while($row = $results->fetch()){
				echo'
				<div class="entry">
					<figure>
						<img src="' . $row['image_path'] . '" alt="" />
						<figcaption>' . $row['title'] . '</figcaption>
					</figure>
					<div>
						<p>' . substr($row['content'], 0, 300); . "..." . '</p>
						<div class="right">
							<a href="#" class="linkbutton">Read More</a>
						</div>
					</div>
				</div>
				';
				
				
			}
			
			
			//echo '<script>alert("connected");</script>';
		}catch(PDOException $e){
			echo '<script>alert("failed to connect!");</script>';
			 die($e->getMessage());
		}
	}else{
		
	}
	
	
	
	
?>






<?php 
	include "Footer.php";
?>