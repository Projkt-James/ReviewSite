<?php

if(!isset($_SESSION['window-set'])){
    $_SESSION['window-set'] = "";
}

if(empty($_SESSION['window-set'])){
    echoSignUp();
    echoLogIn();
    
    echo '  <section class="Signup_Loading_Container">
                <div class="center-vert">
                    <h1>Signing Up.....</h1>
                    <i class="fa fa-spin fa-spinner"></i>
                </div>
            </section>';

}else{
    if($_SESSION['window-set'] == "Signup_Loading"){
            echo '  <section class="Signup_Loading_Container translate-x-0">
                <div class="center-vert">
                    <h1>Signing Up.....</h1>
                    <i class="fa fa-spin fa-spinner"></i>
                </div>
            </section>';
    }
}

function echoSignUp(){
    global $con;
    
    echo '  <section class="Signup_Container">
                <span class="Sign_Window_Close_Trigger">Go Back</span>
                <div>
                    <form class="LogSign_Form" name="signup">
                        <ul>
                            <!-- LOGO -->
                            <li></li>

                            <!-- First Name -->
                            <li>
                                <span class="Input_Icon fa fa-user"></span>
                                <input id="sign_firstname" type="text" name="sign_firstname" placeholder="First Name" onfocus="this.placeholder = \'\'" onblur="this.placeholder = \'First Name\'" autocomplete="off"/>
                                <!-- TODO ERROR REPORTING VIA AJAX/JSON -->
                            </li>

                            <!-- Last Name -->
                            <li>
                                <span class="Input_Icon fa fa-user"></span>
                                <input id="sign_lastname" type="text" name="sign_lastname" placeholder="Last Name" onfocus="this.placeholder = \'\'" onblur="this.placeholder = \'Last Name\'" autocomplete="off"/>
                                <!-- TODO ERROR REPORTING VIA AJAX/JSON -->
                            </li>

                            <!-- Gender -->
                            <li>
                                <span class="Input_Icon fa fa-heart"></span>
                                <span class="Input_Hide"></span>
                                <select id="sign_gender" name="sign_gender">
                                    <option value="1" disabled selected>Gender</option>
                                    <option value="M">Male</option>
                                    <option value="F">Female</option>
                                </select>
                            </li>

                            <!-- Country -->
                            <li>
                                <span class="Input_Icon fa fa-globe"></span>
                                <span class="Input_Hide"></span>
                                <select id="sign_country" name="sign_country">
                                    <div>
                                    <option value="default" disabled selected>Select A Country</option>';     

                                $sql = "SELECT * FROM country";
                                $result = mysqli_query($con, $sql) or die(mysqli_error($con)); //run the query 

                                while ($row = mysqli_fetch_array($result)){
                                    echo '<option value="'. $row['countryID'] .'">'. $row['country'] .'</option>';   
                                }

                            echo '  </div>
                                </select> 
                            </li>

                            <!-- Post Code -->
                            <li>
                                <span class="Input_Icon fa fa-map-marker"></span>
                                <input class="Numeric-Input" id="sign_postcode" type="text" value="" name="sign_postcode" placeholder="Post Code" onfocus="this.placeholder = \'\'" onblur="this.placeholder = \'Post Code\'" autocomplete="off" maxlength="4" />
                            </li>

                            <!-- Email -->
                            <li>
                                <span class="Input_Icon fa fa-paper-plane"></span>
                                <input id="sign_email" type="text" value="" name="sign_email" placeholder="Email" onfocus="this.placeholder = \'\'" onblur="this.placeholder = \'Email\'" autocomplete="off"/> 
                            </li>

                            <!-- Username -->
                            <li>
                                <span class="Input_Icon fa fa-rocket"></span>
                                <input id="sign_username "type="text" value="" name="sign_username" placeholder="Username" onfocus="this.placeholder = \'\'" onblur="this.placeholder = \'Username\'" autocomplete="off"/> 
                            </li>

                            <!-- Password -->
                            <li>
                                <span class="Input_Icon fa fa-lock"></span>
                                <input id="sign_password" type="password" name="sign_password" placeholder="Password" onfocus="this.placeholder = \'\'" onblur="this.placeholder = \'Password\'"/>
                            </li>

                            <!-- SIGN UP Button -->
                            <li>
                                <input class="btn Signup_Loading_Trigger" id="submit" type="button" value="SIGN UP" hidefocus="hidefocus">
                            </li>

                            <li>
                                <a><span class="Login_Trigger">Already Have An Account?</span>&nbsp;&nbsp;<span class="fa fa-angle-right"></span></a>
                            </li>
                        </ul>
                    </form>
                </div>
            </section>';
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

function echoLogIn(){
    global $con;
    
    
    echo '  <section class="Login_Container">
                <span class="Log_Window_Close_Trigger">Go Back</span>
                <div>
                    <form class="LogSign_Form" name="login" action="login-process.php" method="post">
                        <ul>
                            <!-- LOGO -->
                            <a href="index.php"><li></li></a>

                            <!-- Username -->
                            <li>
                                <span class="Input_Icon fa fa-rocket"></span>
                                <input id="username "type="text" value="'. getField('username') .'" name="username" placeholder="Username" onfocus="this.placeholder = \'\'" onblur="this.placeholder = \'Username\'" autocomplete="off"  size="40"/>
                                <!-- TODO ERROR REPORTING VIA AJAX/JSON -->
                            </li>

                            <!-- Password -->
                            <li>
                                <span class="Input_Icon fa fa-lock"></span>
                                <input id="password" type="password" name="password" placeholder="Password" onfocus="this.placeholder = \'\'" onblur="this.placeholder = \'Password\'" size="40"/>
                                <!-- TODO ERROR REPORTING VIA AJAX/JSON -->
                            </li>

                            <!-- LOGIN IN Button -->
                            <li>
                                <input class="btn" id="submit" type="submit" name="submit" value="LOG IN" hidefocus="hidefocus">
                            </li>

                            <li >
                                <a><span class="Signup_Trigger2"><span class="fa fa-angle-left"></span>&nbsp;Sign Up Now</span></a> &nbsp;&nbsp;&nbsp; Forgot Your Password?
                            </li>
                        </ul>
                    </form>
                </div>
            </section>';
}

?>