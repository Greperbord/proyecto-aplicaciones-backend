<?php
    require_once '../backend/services/AutoService.php';
    require_once '../backend/db/Database.php';

    class AutoController {
        private $autoService;

        public function __construct() {
            $db = (new Database())->getConnection();
            $this->autoService = new AutoService($db);
        }

        public function obtenerTodosAutos() {
            $autos = $this->autoService->obtenerTodosAutos();
            if ($autos) {
                echo json_encode(array("success" => true, "autos" => $autos));
            } else {
                echo json_encode(array("success" => false, "message" => "Error al Obtener los Autos"));
            }
        }

        public function actualizarEstadoAuto() {
            $aut_id = $_POST['aut_id'];
            $estado = $_POST['aut_estado'];

            $resultado = $this->autoService->actualizarEstadoAuto($aut_id, $estado);

            if ($resultado) {
                echo json_encode(array("success" => true, "message" => "Estado del Auto Actualizado Correctamente"));
            } else {
                echo json_encode(array("success" => false, "message" => "Error al Actualizar el Estado del Auto"));
            }
        }
    }
?>