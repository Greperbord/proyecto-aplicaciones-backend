<?php
    require_once '../backend/config/config.php';

    class Database {
        private $conn;

        public function __construct () {
            $this->conn = new mysqli('localhost:8889', 'root', 'root', 'proyecto');

            if ($this->conn->connect_error) {
                die('Error de Conexion' . $this->conn->connect_error);
            }
        }

        public function getConnection () {
            return $this->conn;
        }
    }
?>
