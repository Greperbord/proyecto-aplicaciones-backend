<?php
    class UserModel {
        private $conn;

        public function __construct($conn) {
            $this->conn = $conn;
        }

        public function createUser ($usu_username, $usu_email, $usu_password) {
            $hashed = password_hash($usu_password, PASSWORD_BCRYPT);
            $sql = "INSERT INTO usuarios (usu_id, usu_username, usu_email, usu_password) 
                VALUES(null, '$usu_username', '$usu_email', '$hashed')";
            
            return $this->conn->query($sql);
        }
    
        public function login ($usu_email, $usu_password) {
            $sql = "SELECT * FROM usuarios WHERE usu_email='$usu_email'";
            $result = $this->conn->query($sql);
            if ($result->num_rows == 1) {
                $user = $result->fetch_assoc();
                if (password_verify($usu_password, $user['password'])) {
                    return $user;
                }
            }
            return null;
        }
    
        public function changePassword ($userId, $newPassword ) {
            $hashed = password_hash($newPassword, PASSWORD_BCRYPT);
            $sql = "UPDATE usuarios SET password='$hashed' WHERE usu_id='$userId'";
            return $this->conn->query($sql);
        }
    }
?>