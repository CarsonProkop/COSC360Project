<?php
	include 'Header.php';
	include 'Include/db_credentials.php';
	
	$dataTypes = array('customers', 'admin', 'blogpost', 'comments');
	
	if(isset($_GET['data'])){
		$data = $_GET['data'];
	}else{
		$data = 'customers';
	}
	
	$executestuff = "";
	// get proper entity depending on data
	switch($data){
		case 'customers':
			$entity = 'user_name';
			//$executestuff .= 'isuser=true ';
			break;
		case 'admin':
			$entity = 'adminUN';
			break;
		case 'blogpost':
			$entity = 'blogId';
			break;
		case 'comments':
			$entity = 'commentID';
			break;
	}
	
	//$executestuff .= 'table=' . $data . ' entity=' . $entity;
	
	//makeAlert("execute stuff: ".$executestuff);
	
	
?>

<head lang="en">
  <meta charset="utf-8">
  <title>Alpacapella. Your words online.</title>
  <link rel="logo icon" href="MEDIA/Logo_base.jpg" />
  <link rel="stylesheet" href="client/css/reset.css">
  
  <script type="text/javascript" src="client/javascript/dropdown.js"></script>
  <script type="text/javascript" src="client/javascript/validation.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src = "client/javascript/jquery-3.1.1.min.js"></script>
  <link rel="stylesheet" href="CSS/Sitestuff.css">
</head>

<body class="sitestuff-body">
	<div>
		<div class="tabs">
			<div class="options">
				<a href="Sitestuff.php?data=customers">Customers</a>
				<a href="Sitestuff.php?data=blogpost">Blogposts</a>
				<a href="Sitestuff.php?data=comments">Comments</a>
				<a href="Sitestuff.php?data=admin">Admin</a>
			</div>
		</div>
		<div class = "Data-area">
			
			<h1>Displaying: <?php echo $data;?></h1>
			<?php
				/// GET DATA ///
				$dataResults = getData($data);
				$attributeNames = getAttributeNames($data);
			
			?>
			<div class="data-viz">
				<form method="get" action="Executedrop.php">
					<table>
						<?php
							showTable($attributeNames,$dataResults,$data,$entity);
						
						?>
						<input type="hidden" name="table" value="<?php echo $data;?>">
						<input type="hidden" name="entity" value="<?php echo $entity;?>">
						<input type="hidden" name="isuser" value="<?php echo ($data=='customers');?>">
						<input type="submit" value="Drop Selected <?php echo $data;?>"/>
					</table>
				</form>
			</div>
		</div>
	</div>

</body>






<?php
	function showTable($names,$results,$data,$entity){

		// ECHO DATA
		$tuples = $results->fetch_all(MYSQLI_ASSOC);
		$titles = array();
		if($tuples ==null){
			echo "<h3>No data to display for " . $data . "<h3>";
		}
		if(!empty($tuples)){
			$titles = array_keys($tuples[0]);
		}
		
		//populate header with attribute names
		echo '<tr>';
		foreach($titles as $title){
			echo '<th>';
			echo $title;
			echo '</th>';
		}
		echo '</tr>';
		
		//populate table data elements with data
		foreach($tuples as $tuple){
			echo '<tr>';
			
			
			foreach($tuple as $title){
				echo '<td>';
				echo $title;
				echo '</td>';
			}
			// add button to drop user
			echo '<td class="drop">';
			echo '<input type="radio" name="selected" value="'. $tuple[$entity] .'" required/>Drop';
			echo '</td>';
			
			
			echo '</tr>';
		}
	}
	
	// gets appropriate attribute titles for th elements
	function getAttributeNames($data){
		try{
			$conn = mysqli_connect('localhost','root','','cosc360proj');
			//$conn = openconnection();
		}catch(PDOException $e){
			die($e->getMessage());
		}
		
		$sql = 'SHOW COLUMNS FROM ' . $data;
		$result = mysqli_query($conn,$sql);
		return $result;
	}


	// querys the db for data based on what you are trying to see
	function getData($data){
		try{
			$conn = mysqli_connect('localhost','root','','cosc360proj');
			//$conn = openconnection();
		}catch(PDOException $e){
			die($e->getMessage());
		}
		
		$sql = 'SELECT * FROM ' . $data;
		
		
		$results = mysqli_query($conn,$sql);		
	
		return $results;
	}
	
	



	include 'Footer.php';
?>