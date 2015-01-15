<?php
    //Webpage Includes List
    include '../includes/cms_head.php';
    include '../includes/cms_nav.php';
    include '../includes/connect.php';
    
    //Webpage Title
    $Title = "Dashboard - Update Category";

    displayHead($Title , "");

    displayNav(3 , "Update Category");
?>

<?php
    $categoryID = $_GET['categoryID']; //retrieve reviewID from URL 
    $sql = "SELECT * FROM category WHERE categoryID = '$categoryID'"; 
    $result = mysqli_query($con, $sql) or die(mysqli_error($con)); //run the query
    $row = mysqli_fetch_array($result); 
?>

            <div class="UpdateCategory-Container">
                <?php //user messages
                if(isset($_SESSION['error'])) //if session error is set 
                { 
                    echo '<div class="error">';
                    echo '<p>' . $_SESSION['error'] . '</p>'; //display error message
                    echo '</div>'; 
                    unset($_SESSION['error']); //unset session error
                }
                elseif(isset($_SESSION['success'])) //if session success is set
                {
                echo '<div class="success">'; echo '<p>' . $_SESSION['success'] . '</p>'; //display success message echo '</div>'; 
                unset($_SESSION['success']); //unset session success } 
                }
                ?> 

                <form action="categoryupdateprocessing.php" method="post"> 
                    <label>Category</label> <input type="text" name="category" required value="<?php echo $row['categoryName'] ?>" />
                    <br /> 
                    <br /> 
                    <label>Description</label> 
                    <br /> 
                    <br /> 
                    <textarea name="description" required > <?php echo $row['categoryDescription'] ?></textarea><br /> 
                    <input type="hidden" name="categoryID" value="<?php echo $categoryID; ?>">
                    <p><input class='button2' type="submit" name="categoryupdate" value="Update Category" /></p> 
                </form> 
            </div>
            <?php footer(); ?>
        </section> <!--end content-->
    </body>
</html>