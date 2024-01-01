<?php 
    // require_once($_SERVER['DOCUMENT_ROOT'] . '/KP/App/database/dbconnect.php');
    require_once($_SERVER['DOCUMENT_ROOT'] . '/App/database/dbconnect.php');
    class UserModel {
        
        private $userDataSet = [];
        private $errors = [];
        // Your methods for interacting with the database go here
        public function authenticateUser($userName, $userPassword) {
            // Perform SQL query to check if the username and password match

            // Connect to the database
            $mysqlconn = new MysqlConn();

            // Prepare a select statement
            $sql = "SELECT idUser, userName, userPassword FROM appuser WHERE userName = ?";
    
            if($stmt = $mysqlconn->conn->prepare($sql)){
                // Bind variables to the prepared statement as parameters
                $stmt->bind_param("s", $param_username);
                
                // Set parameters
                $param_username = $userName;
                
                // Attempt to execute the prepared statement
                if($stmt->execute()){
                    // Store result
                    $stmt->store_result();
                    
                    // Check if username exists, if yes then verify password
                    if($stmt->num_rows == 1){                    
                        // Bind result variables
                        $stmt->bind_result($id, $username, $stored_password);
                        if($stmt->fetch()){
                            // if(password_verify($userPassword, $hashed_password)){
                            if($userPassword === $stored_password){
                                // Password is correct, so start a new session
                                $this->userDataSet = [
                                    'id' => $id,
                                    'username' => $username
                                ];
                            } else{
                                // Password is not valid, display a generic error message
                                $this->errors['loginErr'] = "Invalid username or password.";
                            }
                        }
                    } else{
                        // Username doesn't exist, display a generic error message
                        $this->errors['loginErr'] = "Invalid username or password.";
                    }
                } else{
                    echo "Oops! Something went wrong. Please try again later.";
                }

                // Close statement
                $stmt->close();
            }
            
            // Close connection
            $mysqlconn->conn->close();

            // Return true if authentication is successful, false otherwise
            return $this->errors;
        }

        public function getUserDataSet(){
            return $this->userDataSet;
        }

        public function getUserTableData(){
            // connect Database
            $mysqlconn = new MysqlConn();

            // prepare Sql Statement
            $sql = "SELECT * FROM appuser";

            // execute Sql Statement store in result
            $result = $mysqlconn->conn->query($sql);

            $data = $result->fetch_all(MYSQLI_ASSOC);

            return $data;
        }
    }
?>