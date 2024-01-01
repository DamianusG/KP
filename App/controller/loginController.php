<?php 

session_start();

// Include config file
// require_once ($_SERVER['DOCUMENT_ROOT'] . '/KP/App/database/dbconnect.php');
// require_once ($baseURLdev . '/App/database/dbconnect.php');
// require_once ($_SERVER['DOCUMENT_ROOT'] . '/KP/App/model/userModel.php');
require_once ($_SERVER['DOCUMENT_ROOT'] . '/App/model/userModel.php');
// require_once ($_SERVER['DOCUMENT_ROOT'] . '/KP/App/Resources/Configuration/config.php');
require_once ($_SERVER['DOCUMENT_ROOT'] . '/App/Resources/Configuration/config.php');
// require_once( $_SERVER['DOCUMENT_ROOT'] . '/KP/App/helper/userValidator.php');
require($_SERVER['DOCUMENT_ROOT'] . '/App/helper/userValidator.php');

// Define variables and initialize with empty values
$userName = $userPassword = "";
// $username_err = $password_err = $login_err = "";

 
// Processing form data when form is submitted
if(isset($_POST['submitLogin'])){
    
    // $userName = isset($_POST['userName']) ? $_POST['userName'] : '';
    // echo $userName;
    // $userPassword = isset($_POST['userPassword']) ? $_POST['userPassword'] : '';
    // echo $userPassword;

    // exit;

    $validation = new UserLoginValidator($_POST);
    $errors = $validation->validateUserLoginForm();

    // echo 'test validation error exist';
    // exit;

    if (!empty($errors)) {
        // Validation failed; redirect back to the form with errors
        // You might consider using a session to persist error messages
        $_SESSION['userName'] = $_POST['userName'];
        $_SESSION['errors'] = $errors;
        foreach ($errors as $error => $val) {
            echo $val;
         }
        // echo $_SESSION['errors'];
        // $loginViewPath = $baseURLdev . 'login.php';
        $loginViewPath = $baseURLprod . 'login.php';
        echo $loginViewPath;
        header('Location: ' . $loginViewPath);
        exit;
    }

    /** @var UserModel $user */
    $user = new UserModel();
    $errors = $user->authenticateUser($_POST['userName'], $_POST['userPassword']);
    $userData = $user->getUserDataSet();
    // echo $user->errors;
    if(!empty($errors)){
        $_SESSION['errors'] = $errors;
        // $loginViewPath = $baseURLdev . 'index.php';
        $loginViewPath = $baseURLprod . 'index.php';
        echo $loginViewPath;
        header('Location: ' . $loginViewPath);
        exit;
    } else {
        $_SESSION["loggedin"] = true;
        $_SESSION["id"] = $userData['id'];
        $_SESSION["username"] = $userData['username'];  
        // echo $_SESSION["id"];
        // echo $_SESSION["username"];
        // $loginViewPath = $baseURLdev . 'index.php';
        $loginViewPath = $baseURLprod . 'index.php';
        echo $loginViewPath;
        header('Location: ' . $loginViewPath);
        exit;
    }

    // echo $errors['userName'] ?? '';
    // echo $errors['userPassword'] ?? '';

}
?>