<?php
date_default_timezone_set('Canada/Pacific');
session_start();
if(isset($_SESSION['authenicatedUser'])){
  $id = $_SESSION['authenicatedUser'];
include_once "connection.php";
if(isset($_POST["blogId"]) && isset($_POST['commentContent']))
 {
$commentContent = $_POST['commentContent'];
$blogId= $_POST['blogId'];
$date = date('Y-m-d H:i:s');
$stmt = "INSERT INTO Comment(commentContent,commentDate,user_name,blogId) VALUES (?,?,?,?)";
if($sql = $conn->prepare($stmt)){
    $sql->bind_param("ssss",$commentContent,$date,$id,$blogId);
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