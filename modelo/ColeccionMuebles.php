<?php
include_once 'Mueble.Class.php';

class ColeccionMuebles{

    private $mueble;
       
    function __construct() {
        parent::__construct();
        $this->setColeccion("mueble","Mueble");
        $this->mueble = $this->coleccion;
    }
    
     /**
     * 
     * @return array()
     */
    function getMuebles() {
        return $this->mueble;
    }
}


