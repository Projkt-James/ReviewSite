<?php
session_start();
include "../includes/connect.php";
//include "../includes/activity.php";

$comment = mysqli_real_escape_string($con, $_POST['commentContent']); 
$postID = mysqli_real_escape_string($con, $_POST['pid']); 

//VALIDATE COMMENT
if(strlen($comment) >= 2){
    $userID = $_SESSION['login'];    
    
    $sql = "INSERT INTO comment (reviewID, memberID, commentDate, comment) VALUES ('$postID', '$userID', NOW(), '$comment')"; //sql query
    $result = mysqli_query($con, $sql) or die(mysqli_error($con)); //run the query
    
    $_SESSION['Notify'] = "Your comment has been posted.";
}else{
    $_SESSION['Notify'] = "Comment is too short to post :(";
}
    
header('Location:post.php?id=' . $postID);
    
?>