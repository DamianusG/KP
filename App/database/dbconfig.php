<?php
class Dbconfig {
    
    protected $dbsettings;

    function SetDbConf()
    {
        // Database variables
        // Host name
        $this->dbsettings['DB_SERVER'] = 'localhost';
        // Database name
        $this->dbsettings['DB_USERNAME'] = 'root';
        // Username
        $this->dbsettings['DB_PASSWORD'] = '';
        // Password
        $this->dbsettings['DB_NAME'] = 'inventory';
    }
    // protected $serverName;
    // protected $userName;
    // protected $passCode;
    // protected $dbName;

    // function Dbconfig() {
    //     $this -> serverName = 'localhost';
    //     $this -> userName = 'root';
    //     $this -> passCode = '';
    //     $this -> dbName = 'inventory';
    // }

}

/* Database credentials. gunakan untuk development.*/
// define('DB_SERVER', 'localhost');
// define('DB_USERNAME', 'root');
// define('DB_PASSWORD', '');
// define('DB_NAME', 'inventory');

/* Database credentials. gunakan untuk staging.*/
// define('DB_USERNAME', 'dgemilang_stagingkp');
// define('DB_PASSWORD', 'Brigandin3');
// define('DB_NAME', 'dgemilang_stagingkp_inventory');

/* Database credentials. gunakan untuk production.*/
// define('DB_USERNAME', 'dgemilang_kp');
// define('DB_PASSWORD', 'Brigandin3');
// define('DB_NAME', 'dgemilang_kp_inventory');

?>