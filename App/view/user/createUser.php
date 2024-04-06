<?php
// $db = $mysqli;
// $tableName = "appuser";
// $columns = ['idUser', 'userName', 'userPassword', 'idRole', 'namaLengkap', 'tanggalLahir', 'alamat', 'jabatan', 'noTelp'];
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

if (isset($_SESSION['errors']) && !empty($_SESSION['errors'])) {
    // Retrieve and use the errors
    $errors = $_SESSION['errors'];
}
?>

<!DOCTYPE html>
<html lang="en">
    <!-- head -->
    <head>
        <?php include ($_SERVER['DOCUMENT_ROOT'] . '/KP/App/Layout/head.php');?>
        <script src="App/Js/script.js"></script>
        <title>Aplikasi Inventory dan Arsip - Tambah User</title>
    </head>
    <!-- head - END-->

    <!-- Header -->
    <?php include ($_SERVER['DOCUMENT_ROOT'] . '/KP/App/Layout/header.php');?>
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
                    <form action="App/controller/user/createUserController.php" method="POST">
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
                                <input type="text" class="form-control" id="userName" name="userName" value='<?php echo isset($_SESSION['formData']['userName']) ? htmlspecialchars($_SESSION['formData']['userName']) : ''; ?>'>
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
                                <input type="password" class="form-control" id="inputUserPassword" name="userPassword">
                            </div>
                            <div class="error">
                                <?php
                                    echo $errors['userPassword'] ?? '';
                                ?>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="inputIdRole" class="col-sm-2 col-form-label">ID Role</label>
                            <div class="col-sm-10">
                                <select class="form-control" id="inputIdRole" name="idRole">
                                    <option value="1" <?= isset($_SESSION['formData']['idRole']) && $_SESSION['formData']['idRole'] == 1 ? 'selected' : ''; ?>>Super Admin</option>
                                    <option value="2" <?= isset($_SESSION['formData']['idRole']) && $_SESSION['formData']['idRole'] == 2 ? 'selected' : ''; ?>>Operator</option>
                                </select>
                            </div>
                            <div class="error">
                                <?php
                                    echo $errors['idRole'] ?? '';
                                ?>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="inputNamaLengkap" class="col-sm-2 col-form-label">Nama Lengkap</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="inputNamaLengkap" name="namaLengkap" value='<?php echo isset($_SESSION['formData']['namaLengkap']) ? htmlspecialchars($_SESSION['formData']['namaLengkap']) : ''; ?>'>
                            </div>
                            <div class="error">
                                <?php
                                    echo $errors['namaLengkap'] ?? '';
                                ?>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="inputTanggalLahir" class="col-sm-2 col-form-label">Tanggal Lahir</label>
                            <div class="col-sm-10">
                                <input type="date" class="form-control" id="inputTanggalLahir" name="tanggalLahir" value='<?php echo isset($_SESSION['formData']['tanggalLahir']) ? htmlspecialchars($_SESSION['formData']['tanggalLahir']) : ''; ?>'>
                            </div>
                            <div class="error">
                                <?php
                                    echo $errors['tanggalLahir'] ?? '';
                                ?>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="inputAlamat" class="col-sm-2 col-form-label">Alamat</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="inputAlamat" name="alamat" value='<?php echo isset($_SESSION['formData']['alamat']) ? htmlspecialchars($_SESSION['formData']['alamat']) : ''; ?>'>
                            </div>
                            <div class="error">
                                <?php
                                    echo $errors['alamat'] ?? '';
                                ?>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="inputJabatan" class="col-sm-2 col-form-label">Jabatan</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="inputJabatan" name="jabatan" value='<?php echo isset($_SESSION['formData']['jabatan']) ? htmlspecialchars($_SESSION['formData']['jabatan']) : ''; ?>'>
                            </div>
                            <div class="error">
                                <?php
                                    echo $errors['jabatan'] ?? '';
                                ?>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="inputNomorTelepon" class="col-sm-2 col-form-label">Nomor Telepon</label>
                            <div class="col-sm-10">
                                <input type="tel" class="form-control" id="inputPhoneNumber" name="noTelp" value='<?php echo isset($_SESSION['formData']['noTelp']) ? htmlspecialchars($_SESSION['formData']['noTelp']) : ''; ?>'>
                            </div>
                            <div class="error">
                                <?php
                                    echo $errors['noTelp'] ?? '';
                                ?>
                            </div>
                        </div>
                        <button type="submit" name="Submit" class="btn btn-primary">Add User</button>
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