<?php

/*
*
* FUNCTION TO DISPLAY TOP-DOWNS FOR NAV
*
*/
function displayNav($NavTab){

    $navLength = 5; //Max Nav Length
    $nav = array();

    //For loop used to set the class active for the current page
    for($i=1; $i<=$navLength; $i++){   

        //Set Default
        $nav[$i] ="";

        //Tab Selector
        if($NavTab == $i)$nav[$i] = "active";
    }
        
    //General Left Side Code
    echo '<!-- NavBar START -->
            <nav class="Nav_Container">

                <!-- NavBar Left -->
                <div class="Nav_Left_Container col-xs-4 col-sm-7 col-md-7">
                    <ul class="Nav_Left_Menu center-vert">
                        
                        <a href="index.php">
                            <li class="'.$nav[1].'">Home</li>
                        </a>
                            
                        <a href="reviews.php">
                            <li class="'.$nav[2].'">Reviews</li>
                        </a>
                            
                        <a href="community.php">
                            <li class="'.$nav[3].'">Community</li>
                        </a>
                            
                        <a>
                            <li class="'.$nav[4].'">About</li>
                        </a>
                    </ul>
                </div>

                <!-- NavBar Right -->
                    <div class="Nav_Right_Container col-xs-8 col-sm-5 col-md-5">';
        
    //IF LOGGED IN STATE
    if(isset($_SESSION['login'])){
        echo '  <div class="Nav_Right_Menu_Container">
                    <div class="clear"></div>
                        <ul class="Nav_Right_Menu center-vert">
                            <a href="profile.php"><li>Profile</li><a>
                            <a href="profile.php"><li>Settings</li></a>
                            <a href="logout.php"><li>Logout</li></a>
                        </ul>
                    </div>

                    <div class="Nav_Right_User_Container">

                        <div class="Nav_Right_User center-vert">
                            <div class="Nav_Right_User_Picture circle"'. getProfilePic($_SESSION['login']) .'></div>
                            <div class="Nav_Right_User_Name">'. $_SESSION['firstname'] .' '. $_SESSION['lastname'] .'</div> 
                        </div>
                    </div>';   
        
    //IF NOT LOGGED IN STATE   
    }else{
        echo'   <div class="Nav_Right_LogSign_Container center-vert">
                   <div class="Login_Trigger">Login</div> or 
                   <div class="Signup_Trigger">Sign Up</div>
                </div>';
    }
        
    //GENERAL CLOSING TAGS
    echo '      </div>
            </nav>
          <!-- NavBar END -->';
    
    //ADDS SEARCHBAR CODE
    echo '<!-- SearchBar START -->
            <section class="SearchBar_Container">
                <div class="center-vert">
                    <form class="SearchBar_Form" action="search.php" method="get" id="search">
                        <input type="text" name="search" maxlength="120" placeholder="Spotlight Search" autocomplete="off" onfocus="this.placeholder = \'\'" onblur="this.placeholder = \'Spotlight Search\'"/>
                    </form> 
                </div>
            </section>
          <!-- SearchBar END -->';
    
    //NOT LOGGED IN - INCLUDES SLIDE IN LOG IN / SIGN UP
    if(!isset($_SESSION['login'])){
        include '../includes/logsign-window.php';
    }
}  

/*
*
* FUNCTION TO DISPLAY TOPBAR AND SITE CONTAINER
*
*/
function displayTopBar(){
    
    //GENERAL OPENING TAGS
    echo '  <div class="Site_Container">
                <header class="Top_Bar">
                    <a class="TopScroll">';
    
    //NAV ICON                  
    echo '  <div class="Top_Bar_Nav">
                <div class="Top_Bar_Nav_navIcon center-vert"><i class="fa fa-sort-amount-asc"></i></div>
                <div class="Top_Bar_Nav_closeIcon center-vert hidden"><i class="fa fa-angle-up"></i></div>
            </div>';
    
    //SEARCH ICON                  
    echo '  <div class="Top_Bar_Search">
                <div class="Top_Bar_Search_searchIcon center-vert"><i class="fa fa-search"></i></div>
                <div class="Top_Bar_Search_closeIcon center-vert hidden"><i class="fa fa-angle-up"></i></div>
            </div>';
    
    //GENERAL CLOSING TAGS
    echo '      </a>
            </header>';
}

/*
*
* FUNCTION TO DISPLAY TOP-DOWNS FOR NAV
*
*/
function displayLogSignNav($NavTab){

    $navLength = 5; //Max Nav Length
    $nav = array(0);

    //For loop used to set the class active for the current page
    for($i=1; $i<=$navLength; $i++){   

        //Set Default
        $nav[$i] ="";

        //Tab Selector
        if($NavTab == $i)$nav[$i] = "active";
    }
        
    //General Left Side Code
    echo '<!-- NavBar START -->
            <nav class="Nav_Container">

                <!-- NavBar Left -->
                <div class="Nav_Left_Container col-xs-4 col-sm-7 col-md-7">
                    <ul class="Nav_Left_Menu center-vert">
                        
                        <a href="index.php">
                            <li class="'.$nav[1].'">Home</li>
                        </a>
                            
                        <a href="reviews.php">
                            <li class="'.$nav[2].'">Reviews</li>
                        </a>
                            
                        <a href="community.php">
                            <li class="'.$nav[3].'">Community</li>
                        </a>
                            
                        <a>
                            <li class="'.$nav[4].'">About</li>
                        </a>
                    </ul>
                </div>';
        
    //GENERAL CLOSING TAGS
    echo '      </div>
            </nav>
          <!-- NavBar END -->';
}  

/*
*
* FUNCTION TO DISPLAY TOPBAR AND SITE CONTAINER
*
*/
function displayLogSignTopBar(){
    
    //GENERAL OPENING TAGS
    echo '  <div class="Site_Container">
                <header class="Top_Bar"style="background-color:inherit;box-shadow:none;">
                    <a class="TopScroll">';
    
    //NAV ICON                  
    echo '  <div class="Top_Bar_Nav" style="background-color:#fc826c">
                <div class="Top_Bar_Nav_navIcon center-vert"><i class="fa fa-sort-amount-asc"></i></div>
                <div class="Top_Bar_Nav_closeIcon center-vert hidden"><i class="fa fa-angle-up"></i></div>
            </div>';
    
    //GENERAL CLOSING TAGS
    echo '      </a>
            </header>';
}

/*
*
* FUNCTION TO GET PROFILE PIC FROM ADMIN/MEMBER ID
*
*/
function getProfilePic($userID){
    global $con;
    
    $sql = "SELECT memberImage FROM member WHERE memberID='$userID' AND memberImage IS NOT NULL";  
    $result = mysqli_query($con, $sql) or die(mysqli_error($con));
    $row = mysqli_fetch_array($result);

    if(mysqli_num_rows($result) == 1){  
        return 'style="background-image: url(\'../images/users/'.$row['memberImage'].'\');"';        
    }
}
?>