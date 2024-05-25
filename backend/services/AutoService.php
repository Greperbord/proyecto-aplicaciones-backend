<?php
    require_once '../backend/models/Autos.php';

    class AutoService {
        private $db;
        public function __construct($db) {
            $this->db = $db;
        }

        //Aqui decidi que si se queria agregar un auto se hiciera directamente desde MAMP y no desde la pagina
        public function obtenerTodosAutos () {
            $sql = "SELECT * FROM autos";
            $result = $this->db->query($sql);
            $autos = array();

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $autos[] = $row;
                }
            }
            return $autos;
        }

        public function actualizarEstadoAuto($aut_id, $estado) {
            $sql = "UPDATE autos SET aut_estado = ? WHERE aut_id = ?";
            $stmt = $this->db->prepare($sql);
            $stmt->bind_param("si", $estado, $aut_id); //Ve el codigo reservaService para la explicacion de esto
            return $stmt->execute();
        }
    }


?>