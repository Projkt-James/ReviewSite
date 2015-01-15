<?php
    //Webpage Includes List
    include '../includes/cms_head.php';
    include '../includes/cms_nav.php';
    include '../includes/connect.php';
    
    //Webpage Title
    $Title = "Dashboard - Administrators";

    displayHead($Title , "");

    displayNav(4 , "Administrators");
?>

            <div class="Admin-Container"> 
    
                <?php //user messages
                    if(isset($_SESSION['error'])) //if session error is set 
                    { 
                        echo '<div class="error">';
                        echo '<p>' . $_SESSION['error'] . '</p>'; //display error message 
                        echo '</div>'; unset($_SESSION['error']); //unset session error
                    }
                elseif(isset($_SESSION['success']))
                    {
                        echo '<div class="success">'; 
                        echo '<p>' . $_SESSION['success'] . '</p>'; //display success message 
                        echo '</div>'; unset($_SESSION['success']);
                    }
                ?>

                <?php
                //retrieve total number of members 
                    $sql = "SELECT * FROM admin";
                    $result = mysqli_query($con, $sql) or die(mysqli_error($con)); //run the query  

                    $numrow = mysqli_num_rows($result); //retrieve the number of rows 
                    echo "<p>There are currently <strong>" . $numrow . "</strong> Administrators.</p>";         //echo the total number of contacts
                ?>
                <p><a href="../admin/administratornew.php">Add New</a></p>
                
                <?php
                include "../includes/pagination_create.php"; // include code to build pagination

                    $sql = "SELECT admin.*, COUNT(review.adminID) AS reviewCount FROM admin LEFT JOIN review USING(adminID) GROUP BY admin.adminID ORDER BY adminUsername ASC LIMIT $offset, $rowsperpage";     
                    $result = mysqli_query($con, $sql) or die(mysqli_error($con)); //run the query

                    echo "<table id='admintable'>"; // display records in a table format 

                    echo "<thead>
                            <tr>
                                <th>Username</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Join Date</th>
                                <th>Reviews</th>
                            </tr>
                          </thead>";  

                    while ($row = mysqli_fetch_array($result))
                    {
                        echo "<tr>";
                        echo "<td>" . $row['adminUsername'] . "</td>"; 
                        echo "<td>" . $row['adminFirstName'] . " " . $row['adminLastName'] . "</td>"; 
                        echo "<td><a href='mailto:" . $row['adminEmail'] . "'>" . $row['adminEmail'] . "</a>              </td>";         
                        echo "<td>" . date("d/m/y H:i",strtotime($row['adminJoinDate'])) . "</td>"; 
                        echo "<td class='countreview'>" . $row['reviewCount'] . "</td>"; 
                        echo "</tr>";
                    }

                echo "</table>";

                include "../includes/pagination_display.php"; //include code to display pagination 

                ?>
    
            </div>
            <?php footer(); ?>
        </section> <!--end content-->
    </body>
</html>









