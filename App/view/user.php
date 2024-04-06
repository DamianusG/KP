<?php
// Initialize the session
// require_once 'App/database/dbconnect.php';
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}

// $db = $mysqli;
// $tableName = "appuser";
// $columns = ['idUser', 'userName', 'userPassword', 'idRole', 'namaLengkap', 'tanggalLahir', 'alamat', 'jabatan', 'noTelp', 'statusAktif'];
// $fetchData = fetch_data($db, $tableName, $columns);
// function fetch_data($db, $tableName, $columns)
// {
//     if (empty($db)) {
//         $msg = "Database connection error";
//     } elseif (empty($columns) || !is_array($columns)) {
//         $msg = "columns Name must be defined in an indexed array";
//     } elseif (empty($tableName)) {
//         $msg = "Table Name is empty";
//     } else {
//         $columnName = implode(", ", $columns);
//         $query = "SELECT " . $columnName . " FROM $tableName" . " ORDER BY idUser ASC";
//         $result = $db->query($query);
//         if ($result == true) {
//             if ($result->num_rows > 0) {
//                 $row = mysqli_fetch_all($result, MYSQLI_ASSOC);
//                 $msg = $row;
//             } else {
//                 $msg = "No Data Found";
//             }
//         } else {
//             $msg = mysqli_error($db);
//         }
//     }
//     return $msg;
// }
?>
    
    <!DOCTYPE html>
        <html lang="en">
        <!-- head -->
        <head>
        <?php include "App/Layout/head.php";?>
        <script src="App/Js/script.js"></script>
        <title>Aplikasi Inventory dan Arsip - User Management</title>
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
                    
                    <div class="container-fluid">
                        <div class="d-flex">
                            <div class="p-2"><a href="index.php?page=user-create"><button class="btn btn-primary">Add User</button></a></div>
                            <div class="p-2"><a href="index.php?page=user-update"><button class="btn btn-primary">Update User</button></a></div>
                            <div class="p-2"><a href="index.php?page=user-delete"><button class="btn btn-primary">Terminate User</button></a></div>
                        </div>
                    </div>
                    <div class="container-fluid">
                        <table class="table table-hover table-striped">
                            <thead>
                                <th>No.</th>
                                <th>User Name</th>
                                <th>Role</th>
                                <th>Nama Lengkap</th>
                                <th>Tanggal Lahir</th>
                                <th>Alamat</th>
                                <th>Jabatan</th>
                                <th>noTelp</th>
                                <th>statusAktif</th>
                            </thead>
                            <tbody>
                                <?php
                                if (is_array($userDatas)) {
                                    $sn = 1;
                                    foreach ($userDatas as $userdata) {
                                ?>
                                        <tr>
                                            <td><?php echo $sn; ?></td>
                                            <td><?php echo $userdata['userName'] ?? ''; ?></td>
                                            <td><?php echo $userdata['idRole'] ?? ''; ?></td>
                                            <td><?php echo $userdata['namaLengkap'] ?? ''; ?></td>
                                            <td><?php echo $userdata['tanggalLahir'] ?? ''; ?></td>
                                            <td><?php echo $userdata['alamat'] ?? ''; ?></td>
                                            <td><?php echo $userdata['jabatan'] ?? ''; ?></td>
                                            <td><?php echo $userdata['noTelp'] ?? ''; ?></td>
                                            <td><?php echo $userdata['statusAktif'] ?? ''; ?></td>
                                        </tr>
                                    <?php
                                        $sn++;
                                    }
                                } else { ?>
                                    <tr>
                                        <td colspan="9">
                                            <?php echo $fetchData; ?>
                                        </td>
                                    <tr>
                                    <?php
                                } ?>
                            </tbody>
                        </table>
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

    
    