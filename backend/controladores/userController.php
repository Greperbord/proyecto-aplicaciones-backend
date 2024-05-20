<?php
    require_once '../backend/models/userModel.php';

    class userController {
        private $userModel;

        public function __construct ($conn) {
            $this->userModel = new UserModel($conn);
        }

        public function createUser ($username, $email, $password) {
            return $this->userModel->createUser($username, $email, $password);
        }

        public function login ($email, $password) {
            return $this->userModel->login($email, $password);
        }

        public function changePassword ($userId, $newPassword) {
            return $this->userModel->changePassword($userId, $email, $newPassword);
        }
    }
?>