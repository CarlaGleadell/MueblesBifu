<?php
include_once 'BDConexion.Class.php';
include_once 'Mueble.Class.php';

class MuebleMapper {

    private $query;
    private $datos;
    private $tablaBD = "mueble";
    private $nombreClase;

    function getColeccionMuebles($tablaBD) {
        $this->query = "SELECT * FROM {$tablaBD}";
        $this->datos = BDConexion::getInstancia()->query($this->query);
        if(!$this->datos) {
            print_r(BDConexion::getInstancia()->error);
        }
        
        $coleccionMuebles = array(); 
        
        while ($row = $this->datos->fetch_assoc()) {
            $mueble = new Mueble($row['id'], $row['ancho'], $row['largo'], $row['medida']);
            $coleccionMuebles[] = $mueble; 
        }
        
        unset($this->query);
        unset($this->datos);
        return $coleccionMuebles; 
    }


    function crearMueble($ancho, $largo) {
        $medida = $ancho * $largo;
        $query = "INSERT INTO mueble (ancho, largo, medida) VALUES (?, ?, ?)";
        $stmt = BDConexion::getInstancia()->prepare($query);
        $stmt->bind_param("ddi", $ancho, $largo, $medida);

        BDConexion::getInstancia()->autocommit(false);
        BDConexion::getInstancia()->begin_transaction();

        if (!$stmt->execute()) {
            BDConexion::getInstancia()->rollback();
            die(BDConexion::getInstancia()->errno);
        }

        BDConexion::getInstancia()->commit();
        BDConexion::getInstancia()->autocommit(true);
    }

    function buscarMueble($id) {
        $query = "SELECT * FROM {$this->tablaBD} WHERE id = ?";
        $stmt = BDConexion::getInstancia()->prepare($query);
        $stmt->bind_param("i", $id);

        if (!$stmt->execute()) {
            die(BDConexion::getInstancia()->errno);
        }

        $result = $stmt->get_result();
        if ($result->num_rows === 0) {
            return null; 
        }

        $row = $result->fetch_assoc();
        $mueble = new Mueble($row['id'], $row['ancho'], $row['largo'], $row['medida']);

        $stmt->close();
        return $mueble;
    }

    function eliminarMueble($id) {
        $query = "DELETE FROM {$this->tablaBD} WHERE id = ?";
        $stmt = BDConexion::getInstancia()->prepare($query);
        $stmt->bind_param("i", $id);

        BDConexion::getInstancia()->autocommit(false);
        BDConexion::getInstancia()->begin_transaction();

        if (!$stmt->execute()) {
            BDConexion::getInstancia()->rollback();
            die(BDConexion::getInstancia()->errno);
        }

        BDConexion::getInstancia()->commit();
        BDConexion::getInstancia()->autocommit(true);
    }

    function modificarMueble($id, $ancho, $largo) {
        $medida = $ancho * $largo;
        $query = "UPDATE mueble SET ancho = ?, largo = ?, medida = ? WHERE id = ?";
        $stmt = BDConexion::getInstancia()->prepare($query);
        $stmt->bind_param("ddii", $ancho, $largo, $medida, $id);

        BDConexion::getInstancia()->autocommit(false);
        BDConexion::getInstancia()->begin_transaction();

        if (!$stmt->execute()) {
            BDConexion::getInstancia()->rollback();
            die(BDConexion::getInstancia()->errno);
        }

        BDConexion::getInstancia()->commit();
        BDConexion::getInstancia()->autocommit(true);
    }
}
?>
