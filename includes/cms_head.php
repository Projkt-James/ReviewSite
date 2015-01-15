<?php
//All Global Includes
//include '../includes/nav.php';

session_start();

function displayHead($pageTitle, $bodyClass){
    include '../includes/verify_login_admin.php';
    
    $HTML_Head = '<html>
                    <head>
                        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
                        <meta charset="UTF-8">

                        <!-- JQuery/Javascript -->
                        <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
                        <script type="text/javascript" src="../plugins/jquery.autosize.js"></script>

                        <!-- BootStrap -->
                        <link href="../plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
                        <script type="text/javascript" src="../plugins/bootstrap/js/bootstrap.min.js"></script>

                        <!-- CSS -->
                        <link href="../css/normalize.css" rel="stylesheet" type="text/css">
                        <link href="../css/animate.css" rel="stylesheet" type="text/css">
                        <link rel="stylesheet" href="../plugins/font-awesome/css/font-awesome.min.css"/>
                        <link href="../css/cms_styling.css" rel="stylesheet" type="text/css">
                        
                         <!-- enable HTML5 in IE 8 and below -->
                        <!--[if IE]>
                        <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
                        <![endif]-->
                        
                        <title>'. $pageTitle .'</title>
                    </head>

                    <body class="'. $bodyClass .'">
                        <!-- Top Page Anchor --> 
                        <a name="Top-Page"></a>';

    echo $HTML_Head;
}

?>