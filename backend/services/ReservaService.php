<?php
    require_once '../backend/models/Reservas.php';

    class ReservaService {
        private $db;

        public function __construct($db){
            $this->db = $db;
        }

        public function insertarReservacion($reservacion) {
            $sql = "INSERT INTO reservas (usu_id, aut_id, res_fecha_recoger, res_fecha_entrega, res_precio, res_estado)
                VALUES (?, ?, ?, ?, ?, ?)"; //se usa ? para evitar la SQL INJECTION
            $stmt = $this->db->prepare($sql);

            $usu_id = $reservacion->getUsuId();
            $aut_id = $reservacion->getAutId();
            $fecha_recoger = $reservacion->getFechaRecoger();
            $fecha_entrega = $reservacion->getFechaEntrega();
            $precio = $reservacion->getPrecio();
            $estado = $reservacion->getEstado();

            //Aqui la i: hace referencia a un entero
            //Aqui la s: hace referencia a una cadena (es considerada una cadena el tipo date)
            //Aqui la d: hace referencia a doble
            $stmt->bind_param("iissds", $usu_id, $aut_id, $fecha_recoger, $fecha_entrega, $precio, $estado);
            
            return $stmt->execute();
        }

        public function obtenerReservaciones() {
            $sql = "SELECT * FROM reservas";
            $result = $this->db->query($sql);
            $reservaciones = array();

            if ($result->num_rows > 0 ) {
                while ($row = $result->fetch_assoc()) {
                    $reservaciones[] = $row;
                }
            }
            return $reservaciones;
        }

        public function actualizarEstadoReservacion ($res_id, $estado) {
            $sql = "UPDATE reservas SET res_estado = ? WHERE res_id = ?";
            $stmt = $this->db->prepare($sql);
            $stmt->bind_param("si", $estado, $res_id);
            return $stmt->execute();
        }
    }

?>