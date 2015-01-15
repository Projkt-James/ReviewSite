<?php 
    session_start(); 
    include "../includes/connect.php"; 
?>

<?php
    $reviewID = $_POST['reviewID'];

if($_FILES['image']['name'])
{
    $image = $_FILES['image']['name'];
    $randomDigit = rand(0000,9999);
    $newImageName = strtolower($randomDigit . "_" . $image);
    
    $target = "../images/ReviewBetter/" . $newImageName;
    
    $allowedExts = array('jpg', 'jpeg', 'gif', 'png');
    
    $tmp = explode('.', $_FILES['image']['name']);
    
    $extension = end($tmp);
    
    if($_FILES['image']['size'] > 10240000)
        
    {
        $_SESSION['error'] = 'Your file size exceeds maximum of 10Mb.';
        
        header("location:reviewupdate.php?reviewID=" . $reviewID); //redirect to reviewupdate.php
        exit();
        
    }
    
    elseif(($_FILES['image']['type'] == 'image/jpg') || ($_FILES['image']['type'] == 'image/jpeg') || ($_FILES['image']['type'] == 'image/gif') || ($_FILES['image']['type'] == 'image/png') && in_array($extension, $allowedExts))
    
    {
        move_uploaded_file($_FILES['image']['tmp_name'], $target);
    }
    else
        
    {
        $_SESSION['error'] = 'Only JPG and PNG files allowed.';
        
        header("location:reviewupdate.php?reviewID=" . $reviewID);
        
        exit();
    }
       
}

$sql="UPDATE review SET reviewImage='$newImageName' WHERE reviewID='$reviewID'";

$result = mysqli_query($con, $sql) or die(mysqli_error($con));

$_SESSION['success'] = 'Image updated successfully';

header("location:reviewupdate.php?reviewID=" . $reviewID);

?>














