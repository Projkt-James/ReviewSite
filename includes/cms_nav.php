<?php

function displayNav($NavTab, $PageTitle){

    $navLength = 6; //Max Nav Length
    $nav = array();

    //For loop used to set the class active for the current page
    for($i=1; $i<=$navLength; $i++){   

        //Set Default
        $nav[$i] ="";

        //Tab Selector
        if($NavTab == $i)$nav[$i] = "active";
    }
    
    echo '  <nav class="Nav-Container">
                <a class="blocks" href="../pages/logout.php">Log Out</a>
                <a class="blocks" href="../pages/index.php">Visit Site</a>
                
                <ul>
                    <a href="index.php"><li class="'.$nav[1].'">Dashboard</li></a>
                    <a href="reviews.php"><li class="'.$nav[2].'">Reviews</li></a>
                    <a href="categories.php"><li class="'.$nav[3].'">Categories</li></a>
                    <a href="administrators.php"><li class="'.$nav[4].'">Administrators</li></a>
                    <a href="account.php"><li class="'.$nav[5].'">My Account</li></a>
                    <a href="theme.php"><li class="'.$nav[6].'">Themes</li></a>
                </ul>
            </nav>
            
            <section class="Content-Container">
    
                <section class="Top-Bar"><h1>'.$PageTitle.'</h1></section>
            
            ';
}

function footer(){
    echo "<footer>James Hanford &copy; 2014</footer>";   
}