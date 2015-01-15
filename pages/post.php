<?php
ob_start();

//Webpage Includes List
include '../includes/head.php';
include '../includes/connect.php';

displayHead("Movie House", "");
displayNav(2);

//GET variables
$postID = mysqli_real_escape_string($con,$_GET['id']);//saves to variable, protect against injection

//Set Current Page
if(!empty($postID)){
    $_SESSION['current-page'] = '/pages/post.php?id=' . $postID;    
}

//Displays Movies Banner
$sql = "SELECT * FROM  review WHERE reviewID = '$postID'";
$result = mysqli_query($con, $sql) or die(mysqli_error($con)); //run the query
$row = mysqli_fetch_array($result);
$BannerURL = "../images/reviewBetter/" . $row['reviewImage'];
echo '<section class="Review_Banner" style="background-image: url('.$BannerURL.');"></section><!-- REVIEW BANNER -->';

displayTopBar();

$sql = "SELECT * FROM  review INNER JOIN admin ON review.adminID = admin.adminID LEFT JOIN category ON review.categoryID = category.categoryID WHERE reviewID = '$postID'";
$result = mysqli_query($con, $sql) or die(mysqli_error($con)); //run the query
$count = mysqli_num_rows($result);

//SQL QUERY TO RETRIEVE ALL COMMENTS FOR POST
$sql2 = "SELECT * FROM  comment INNER JOIN member ON comment.memberID = member.memberID WHERE reviewID = '$postID' ORDER BY commentDate ASC";
$result2 = mysqli_query($con, $sql2) or die(mysqli_error($con)); //run the query
$CommentCount = mysqli_num_rows($result2);

if($count ==1){
    while ($row = mysqli_fetch_array($result)){
        echo '  <article class="Review_Container">

                    <!-- REVIEW RATING -->
                    <!-- HIDDEN ON MOBILES -->
                    <div class="Review_Rating col-xs-0 col-sm-2 col-md-2 ">
                        <div class="Review_Rating_Text center-vert">
                            <div>';

        if($row['reviewRating'] >= 10){
            echo '<p>'. $row['reviewRating'] .'</p><!-- REVIEW RATING -->';    
        }else{
            echo '<p>0'. $row['reviewRating'] .'</p><!-- REVIEW RATING -->';
        }

        echo '                  <p>Rating</p>
                                <p class="Hero-Color">'. $row['categoryName'] .'</p><!-- REVIEW CATEGORY -->
                            </div>
                        </div>    
                    </div>
                    <!-- HIDDEN ON MOBILES -->

                    <div class="Review_Content_Container col-xs-12 col-sm-10 col-md-10">

                        <div class="Review_Content_Title">
                                <h1 class="center-vert">'. $row['reviewTitle'] .' Review</h1><!-- REVIEW TITLE -->
                        </div>

                        <div class="Review_Content ">
                            <h2>'. $row['reviewSubTitle'] .'</h2>
                            <h3>Posted By <span class="Hero-Color">'. $row['adminFirstName'] .' '. $row['adminLastName'] .'</span></h3>

                            <h3>On '. date("M jS Y",strtotime($row['reviewDate'])) .'</h3>
                            <h3>'. $CommentCount .' Comments</h3>

                            <p>'. $row['reviewContent'] .'</p>
                        </div>';
    }
}else{
    header('location:index.php');
}
?>
                    <!-- Comments Section-->
                    <section class="Review_Comment_Container">
                        <h1>Discuss</h1>
                        
                        <?php 
                            if($CommentCount == 0 && !empty($_SESSION['type'])){
                                echo '<div class="Review_Comment_Message2">No comments. Be the first to comment.</div>';  
                            }
                            while($row2 = mysqli_fetch_array($result2)){
                                echo '  <div class="Review_Comment">
                                            <div class="Review_Comment_User">
                                                <div class="Review_Comment_User_Picture circle" '. getProfilePic($row2['memberID']) .'></div>
                                            </div>
                            
                                            <div class="Review_Comment_Content">
                                
                                                <div class="Review_Comment_Content_Name">
                                                    '. $row2['memberFirstName'] .' '. $row2['memberLastName'] .'
                                                </div>
                                
                                                <div class="Review_Comment_Content_Post">
                                                    '. $row2['comment'] .'
                                                </div>
                                
                                            </div>';
                                if(isset($_SESSION['login'])){
                                    if($_SESSION['login'] == $row2['memberID']){
                                        echo '  <div class="Review_Comment_Tools">
                                                    Delete
                                                </div>';
                                    }
                                }
                                echo ' </div>';        
                            }


                        if(isset($_SESSION['login'])){
                           if($_SESSION['type'] == 'member'){
                                echo '
                                <form class="Review_Comment_Area" action="comment-process.php" method="post">

                                    <!-- Comment User Profile Picture -->
                                    <div class="Review_Comment_Area_Picture">
                                        <div class="circle" '. getProfilePic($_SESSION['login']) .'></div>
                                    </div>

                                    <!-- Hidden -->
                                    <input type="hidden" value="'. $postID .'" name="pid" />

                                    <!-- Comment Contents -->
                                    <textarea name="commentContent" placeholder="Type your comment here" wrap="off" onblur="this.placeholder=\'Type your comment here\'"></textarea>

                                    <!-- Submit Button -->
                                    <div class="Review_Comment_Area_Post">
                                        <span class="fa fa-pencil"></span>
                                    </div>

                                    <input type="submit" class="hidden" id="postComment" name="postComment" />
                                </form>';       
                            }else{
                               //Admin
                               echo '<div class="Review_Comment_Message">Admins are unable to post comments.</div>';
                            }
                        }else{
                            //Login or Sign Up
                            echo '<div class="Review_Comment_Message"><span class="Login_Trigger">Login</span> or <span class="Signup_Trigger">Sign Up</span> to make a comment.</div>';
                        }
                        ?>
                    </section>
                </div>    
                
                <div class="clear"></div>
            </article>
            
        </section>
        <?php
        if(isset($_SESSION['Notify'])){
            echo '<div class="Notify">'. $_SESSION['Notify'] .'</div>';
            unset($_SESSION['Notify']);
        }
        ?>
    </body>
</html>