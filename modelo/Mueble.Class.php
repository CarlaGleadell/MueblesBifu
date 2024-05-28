<?php
include_once 'BDModeloGenerico.Class.php';
class Curso {

    protected $id;
    protected $ancho;
    protected $largo;
    protected $medida;
      
    function __construct($id = NULL) {
        parent::__construct($id, "Mueble");
    }

    function getId() {
        return $this->id;
    }

    function setId($id) {
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

    function __construct($id, $nombreTabla) {
        
        parent::__construct();
        $this->id = $id ? : $this->id;
        $this->query = "SELECT * FROM {$nombreTabla} WHERE id = {$this->id}";
        
        $this->datos = BDConexion::getInstancia()->query($this->query);
        $this->datos = $this->datos->fetch_assoc();
        
        foreach($this->datos as $atributo => $valor){
            $this->{$atributo} = $valor;
        }
        
        unset($this->query);
        unset($this->datos);
        
    }

    function setColeccionElementos($tablaVinculacion, $tablaElementos, $idObjetoContenedor, $atributoFKElementoColeccion, $claseElementoColeccion) {

        $this->coleccionElementos = null;
      
        $this->query = "SELECT TablaElementos.* "
                . "FROM {$tablaElementos} TablaElementos, {$tablaVinculacion} TablaFK "
                . "WHERE TablaElementos.id = TablaFK.{$atributoFKElementoColeccion} "
                . "AND TablaFK.{$idObjetoContenedor} = {$this->id}";

        $this->datos = BDConexion::getInstancia()->query($this->query);
        if(!$this->datos) {
            print_r($this->BD->error);
        }
        for ($x = 0; $x < $this->datos->num_rows; $x++) {
            $this->coleccionElementos[] = $this->datos->fetch_object($claseElementoColeccion);
        }

        unset($this->query);
        unset($this->datos);
    }
    
    function getColeccionElementos() {
        return $this->coleccionElementos;
    }

}