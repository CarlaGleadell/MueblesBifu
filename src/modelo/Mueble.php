<?php
namespace Modelo;

class Mueble {

    protected $id;
    protected $ancho;
    protected $largo;
    protected $medida;
      
    public function __construct($id, $ancho, $largo, $medida) {
        $this->id = $id;
        $this->ancho = $ancho;
        $this->largo = $largo;
        $this->medida = $medida;
    }

    function getId() {
        return $this->id;
    }

    function setId($id){
        $this->id = $id;
    }

    function getAncho() {
        return $this->ancho;
    }

    function setAncho($ancho) {
        $this->ancho = $ancho;
    }

    function getLargo() {
        return $this->largo;
    }

    function setLargo($largo) {
        $this->largo = $largo;
    }

    function getMedida() {
        return $this->medida;
    }

    function setMedida($medida) {
        $this->medida = $medida;
    }

}