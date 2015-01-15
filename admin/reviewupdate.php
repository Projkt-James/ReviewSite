<?php
    //Webpage Includes List
    include '../includes/cms_head.php';
    include '../includes/cms_nav.php';
    include '../includes/connect.php';
    
    //Webpage Title
    $Title = "Dashboard - Review Update";

    displayHead($Title , "");

    displayNav(2 , "Review Update");
?>

<div class="UpdateReview-Container">

<?php 

    $reviewID = $_GET['reviewID']; //retrieve reviewID from URL

    $sql = "SELECT review.*, category.*, admin.adminFirstName, admin.adminLastName FROM review JOIN admin USING (adminID) JOIN category USING (categoryID) WHERE reviewID = '$reviewID'";

    $result = mysqli_query($con, $sql) or die(mysqli_error($con)); //run the query

    $row = mysqli_fetch_array($result);
?>


<section id="contentupdate">
 <div id="updatereview">   
    
<?php
    
    //user messages 
    if(isset($_SESSION['error'])) //if session error is set
        
    {
        echo '<div class="error">'; 
        echo '<p>' . $_SESSION['error'] . '</p>'; //display error message 
        echo '</div>'; 
        unset($_SESSION['error']);
    }
    elseif(isset($_SESSION['success']))
    {
        echo '<div class="success">'; 
        echo '<p>' . $_SESSION['success'] . '</p>';
        echo '</div>'; 
        unset($_SESSION['success']);
    }
?>
    
<form action="reviewupdateprocessing.php" method="post">    
  <label>Title</label> <input type="text" name="title" required value="<?php echo $row['reviewTitle'] ?>" />
    <br />  
    
 <label>Content</label>
    <textarea rows="10" cols="40%" name="content" required > <?php echo $row['reviewContent'] ?></textarea>
    <br />
    
<label>Author</label>
    <select name='adminID'> 
    <option value="<?php echo $row['adminID'] ?>"><?php echo $row['adminFirstName'] . " " . $row['adminLastName'] ?></option>   
    
<?php 
$sql="SELECT * FROM admin";

$result = mysqli_query($con, $sql) or die(mysqli_error($con)); //run the query     
     
while ($row = mysqli_fetch_array($result))
{
    echo "<option value=" . $row['adminID'] . ">" . $row['adminFirstName'] . " " . $row['adminLastName'] . "</option>";
}

?>
     
</select>
<br />    
    
 <?php 
    $reviewID = $_GET['reviewID']; //retrieve reviewID from URL
    $sql = "SELECT category.* FROM review JOIN category USING (categoryID) WHERE reviewID = '$reviewID'"; //retrieve the selected value   
    $result = mysqli_query($con, $sql) or die(mysqli_error($con)); //run the query
    $row = mysqli_fetch_array($result);
?>
    
    <label>Category</label>
    <select name='categoryID'>
    <option value="<?php echo $row['categoryID'] ?>"><?php echo $row['categoryName'] ?></option>
      
      <?php
            $sql="SELECT * FROM category"; 
            $result = mysqli_query($con, $sql) or die(mysqli_error($con)); 

        while ($row = mysqli_fetch_array($result))
        {
           echo "<option value=" . $row['categoryID'] . ">" . $row['categoryName'] . "</option>"; 
        }

     ?>
      
    </select><br />
    
 <?php 
    $sql = "SELECT review.* FROM review WHERE reviewID = '$reviewID'"; //retrieve the selected value  
    $result = mysqli_query($con, $sql) or die(mysqli_error($con)); //run the query
    $row = mysqli_fetch_array($result);
?>
    
 <label>Rating</label>   
    
<select name='rating'>
<option value="<?php echo $row['reviewRating'] ?>"><?php echo $row['reviewRating'] ?></option> <!-- display the selected rating -->
    
<?php for ($i = 1; $i <= 5; $i++) : ?> <option value="<?php echo $i; ?>"><?php echo $i; ?></option> 
<?php endfor; ?> 
    
</select><br />    
    
<input type="hidden" name="reviewID" value="<?php echo $reviewID; ?>"> 
<p><input class='button2' type="submit" name="reviewupdate" value="Update" /></p> 

</form>    
</div>
    
    
<div id="updateimage">    
<h2>Update Image</h2>
    
<?php
    if((is_null($row['reviewImage'])) || (empty($row['reviewImage'])))
        
    {
        echo "<p><img src='../images/default.jpg' width=500 height=300 alt='default photo' /></p>";
    }
else
{
   echo "<p><img src='../images/ReviewBetter/" . ($row['reviewImage']) . "'" . ' width=500 height=300 alt="review photo"' . "/></p>"; 
}
 ?>
    
    
    
<form action="reviewupdateimageprocessing.php" method="post" enctype="multipart/form-data">    
    
 <input type="hidden" name="reviewID" value="<?php echo $reviewID; ?>"> 
<label>New Image</label> <input type="file" name="image" /><br />
<p>Accepted files are JPG, GIF or PNG. Maximum size is 10Mb.</p> 
<p><input class='button2' type="submit" name="imageupdate" value="Update" /></p>

</form>    
    
</div>    
            </div>
            <?php footer(); ?>
        </section> <!--end content-->
    </body>
</html>

   
    
    
    
    
    
    
    
    
    
    
    



















    
    
    
    
    
    
    
    
