<?php
    class Reservas {
        private $res_id;
        private $usu_id;
        private $aut_id;
        private $fecha_recoger;
        private $fecha_entrega;
        private $precio;
        private $estado;

        public function __construct($usu_id, $aut_id, $fecha_recoger, $fecha_entrega, $precio, $estado)
        {
            
            $this->usu_id = $usu_id;
            $this->aut_id = $aut_id;
            $this->fecha_recoger = $fecha_recoger;
            $this->fecha_entrega = $fecha_entrega;
            $this->precio = $precio;
            $this->estado = $estado;
        }

        public function getResId () {
            return $this->res_id;
        }

        public function setResId ($res_id) {
            $this->res_id = $res_id;
        }

        public function getUsuId() {
            return $this->usu_id;
        }

        public function setUsuId ($usu_id) {
            $this->usu_id = $usu_id;
        }

        public function getAutId () {
            return $this->aut_id;
        }

        public function setAutId ($aut_id) {
            $this->aut_id = $aut_id;
        }

        public function getFechaRecoger () {
            return $this->fecha_recoger;
        }

        public function setFechaRecoger ($fecha_recoger) {
            $this->fecha_recoger = $fecha_recoger;
        }

        public function getFechaEntrega () {
            return $this->fecha_entrega;
        }

        public function setFechaEntrega ($fecha_entrega) {
            $this->fecha_entrega = $fecha_entrega;
        } 

        public function getPrecio () {
            return $this->precio;
        }

        public function setPrecio ($precio) {
            $this->precio = $precio;
        }

        public function getEstado () {
            return $this->estado;
        }

        public function setEstado ($estado) {
            $this->estado = $estado;
        } 
    }
?>