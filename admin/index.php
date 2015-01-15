<?php
    //Webpage Includes List
    include '../includes/cms_head.php';
    include '../includes/cms_nav.php';
    include '../includes/connect.php';
    
    //Webpage Title
    $Title = "Dashboard - Home";

    displayHead($Title , "");

    displayHead($Title , "");

    displayNav(1 , "Home");
?>

        <div class="Dash-Container">
            <?php

                $sql = "SELECT (SELECT COUNT(*) FROM review) AS 'totalReviews', (SELECT COUNT(*) FROM category) AS 'totalCategories', (SELECT COUNT(*) FROM admin) AS totalAdministrators, (SELECT COUNT(*) FROM theme) AS totalThemes";
                $result = mysqli_query($con, $sql) or die(mysqli_error($con)); 

                while ($row = mysqli_fetch_array($result)){
                    echo "<table id='dashboard'>";
                    echo "<th colspan='3' class='tablehead'>Overview</th>";
                    echo "<tr>";
                    echo "<td class='reviews'>" . $row['totalReviews'] . "</td> <td class='overview'>  Total Reviews</td>";
                    echo "</tr>";
                    echo "<tr>";
                    echo "<td class='reviews'>" . $row['totalCategories'] . "</td><td class='overview'>  Total Categories</td>";
                    echo "</tr>";
                    echo "<tr >";
                    echo "<td class='reviews'>" . $row['totalAdministrators'] . "</td><td class='overview'>  Total 
            Administrators</td>";
                    echo "</tr>";
                    echo "<tr>";
                    echo "<td class='reviews'>" . $row['totalThemes'] . "</td><td class='overview'>  Total Themes</td>";
                    echo "</tr>";
                    echo "</table>";
                }
             ?>
            </div>
            <?php footer(); ?>
        </section> <!--end content-->
    </body>
</html>




