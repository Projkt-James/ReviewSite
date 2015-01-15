<?php
    //Webpage Includes List
    include '../includes/head.php';
    include '../includes/connect.php';

    $Search_Term = mysqli_real_escape_string($con,$_GET['search']);

    //Webpage Title
    $Title = $Search_Term . " - Site Search";

    displayHead($Title , "");
    displayNav(0);
    displayTopBar();
    
?>
            <section class="Search_Container">
                
                <?php 
                    
                $sql = "SELECT review.*, admin.adminID, admin.adminFirstName, admin.adminLastName, category.* FROM review INNER JOIN admin USING(adminID) INNER JOIN category USING(categoryID) WHERE reviewTitle LIKE '%$Search_Term%' OR reviewContent LIKE '%$Search_Term%' OR categoryName LIKE '%$Search_Term%'OR adminFirstName LIKE '%$Search_Term%' ORDER BY reviewDate DESC"; 

                $result = mysqli_query($con, $sql) or die(mysqli_error($con)); //run the query
                $numrow = mysqli_num_rows($result); //count the number of rows returned
                
                if(empty($_GET['search'])){ //NOTHING ENTERED
                    echo "<p>You did not enter a search terms</p>";
                
                }else if($numrow == 0){ // NO RESULTS
                    echo "<p>Sorry, no results match your search for <span>" . $Search_Term . "</span></p>";
                }else{ // DISPLAY RESULT
                    echo "<p>Your search for <span>" . $Search_Term . "</span> has retrieved ". $numrow;
                    if($numrow == 1){
                        echo " Result";
                    }else{
                        echo " Results";
                    }
                    echo "</p>"; 
                    
                    while ($row = mysqli_fetch_array($result)){ //loop through results for each match
                        
                        echo '<div class="Search_Item"><a href=\'post.php?id=' .$row['reviewID'] . '\'>';
                        
                        //Title
                        echo '<div class="Search_Item_Title">'. $row['reviewTitle'] .'</div>';
                        //Author and Date
                        echo '<div class="Search_Item_Details">';
                        echo 'Posted '. date("M jS Y",strtotime($row['reviewDate'])) . '&nbsp&nbsp';
                        echo 'By '. $row['adminFirstName'] .' '. $row['adminLastName'];
                        echo '</div>';
                        
                        echo '<div class="Search_Item_Blurb">'. (substr(($row['reviewContent']),0,100)) .'...</div>';
                        echo '</a></div>';
                        
                        /*
                        echo preg_replace("/($term)/i","<span class='keyword'>$0</span>", "<h2 class='spaceTop spaceBottom'><a href='blogpost.php?reviewID=" .$row['reviewID'] . "'>". $row['title'] . "</a></h2>"); //display the post title
                        echo "<p class='details'><em>posted on " . date("F jS Y, g:ia",strtotime($row['date'])) . " by " .              
                        preg_replace("/($term)/i","<span class='keyword'>$0</span>", $row['firstName']) . " in " .
                        preg_replace("/($term)/i","<span class='keyword'>$0</span>", $row['category']) ."</em></p>"; //display the date, author and category
                        echo preg_replace("/($term)/i","<span class='keyword'>$0</span>","<p>" . (substr(($row['content']),0,100)) . "..." . "</p><br />"); */ //limit displayed characters to 100
                    }
                }
 ?>
                        

            </section>

        </div><!-- Close Site Container -->
    </body>
</html>