<?php
/* Database credentials. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'inventory');
// define('DB_USERNAME', 'dgemilang_stagingkp');
// define('DB_PASSWORD', 'Brigandin3');
// define('DB_NAME', 'dgemilang_stagingkp_inventory');
 
/* Attempt to connect to MySQL database */
$mysqli = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
 
// Check connection
if($mysqli === false){
    die("ERROR: Tidak bisa Menyambungkan database " . $mysqli->connect_error);
}
?>