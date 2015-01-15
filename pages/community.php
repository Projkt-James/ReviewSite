<?php
    //Webpage Includes List
    include '../includes/head.php';
    include '../includes/connect.php';

    //Webpage Title
    $Title = "Our Community";

    displayHead($Title , "");
    displayNav(3);
        
    displayTopBar(); 
?>

    <section class="Community_Title">
        Our Community  
    </section>

    <section class="Community_List">
        
        <?php 
            
        $sql = "SELECT * FROM member ORDER BY memberJoinDate DESC";
        $result = mysqli_query($con, $sql) or die(mysqli_error($con)); //run the query       

        while ($row = mysqli_fetch_array($result)){
            echo '  <div class="col-xs-12 col-sm-12 col-md-4 Community_Users">

                        <div class="Community_Users_Picture">
                            <div class="circle center-vert" '. getProfilePic($row['memberID']) .'></div>
                        </div>

                        <div class="Community_Users_Info">
                            <h1>'. $row['memberFirstName'] .' '. $row['memberLastName'] .'</h1>
                            <h2>'. $row['memberUsername'] .'</h2>
                        </div>        
                    </div>';  
        }
        ?> 
        
    </section>




        </div><!-- Close Site Container -->
    </body>
</html>