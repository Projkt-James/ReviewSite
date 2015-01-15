<?php 
    session_start(); 
    include '../includes/connect.php'; 
?>

<?php 
    $adminID=$_POST['adminID']; //retrieve the adminID from the hidden form field 
    $password = mysqli_real_escape_string($con, $_POST['password']); //prevent SQL injection

if (strlen($password) < 6)
{
    $_SESSION['error'] = 'Password must be 6 characters or more.';
    header("location:account.php"); //redirect to account.php
    exit();
}
else
{
    $salt = md5(uniqid(rand(), true));
    $password = hash('sha256', $password.$salt); //generate the hashed password with the salt value
    $sql = "UPDATE admin SET adminPassword='$password', adminSalt='$salt' WHERE adminID='$adminID '"; 
    $result = mysqli_query($con, $sql) or die(mysqli_error($con)); //run the query   
}

if($result)
{ 
    $_SESSION['success'] = 'Password updated successfully'; //register a session with a success message 
    header("location:account.php"); //redirect to account.php
} 
else
{ 
    $_SESSION['error'] = 'An error has occurred. Password not updated.'; //register a session with an error message
    header("location:account.php"); //redirect to account.php 
}
?>