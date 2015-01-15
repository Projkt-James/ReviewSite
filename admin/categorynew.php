<?php
    //Webpage Includes List
    include '../includes/cms_head.php';
    include '../includes/cms_nav.php';
    include '../includes/connect.php';
    
    //Webpage Title
    $Title = "Dashboard - New Category";

    displayHead($Title , "");

    displayNav(3 , "New Category");
?>

            <div class="NewCategory-Container">
               <?php
                //user messages 
                if(isset($_SESSION['error']))
                {
                    echo '<div class="error">'; 
                    echo '<p>' . $_SESSION['error'] . '</p>'; //display error message 
                    echo '</div>'; unset($_SESSION['error']);
                }
                elseif(isset($_SESSION['success']))
                {
                    echo '<div class="success">'; 
                    echo '<p>' . $_SESSION['success'] . '</p>'; //display success message 
                    echo '</div>'; unset($_SESSION['success']);
                }
                ?>

                 <form action="categorynewprocessing.php" method="post"> 
                    <label>Category</label> <input type="text" name="categoryName" required /><br />         
                    <label>Description</label> <br /><textarea class='newcategory' name="categoryDescription" ></textarea><br /> 
                    <p><input class='button2' type="submit" name="categorynew" value="Add New" /></p> 
                </form>  
    
            </div>
            <?php footer(); ?>
        </section> <!--end content-->
    </body>
</html>