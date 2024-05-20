<?php
    require_once '../backend/services/UserService.php';

    class userController {
        private $userService;

        public function __construct() {
            $db = (new Database())->getConnection();
            $this->userService = new UserService($db);
        }

        public function login() {
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $usuario = $_POST['usuario'];
                $password = $_POST['password'];
                
                if(!empty($usuario) && !empty($password)) {
                    $user = $this->userService->login($usuario, $password);
                    if ($user) {
                        // Redirigir a Otra Pagina
                        echo json_encode(array("success" => true,
                        "message" => "Inicio Satisfactorio"));
                    }
                    else {
                        echo json_encode(array("success" => false,
                        "message" => "Credenciales Incorrectas"));
                    }
                } else {
                    echo json_encode(array("success" => false,
                    "message" => "Faltan Datos"));
                }
            }
        }

        public function registrar() {
            $nombre = $_POST['nombre'];
            $apaterno = $_POST['apaterno'];
            $amaterno = $_POST['amaterno'];
            $direccion = $_POST['direccion'];
            $telefono = $_POST['telefono'];
            $correo = $_POST['correo'];
            $usuario = $_POST['usuario'];
            $password = $_POST['password'];
            $marca = $_POST['marca'];
            $placas = $_POST['placas'];
            $fecha_recoger = $_POST['fecha_recoger'];
            $fecha_entrega = $_POST['fecha_entrega'];


            $usuarioNuevo = new User($nombre, $apaterno, $amaterno, $direccion, $telefono, $correo, $usuario, $password, $marca, $placas, $fecha_recoger, $fecha_entrega);

            $resultado = $this->userService->registrarUsuario($usuarioNuevo);

            if ($resultado) {
                echo json_encode(array("success" => true, "message" => "Usuario Registrado Satisfactoriamente"));
            } else {
                echo json_encode(array("success" => false, "message" => "Error Al Registrar Usuario"));
            }
        }

        public function obtenerTodosUsuarios() {
            $users = $this->userService->obtenerTodosUsuarios();

            if ($users) {
                echo json_encode(array("success" => true, "users" => $users));
            } else {
                echo json_encode(array("success" => false, "message" => "Error al Obtener Usuarios"));
            }
        }

        public function borrarUsuario ($id) {
            error_log("ID del usuario a borrar: " . $id);
            $resultado = $this->userService->borrarUsuario($id);
            if ($resultado) {
                echo json_encode(array("success" => true, "message" => "Usuario Eliminado Correctamente"));
            } else {
                echo json_encode(array("success" => false, "message" => "Error al Borrar Usuario"));
            }
        }

        public function obtenerUsuarioPorId ($id) {
            error_log("ID del usuario a Actualizar: " . $id);
            $resultado = $this->userService->obtenerUsuarioPorId($id);
            if ($resultado) {
                echo json_encode(array("success" => true, "user" => $resultado));
            } else {
                echo json_encode(array("success" => false, "message" => "Error al Borrar Usuario"));
            }
        }

        public function actualizarUsuario ($id) {
            $nombre = $_POST['nombre'];
            $apaterno = $_POST['apaterno'];
            $amaterno = $_POST['amaterno'];
            $direccion = $_POST['direccion'];
            $telefono = $_POST['telefono'];
            $correo = $_POST['correo'];
            $usuario = $_POST['usuario'];
            $password = $_POST['password'];

            $usuarioNuevo = new User( $nombre, $apaterno, $amaterno, $direccion, $telefono, $correo, $usuario, $password);

            $resultado = $this->userService->actualizarUsuario($id, $usuarioNuevo);

            if ($resultado) {
                echo json_encode(array("success" => true, "message" => "Usuario Actualizado Satisfactoriamente"));
            } else {
                echo json_encode(array("success" => false, "message" => "Error Al Actualizar Usuario"));
            }
        }
    }
?>