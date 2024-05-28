<?php
include_once 'BDColeccionGenerica.Class.php';
include_once 'Mueble.Class.php';

class ColeccionMuebles extends BDColeccionGenerica{

    private $mueble;
       
    function __construct() {
        parent::__construct();
        $this->setColeccion("mueble","Mueble");
        $this->mueble = $this->coleccion;

        
    }
    
    function getMuebles() {
        return $this->mueble;
    }
}


