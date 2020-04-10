<?php 
	include 'Header.php';
	


?>

<html>
	<div>
	<form id = 'newpost' method="post" action="db-createblog.php" id="createform" enctype="multipart/form-data">
	<fieldset>
		<legend id = "post title">NEW BLOG POST</legend>

		<p>
			<label>Title</label>
		</p><input type="text" name="title" value="<?php if(isset($_GET['title'])){echo $_GET['title'];}?>"/><br>
		<p>Category</p><br>
		Genre: <input type="checkbox" name="category" value="Genre" <?php if(isset($_GET["category"]) && $_GET["category"] == "Genre"){echo 'checked="checked"';}?>/>
		Artist: <input type="checkbox" name="category" value="Artist" <?php if(isset($_GET["category"]) && $_GET["category"] == "Artist"){echo 'checked="checked"';}?>/>
		Album: <input type="checkbox" name="category" value="Album" <?php if(isset($_GET["category"]) && $_GET["category"] == "Album"){echo 'checked="checked"';}?>/>
		Song: <input type="checkbox" name="category" value="Song" <?php if(isset($_GET["category"]) && $_GET["category"] == "Song"){echo 'checked="checked"';}?>/>
		<br>
		<p>Upload a photo to do with the blog!</p>
		<input type="file" name="blogphoto" />
		<br>
		<p>Type away!!!!</p>
		<textarea name="content" cols="30" rows="10"/></textarea>
		<br>
		<input type="submit" name="submit"/>
	</form>
	</div>


</html>







<?php 
	include 'Footer.php';
?>