<?php 
    session_start(); 
    include "../includes/connect.php"; 
?>

<?php
$reviewID = $_POST['reviewID'];
$title = mysqli_real_escape_string($con, $_POST['title']);
$content = mysqli_real_escape_string($con, $_POST['content']);
$adminID = mysqli_real_escape_string($con, $_POST['adminID']);
$categoryID = mysqli_real_escape_string($con, $_POST['categoryID']);
$rating = mysqli_real_escape_string($con, $_POST['rating']);

$sql="UPDATE review SET reviewTitle='$title', reviewContent='$content', reviewDate=NOW(), adminID='$adminID', categoryID='$categoryID', reviewRating='$rating' WHERE reviewID='$reviewID'";

$result = mysqli_query($con, $sql) or die(mysqli_error($con));

$_SESSION['success'] = 'Review updated successfully';

header("location:../admin/reviews.php");

?>















