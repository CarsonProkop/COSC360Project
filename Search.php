<head>
	<link rel="stylesheet" href="CSS/Search.css"/>
</head>



<?php 
	include "Header.php";
	include "Media.php";
	include "Include/db_credentials.php";
	if(isset($_POST["searchString"])){
		$searchString = $_POST["searchString"];
		
		try{
			$conn = openconnection();
			
		}catch(PDOException $e){
			echo '<script>alert("failed to connect!");</script>';
			die($e->getMessage());
		}
			
		$sql = 'SELECT * FROM blogpost WHERE title LIKE "%' . $searchString .'%";';

		
		$results = $conn->query($sql);
		echo '<div class="wrapper">';
		echo '<div class="results">';
		echo '<h1>Search results for: "' . $searchString . '" </h1>';
		try{
			 while ($row = $results->fetch()) {
				if(strlen($row['content'])>300){
					echo'
					<div class="entry">
						<figure>
							<img src="' . $row['image_path'] . '" alt="" />
							<figcaption>' . $row['title'] . '</figcaption>
						</figure>
						<div class="info">
							<h2>' . $row['opID'] . ' ' . $row['upload_date']. '</h2>
							<p>' . substr($row['content'], 0, 300) . "..." . '</p>
							<div class="right">
								<a href="#" class="linkbutton">Read More</a>
							</div>
						</div>
					</div>
					';
				}else{
					echo'
					<div class="entry">
						<figure>
							<img src="' . $row['image_path'] . '" alt="" />
							<figcaption>' . $row['title'] . '</figcaption>
						</figure>
						<div>
							<h2>' . $row['opID'] . ' ' . $row['upload_date']. '</h2>
							<p>' . $row['content'] . '</p>
							<div class="right">
								<a href="#" class="linkbutton">Read More</a>
							</div>
						</div>
					</div>
					';
				}
						
			}
		}catch(Exception $e){
			
		}
		echo '</div>';
		echo '</div>';
		
	}
	
	
	
	
?>






<?php 
	include "Footer.php";
?>