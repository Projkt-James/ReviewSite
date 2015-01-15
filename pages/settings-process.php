<?php
session_start();
include "../includes/connect.php"; //include the database connection 

function updateAccountDetail($column, $value){
    global $con;
    $userID = $_SESSION['login'];
    
    if($value == "NULL"){
        $sql = "UPDATE member SET ".$column." = NULL WHERE memberID = '$userID'";
    }else{
        $sql = "UPDATE member SET ".$column." = '$value' WHERE memberID = '$userID'";
    }
    $result = mysqli_query($con, $sql) or die(mysqli_error($con));
}

$userID = $_SESSION['login'];

/***********************************
ACCOUNT DETAILS UPDATE
***********************************/
if(isset($_POST['Update_Details'])){
    
    /***************************
    NAME Validation
    ***************************/
    
    //FIRST
    if(empty($_POST['update_firstname'])){
        $firstname = "";
        $_SESSION['errorFirstName'] = 'First Name Required';
    }else if(ctype_alpha ($_POST['update_firstname'])){
        $firstname = mysqli_real_escape_string($con, $_POST['update_firstname']);
        updateAccountDetail("memberFirstName", $firstname); 
        $_SESSION['firstname'] = $firstname; 
                
    }else{
        $_SESSION['errorFirstName'] = 'Invalid First Name (Letters Only)';
    }
    
    //LAST
    if(empty($_POST['update_lastname'])){
        $lastname = "";
        $_SESSION['errorLastName'] = 'Last Name Required';
    }else if(ctype_alpha ($_POST['update_lastname'])){
        $lastname = mysqli_real_escape_string($con, $_POST['update_lastname']);
        updateAccountDetail("memberLastName", $lastname);
        $_SESSION['lastname'] = $lastname;
    }else{
        $_SESSION['errorLastName'] = 'Invalid Last Name (Letters Only)';
    }
    
    /***************************
    GENDER Validation
    ***************************/
    
    if(empty($_POST['update_gender'])){
        $gender = "";
        $_SESSION['errorGender'] = 'Gender Required';
    }else if($_POST['update_gender'] != "Gender"){
        $gender = mysqli_real_escape_string($con, $_POST['update_gender']);
        updateAccountDetail("memberGender", $gender);
    }else{
        $_SESSION['errorGender'] = 'Gender Required';
    }
    
    /***************************
    COUNTRY Validation
    ***************************/
    
    if(empty($_POST['update_country'])){
        $country = "";
        $_SESSION['errorCountry'] = 'Your Region Is Required';
    }else if($_POST['update_country'] != "Select A Country"){
        $country = mysqli_real_escape_string($con, $_POST['update_country']);
        updateAccountDetail("CountryID", $country);
    }else{
        $_SESSION['errorCountry'] = 'Your Region Is Required';
    }
    
    /***************************
    POSTCODE Validation
    ***************************/

    if(empty($_POST['update_postcode'])){
        $postcode = "";
        $_SESSION['errorPostCode'] = 'Your Region Is Required';
    }else if(ctype_digit($_POST['update_postcode']) && strlen($_POST['update_postcode']) == 4){
        $postcode = mysqli_real_escape_string($con, $_POST['update_postcode']);
        updateAccountDetail("memberPostCode", $postcode);
    }else{
        $_SESSION['errorPostCode'] = 'Your Region Is Required';
        
        if(strlen($_POST['update_postcode']) < 4){
            $_SESSION['errorPostCode'] = 'Four (4) Numbers Required';
        }
    }    
    
    /***************************
    SUBURB Validation ~ NULL
    ***************************/
    
    if(empty($_POST['update_suburb'])){
        $suburb = "NULL";
        updateAccountDetail("memberSuburb", $suburb);
    }else if(ctype_alpha($_POST['update_suburb'])){
        $suburb = mysqli_real_escape_string($con, $_POST['update_suburb']);
        updateAccountDetail("memberSuburb", $suburb);
    }else{
        $_SESSION['errorSuburb'] = 'Invalid Suburb Name';
    }
    
    /***************************
    STREET NUMBER Validation ~ NULL
    ***************************/
    
    if(empty($_POST['update_streetnumber'])){
        $streetnumber = "NULL";
        updateAccountDetail("memberStreetNumber", $streetnumber);
    }else if(ctype_digit($_POST['update_streetnumber'])){
        $streetnumber = mysqli_real_escape_string($con, $_POST['update_streetnumber']);
        updateAccountDetail("memberStreetNumber", $streetnumber);
    }else{
        $_SESSION['errorStreetNumber'] = 'Invalid Street Number';
    }
    
    /***************************
    STREET NAME Validation ~ NULL
    ***************************/
    
    if(empty($_POST['update_streetname'])){
        $streetname = "NULL";
        updateAccountDetail("memberStreetName", $streetname);
    }else if(!ctype_digit($_POST['update_streetname'])){
        $streetname = mysqli_real_escape_string($con, $_POST['update_streetname']);
        updateAccountDetail("memberStreetName", $streetname);
    }else{
        $_SESSION['errorStreetName'] = 'Invalid Street Name';
    }
    
    /***************************
    NUMBERS Validation ~ NULL
    ***************************/
    
    //Phone
    if(empty($_POST['update_phone'])){
        $phonenumber = "NULL";
        updateAccountDetail("memberPhone", $phonenumber);
    }else if(ctype_digit($_POST['update_phone']) && strlen($_POST['update_phone']) >= 8){
        $phonenumber = mysqli_real_escape_string($con, $_POST['update_phone']);
        updateAccountDetail("memberPhone", $phonenumber);
    }else{
        $_SESSION['errorPhoneNumber'] = 'Invalid Phone Number';
        
         if(strlen($_POST['update_phone']) < 8){
            $_SESSION['errorPhoneNumber'] = 'Eight (8) Numbers Required';
        }
    }    
    
    //Mobile
    if(empty($_POST['update_mobile'])){
        $mobilenumber = "NULL";
        updateAccountDetail("memberMobile", $mobilenumber);
    }else if(ctype_digit($_POST['update_mobile']) && strlen($_POST['update_mobile']) >= 7){
        $mobilenumber = mysqli_real_escape_string($con, $_POST['update_mobile']);
        updateAccountDetail("memberMobile", $mobilenumber);
    }else{
        $_SESSION['errorMobileNumber'] = 'Invalid Mobile Number';
        
         if(strlen($_POST['update_mobile']) < 7){
            $_SESSION['errorMobileNumber'] = 'Seven (7) Numbers Required';
        }
    }    
    
    /***************************
    EMAIL Validation
    ***************************/
    if(empty($_POST['update_email'])){
        $email = "";
        $_SESSION['errorEmail'] = 'Email Required';
        
    }else if(preg_match("/^([a-zA-Z0-9])+([a-zA-Z0-9\._-])*@([a-zA-Z0-9_-])+([a-zA-Z0-9\._-]+)+$/", $_POST['update_email'])){
        //Looks to be safe, save to email variable
        $email = mysqli_real_escape_string($con, $_POST['update_email']);
        
        //Checks Email Availiblity
        $sql_emailcheck = "SELECT * FROM member WHERE memberID != '$userID' AND memberEmail='$email' "; //SQL Query to check email against database 
        $emailresult = mysqli_query($con, $sql_emailcheck) or die(mysqli_error($con)); //run the query 

        if(mysqli_num_rows($emailresult) > 0 && !empty($_POST['update_email'])){
            $_SESSION['errorEmail'] = 'Email in use by another user';
        }else{
            updateAccountDetail("memberEmail", $email);   
        }
        
    }else{
        $_SESSION['errorEmail'] = 'Invalid Email';
    }    
    
    header('Location:profile.php');
    exit();
}

/***********************************
PROFILE PICTURE UPDATE
***********************************/
if(isset($_POST['Update_Image'])){
    $userID = $_SESSION['login'];
    
    if($_FILES['image']['name']){
        $randomDigit = rand(0000,9999);
        
        $dir ="../images/users/". $userID;
        if(!is_dir($dir)){
            mkdir($dir, 0700);
        }
            
        $ImageName = $_FILES['image']['name'];
        $newImageName = strtolower($randomDigit . "_" . $ImageName); 
        $target = "../images/users/". $userID ."/". $newImageName;
        $ImageName = $userID ."/". $newImageName;
        
        $allowedExts = array('jpg', 'jpeg', 'gif', 'png'); 
        $tmp = explode('.', $_FILES['image']['name']); 
        $extension = end($tmp); 
        
        if($_FILES['image']['size'] > 10240000){ //image maximum size is 10mb
            
            $_SESSION['errorProfilePicture'] = '10Mb Max Image Size'; 
            header("location:profile.php"); 
            exit();
            
        }else if(($_FILES['image']['type'] == 'image/jpg') || ($_FILES['image']['type'] == 'image/jpeg') || ($_FILES['image']['type'] == 'image/gif') || ($_FILES['image']['type'] == 'image/png') && in_array($extension, $allowedExts)){ 
            
            try{
                move_uploaded_file($_FILES['image']['tmp_name'], $target);
            } catch(Exception $e) {
                $_SESSION['errorProfilePicture'] = 'Something went wrong :('; 
                header("location:profile.php"); 
                exit();
            }
            
            $sql="UPDATE member SET memberImage='$ImageName' WHERE memberID='$userID'";
            $result = mysqli_query($con, $sql) or die(mysqli_error($con));
            
            header("location:profile.php"); 
            exit(); 
        }else{  
            $_SESSION['errorProfilePicture'] = 'Invalid File Extension'; 
            header("location:profile.php"); 
            exit();   
        }         
    }else{
        $_SESSION['errorProfilePicture'] = 'No File Uploaded';
        header("location:profile.php"); 
        exit(); 
    }
}

/***********************************
UPDATE PASSWORD
***********************************/
if(isset($_POST['Update_Password'])){
    header('Location:different.php');
}

/***********************************
DELETE ACCOUNT
***********************************/
if(isset($_POST['Delete_Account'])){
    $userID = $_SESSION['login'];
    
    $sql = "DELETE member.* FROM member WHERE memberID = '$userID'";
    $result = mysqli_query($con, $sql) or die(mysqli_error($con)); 
    
    session_destroy();
    header('location:index.php'); 
}
?>