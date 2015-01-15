<?php
//All Global Includes
include '../includes/nav.php';

session_start();

function displayHead($pageTitle, $bodyClass){
    global $con;
    $sql = "SELECT themeCSS, current.themeID FROM theme INNER JOIN current USING(themeID)"; 
    $result = mysqli_query($con, $sql) or die(mysqli_error($con));
    $row = mysqli_fetch_array($result);
    
    $HTML_Head = '<html>
                    <head>
                        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
                        <meta charset="UTF-8">

                        <!-- JQuery/Javascript -->
                        <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
                        <script type="text/javascript" src="../js/animate.js"></script>
                        <script type="text/javascript" src="../plugins/jquery.autosize.js"></script>

                        <!-- BootStrap -->
                        <link href="../plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
                        <script type="text/javascript" src="../plugins/bootstrap/js/bootstrap.min.js"></script>

                        <!-- CSS -->
                        <link href="../css/normalize.css" rel="stylesheet" type="text/css">
                        <link href="../css/animate.css" rel="stylesheet" type="text/css">
                        <link rel="stylesheet" href="../plugins/font-awesome/css/font-awesome.min.css"/>
                        <link href="../css/'.$row['themeCSS'].'" rel="stylesheet" type="text/css">
                        
                        <title>'. $pageTitle .'</title>
                    </head>

                    <body class="'. $bodyClass .'">
                        <!-- Top Page Anchor --> 
                        <a name="Top-Page"></a>';

    echo $HTML_Head;
}

?>