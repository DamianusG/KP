<?php
// Initialize the session
session_start();
 
// Check if the user is already logged in, if yes then redirect him to welcome page
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
    header("location: index.php");
    exit;
}
 
// Include config file
require_once "App/database/dbconnect.php";
 
// Define variables and initialize with empty values
$userName = $userPassword = "";
$username_err = $password_err = $login_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // Check if username is empty
    if(empty(trim($_POST["userName"]))){
        $username_err = "Please enter username.";
    } else{
        $userName = trim($_POST["userName"]);
    }
    
    // Check if password is empty
    if(empty(trim($_POST["userPassword"]))){
        $password_err = "Please enter your password.";
    } else{
        $userPassword = trim($_POST["userPassword"]);
    }


    // Validate credentials
    if(empty($username_err) && empty($password_err)){
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
    }
    
    // Close connection
    $mysqli->close();
}
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <?php include "App/Layout/head.php";?>
    <title>Login</title>
</head>
<body>
    <div class="container-fluid flex">
        <div class="container-sm wrapper" style="border: 1px solid black;">
            <h2>Login</h2>
            <p>Please fill in your credentials to login.</p>
            <form>
                <div class="mb-3">
                    <label for="userName" class="form-label">Username</label>
                    <input type="text" name="userName" class="form-control">
                    <span class="invalid-feedback"><?php echo $username_err; ?></span>
                </div>
                <div class="mb-3">
                    <label for="userPassword" class="form-label">Password</label>
                    <input type="password" name="userPassword" class="form-control">
                    <span class="invalid-feedback"><?php echo $password_err; ?></span>
                </div>
                <button type="submit" class="btn btn-primary">Masuk</button>
            </form>
        </div>
    </div>


        <?php 
        // if(!empty($login_err)){
        //     echo '<div class="alert alert-danger">' . $login_err . '</div>';
        // }        
        ?>

        <!-- <form action="<?php //echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="form-group">
                <label>Username</label>
                <input type="text" name="userName" class="form-control <?php //echo (!empty($username_err)) ? 'is-invalid' : ''; ?>" value="<?php //echo $userName; ?>">
                <span class="invalid-feedback"><?php //echo $username_err; ?></span>
            </div>    
            <div class="form-group">
                <label>Password</label>
                <input type="password" name="userPassword" class="form-control <?php //echo (!empty($password_err)) ? 'is-invalid' : ''; ?>">
                <span class="invalid-feedback"><?php //echo $password_err; ?></span>
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Login">
            </div>
            <p>Don't have an account? <a href="register.php">Sign up now</a>.</p>
        </form> -->


    <?php include "App/Layout/bootstrap-js.php";?>
</body>
</html>