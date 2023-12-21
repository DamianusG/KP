<?php 
    class CreateUserValidator {
        private $data;
        private $errors = [];
        private static $fields = ['userName', 'userPassword', 'idRole', 'namaLengkap', 'tanggalLahir', 'alamat', 'jabatan', 'noTelp'];

        public function __construct ($c_user_post_data) {
            $this->data = $c_user_post_data;
        }

        public function validateCreateUserForm() {
            foreach (self::$fields as $field) {
                if(!array_key_exists($field, $this->data)) {
                    trigger_error("$field is not present in the data");
                    return;
                }
            }

            $this->validateUserName();
            $this->validateUserPassword();
            $this->validateIdRole();
            $this->validateNamaLengkap();
            $this->validateTanggalLahir();
            $this->validateAlamat();
            $this->validateJabatan();
            $this->validateNoTelp();
            return $this->errors;
        }

        private function validateUserName() {
            $val = trim($this->data['userName']);
            if (empty($val)) {
                $this->addError('userName', 'User Name is required');
            } else {
                if (!preg_match("/^[a-zA-Z0-9]{6,12}$/", $val)) {
                    $this->addError('userName', 'User Name must be alphanumeric with 6-12 characters');
                }
            }
        }

        private function validateUserPassword() {
            $val = trim($this->data['userPassword']);
            if (empty($val)) {
                $this->addError('userPassword', 'Password is required');
            } else {
                if (!preg_match("/^(?=.*[a-z])(?=.*[A-Z])(?=.*[!@#$%^&*()_+{}\[\]:;<>,.?~\\-`]).{8,}$/", $val)) {
                    $this->addError('userPassword', 'Password must contains 1 lowercase letter, 1 uppercase letter, and 1 special character in at least 8 characters length');
                }
            }
        }

        private function validateIdRole() {
            $val = trim($this->data['idRole']);
            if (empty($val)) {
                $this->addError('idRole', 'Role is required');
            } else {
                if (!preg_match("/^[1-9]$/", $val)) {
                    $this->addError('idRole', 'Role must be choosen from the list');
                }
            }
        }

        private function validateNamaLengkap() {
            $val = trim($this->data['namaLengkap']);
            if (empty($val)) {
                $this->addError('namaLengkap', 'Name is required');
            } else {
                if (!preg_match("/^[a-zA-Z]+$/", $val)) {
                    $this->addError('namaLengkap', 'Nama Lengkap must be alphanumeric');
                }
            }
        }

        private function validateTanggalLahir() {
            $val = trim($this->data['tanggalLahir']);
            if (empty($val)) {
                $this->addError('tanggalLahir', 'Tanggal Lahir is required');
            } else {
                if (!preg_match("/^[0-9]{4}-(0[1-9]|1[0-2])-(0[1-9]|[1-2][0-9]|3[0-1])$/", $val)) {
                    $this->addError('tanggalLahir', 'Tanggal Lahir harus dalam format YYYY-MM-DD');
                }
            }
        }

        private function validateAlamat() {
            $val = trim($this->data['alamat']);
            if (empty($val)) {
                $this->addError('alamat', 'Alamat is required');
            } else {
                if (!preg_match("/^[a-zA-Z0-9]+$/", $val)) {
                    $this->addError('alamat', 'Alamat must be alphanumeric');
                }
            }
        }

        private function validateJabatan() {
            $val = trim($this->data['jabatan']);
            if (empty($val)) {
                $this->addError('jabatan', 'Jabatan is required');
            } else {
                if (!preg_match("/^[a-zA-Z0-9]+$/", $val)) {
                    $this->addError('jabatan', 'Jabatan must be alphanumeric');
                }
            }

        }

        private function validateNoTelp() {
            $val = trim($this->data['noTelp']);
            if (empty($val)) {
                $this->addError('noTelp', 'No. Telp is required');
            } else {
                if (!preg_match("/^[0-9]+$/", $val)) {
                    $this->addError('noTelp', 'No. Telp must be numeric');
                }
            }
        }

        private function addError($keyField,$val) {
            $this->errors[$keyField] = $val;
        }
    }

    class UserLoginValidator {

        private $data;
        private $errors = [];
        private static $fields = ['userName', 'userPassword'];

        public function __construct ($c_user_post_data) {
            $this->data = $c_user_post_data;
        }

        public function validateCreateUserForm() {
            foreach (self::$fields as $field) {
                if(!array_key_exists($field, $this->data)) {
                    trigger_error("$field is not present in the data");
                    return;
                }
            }

            $this->validateUserName();
            $this->validateUserPassword();
            return $this->errors;
        }

        private function validateUserName() {
            $val = trim($this->data['userName']);
            if (empty($val)) {
                $this->addError('userName', 'User Name is required');
            } else {
                if (!preg_match("/^[a-zA-Z0-9]{6,12}$/", $val)) {
                    $this->addError('userName', 'User Name must be alphanumeric with 6-12 characters');
                }
            }
        }

        private function validateUserPassword() {
            $val = trim($this->data['userPassword']);
            if (empty($val)) {
                $this->addError('userPassword', 'Password is required');
            } else {
                if (!preg_match("/^(?=.*[a-z])(?=.*[A-Z])(?=.*[!@#$%^&*()_+{}\[\]:;<>,.?~\\-`]).{8,}$/", $val)) {
                    $this->addError('userPassword', 'Password must contains 1 lowercase letter, 1 uppercase letter, and 1 special character in at least 8 characters length');
                }
            }
        }

        private function addError($keyField,$val) {
            $this->errors[$keyField] = $val;
        }
    }
?>