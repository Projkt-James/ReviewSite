<?php
    //Webpage Includes List
    include '../includes/cms_head.php';
    include '../includes/cms_nav.php';
    include '../includes/connect.php';
    
    //Webpage Title
    $Title = "Dashboard - Home";

    displayHead($Title , "");

    displayNav(2 , "Reviews");
?>

                <div class="Reviews-Container"> 
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

                    <?php
                     //retrieve total number of reviews
                        $sql = "SELECT * FROM review";
                        $result = mysqli_query($con, $sql) or die(mysqli_error($con)); //run the query

                        $numrow = mysqli_num_rows($result); //retrieve the number of rows
                        echo "<p>There are currently <strong>" . $numrow . "</strong> Reviews.</p>"; //echo the total number of contacts

                        echo "<p><a href='../admin/reviewnew.php'>Add New</a></p>";

                        include "../includes/pagination_create.php"; // include code to build pagination
                    // retrieve data from database for display


                    $sql = "SELECT admin.adminID, admin.adminFirstName, review.*, category.*, 
                    COUNT(comment.reviewID) AS commentCount FROM review INNER JOIN admin ON review.adminID 
                    = admin.adminID INNER JOIN category ON review.categoryID = category.categoryID LEFT
                    JOIN comment ON review.reviewID = comment.reviewID GROUP BY review.reviewID, 
                    comment.reviewID ORDER BY commentDate DESC LIMIT $offset, $rowsperpage";

                    $result = mysqli_query($con, $sql) or die(mysqli_error($con)); //run the query


                        echo "<table id='reviewtable'>"; // display records in a table format

                        echo "<thead>
                                <tr>
                                    <th>Title</th>
                                    <th>Author</th>
                                    <th>Category</th>
                                    <th>Rating</th>
                                    <th>Date-Time</th>
                                    <th>Comments</th>
                                    <th>Actions</th>
                                </tr>
                              </thead>";  





                    while ($row = mysqli_fetch_array($result))
                     {
                        echo "<tr class='review'>";
                        echo "<td>" . $row['reviewTitle'] . "</td>";
                        echo "<td>" . $row['adminFirstName'] . "</td>";
                        echo "<td>" . $row['categoryName'] . "</td>";
                        echo "<td class='rating'>" . $row['reviewRating'] . "</td>";
                        echo "<td>" . date("d/m/y H:i",strtotime($row['reviewDate'])) . "</td>";
                        echo "<td class='comment'>" . $row['commentCount'] . "</td>";
                        echo "<td><a class='update' href=\"../admin/reviewupdate.php?reviewID={$row['reviewID']}\">Update</a> | 
                        <a href=\"../admin/reviewdelete.php?reviewID= {$row['reviewID']}\" onclick=\"return confirm('Are you sure you want to delete this review?')\">Delete</a></td>";
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

    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    















    
















    