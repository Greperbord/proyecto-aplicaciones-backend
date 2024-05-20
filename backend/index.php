<?php  // controllers/UserController.php
    require_once '../backend/controllers/UserController.php';

    $userController = new UserController();

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
            }

        break;
        case 'GET': 
            $accion = $_GET['accion'];
            if ($accion == 'todos') {
                $userController->obtenerTodosUsuarios();
            }
        break;
    }
?>