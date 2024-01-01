<?php
require_once ($_SERVER['DOCUMENT_ROOT'] . '/KP/App/Resources/Configuration/config.php');
// require_once ($_SERVER['DOCUMENT_ROOT'] . '/App/Resources/Configuration/config.php');
// Initialize the session
if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 
 
// Check if the user is logged in, if not then redirect him to login page
// if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
//     header("location: login.php");
//     exit;
// } else {
//     header("location: dashboard.php");
//     exit;
// }

// Check if the user is logged in
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    // User is not logged in, redirect to login controller
    include 'App/controller/loginController.php';
} else {
    // User is logged in, redirect to dashboard controller or other pages
    if (isset($_GET['page'])) {
        $page = $_GET['page'];
        switch ($page) {
            case 'dashboard':
                include 'App/controller/dashboardController.php';
                break;
            case 'userTable':
                include 'App/controller/userController.php';
                break;
            case 'logout':
                include 'App/controller/logoutController.php';
                break;
            // Additional cases for other controllers
            default:
                include 'App/controller/dashboardController.php'; // Default to dashboard controller if the page is not recognized
                break;
        }
    } else {
        include ( $_SERVER['DOCUMENT_ROOT'] . '/KP/App/controller/dashboardController.php'); // Default to dashboard controller if no page is specified
    }
}


?>