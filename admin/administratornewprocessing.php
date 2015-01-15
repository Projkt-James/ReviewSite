<?php 
    session_start();
    include "../includes/connect.php";
?>

<?php
    $username = mysqli_real_escape_string($con, $_POST['username']); 
    $password = mysqli_real_escape_string($con, $_POST['password']); 
    $firstName = mysqli_real_escape_string($con, $_POST['firstName']); 
    $lastName = mysqli_real_escape_string($con, $_POST['lastName']); 
    $email = mysqli_real_escape_string($con, $_POST['email']);

if (strlen($password) < 6)
{
    $_SESSION['error'] = 'Password must be 6 characters or more.';
    header("location:administratornew.php");
    exit();
}

$salt = md5(uniqid(rand(), true));
$password = hash('sha256', $password.$salt);

$sql = "SELECT * FROM admin WHERE adminUsername='$username'";
$result = mysqli_query($con, $sql) or die(mysqli_error($con));
$numrow = mysqli_num_rows($result);

if($numrow > 0)
{
    $_SESSION['error'] = 'Username taken. Please retry.';
    header("location:administratornew.php");         
    exit();
}
elseif ($username == "" || $password == "" || $firstName == "" || $lastName == "" || $email == "")
{
   $_SESSION['error'] = 'All * fields are required.'; 
    header("location:administratornew.php"); //redirect to registration.php 
    exit();
}
elseif (!filter_var($email, FILTER_VALIDATE_EMAIL))
{
   $_SESSION['error'] = 'Please enter a valid email address.';              
    header("location:administratornew.php"); //redirect to registration.php 
    exit(); 
}
else
{
   $sql="INSERT INTO admin (adminUsername, adminPassword, adminSalt, adminFirstName, adminLastName, adminEmail, adminJoinDate, typeID) VALUES ('$username', '$password', '$salt', '$firstName', '$lastName', '$email', NOW(), '0')";
    $result = mysqli_query($con, $sql) or die(mysqli_error($con)); //run the query 
    $_SESSION['success'] = 'You created a new administrator account.'; //if new administrator account is successful intialise a session called 'success' with a msg 
    header("location:administrators.php"); //redirect to administrators.php
}
?>


























