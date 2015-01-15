<?php
    //Webpage Includes List
    include '../includes/cms_head.php';
    include '../includes/cms_nav.php';
    include '../includes/connect.php';
    
    //Webpage Title
    $Title = "Dashboard - Account";

    displayHead($Title , "");

    displayNav(5 , "Account");
?>

<?php
    $adminID = $_SESSION['login']; //retrieve the adminID from the current session 
    $sql = "SELECT * FROM admin WHERE adminID = '$adminID'"; 
    $result = mysqli_query($con, $sql) or die(mysqli_error($con)); //run the query 
    $row = mysqli_fetch_array($result); 
?>

            <div class="Account-Container"> 

                <?php //user messages 
                    if(isset($_SESSION['error'])) //if session error is set
                    { 
                        echo '<div class="error">';
                        echo '<p>' . $_SESSION['error'] . '</p>'; //display error message 
                        echo '</div>'; 
                        unset($_SESSION['error']); //unset session error
                    } 
                    elseif(isset($_SESSION['success']))
                    { 
                        echo '<div class="success">'; 
                        echo '<p>' . $_SESSION['success'] . '</p>'; //display success message 
                        echo '</div>'; unset($_SESSION['success']); //
                        unset($_SESSION['success']); 
                    } 
                ?>

            <h1>Update Details</h1> 

                <form action="accountprocessing.php" method="post">
                    <label>First Name</label> <input type="text" name="firstName" required value="<?php echo $row['adminFirstName'] ?>" /><br />
                    <label>Last Name</label> <input type="text" name="lastName" required value="<?php echo $row['adminLastName'] ?>" /><br /> 
                    <label>Email</label> <input type="email" name="email" required value="<?php echo $row['adminEmail'] ?>" /><br /> 
                    <input type="hidden" name="adminID" value="<?php echo $adminID; ?>">
                    <p><input class='button2' type="submit" name="accountupdate" value="Update" /></p>          
                </form>  

            <h1>Update Password</h1> 
                <p>Passwords must have a minimum of 6 characters.</p>    

                <form action="accountpasswordprocessing.php" method="post"> 
                    <label>New Password</label> <input type="password" name="password" pattern=".{6,}" title= "Password must be 6 characters or more" required /><br /> 
                    <input type="hidden" name="adminID" value="<?php echo $adminID; ?>"> 
                    <p><input class='button2' type="submit" name="passwordupdate" value="Update" /></p>        
                </form>
            </div>
            <?php footer(); ?>
        </section> <!--end content-->
    </body>
</html>
    
    
    
    
    
    