<?php

function debug_to_console($data) {
	$output = $data;
	if (is_array($output))
		$output = implode(',', $output);
  
	echo "<script>console.log('Debug Objects: " . $output . "' );</script>";
  }
  debug_to_console("flag");
  debug_to_console($_POST["userId"]);
  debug_to_console($_POST["blogId"]);
if( $_POST["userId"]!= null){
    debug_to_console($_SESSION['authenticatedUser']);
  $id = $_SESSION['authenicatedUser'];
    
include_once "connection.php";
if($_POST["blogId"] != null )
 {
   date_default_timezone_set('Canada/Pacific');
   // $commentContent=$_POST['commentContent'];
$blogId=$_POST["blogId"];


$date = date('Y-m-d H:i:s');
$sql = "SELECT * FROM Comment WHERE blogId=".$blogId." ORDER BY commentDate DESC";
$result = mysqli_query($conn, $sql);
 $resultCheck = mysqli_num_rows($result);
 if ($resultCheck > 0) {
     while ($row = mysqli_fetch_assoc($result)) {
        debug_to_console($row['commentContent']);
       echo '
   <p style = "text-align: left;">At '.date('h:i a' , strtotime($row['commentDate'])).'  </p>
   <p style = "text-align: left;">By: '.$row['user_name'].' </p>
   <p style = "text-align: left;"> '.$row['commentContent'].' </p><hr>';
   }
   }
   elseif($resultCheck <= 0){
   echo '<p class="nocomments">no comments</p>';
 }
mysqli_free_result($result);
mysqli_close($conn);
}
}
else{
  //  header("Location: ../SignUp.php");
  //  exit();
}
?>