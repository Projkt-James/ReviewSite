<?php
    //Webpage Includes List
    include '../includes/cms_head.php';
    include '../includes/cms_nav.php';
    include '../includes/connect.php';
    
    //Webpage Title
    $Title = "Dashboard - Create Administrators";

    displayHead($Title , "");

    displayNav(4 , "Create Administrator");
?>

            <div class="NewAdmin-Container"> 
    
<?php //user messages
    if(isset($_SESSION['error'])) //if session error is set    
    {
        echo '<div class="error">'; 
        echo '<p>' . $_SESSION['error'] . '</p>'; //display error message 
        echo '</div>'; unset($_SESSION['error']); //unset session error
    }
elseif(isset($_SESSION['success'])) //if session success is set
    {
        echo '<div class="success">'; 
        echo '<p>' . $_SESSION['success'] . '</p>'; //display success message 
        echo '</div>';
        unset($_SESSION['success']); //unset session success
    }
    
?>
    
    <form action="administratornewprocessing.php" method="post"> 
        <label>Username</label> 
        <input type="text" name="username" required /><br />             
        
        <label>Password</label> 
        <input type="password" name="password" required pattern=".{6,}" title= "Password must be 6 characters or more" /><br /> 
        
        <label>First Name</label> 
        <input type="text" name="firstName" required /><br />         
        
        <label>Last Name</label> 
        <input type="text" name="lastName" required /><br />           
        
        <label>Email</label> 
        <input type="email" name="email" required /><br />
        <p><input class='button2' type="submit" name="newadministrator" value="Add New" /></p> 
    </form>    
    
            </div>
            <?php footer(); ?>
        </section> <!--end content-->
    </body>
</html>