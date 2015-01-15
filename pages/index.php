<?php
    //Webpage Includes List
    include '../includes/head.php';
    include '../includes/connect.php';

    //Webpage Title
    $Title = "Movie House";

    displayHead($Title , "");
    displayNav(1);
    displayTopBar();
    
?>

            <!-- HOME PAGE TITLE -->
            <div class="Home_Title">
                <section class="col-xs-12 col-sm-12 col-md-6">
                    <h1>the<br />
                    latest<br /></h1>
                </section>
                
                <section class="col-xs-0 col-sm-0 col-md-6"> 
                </section>
            </div>

<?php

$sql = "SELECT * FROM  review INNER JOIN admin ON review.adminID = admin.adminID ORDER BY  review.reviewDate DESC LIMIT 0 , 3";
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