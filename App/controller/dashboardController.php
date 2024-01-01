<?php
    if(!isset($_SESSION)) 
    { 
        session_start(); 
    }
    
    // Check if the user is logged in, if not then redirect him to login page
    if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
        header("location: index.php");
        exit;
    }

    include ( $_SERVER['DOCUMENT_ROOT'] . '/KP/App/view/dashboard.php'); 
?>