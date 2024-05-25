<?php
class Autos {
    private $aut_id;
    private $marca;
    private $modelo;
    private $placas;
    private $estado;   

    //Creacion del contructor
    public function __construct($marca, $modelo, $placas, $estado)
    {
        $this->marca = $marca;
        $this->modelo = $modelo;
        $this->placas = $placas;
        $this->estado =  $estado;
    }

    // Getters y Setters para cada una de las propiedades
    public function getAutId () {
        return $this->aut_id;
    }

    public function setAutId ($aut_id) {
        $this->aut_id = $aut_id;
    }

    public function getMarca () {
        return $this->marca;
   }

   public function setMarca ($marca) {
       $this->marca = $marca;
   }

   public function getModelo () {
    return $this->modelo;
  }

  public function setModelo ($modelo) {
    $this->modelo = $modelo;
  }

  public function getPlacas () {
       return $this->placas;
   }

  public function setPlacas ($placas) {
      $this->placas = $placas;
  }

  public function getEstado () {
    return $this->estado;
  }

  public function setEstado($estado) {
    $this->estado = $estado;
  }

}
?>