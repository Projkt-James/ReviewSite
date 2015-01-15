<?php 
    session_start(); 
    include "../includes/connect.php"; 
?>


<?php
    $reviewID = $_GET['reviewID'];

    $sql = "DELETE review.* FROM review WHERE reviewID = '$reviewID'";
    $result = mysqli_query($con, $sql) or die(mysqli_error($con));

//user messages 
$_SESSION['success'] = 'Review deleted successfully.'; //register a session with a success message

header('location:../admin/reviews.php') ;
?>