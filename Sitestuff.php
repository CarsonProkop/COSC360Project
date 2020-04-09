<?php
	$_SESSION['AdminFilter'] = 0;
	include 'Header.php';
	include 'Include/db_credentials.php';
	include 'Adminfunctions.php';
	include 'Tools.php';
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
<script>
	function applyFilter(){
		
		
		
	}

</script>





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
			</div><br>
			<div>
				<form action="Adminfunctions.php" method="get">
					<label><b>Search <?php echo $data;?> by <?php echo $entity;?>: </b></label>
					<input type="text" name="search"/>
					<input type="hidden" name="fromFilter" value="true">
					<input type="hidden" name="entity" value="<?php echo $entity;?>">
					<input type="hidden" name="table" value="<?php echo $data;?>">
					<input type="Submit" value="Search"/>
				</form>
			</div>
		</div>
		<div class = "Data-area">
			
			<h1>Displaying: <?php echo $data;?></h1>
			<?php
				/// GET DATA ///
					
				$dataResults = getData($data,'',$entity);
				
				
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

	
	



	include 'Footer.php';
?>