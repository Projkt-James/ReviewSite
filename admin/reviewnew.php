<?php
    //Webpage Includes List
    include '../includes/cms_head.php';
    include '../includes/cms_nav.php';
    include '../includes/connect.php';
    
    //Webpage Title
    $Title = "Dashboard - Home";

    displayHead($Title , "");

    displayNav(2 , "New Review");
?>

<div class="NewReview-Container">

<?php
 //user messages
 if(isset($_SESSION['error'])) //if session error is set
    {
       echo '<div class="error">';
       echo '<p>' . $_SESSION['error'] . '</p>'; //display error message
       echo '</div>';
       unset($_SESSION['error']); //unset session error
     
    }

elseif(isset($_SESSION['success'])) //if session success is set
    
{
    echo '<div class="success">';
    echo '<p>' . $_SESSION['success'] . '</p>'; //display success message
    echo '</div>';
    unset($_SESSION['success']); //unset session success

}
?>
    
  <form action="reviewnewprocessing.php" method="post" enctype="multipart/form-data">  
    
   <label>Title</label> <input type="text" name="title" required /><br />
      
     <label>Content</label> <br />
      <textarea rows="10" cols="60%" name="content" ></textarea><br />
      
      <label>Author</label>
<!-- create a drop-down list populated by the admin details stored in the database --> 
      
      <select name='adminID'>
        <option value="">Please select</option>
<?php
     $sql="SELECT * FROM admin";
     $result = mysqli_query($con, $sql) or die(mysqli_error($con)); //run the query

    while ($row = mysqli_fetch_array($result))

      {
        echo "<option value=" . $row['adminID'] . ">" . $row['adminFirstName'] . " " . $row['adminLastName'] . "</option>";
      }
 ?>
          
 </select>
      
      <br /><br />
      
 <label>Category*</label>
<!-- create a drop-down list populated by the categories stored in the database -->
 
      
  <select name='categoryID'>
 <option value="">Please select</option>
    
         
<?php
    $sql="SELECT * FROM category"; 
    $result = mysqli_query($con, $sql) or die(mysqli_error($con)); //run the query

    while ($row = mysqli_fetch_array($result))

      {
        echo "<option value=" . $row['categoryID'] . ">" . $row['categoryName'] . "</option>";
      }

?>
      
 </select><br /><br />
     
 <label>Rating*</label>     
 <!-- create a drop-down list populated by the rating stored in the database -->     
      
 <select name='rating'>
 <option value="">Please select</option>     
 <!-- use a for loop to create the rating options up to a maximum of 10 -->  
     
<?php for ($i = 1; $i <= 10; $i++) : ?>
    <option value="<?php echo $i; ?>">
<?php echo $i; ?></option>
<?php endfor; ?>
     
</select><br /><br />
    
   
 <label>Image</label> <input type="file" name="image" /><br /> 
 <p>Accepted files are JPG, GIF or PNG. Maximum size is 10Mb.</p>      
      
  <input type="hidden" name="reviewID" value="<?php echo $reviewID; ?>">    
      
     <p><input class='button2' type="submit" name="reviewnew" value="Add New" /></p>  
      
</form>      
            </div>
            <?php footer(); ?>
        </section> <!--end content-->
    </body>
</html>     
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    