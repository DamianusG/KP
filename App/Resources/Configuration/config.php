<?php 
    function determineBaseURL() {
        if ($_SERVER['HTTP_HOST'] === 'localhost') {
            // return 'http://localhost/KP';
            return 'http://localhost:8080/KP';
        } else {
            // Replace 'example.com' with your actual production domain
            return 'http://kp.dgemilang.top/KP';
        }
    }
    
    // Function to determine the environment based on the base URL
    function determineEnvironment() {
        $baseURL = determineBaseURL();
    
        // You can customize this logic based on your requirements
        if (strpos($baseURL, 'localhost') !== false) {
            return 'development';
        } else {
            return 'production';
        }
    }

    // Determine the current environment
    $environment = determineEnvironment();

    // Choose the appropriate base URL based on the environment
    $baseURL = determineBaseURL();

    // $baseURLdev = 'http://localhost/KP';
    $baseURLdev = 'http://localhost:8080/KP';
    $baseURLprod = 'https://kp.dgemilang.top/';
?>