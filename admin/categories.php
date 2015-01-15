<?php
    //Webpage Includes List
    include '../includes/cms_head.php';
    include '../includes/cms_nav.php';
    include '../includes/connect.php';
    
    //Webpage Title
    $Title = "Dashboard - Categories";

    displayHead($Title , "");

    displayNav(3 , "Categories");
?>

            <div class="Categories-Container"> 

            <?php //user messages
                 if(isset($_SESSION['error'])) 
                 {
                    echo '<div class="error">';
                    echo '<p>' . $_SESSION['error'] . '</p>';
                    echo '</div>';
                    unset($_SESSION['error']); //unset session error
                 }

            elseif(isset($_SESSION['success'])) //if session success is set

                {
                echo '<div class="success">'; 
                echo '<p>' . $_SESSION['success'] . '</p>'; //display success message 
                echo '</div>'; unset($_SESSION['success']); //unset session success
                }
            ?>

            <?php
                //retrieve total number of categories 
                    $sql = "SELECT * FROM category"; 
                    $result = mysqli_query($con, $sql) or die(mysqli_error($con)); //run the query

                    $numrow = mysqli_num_rows($result); //retrieve the number of rows
                    echo "<p>There are currently <strong>" . $numrow . "</strong> Categories.</p>";

                    include "../includes/pagination_create.php";

            // retrieve data from database for display
                    $sql = "SELECT category.*, COUNT(review.categoryID) AS categoryCount FROM   category LEFT JOIN review ON category.categoryID = review.categoryID GROUP BY category.categoryID ORDER BY categoryName ASC LIMIT $offset, $rowsperpage"; //count the number of posts in each category
                    $result = mysqli_query($con, $sql) or die(mysqli_error($con));
            ?>
                <p><a href="categorynew.php">Add New</a></p>
            <?php

                echo "<table class='cattable'>"; // display records in a table format
                echo "<thead>
                        <tr>
                            <th>Category</th>
                            <th>Description</th>
                            <th>Reviews</th>
                            <th>Action</th>
                        </tr>
                      </thead>";  

                    while ($row = mysqli_fetch_array($result))
                    {
                        echo "<tr>";
                        echo "<td>" . $row['categoryName'] . "</td>";
                        echo "<td>" . $row['categoryDescription'] . "</td>";
                        echo "<td class='catcount'>" . $row['categoryCount'] . "</td>";
                        echo "<td>
                        <a href=\"categoryupdate.php?categoryID={$row['categoryID']}\">Update</a> | 
                        <a href=\"categorydelete.php?categoryID={$row['categoryID']}\"      onclick=\"return confirm('Are you sure you want to delete this category?')\">Delete</a>             </td>"; 
                        echo "</tr>";
                    }

                    echo "</table>";
                    include "../includes/pagination_display.php";

            ?>
            </div>
            <?php footer(); ?>
        </section> <!--end content-->
    </body>
</html>






















