<?php
    class UserModel {
        private $conn;

        public function __construct($conn) {
            $this->conn = $conn;
        }

        public function createUser ($username, $email, $password) {
            $hashed = password_hash($password, PASSWORD_BCRYPT);
            $sql = "INSERT INTO users (id, username, email, password) 
                VALUES(null, '$username', '$email', '$hashed')";
            
            return $this->conn->query($sql);
        }
    
        public function login ($email, $password) {
            $sql = "SELECT * FROM users WHERE email='$email'";
            $result = $this->conn->query($sql);
            if ($result->num_rows == 1) {
                $user = $result->fetch_assoc();
                if (password_verify($password, $user['password'])) {
                    return $user;
                }
            }
            return null;
        }
    
        public function changePassword ($userId, $newPassword ) {
            $hashed = password_hash($newPassword, PASSWORD_BCRYPT);
            $sql = "UPDATE users SET password='$hashed' WHERE id='$userId'";
            return $this->conn->query($sql);
        }
    }
?>