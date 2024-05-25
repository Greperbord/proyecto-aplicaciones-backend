<?php  // controllers/UserController.php
    require_once '../backend/controllers/UserController.php';
    require_once '../backend/controllers/AutoController.php';
    require_once '../backend/controllers/ReservaController.php';

    $userController = new UserController();
    $autoController = new AutoController();
    $reservaController = new ReservaController();

    switch ($_SERVER["REQUEST_METHOD"]) {
        case 'POST':
            $accion = $_POST['accion'];
            if ($accion == 'registrar') {
                $userController->registrar();
            } else if ($accion == 'login') {
                $userController->login();
            } else if ($accion == 'actualizar') {
                $idUser = $_POST['idUpdate'];
                $userController->obtenerUsuarioPorId($idUser);
            } else if ($accion == 'borrar') {
                $idUser = $_POST['id'];
                $userController->borrarUsuario($idUser);
            } else if ($accion == 'actualizarUsuario') {
                $idUser = $_POST['id'];
                $userController->actualizarUsuario($idUser);
            } else if ($accion == 'insertarReservacion') {
                $reservaController->insertarReservacion();
            } else if ($accion == 'actualizarEstadoAuto') {
                $autoController->actualizarEstadoAuto();
            } else if ($accion == 'actualizarEstadoReservacion') {
                $reservaController->arctualizarEstadoReservacion();
            }
        break;
        
        case 'GET': 
            $accion = $_GET['accion'];
            if ($accion == 'todos') {
                $userController->obtenerTodosUsuarios();
            } else if ($accion == 'autos') {
                $autoController->obtenerTodosAutos();
            } elseif ($accion == 'reservaciones') {
                $reservaController->obtenerReservaciones();
            }
        break;
    }
?>