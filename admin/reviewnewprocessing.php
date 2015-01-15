<?php 
    session_start(); 
    include "../includes/connect.php";
?>

<?php 
$title = mysqli_real_escape_string($con, $_POST['title']); //prevent SQL injection
$content = mysqli_real_escape_string($con, $_POST['content']); 
$adminID = mysqli_real_escape_string($con, $_POST['adminID']);            
$categoryID = mysqli_real_escape_string($con, $_POST['categoryID']); 
$rating = mysqli_real_escape_string($con, $_POST['rating']);

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
        header("location:reviews.php");
        exit();
    }
        elseif(($_FILES['image']['type'] == 'image/jpg') || ($_FILES['image']['type'] == 'image/jpeg') || ($_FILES['image']['type'] == 'image/gif') || ($_FILES['image']['type'] == 'image/png') && in_array($extension, $allowedExts))
            
        {
            move_uploaded_file($_FILES['image']['tmp_name'], $target);
        }
        else
        {
            $_SESSION['error'] = 'Only JPG, GIF and PNG files allowed.';
            header("location:reviews.php");
            exit();
        }
    
}

$sql="INSERT INTO review (reviewTitle, reviewContent, reviewDate, adminID, categoryID, reviewRating, reviewImage) VALUES ('$title', '$content', NOW(), '$adminID', '$categoryID', '$rating', '$newImageName')";


$result = mysqli_query($con, $sql) or die(mysqli_error($con)); //run the query

$_SESSION['success'] = 'New review successfully added.'; //if new review is added successfully initialise a session called 'success' with a msg

header("location:../admin/reviews.php");

?>







