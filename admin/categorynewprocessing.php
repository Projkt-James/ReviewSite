<?php 
    session_start(); 
    include "../includes/connect.php";
?>

<?php
    $category = mysqli_real_escape_string($con, $_POST['categoryName']);
    $description = mysqli_real_escape_string($con, $_POST['categoryDescription']);
    $sql="INSERT INTO category (categoryName, categoryDescription) VALUES ('$category', '$description')";
    $result = mysqli_query($con, $sql) or die(mysqli_error($con));

    $_SESSION['success'] = 'New category successfully added.'; 
    header("location:categories.php"); //redirect to categories.php
?>