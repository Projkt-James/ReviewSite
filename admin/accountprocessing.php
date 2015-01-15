<?php 
    session_start();
    include "../includes/connect.php"; 
?>

<?php 
$adminID = $_POST['adminID']; //retrieve the adminID from the hidden form field 
$username = mysqli_real_escape_string($con, $_POST['username']); //prevent SQL injection 
$firstName = mysqli_real_escape_string($con, $_POST['firstName']); 
$lastName = mysqli_real_escape_string($con, $_POST['lastName']); 
$email = mysqli_real_escape_string($con, $_POST['email']);

$sql = "SELECT * FROM admin WHERE adminID='$adminID'"; //check if the username is taken 

$result = mysqli_query($con, $sql) or die(mysqli_error($con)); //run the query 

$row = mysqli_fetch_array($result);

if ($firstName == "" || $lastName == "" || $email == "") //check if all required fields have data 
{
   $_SESSION['error'] = 'All * fields are required.'; //if an error occurs intialise a session called 'error' with a msg
    header("location:account.php"); //redirect to account.php 
    exit();
}
elseif (!filter_var($email, FILTER_VALIDATE_EMAIL))
{
    $_SESSION['error'] = 'Please enter a valid email address.'; //if an error occurs intialise a session called 'error' with a msg
    header("location:account.php"); //redirect to account.php 
    exit();
}
else
{
    $sql="UPDATE admin SET adminFirstName='$firstName', adminLastName='$lastName', adminEmail='$email' WHERE adminID='$adminID'";
    $result = mysqli_query($con, $sql) or die(mysqli_error($con)); //run the query 
    $_SESSION['success'] = 'Account updated successfully'; //if account is successful intialise a session called 'success' with a msg 
    header("location:account.php"); //redirect to login.php 
} 
?>
    