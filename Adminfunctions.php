<?php

	/*
	session_start();
	if(isset($_GET['fromFilter'])){
		if($_GET['fromFilter'] == 'true'){
			$filterString = $_GET['search'];
			$table = $_GET['table'];
			$entity = $_GET['entity'];
			makeAlert('here')
			$_SESSION['AdminFilter'] = getData($table,$filterString, $entity);
				
			//header('Location: Sitestuff.php');
		}
		
	}
	*/









	//FUNCTIONS
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
	function getData($data,$filterString,$entity){
		try{
			$conn = mysqli_connect('localhost','root','','cosc360proj');
			//$conn = openconnection();
		}catch(PDOException $e){
			die($e->getMessage());
		}
		
		if($filterString != null){
			$sql = 'SELECT * FROM ' . $data . ' WHERE ' . $entity . ' LIKE "%' . $filterString . '%";';
		}else{
			$sql = 'SELECT * FROM ' . $data;
		}
		
		
		
		
		$results = mysqli_query($conn,$sql);		
	
		return $results;
	}

?>