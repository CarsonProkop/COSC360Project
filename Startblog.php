


<html>
	<head>
		<link rel="stylesheet" href="CSS/Startblog.css">
	
	</head>
	<div class="start-blog-wrapper">
		<form class="start-blog" method="GET" action="Createblog.php">
			<h3>Title<h3><br>
			<input type="text" name="title"/><br>
			<table class="category-tables">
				<tr>
					<td><input type="radio" name="category" value="Genre"/>	<p>Genre</p></td>
					<td><input type="radio" name="category" value="Artist"/><p>Artist</p></td>
					<td><input type="radio" name="category" value="Album"/>	<p>Album</p> </td>
					<td><input type="radio" name="category" value="Songs"/>	<p>Songs</p> </td>
				<tr>                                                                     
			</table>
		
			<input type="submit" value="Get Started!"/>
		
		
		</form>
	</div>


</html>