<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <title>Aplikasi Inventory dan Arsip</title>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
        <style type="text/css">
            
            html, body{
                height: 100%;
            }

            body{
                min-height: 100%;
                /* display: flex;
                flex-direction: column; */
            }
            .navbar{
                background-color: #e57b25;
            }
            .navbar-brand img{
                position: relative;
                border-radius: 50%;
                width: 70px;
                left: 10px;
                size: contain;
            }
            .prof-pic{
                border-radius: 50%;
                width: 70px;
                right: 15px;
            }
            #dropdownMenuButton1{
                border-radius: 70%;
            }
            .quote{
                margin-left : 10px;
                opacity : 90%;
            }
            .btn-cust{
                background-color: white;
            }
            #dropdownMenuButton1{
                margin-right: 50px;
            }
            .drop-menu-1{
                margin: -30px;
            }
            footer{
                margin-top: auto;
            }
            .footer-cust{
                background-color: #262626;
                padding-bottom: 40px;
            }
            .inner-container-fluid{
                height: 100%;
                /* untuk sidebar dengan content */
                /* flex: 1 1 auto; */
            }
            .container-fluid{
                /* untuk header */
                padding-left: 0rem;
                padding-right: 0rem;
                
            }
            header{
                height : 10%;
            }
            .container-fluid-main{
                /* untuk sidebar/content and footer */
                height : 78%;
            }
            #sidebar{
                float: left;
                height:100%;
            }
            .sidebar{
                min-height:100%;
            }
            #content{
                height: 100%;
            /* float: right; */
            }
            #content-text-cust{
                min-height: 100%;
            }
            #footer{
                margin-top:auto;
            }

        </style>
    </head>

    <body>
        <?php //include "App/Layout/header.php";?>
        <header>
            <nav class="navbar navbar-default">
                <div class="container-fluid">
                    <div class="d-flex align-items-center">
                        <div class="flex-grow-1">
                            <a href="<?php "localhost";?>" class="navbar-brand d-none d-lg-inline-block">
                                <img src="App/Resources/Assets/Images/logo-dummy.jpg" alt="Logo">
                            </a>
                        </div>
                        <div class="text-white quote">
                            <?php echo ("<h3>Brilliant day as always</h3>");?>
                        </div>
                    </div>
                    <!-- <div class="" id="myNavbar">
                            <ul class="nav navbar-nav">
                                <li>
                                    <a href="#" class="btn btn-outline-secondary right btn-cust" role="button">Log in</a>
                                </li>
                            </ul>
                        </div> -->
                    <div class="dropdown">
                        <button class="btn dropdown-toogle dropdown-cust" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                        <img class="img-thumbnail prof-pic" src="App/Resources/Assets/Images/pp-dummy.jpg" alt="profile-picture">
                        </button>
                        <ul class="dropdown-menu drop-menu-1" aria-labelledby="dropdownMenuButton1">
                            <li><a class="dropdown-item" href="#">User Profile</a></li>
                            <li><a class="dropdown-item" href="#">Log out</a></li>
                        </ul>
                    </div>   
                </div>
            </nav>
        </header>          
        <div class="container-fluid-main">
            <div class="inner-container-fluid flex-grow-1">
                <div id="sidebar">
                    <div class="p-3 text-white bg-dark sidebar flex-grow-1" style="width: 280px;">
                        <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none">
                            <span class="fs-4">Sidebar</span>
                        </a>
                        <hr>
                        <ul class="nav nav-pills flex-column mb-auto flex-grow-1">
                            <li class="nav-item">
                                <a href="#" class="nav-link active" aria-current="page">
                                    <svg class="bi me-2" width="16" height="16"><use xlink:href="#home"/></svg>
                                Home
                                </a>
                            </li>
                            <li>
                                <a href="#" class="nav-link text-white">
                                    <svg class="bi me-2" width="16" height="16"><use xlink:href="#speedometer2"/></svg>
                                Dashboard
                                </a>
                            </li>
                            <li>
                                <a href="#" class="nav-link text-white">
                                    <svg class="bi me-2" width="16" height="16"><use xlink:href="#table"/></svg>
                                Orders
                                </a>
                            </li>
                            <li>
                                <a href="#" class="nav-link text-white">
                                    <svg class="bi me-2" width="16" height="16"><use xlink:href="#grid"/></svg>
                                Products
                                </a>
                            </li>
                            <li>
                                <a href="#" class="nav-link text-white">
                                    <svg class="bi me-2" width="16" height="16"><use xlink:href="#people-circle"/></svg>
                                Customers
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div id="content">
                    <?php echo "<h1 id='content-text-cust' class='text-center display-4'>Welcome!<br>How may I assist you today?</h1>";?>  
                </div>
            </div>
            <footer id="footer" class="text-center text-white">
                <div class="p-4 footer-cust">
                    <div class="text-center">
                        <?php echo "<h4 class='text-center'>Have an issue?</h4>";?>    
                    </div>
                    <div class="text-center">
                        <?php echo "<h6 class='text-center'>Contact Support<br>Email : Admin@company.com </h6>";?>    
                    </div>  
                </div>
            </footer>
        </div>      
    </body>
</html>