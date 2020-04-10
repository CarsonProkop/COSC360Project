<?php
function debug_to_console($data) {
	$output = $data;
	if (is_array($output))
		$output = implode(',', $output);
  
	echo "<script>console.log('Debug Objects: " . $output . "' );</script>";
  }
if( $_POST["userId"]!= null){
    debug_to_console($_SESSION['authenticatedUser']);
//   $id = $_POST["userId"];
    
include_once "connection.php";
if($_POST["blogId"] != null )

{
    $id = $_POST["userId"];
    $blogId=$_POST['blogId'];
    $sql1 = "SELECT user_name FROM LikePost WHERE blogId=".$blogId.";";
     $result = mysqli_query($conn, $sql1);
     $resultCheck = mysqli_num_rows($result);
     $likedboolean=0;
     while ($row = mysqli_fetch_assoc($result)) {
       if($row['user_name']==$id){
         $likedboolean=1;
         break;
       }}
       if($likedboolean==0){
          $stmt = "INSERT INTO LikePost(blogId,user_name) VALUES (?,?)";
           if($sql = $conn->prepare($stmt)){
               $sql->bind_param("ss",$blogId,$id);
               $sql->execute();
               $likedboolean=0;
               }
           else {
               $error = $conn->errno . ' ' . $conn->error;
               echo $error;
             }}}}
else{
    header("Location: ../signup.php");
    exit();

}


 ?>