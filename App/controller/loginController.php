<?php 

session_start();
// Include config file
require_once ($_SERVER['DOCUMENT_ROOT'] . "/KP/App/database/dbconnect.php");
// require_once ($baseURLdev . "/App/database/dbconnect.php");
// require_once ($_SERVER['DOCUMENT_ROOT'] . "/KP/App/Resources/Configuration/config.php");
require_once ($_SERVER['DOCUMENT_ROOT'] . "/KP/App/Resources/Configuration/config.php");
// require_once ($baseURLdev . "/App/Resources/Configuration/config.php");
require( $_SERVER['DOCUMENT_ROOT'] . "/KP/App/helper/userValidator.php");
// require( $baseURLdev . "/App/helper/userValidator.php");

// Define variables and initialize with empty values
$userName = $userPassword = "";
// $username_err = $password_err = $login_err = "";
 
// Processing form data when form is submitted
if(isset($_POST['submitLogin'])){
    
    // $userName = isset($_POST['userName']) ? $_POST['userName'] : '';
    // echo $userName;
    // $userPassword = isset($_POST['userPassword']) ? $_POST['userPassword'] : '';
    // echo $userPassword;

    $validation = new UserLoginValidator($_POST);
    $errors = $validation->validateUserLoginForm();

    if (!empty($errors)) {
        // Validation failed; redirect back to the form with errors
        // You might consider using a session to persist error messages
        $_SESSION['userName'] = $_POST['userName'];
        $_SESSION['errors'] = $errors;
        $loginViewPath = $baseURLdev . '/login.php';
        echo $loginViewPath;
        header('Location: ' . $loginViewPath);
        exit;
    }

    // echo $errors['userName'] ?? '';
    // echo $errors['userPassword'] ?? '';

    // Prepare a select statement
    $sql = "SELECT idUser, userName, userPassword FROM appuser WHERE userName = ?";
    
    if($stmt = $mysqli->prepare($sql)){
        // Bind variables to the prepared statement as parameters
        $stmt->bind_param("s", $param_username);
        
        // Set parameters
        $param_username = $userName;
        
        // Attempt to execute the prepared statement
        if($stmt->execute()){
            // Store result
            $stmt->store_result();
            
            // Check if username exists, if yes then verify password
            if($stmt->num_rows == 1){                    
                // Bind result variables
                $stmt->bind_result($id, $username, $stored_password);
                if($stmt->fetch()){
                    // if(password_verify($userPassword, $hashed_password)){
                    if($userPassword === $stored_password){
                        // Password is correct, so start a new session
                        session_start();
                        
                        // Store data in session variables
                        $_SESSION["loggedin"] = true;
                        $_SESSION["id"] = $id;
                        $_SESSION["username"] = $username;                            
                        
                        // Redirect user to welcome page
                        header("location: index.php");
                    } else{
                        // Password is not valid, display a generic error message
                        $login_err = "Invalid username or password.";
                    }
                }
            } else{
                // Username doesn't exist, display a generic error message
                $login_err = "Invalid username or password.";
            }
        } else{
            echo "Oops! Something went wrong. Please try again later.";
        }

        // Close statement
        $stmt->close();
    }
    
    // Close connection
    $mysqli->close();
}
?>