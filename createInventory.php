<?php
// Initialize the session
session_start();

// Check if the user is logged in, if not then redirect him to login page
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    header("location: login.php");
    exit;
}

require_once 'App/database/dbconnect.php';

$db = $mysqli;
$tableName = "inventory";
$columns = ['idBarang', 'namaBarang', 'tipeBarang', 'hargaBarang'];
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
        $query = "SELECT " . $columnName . " FROM $tableName" . " ORDER BY idBarang DESC";
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
<?php include "App/Layout/header.php"; ?>
<!-- Header End -->

<div class="container-fluid-main">
    <div class="inner-container-fluid flex-grow-1">
        <!-- Sidebar -->
        <?php include "App/Layout/sidebar.php"; ?>
        <!-- Sidebar End -->
        <div id="content">
            <?php echo "<h1 id='content-text-cust' class='text-center display-4'>Table Inventory</h1>"; ?>
            <table>
                <thead>
                    <th>No.</th>
                    <th>Nama Barang</th>
                    <th>Tipe Barang</th>
                    <th>Harga Barang</th>
                </thead>
                <tbody>
                    <?php
                    if (is_array($fetchData)) {
                        $sn = 1;
                        foreach ($fetchData as $data) {
                    ?>
                            <tr>
                                <td><?php echo $sn; ?></td>
                                <td><?php echo $data['namaBarang'] ?? ''; ?></td>
                                <td><?php echo $data['tipeBarang'] ?? ''; ?></td>
                                <td><?php echo $data['hargaBarang'] ?? ''; ?></td>
                            </tr>
                        <?php
                            $sn++;
                        }
                    } else { ?>
                        <tr>
                            <td colspan="4">
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
<!-- Sidebar -->
<?php include "App/Layout/footer.php"; ?>
<!-- Sidebar End -->

<body>

</body>

</html>