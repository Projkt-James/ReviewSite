<?php 
    session_start(); 
    include "../includes/connect.php"; 
?>

<?php 

    $categoryID = $_POST['categoryID']; //retrieve reviewID from hidden form field 
    $category = mysqli_real_escape_string($con, $_POST['category']); //prevent SQL injection 
    $description = mysqli_real_escape_string($con, $_POST['description']);

    $sql="UPDATE category SET categoryName='$category', categoryDescription='$description' WHERE categoryID ='$categoryID'"; 
    $result = mysqli_query($con, $sql) or die(mysqli_error($con)); //run the query 
    $_SESSION['success'] = 'Category updated successfully'; //if category update is successful intialise a session called 'success' with a msg 
    header("location:categories.php"); //redirect to categoryupdate.php

?>