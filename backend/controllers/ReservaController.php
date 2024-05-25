<?php 
    require_once '../backend/services/ReservaService.php';
    require_once '../backend/db/Database.php';

    class ReservaController {
        private $reservaService;

        public function __construct() {
            $db = (new Database())->getConnection();
            $this->reservaService = new ReservaService($db);
        }

        public function insertarReservacion () {
            $usu_id = $_POST['usu_id'];
            $aut_id = $_POST['aut_id'];
            $fecha_recoger = $_POST['res_fecha_recoger'];
            $fecha_entrega = $_POST['res_fecha_entrega'];
            $precio = $_POST['res_precio'];
            $estado = $_POST['res_estado'];

            $reservacion = new Reservas($usu_id, $aut_id, $fecha_recoger, $fecha_entrega, $precio, $estado);
            
            $resultado = $this->reservaService->insertarReservacion($reservacion);

            if ($resultado) {
                echo json_encode(array("success" => true, "message" => "Reservacion Registrada Correctamente"));
            } else {
                echo json_encode(array("success" => false, "message" => "Error al Registrar la Reservacion"));
            }
        }

        public function obtenerReservaciones() {
            $reservaciones = $this->reservaService->obtenerReservaciones();
            if ($reservaciones !== null) {
                echo json_encode(array("success" => true, "reservaciones" => $reservaciones));
            } else {
                echo json_encode(array("success" => false, "message" => "Error al Obtener las Reservaciones"));
            }
        }

        public function arctualizarEstadoReservacion() {
            $res_id = $_POST['res_id'];
            $estado = $_POST['res_estado'];

            $resultado = $this->reservaService->actualizarEstadoReservacion($res_id, $estado);

            if ($resultado) {
                echo json_encode(array("success" => true, "message" => "Estado de la Reservacion Actualizado Correctamente"));
            } else {
                echo json_encode(array("success" => false, "message" => "Error al Actualizar el Estado de la Reservacion"));
            }
        }
    
    }
?>