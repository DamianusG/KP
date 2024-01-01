<?php
// Initialize the session
// session_start();
 
// Check if the user is logged in, if not then redirect him to login page
// if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
//     header("location: login.php");
//     exit;
// }
?>
    
<!DOCTYPE html>
<html lang="en">
<!-- head -->
<head>
    <?php include "App/Layout/head.php";?>


    <script src="App/Js/script.js"></script>
    <title>Aplikasi Inventory dan Arsip</title>
</head>
<!-- head - END-->

<body>
    <!-- Header -->
    <?php include "App/Layout/header.php";?>
    <!-- Header End -->      
    <div class="container-fluid-main">
        <div class="inner-container-fluid flex flex-grow-1">
            <!-- Sidebar -->
            <?php include "App/Layout/sidebar.php";?>
            <!-- Sidebar End -->  
            <div id="content" class="flex-grow-1">
                <?php echo "<h1 id='content-text-cust' class='text-center display-4'>Welcome!<br>How may I assist you today?</h1>";?>  
            </div>
        </div>
    </div> 
    <!-- Footer -->
    <?php include "App/Layout/footer.php";?>
    <!-- Footer End -->  
    
    <!-- Bootstrap JS -->
    <?php include "App/Layout/bootstrap-js.php";?>
    <!-- Bootstrap JS END -->
</body>
    
</html>

    
    