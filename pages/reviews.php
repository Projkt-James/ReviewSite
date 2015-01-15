<?php
    //Webpage Includes List
    include '../includes/head.php';
    include '../includes/connect.php';

    //Webpage Title
    $Title = "Discover Movie House";

    displayHead($Title , "");
    displayNav(2);
    displayTopBar();
    
?>

            <!-- HOME PAGE TITLE -->
            <div class="Home_Title">
                <section class="col-xs-12 col-sm-12 col-md-6">
                    
                    <?php
                    //CODE TO DYNAMICALLY CHANGE TITLE
                    if(!empty($_GET['cid'])){
                        
                        $categoryID = mysqli_real_escape_string($con,$_GET['cid']);//save to variable
                        $categorysql = "SELECT * FROM category WHERE categoryID='$categoryID'"; //SQL query 
                        $categoryresult = mysqli_query($con, $categorysql) or die(mysqli_error($con));
                        $row = mysqli_fetch_array($categoryresult);
                        
                        $categoryName = $row['categoryName'];
                        
                        if(!empty($categoryName)){
                            echo '<h1>' . $categoryName . '<br />';
                        }else{
                            echo '<h1>our<br />';   
                        }
                    }else{
                        echo '<h1>our<br />';
                    }
                    ?>
                    
                    reviews<br /></h1>
                </section>
                
                <section class="col-xs-12 col-sm-12 col-md-6"></section>
            </div>

<?php

//Standard Query To Display All Reviews
$sql = "SELECT * FROM  review INNER JOIN admin ON review.adminID = admin.adminID ORDER BY  review.reviewDate DESC";

//Category Selector when cid is valid in GET
if(!empty($_GET['cid'])){
    $categoryID = mysqli_real_escape_string($con,$_GET['cid']);//save to variable
                        
    $countsql = "SELECT * FROM category WHERE categoryID='$categoryID'"; //SQL query 
    $result = mysqli_query($con, $countsql) or die(mysqli_error($con)); //run the query 
    $count = mysqli_num_rows($result); //Number of rows
                        
    //If cid is a valid category run this query, else fall back to standard query
    if($count == 1){
        
        //Query to display categories that match the cid and count number of comments
        $sql = "SELECT * FROM  review INNER JOIN admin ON review.adminID = admin.adminID WHERE review.categoryID = '$categoryID' ORDER BY  review.reviewDate DESC";
    }
}

//Archive Selector when mon is valid in GET
if(!empty($_GET['mon'])){
    $monthID = mysqli_real_escape_string($con,$_GET['mon']);//save to variable, protect against injection
                        
    $countsql = "SELECT * FROM review WHERE month(review.reviewDate) ='$monthID'"; //SQL query 
    $result = mysqli_query($con, $countsql) or die(mysqli_error($con)); //run the query 
    $count = mysqli_num_rows($result); //Number of rows
                        
    //If mon is a valid category run this query, else fall back to standard query
    if($count > 0){
       
        //Query to display posts that match the month and count number of comments
        $sql = "SELECT * FROM  review INNER JOIN admin ON review.adminID = admin.adminID WHERE month(review.reviewDate) ='$monthID' ORDER BY  review.reviewDate DESC";    
    }
}

$result = mysqli_query($con, $sql) or die(mysqli_error($con)); //run the query
    
while ($row = mysqli_fetch_array($result)){
    $ImageURL = "../images/reviewBetter/" . $row['reviewImage'];
    $ReviewURL ="post.php?id=" . $row['reviewID'];
    
    echo '  <!-- REVIEW START -->
            <article class="Home_Review_Container col-xs-12 col-sm-12 col-md-12" id="'. $row['reviewID'] .'">
                <div>

                    <!-- Review Image -->
                    <a href="'. $ReviewURL .'">
                        <div class="Home_Review_Image col-xs-12 col-sm-12 col-md-6" style="background-image:url('. $ImageURL .');">
                            <div class="Home_Review_Image_Overlay hidden"><h1 class="center-vert">Read More</h1></div>
                        </div>
                    </a>

                    <!-- Review Info START -->
                    <div class="Home_Review_Info col-xs-12 col-sm-12 col-md-6">

                        <div class="Home_Review_Info_Title col-xs-12 col-sm-5 col-md-5">
                            <div class="center-vert">
                                <h2><a href="'. $ReviewURL .'">'. $row['reviewTitle'] .'</a></h2><!-- REVIEW TITLE -->
                            </div>
                        </div>

                        <div class="Home_Review_Info_Blurb col-xs-12 col-sm-4 col-md-4">
                            <p class="center-vert">'. (substr(($row['reviewContent']),0,300)) .'...</p><!-- REVIEW TEXT -->
                        </div>

                        <div class="Home_Review_Info_Rating col-xs-12 col-sm-3 col-md-3">
                            <div class="Home_Review_Info_Rating_Text center-vert">
                                <div>';

        if($row['reviewRating'] >= 10){
            echo '<p>'. $row['reviewRating'] .'</p><!-- REVIEW RATING -->';    
        }else{
            echo '<p>0'. $row['reviewRating'] .'</p><!-- REVIEW RATING -->';
        }

        echo '                      <p>Rating</p>
                                    <p class="Hero-Color">Review By<br />'. $row['adminFirstName'] .' '. $row['adminLastName'] .'</p><!-- REVIEW AUTHOR -->
                                </div>
                            </div>
                        </div>

                    </div>
                    <!-- Review Info END -->
                    
                </div> 
            </article>
            <!-- REVIEW END -->';
}

?>

        </div><!-- Close Site Container -->
    </body>
</html>