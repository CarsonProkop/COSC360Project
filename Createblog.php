<?php 
	include 'Header.php';
	


?>

<html>

	<form method="post" action="db-createblog.php" id="createform" enctype="multipart/form-data">
		<p>Title</p><input type="text" name="title" value="<?php if(isset($_GET['title'])){echo $_GET['title'];}?>"/><br>
		<p>Category</p><br>
		Genre: <input type="radio" name="category" value="Genre" <?php if(isset($_GET["category"]) && $_GET["category"] == "Genre"){echo 'checked="checked"';}?>/>
		Artist: <input type="radio" name="category" value="Artist" <?php if(isset($_GET["category"]) && $_GET["category"] == "Artist"){echo 'checked="checked"';}?>/>
		Album: <input type="radio" name="category" value="Album" <?php if(isset($_GET["category"]) && $_GET["category"] == "Album"){echo 'checked="checked"';}?>/>
		Song: <input type="radio" name="category" value="Song" <?php if(isset($_GET["category"]) && $_GET["category"] == "Song"){echo 'checked="checked"';}?>/>
		<br>
		<p>Upload a photo to do with the blog!</p>
		<input type="file" name="blogphoto" />
		<br>
		<p>Type away!!!!</p>
		<textarea name="content" cols="30" rows="10"/></textarea>
		<br>
		<input type="submit" name="submit"/>
	</form>
	
	


</html>







<?php 
	include 'Footer.php';
?>