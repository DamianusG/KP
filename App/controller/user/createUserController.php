<?php
    require_once ($_SERVER['DOCUMENT_ROOT'] . '/KP/App/model/userModel.php');
    // require_once ($_SERVER['DOCUMENT_ROOT'] . '/App/model/userModel.php');
    require_once ($_SERVER['DOCUMENT_ROOT'] . '/KP/App/Resources/Configuration/config.php');
    // require_once ($_SERVER['DOCUMENT_ROOT'] . '/App/Resources/Configuration/config.php');
    require_once( $_SERVER['DOCUMENT_ROOT'] . '/KP/App/helper/userValidator.php');
    // require($_SERVER['DOCUMENT_ROOT'] . '/App/helper/userValidator.php');

    if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 

    if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
        header("location: index.php");
        exit;
    }

    if(isset($_POST['Submit'])){
        // echo 'Tombol Submit ditekan';
        $validation = new CreateUserValidator($_POST);
        $errors = $validation->validateCreateUserForm();

        if (!empty($errors)) {
            // Validation failed; redirect back to the form with errors
            $_SESSION['formData'] = [
                'userName' => $_POST['userName'],
                'userPassword' => $_POST['userPassword'],
                'idRole' => $_POST['idRole'],
                'namaLengkap' => $_POST['namaLengkap'],
                'tanggalLahir' => $_POST['tanggalLahir'],
                'alamat' => $_POST['alamat'],
                'jabatan' => $_POST['jabatan'],
                'noTelp' => $_POST['noTelp']
            ];

            $_SESSION['errors'] = $errors;
            foreach ($errors as $error => $val) {
                echo $val;
             }
            // echo $_SESSION['errors'];
            $viewPath = $baseURLdev . 'index.php?page=user-create';
            // $loginViewPath = $baseURLdev . 'App/view/login.php';
            // echo $loginViewPath;
            header('Location: ' . $viewPath);
            // header('Location: index.php');
            exit;
        } else {
            $userData = [
                'userName' => $_POST['userName'],
                'userPassword' => $_POST['userPassword'],
                'idRole' => $_POST['idRole'],
                'namaLengkap' => $_POST['namaLengkap'],
                'tanggalLahir' => $_POST['tanggalLahir'],
                'alamat' => $_POST['alamat'],
                'jabatan' => $_POST['jabatan'],
                'noTelp' => $_POST['noTelp']
            ];
        }

        $userModel = new UserModel();
        $errors = $userModel->createUser($userData);

        if(!empty($errors)){
            $_SESSION['errors'] = $errors;
            // $loginViewPath = $baseURLdev . 'index.php';
            $viewPath = $baseURLdev . 'index.php?page=user-create';
            // echo $loginViewPath;
            header('Location: ' . $viewPath);
            exit;
        } else {
            $viewPath = $baseURLdev . 'index.php?page=user';
            header('Location: ' . $viewPath);
            exit;
        }
    }

    include_once ( $_SERVER['DOCUMENT_ROOT'] . '/KP/App/view/user/createUser.php');
?>