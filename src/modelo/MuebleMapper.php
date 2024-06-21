<?php
namespace Modelo;

class MuebleMapper {

    private $query;
    private $datos;
    private $tablaBD = "mueble";
    private $conexion;

    public function __construct($conexion) {
        $this->conexion = $conexion;
    }

    function getColeccionMuebles($tablaBD) {
        $this->query = "SELECT * FROM {$tablaBD}";
        $this->datos = $this->conexion->query($this->query);
        if(!$this->datos) {
            print_r($this->conexion->error);
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
        $stmt = $this->conexion->prepare($query);
        $stmt->bind_param("ddi", $ancho, $largo, $medida);

        $this->conexion->autocommit(false);
        $this->conexion->begin_transaction();

        if (!$stmt->execute()) {
            $this->conexion->rollback();
            die($this->conexion->errno);
        }

        $this->conexion->commit();
        $this->conexion->autocommit(true);
    }

    function buscarMueble($id) {
        $query = "SELECT * FROM {$this->tablaBD} WHERE id = ?";
        $stmt = $this->conexion->prepare($query);
        $stmt->bind_param("i", $id);

        if (!$stmt->execute()) {
            die($this->conexion->errno);
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
        $stmt = $this->conexion->prepare($query);
        $stmt->bind_param("i", $id);

        $this->conexion->autocommit(false);
        $this->conexion->begin_transaction();

        if (!$stmt->execute()) {
            $this->conexion->rollback();
            die($this->conexion->errno);
        }

        $this->conexion->commit();
        $this->conexion->autocommit(true);
    }

    function modificarMueble($id, $ancho, $largo) {
        $medida = $ancho * $largo;
        $query = "UPDATE mueble SET ancho = ?, largo = ?, medida = ? WHERE id = ?";
        $stmt = $this->conexion->prepare($query);
        $stmt->bind_param("ddii", $ancho, $largo, $medida, $id);

        $this->conexion->autocommit(false);
        $this->conexion->begin_transaction();

        if (!$stmt->execute()) {
            $this->conexion->rollback();
            die($this->conexion->errno);
        }

        $this->conexion->commit();
        $this->conexion->autocommit(true);
    }
}
?>
