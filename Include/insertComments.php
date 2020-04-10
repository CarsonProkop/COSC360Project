<?php
function debug_to_console($data) {
	$output = $data;
	if (is_array($output))
		$output = implode(',', $output);
  
	echo "<script>console.log('Debug Objects: " . $output . "' );</script>";
  }
date_default_timezone_set('Canada/Pacific');
session_start();
if( $_POST["userId"]!= null){
    debug_to_console($_SESSION['authenticatedUser']);
//   $id = $_POST["userId"];
    
include_once "connection.php";
if($_POST["blogId"] != null )

{
$commentContent = $_POST['commentContent'];
debug_to_console($commentContent);
$userid = $_POST['userId'];
$blogId= $_POST['blogId'];
$date = date('Y-m-d H:i:s');
$stmt = "INSERT INTO Comment(commentContent,commentDate,user_name,blogId) VALUES (?,?,?,?)";
if($sql = $conn->prepare($stmt)){
    $sql->bind_param("ssss",$commentContent,$date,$userid,$blogId);
    $sql->execute();
}
else {
    $error = $conn->errno . ' ' . $conn->error;
    echo $error;
}
}
}
else{
    header("Location: ../signup.php");
    exit();

}


 ?>