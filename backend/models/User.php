<?php
    class User {
        private $usu_id;
        private $nombre;
        private $apaterno;
        private $amaterno;
        private $direccion;
        private $telefono;
        private $correo;
        private $usuario;
        private $password;

        //Creacion del contructor
        public function __construct ($nombre, $apaterno, $amaterno, $direccion, $telefono, $correo, $usuario, $password) {
            $this->nombre = $nombre;
            $this->apaterno = $apaterno;
            $this->amaterno = $amaterno;
            $this->direccion = $direccion;
            $this->telefono = $telefono;
            $this->correo = $correo;
            $this->usuario = $usuario;
            $this->password = $password;
        }

        // Getters y Setters para cada una de las propiedades
        public function getUsuId() {
            return $this->usu_id;
        }

        public function setUsuId ($usu_id) {
            $this->usu_id = $usu_id;
        }

        public function getNombre() {
            return $this->nombre;
        }

        public function setNombre ($nombre) {
            $this->nombre = $nombre;
        }

        public function getApaterno() {
            return $this->apaterno;
        }

        public function setApaterno ($apaterno) {
            $this->apaterno = $apaterno;
        }

        public function getAmaterno() {
            return $this->amaterno;
        }

        public function setAmaterno ($amaterno) {
            $this->amaterno = $amaterno;
        }

        public function getDireccion() {
            return $this->direccion;
        }

        public function setDireccion ($direccion) {
            $this->direccion = $direccion;
        }

        public function getTelefono() {
            return $this->telefono;
        }

        public function setTelefono ($telefono) {
            $this->telefono = $telefono;
        }

        public function getCorreo() {
            return $this->correo;
        }

        public function setCorreo ($correo) {
            $this->correo = $correo;
        }

        public function getUsuario() {
            return $this->usuario;
        }

        public function setUsuario ($usuario) {
            $this->usuario = $usuario;
        }

        public function getPassword() {
            return $this->password;
        }

        public function setPassword ($password) {
            $this->password = $password;
        }
    }

?>