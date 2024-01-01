<?php

require ($_SERVER['DOCUMENT_ROOT'] . '/KP/App/database/dbconfig.php');
// require ($_SERVER['DOCUMENT_ROOT'] . '/App/database/dbconfig.php');

class MysqlConn extends Dbconfig {

    public $conn;
    // public $dataSet;
    // private $sqlQuery;
    
    protected $hostName;
    protected $userName;
    protected $passCode;
    protected $databaseName;

    public function __construct() {
        $dbPara = new Dbconfig();
        $dbPara->SetDbConf();
        $this->hostName = $dbPara->dbsettings['DB_SERVER'];
        $this->userName = $dbPara->dbsettings['DB_USERNAME'];
        $this->passCode = $dbPara->dbsettings['DB_PASSWORD'];
        $this->databaseName = $dbPara->dbsettings['DB_NAME'];
        // $this -> hostName = $dbPara -> serverName;
        // $this -> userName = $dbPara -> userName;
        // $this -> passCode = $dbPara ->passCode;
        // $this -> databaseName = $dbPara -> dbName;
        $dbPara = NULL;

        $this->conn = new mysqli(
            $this->hostName,
            $this->userName,
            $this->passCode,
            $this->databaseName
        );

        if($this->conn === false){
            die("ERROR: Tidak bisa Menyambungkan database " . $this->conn->connect_error);
        }
    }

    // function Mysql() {
    //     $this -> connectionString = NULL;

    //     $dbPara = new Dbconfig();
    //     $this -> hostName = $dbPara -> serverName;
    //     $this -> userName = $dbPara -> userName;
    //     $this -> passCode = $dbPara ->passCode;
    //     $this -> databaseName = $dbPara -> dbName;
    //     $dbPara = NULL;
    // }
  
    // function dbConnect()    {
    //     $this -> connectionString = mysqli_connect($this -> serverName,$this -> userName,$this -> passCode);
    //     mysqli_select_db($this -> databaseName,$this -> connectionString);
    //     return $this -> connectionString;
    // }

    // function dbDisconnect() {
        // $this -> conn = NULL;
        // $this -> sqlQuery = NULL;
        // $this -> dataSet = NULL;
    //     $this -> databaseName = NULL;
    //     $this -> hostName = NULL;
    //     $this -> userName = NULL;
    //     $this -> passCode = NULL;
    // }
}

 
/* Attempt to connect to MySQL database */
// $mysqli = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
 
// Check connection
// if($mysqli === false){
//     die("ERROR: Tidak bisa Menyambungkan database " . $mysqli->connect_error);
// }
?>