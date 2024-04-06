<?php
    require_once ($_SERVER['DOCUMENT_ROOT'] . '/KP/App/model/userModel.php');
    // require_once ($_SERVER['DOCUMENT_ROOT'] . '/App/model/userModel.php');
    require_once ($_SERVER['DOCUMENT_ROOT'] . '/KP/App/Resources/Configuration/config.php');
    // require_once ($_SERVER['DOCUMENT_ROOT'] . '/App/Resources/Configuration/config.php');
    require_once( $_SERVER['DOCUMENT_ROOT'] . '/KP/App/helper/userValidator.php');
    // require($_SERVER['DOCUMENT_ROOT'] . '/App/helper/userValidator.php');

    if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 

    if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
        header("location: index.php");
        exit;
    }

    $user = new UserModel();
    $userDatas = $user->getUserTableData();

    include ( $_SERVER['DOCUMENT_ROOT'] . '/KP/App/view/user.php');
?>