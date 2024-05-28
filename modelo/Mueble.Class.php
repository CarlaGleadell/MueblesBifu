<?php
include_once 'BDObjetoGenerico.Class.php';
class Mueble extends BDObjetoGenerico{

    protected $id;
    protected $ancho;
    protected $largo;
    protected $medida;
      
    function __construct($id = NULL) {
        parent::__construct($id, "Mueble");
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