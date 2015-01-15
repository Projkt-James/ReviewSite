<?php
    //Webpage Includes List
    include '../includes/cms_head.php';
    include '../includes/cms_nav.php';
    include '../includes/connect.php';
    
    //Webpage Title
    $Title = "Dashboard - Theme";

    displayHead($Title , "");

    displayHead($Title , "");

    displayNav(6 , "Theme");
?>

            <div class="Theme-Container">
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
 
                <h1>Select A Theme</h1>
 
                 <?php

                 $sql = "SELECT * FROM theme"; //select the data from the theme table
                 $result = mysqli_query($con, $sql) or die(mysqli_error($con)); //run the query

                 while ($row = mysqli_fetch_array($result))
                 {
                     echo "<img src='../images/theme/" . ($row['themeImage']) . "'" . ' width=500 
                    height=300 ' . "/>"; //display the theme photo
                     echo "<h2>" . $row['themeTitle'] . "</h2>"; //display the theme name
                     echo "<p>" . $row['themeDescription'] . "</p>"; //display the theme description 
                     echo "<form action='themeprocessing.php' method='post'>";
                     echo "<input type='hidden' name='themeID' value=" . $row['themeID'] . ">";
                    //a hidden form field holds the themeID
                     echo "<p><input type='submit' value='Activate'>";
                     echo "</form>";
                 }
                 ?>
  
            </div>
            <?php footer(); ?>
        </section> <!--end content-->
    </body>
</html>




