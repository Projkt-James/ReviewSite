<?php
if(!isset($_SESSION['type'])){
    header('location:../index.php'); 
}else{
    if($_SESSION['type'] == 'admin'){
        
    }else{
       header('location:../index.php'); 
    }
}
?>