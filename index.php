<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}
?>
    
    <!DOCTYPE html>
        <html lang="en">
        <!-- head -->
        <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <link rel="stylesheet" href="App/style.css">
        <title>Aplikasi Inventory dan Arsip</title>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
        <script src="App/Js/script.js"></script>
        </head>
        <!-- head - END-->

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
        <!-- Sidebar -->
        <?php include "App/Layout/footer.php";?>
        <!-- Sidebar End -->  
        
        <body>
            
        </body>
        </html>

    
    