<?php 
	session_start();
	date_default_timezone_set("America/Los_Angeles");
	
	$user = $_SESSION["authenticatedUser"];
	
	include 'Include/db_credentials.php';
	
	try{
		$conn = openconnection();
		
	}catch(PDOException $e){
		echo "<h3> Connection failed</h3>";
		die($e->getMessage());
	}

	if(isset($_POST["category"])  && isset($_POST["title"]) && isset($_FILES["blogphoto"]["name"]) && isset($_POST["content"])){
		$title = $_POST["title"];
		$category = $_POST["category"];
		$content = $_POST["content"];
	}else{
		
	}
	
	$todaysDate = date("y-m-d");
	$currentTime = date("h:i:sa");
	$uploadTime = '"' . $todaysDate . " " . substr(substr($currentTime, 0, -1),0,-1) . '"';
	
	$sql = 'INSERT INTO blogpost(opID, title, category, content, upload_date, image_path) VALUES ("' . $user . '", "' . $title . '", "' . $category . '", "' . $content . '", ' . $uploadTime . ', "' . 'MEDIA/User/' . $user . "/" . $title . "/" . 'photo.jpg"' .  ');';
	
	if($conn->query($sql)){
		
	}else{
		echo "Error: " . $sql . "<br>";
		echo $conn->error;
	}
	
	$blogDir = 'MEDIA/User/' . $user . '/' . $title;
	mkdir($blogDir);
	
	if(isset($_POST['submit'])){
        $name       = $_FILES['blogphoto']['name'];  
        $temp_name  = $_FILES['blogphoto']['tmp_name'];  
        if(isset($name) and !empty($name)){
            $location = '../uploads/';      
            if(move_uploaded_file($temp_name, $blogDir . '/photo.jpg')){
                echo '<script>alert("Uploaded blog succesfully");</script>';
				
            }
        } else {
            echo 'You should select a file to upload !!';
        }
    }
		
		
		
		
	
	


	
	
?>




























