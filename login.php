<?php
// Initialize the session
session_start();
 
// Check if the user is already logged in, if yes then redirect him to welcome page
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
    header("location: dashboard.php");
    exit;
}

if (isset($_SESSION['errors']) && !empty($_SESSION['errors'])) {
    // Retrieve and use the errors
    $errors = $_SESSION['errors'];
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
            <form action="App/controller/loginController.php" method="POST">
                <div class="error">
                    <?php
                        echo $errors['loginErr'] ?? '';
                    ?>
                </div>
                <div class="mb-3">
                    <label for="userName" class="form-label">UserName</label>
                    <input type="text" name="userName" id="userName" value='<?php echo isset($_SESSION['userName']) ? htmlspecialchars($_SESSION['userName']) : ''; ?>' class="form-control">
                    <div class="error">
                        <?php
                            echo $errors['userName'] ?? '';
                        ?>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="userPassword" class="form-label">Password</label>
                    <input type="password" name="userPassword" id="userPassword" class="form-control">
                    <div class="error">
                        <?php
                            echo $errors['userPassword'] ?? '';
                        ?>
                    </div>
                </div>
                <button type="submit" name="submitLogin" class="btn btn-primary">Masuk</button>
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