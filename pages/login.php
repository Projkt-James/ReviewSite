<?php
//Webpage Includes List
include '../includes/head.php';
include '../includes/connect.php';

//Webpage Title
$WebPageTitle = "Movie House";

if (isset($_SESSION['login'])) { 
    header('location:index.php'); 
}

function getField($session){
    if (isset($_SESSION[$session])){
            $field = $_SESSION[$session];
            unset($_SESSION[$session]); 
        return $field;
    }else{
        return "";
    }
}

displayHead($WebPageTitle, "LogSign_Body");
displayLogSignNav(0);
displayLogSignTopBar();
?>

<section class="Login_Container">

    <form class="LogSign_Form" name="login" action="login-process.php" method="post">
        <ul>
            <!-- LOGO -->
            <a href="index.php"><li></li></a>
            
            <!-- Username -->
            <li>
                <span class="Input_Icon fa fa-rocket"></span>
                <input id="username "type="text" value="<?php echo getField('username'); ?>" name="username" placeholder="Username" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Username'" autocomplete="off"  size="40"/>
                <?php 
                    if (isset($_SESSION['errorUser'])){
                        echo '<p class="InputError"> Error: ' . $_SESSION['errorUser'] . '</p>';
                        unset($_SESSION['errorUser']); 
                    }
                ?> 
            </li>
            <!-- Password -->
            <li>
                <span class="Input_Icon fa fa-lock"></span>
                <input id="password" type="password" name="password" placeholder="Password" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Password'" size="40"/>
                <?php 
                    if (isset($_SESSION['errorPass'])){
                        echo '<p class="InputError">Error: ' . $_SESSION['errorPass'] . "</p>";
                        unset($_SESSION['errorPass']); 
                    } 
                ?>
            </li>
            <!-- LOGIN IN Button -->
            <li>
                <input class="btn" id="submit" type="submit" name="submit" value="LOG IN" hidefocus="hidefocus">
            </li>
            
            <li >
                Forgot Your Password?&nbsp;&nbsp;&nbsp; <a href="signup.php">Sign Up Now&nbsp;<span class="fa fa-angle-down"></span></a>
            </li>
        </ul>
    </form>
    
</section>



</body>
</html>