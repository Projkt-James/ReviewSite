/*
*
*   NAME: jQuery Animation
*   CREATED: 01/09/2014
*   VERSION: 2.0.0
*
*/

/***************************
ON DOC READY ~ START
***************************/
$(document).ready(function () {
    
    /********************
    Nav Animation 
    *********************/
    $('.Top_Bar_Nav').click( function () { //NavBox On Click Trigger
        
        $('.Nav_Container').addClass("Top_Transition");
        $('.Review_Container').addClass("Banner_Transition");
        
        //IF NAV IS VISIBLE
        if($('.Nav_Container').hasClass("translate-y-0")){  
            displayReviewBanner();
            
            toggleNavBar(); //CLOSE NAV
        
        //ELSE IF NAV AND SEARCH IS NOT VISIBLE
        }else if(!$('.SearchBar_Container').hasClass("translate-y-0")){
            hideReviewBanner();   
            
            toggleNavBar(); //OPEN NAV
        }
        
        //IF SEARCH IS VISIBLE 
        if($('.SearchBar_Container').hasClass("translate-y-0")){
            
            $('.SearchBar_Container').removeClass("translate-y-0");
            $('.Site_Container').removeClass("search-push-from-top");
            toggleSearchIcon();
            
            setTimeout(toggleNavBar, 300); //OPEN NAV
            
            hideReviewBanner();
        }
    });
    
    /********************
    Search Animation 
    *********************/
    $('.Top_Bar_Search').click( function () { //SearchBox On Click Trigger
        
        $('.SearchBar_Container').addClass("Top_Transition");
        $('.Review_Container').addClass("Banner_Transition");
        
        //IF SEARCH IS VISIBLE
        if($('.SearchBar_Container').hasClass("translate-y-0")){  
            displayReviewBanner();
            
            toggleSearchBar();
            
        //ELSE IF NAV AND SEARCH IS NOT VISIBLE
        }else if(!$('.Nav_Container').hasClass("translate-y-0")){
            hideReviewBanner();   
            
            toggleSearchBar();
        }
        
        //IF NAV IS VISIBLE 
        if($('.Nav_Container').hasClass("translate-y-0")){
            
            $('.Nav_Container').removeClass("translate-y-0");
            $('.Site_Container').removeClass("nav-push-from-top");
            toggleNavIcon();
            
            setTimeout(toggleSearchBar, 300);
            
            hideReviewBanner();
        }
    });
    
    /**************************
    Sign Up ~ Animate In 
    ***************************/
    
    /*
    * Sign Up - Slides in from right
    * - Log In - Slides in from right
    * - Close - Closes all elements
    * - Sign Up - Opens loading screen passes data through ajax/Json
    *
    * Login In - Slides in from right
    *
    *
    */
    
    //OPEN SIGN UP
    $('.Signup_Trigger').click(function(){
        scrollToAnchor('Top-Page');
        $('.Signup_Container').removeClass('hidden');
        $('.Signup_Container').addClass('transition-ease-07s');
        $('.Signup_Container').addClass('translate-x-0');
        setTimeout(hideSiteContainer, 700);
        setTimeout(setSignAbsolute, 700);
    });
    
    //OPEN SIGN UP LOADING
    $('.Signup_Loading_Trigger').click(function(){
        setSignUpWarning();
        scrollToAnchor('Top-Page');
        $('.Signup_Loading_Container').addClass('transition-ease-1s');
        $('.Signup_Loading_Container').addClass('translate-x-0');
        setTimeout(hideSignupContainer, 1000);
        setTimeout(hideSiteContainer, 1000);
        
        //TODO BEGIN AJAX PASSOVER
    });
    
    //CLOSE SIGN UP LOADING ON CLICK
    $('.Signup_Loading_Container').click(function(){
        unsetSignUpWarning();
        $('.Signup_Container').removeClass('hidden');
        $('.Signup_Loading_Container').removeClass('translate-x-0');
    });
    
    //CLOSE SIGN UP
    $('.Sign_Window_Close_Trigger').click(function(){
        $('.Site_Container').removeClass('hidden');
        $('.Signup_Container').removeClass('translate-x-0');
        
        $('.Signup_Container').removeClass('absolute');
        $('.Site_Container').removeClass('hidden');
    });
    
    
    /**************************
    Log In ~ Animate In 
    ***************************/
    //OPEN LOG IN
    $('.Login_Trigger').click(function(){
        
        $('.Login_Container').addClass('transition-ease-07s');
        $('.Login_Container').addClass('translate-x-0');
        setTimeout(hideSiteContainer, 1000);
        
        if(!$('.Signup_Container').hasClass('hidden')){
            setTimeout(resetSignUp, 1000);
        }
    });
    
    //CLOSE LOG IN
    $('.Log_Window_Close_Trigger').click(function(){
        $('.Site_Container').removeClass('hidden');
        $('.Login_Container').removeClass('translate-x-0');
        $('.Signup_Container').removeClass('translate-x-0');
        
        $('.Signup_Container').removeClass('absolute');
    });
    
    if(!$('.Signup_Container').hasClass('translate-x-0') && !$('.Login_Container').hasClass('translate-x-0')){
        $('.Site_Container').removeClass('hidden');        
    }
    
    
    
    /**************************
    Other
    ***************************/
    //AUTO SIZES ALL TEXTAREA'S
    $('textarea').autosize(); 
    
    $('.Review_Comment_Area textarea').focusin(function(){
        $(this).css("margin-bottom", "5px");
    });
    
    //CHANGES 
    $('.LogSign_Form select').focusin(function(){
        $(this).css("color","#9ca9be");    
    });
    
    //ACTIVATES READ MORE ON TITLE HOVER
    $('.Home_Review_Info_Title h2').mouseenter(function(){  
        
        //Remove Hidden Class on Overlay
        if($('.Home_Review_Image_Overlay').hasClass("hidden")){
            $('.Home_Review_Image_Overlay').removeClass("hidden");               
        }

        $(this).parentsUntil('.Home_Review_Container').find('.Home_Review_Image_Overlay').addClass('Home_Review_Image_Overlay_Hover');
        $(this).parentsUntil('.Home_Review_Container').find('.Home_Review_Image').addClass('Home_Review_Image_Hover');
    });
    
    //DEACTIVATE READ MORE ON TITLE HOVER LEAVE
    $('.Home_Review_Info_Title h2').mouseleave(function(){
        $(this).parentsUntil('.Home_Review_Container').find('.Home_Review_Image_Overlay').removeClass('Home_Review_Image_Overlay_Hover');
        $(this).parentsUntil('.Home_Review_Container').find('.Home_Review_Image').removeClass('Home_Review_Image_Hover');
    });
    
    //COMMENT BOX BUTTON TRIGGER
    $(".Review_Comment_Area_Post span").click(function(){ 
        $("#postComment").trigger( "click" );
    });
    //DEACTIVATE ACCOUNT TRIGGER
    $(".Profile_Update_Deactivate span").click(function(){ 
        var deleteCheck = confirm("Deactivations Are Permanent! Continue?");
        if(deleteCheck == true){
            $("#deleteProfile").trigger( "click" );
        }
    });
    
    //STOPS NON NUMERIC ENTRIES FOR "Numeric-Input" CLASS
    $(".Numeric-Input").keydown(function (e) {
        onlyNumeric(e);        
    });

    //TOPSCROLL SMOOTH SCROLL ON CLICK
    $(".TopScroll").click(function() {
        scrollToAnchor('Top-Page');
    }); 
    
}); 
/***************************
ON DOC READY ~ END
***************************/
//////////THIS IS///////////
/***************************
ON WINDOW SCROLL ~ START
***************************/
$(window).scroll(function () {
    var windowPosY = $(window).scrollTop();
    
    if(!$('.Nav_Container').hasClass("translate-y-0") && !$('.SearchBar_Container').hasClass("translate-y-0")) {
        if(windowPosY >= 5) {
            displayFullTitle();
        }
        if(windowPosY <= 10){
            hideFullTitle();
        }
    }
    
});
/***************************
ON WINDOW SCROLL ~ END
***************************/
///////AN EASTER EGG////////
/***************************
CUSTOM FUNCTIONS
***************************/

/*
*
* FUNCTION USED TO SMOOTH SCROLL TO ANCHORS
* ~ Requires anchor ID as variable
*/
function scrollToAnchor(anchorID) {
    var Tag = $("a[name='"+ anchorID +"']");
    $('html,body').animate({scrollTop: Tag.offset().top},'slow');
}

/*
*
* FUNCTION TO TOGGLE SEARCHBAR VISIBILITY 
* 
*/
function toggleSearchBar() {
    $('.Site_Container').toggleClass("search-push-from-top");
    $('.SearchBar_Container').toggleClass("translate-y-0");
    
    toggleSearchIcon();
}

function toggleSearchIcon() {
    if($('.SearchBar_Container').hasClass("translate-y-0")) { 
        $('.Top_Bar_Search_searchIcon').addClass("hidden");
        $('.Top_Bar_Search_closeIcon').removeClass("hidden");      
    }else{
        $('.Top_Bar_Search_closeIcon').addClass("hidden");   
        $('.Top_Bar_Search_searchIcon').removeClass("hidden");      
    }   
}

/*
*
* FUNCTION TO TOGGLE NAVBAR VISIBILITY 
* 
*/
function toggleNavBar() {
    $('.Site_Container').toggleClass("nav-push-from-top");
    $('.Nav_Container').toggleClass("translate-y-0");
    
    toggleNavIcon();
}

function toggleNavIcon() {
    if($('.Nav_Container').hasClass("translate-y-0")) { 
        $('.Top_Bar_Nav_navIcon').addClass("hidden");
        $('.Top_Bar_Nav_closeIcon').removeClass("hidden");      
    }else{
        $('.Top_Bar_Nav_closeIcon').addClass("hidden");   
        $('.Top_Bar_Nav_navIcon').removeClass("hidden");      
    }   
}

/*
*
* FUNCTION TO HIDE REVIEW BANNER
* ~ Hides review banner.
*/
function hideReviewBanner() {
    $('.Review_Container').addClass("margin-top-none");
    setTimeout(delayBannerHide, 700);
    displayFullTitle();
}

function delayBannerHide() {
    $('.Review_Banner').addClass("hidden");
}

/*
*
* FUNCTION TO DISPLAYS REVIEW BANNER 
* ~ Shows review banner.
*/
function displayReviewBanner() {
    $('.Review_Banner').removeClass("hidden");
    $('.Review_Container').removeClass("margin-top-none");  
    hideFullTitle();
}

/*
*
* FUNCTION TO DISPLAY ENTIRE REVIEW TITLE
*
*/
function displayFullTitle() {
    //Remove Center Verticle Alignment
    $('.Review_Content_Title h1').removeClass("center-vert");

    //Handles Displaying Full Title
    $('.Review_Content_Title').removeClass("Set-Title-Height");
    $('.Review_Content_Title').addClass("Auto-Title-Height");
    $('.Review_Content_Title h1').addClass("Full-Title");
}

/*
*
* FUNCTION TO HIDE OVERFLOW REVIEW TITLE
*
*/
function hideFullTitle() {  
    //Adds Verticle Alignment
    $('.Review_Content_Title h1').addClass("center-vert");
    
    //Handles Hiding The Cut Off Title
    $('.Review_Content_Title').removeClass("Auto-Title-Height");
    $('.Review_Content_Title').addClass("Set-Title-Height");
    $('.Review_Content_Title h1').removeClass("Full-Title");
}

/*
*
* FUNCTION TO ONLY ALLOW NUMERIC INPUTS
*
*/
function onlyNumeric(e) {  
    // Allow: backspace, delete, tab, escape, enter and .
    if ($.inArray(e.keyCode, [46, 8, 9, 27, 13]) !== -1 ||
        // Allow: Ctrl+A
        (e.keyCode == 65 && e.ctrlKey === true) || 
        // Allow: home, end, left, right
        (e.keyCode >= 35 && e.keyCode <= 39)) {
        // let it happen, don't do anything
        return;
    }
    
    // Ensure that it is a number and stop the keypress
    if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
        e.preventDefault();
    }   
}

function hideSiteContainer(){
    $('.Site_Container').addClass('hidden');
    scrollToAnchor('Top-Page');
}

function setSignAbsolute(){
    
    if($('.Signup_Container').hasClass('translate-x-0')){
        $('.Signup_Container').addClass('absolute');
    }
    
}

function setSignUpWarning(){
    window.onbeforeunload = function() {
        return "Please Wait, We are signing you up!";
    } 
}

function unsetSignUpWarning(){
    window.onbeforeunload = function() {
        return;
    }    
}

function hideSignupContainer(){
    $('.Signup_Container').addClass('hidden');
}

function resetSignUp(){
    $('.Signup_Container').removeClass('translate-x-0'); 
    $('.Signup_Container').addClass('hidden'); 
}


