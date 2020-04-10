<?php
//session_start();
//if( $_POST["userId"]!= null){
   // debug_to_console($_SESSION['authenticatedUser']);
//   $id = $_POST["userId"];
function debug_to_console($data) {
	$output = $data;
	if (is_array($output))
		$output = implode(',', $output);
  
	echo "<script>console.log('Debug Objects: " . $output . "' );</script>";
  }
include_once "connection.php";
if($_POST["blogId"] != null )
 {
$blogId= $_POST["blogId"];
debug_to_console($blogId);
$date = date('Y-m-d H:i:s');
//    if ($conn->connect_error) {
//         die("Connection failed:" . $conn->connect_error);
//     }
    $sql = "SELECT COUNT(likeId) AS numOfLikes FROM LikePost WHERE blogId=".$blogId.";";
    $result = mysqli_query($conn, $sql);
    $count=mysqli_fetch_assoc($result);
    debug_to_console('likes');
    debug_to_console($count['numOfLikes']);
      echo "" .$count['numOfLikes'];
mysqli_free_result($result);
mysqli_close($conn);
}
else{
  //  header("Location: ../signup.php");
    //exit();
}

?>