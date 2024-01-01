<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}

require_once "App/database/dbconnect.php";
require('App/helper/userValidator.php');

if(isset($_POST['Submit'])){
    // echo 'Tombol Submit ditekan';
    $validation = new CreateUserValidator($_POST);
    $errors = $validation->validateCreateUserForm();
    // if(count($errors) > 0){
    //     $_SESSION['errors'] = $errors;
    //     header('Location: CreateUser.php');
    //     exit();
    // }


}

$db = $mysqli;
$tableName = "appuser";
$columns = ['idUser', 'userName', 'userPassword', 'idRole', 'namaLengkap', 'tanggalLahir', 'alamat', 'jabatan', 'noTelp'];
$fetchData = fetch_data($db, $tableName, $columns);
function fetch_data($db, $tableName, $columns)
{
    if (empty($db)) {
        $msg = "Database connection error";
    } elseif (empty($columns) || !is_array($columns)) {
        $msg = "columns Name must be defined in an indexed array";
    } elseif (empty($tableName)) {
        $msg = "Table Name is empty";
    } else {
        $columnName = implode(", ", $columns);
        $query = "SELECT " . $columnName . " FROM $tableName" . " ORDER BY idUser ASC";
        $result = $db->query($query);
        if ($result == true) {
            if ($result->num_rows > 0) {
                $row = mysqli_fetch_all($result, MYSQLI_ASSOC);
                $msg = $row;
            } else {
                $msg = "No Data Found";
            }
        } else {
            $msg = mysqli_error($db);
        }
    }
    return $msg;
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
                <?php echo "<h1 id='content-text-cust' class='text-center display-4'>User Management</h1>"; ?>
                <?php echo "<h2 id='content-text-cust' class='text-center display-4'>Add User</h2>"; ?>
                
                <div class="container-fluid">
                    <form action="createUser.php" method="POST">
                   <!-- ['idUser', 'userName', 'userPassword', 'idRole', 'namaLengkap', 'tanggalLahir', 'alamat', 'jabatan', 'noTelp', 'statusAktif'] -->
                        <!-- <div class="row mb-3">
                            <label for="inputIdUser" class="col-sm-2 col-form-label">Id User</label>
                            <div class="col-sm-10">
                            <input type="text" class="form-control" id="inputIdUser" required>
                            </div>
                        </div> -->
 
                        <div class="row mb-3">
                            <label for="inputUserName" class="col-sm-2 col-form-label">User Name</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="inputUserName" name="userName" required>
                            </div>
                            <div class="error">
                                <?php
                                    echo $errors['userName'] ?? '';
                                ?>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="inputUserPassword" class="col-sm-2 col-form-label">Password</label>
                            <div class="col-sm-10">
                                <input type="password" class="form-control" id="inputUserPassword" name="userPassword" required>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="inputIdRole" class="col-sm-2 col-form-label">ID Role</label>
                            <div class="col-sm-10">
                                <select class="form-control" id="inputIdRole" name="idRole" required>
                                    <option value="1">Super Admin</option>
                                    <option value="2">Operator</option>
                                </select>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="inputNamaLengkap" class="col-sm-2 col-form-label">Nama Lengkap</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="inputNamaLengkap" name="namaLengkap" required>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="inputTanggalLahir" class="col-sm-2 col-form-label">Tanggal Lahir</label>
                            <div class="col-sm-10">
                                <input type="date" class="form-control" id="inputTanggalLahir" name="tanggalLahir" required>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="inputAlamat" class="col-sm-2 col-form-label">Alamat</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="inputAlamat" name="alamat">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="inputJabatan" class="col-sm-2 col-form-label">Jabatan</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="inputJabatan" name="jabatan" required>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="inputNomorTelepon" class="col-sm-2 col-form-label">Nomor Telepon</label>
                            <div class="col-sm-10">
                                <input type="tel" class="form-control" id="inputPhoneNumber" name="noTelp" required>
                            </div>
                        </div>
                        <button type="submit" name="Submit" class="btn btn-primary">Sign in</button>
                    </form>
                </div>
            </div>
        </div>
    </div> 
    <!-- Sidebar -->
    <?php include "App/Layout/footer.php";?>
    <!-- Sidebar End -->  
    <body>
        
    </body>
</html>