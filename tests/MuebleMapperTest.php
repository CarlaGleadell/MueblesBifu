<?php

use PHPUnit\Framework\TestCase;
use Modelo\MuebleMapper;
use Modelo\BDConexion;

class MuebleMapperTest extends TestCase {

    private $muebleMapper;
    private $conexionMock;

    protected function setUp(): void {
        // Crear un mock de BDConexion
        $this->conexionMock = $this->getMockBuilder(BDConexion::class)
                                   ->disableOriginalConstructor()
                                   ->getMock();

        // Inyectar el mock de BDConexion en MuebleMapper usando el constructor
        $this->muebleMapper = new MuebleMapper($this->conexionMock);
    }

    public function testCrearMueble() {
        $ancho = 10;
        $largo = 20;
        $medida = $ancho * $largo;

        // Configurar el mock para las interacciones esperadas
        $stmtMock = $this->createMock(\mysqli_stmt::class);
        $this->conexionMock->expects($this->once())
                           ->method('prepare')
                           ->with('INSERT INTO mueble (ancho, largo, medida) VALUES (?, ?, ?)')
                           ->willReturn($stmtMock);
        
        $stmtMock->expects($this->once())
                 ->method('bind_param')
                 ->with('ddi', $ancho, $largo, $medida);
        
        $stmtMock->expects($this->once())
                 ->method('execute')
                 ->willReturn(true);

        // Llamar al método que queremos probar
        $this->muebleMapper->crearMueble($ancho, $largo);
        
        // Agregar una aserción dummy para evitar pruebas arriesgadas
        $this->assertTrue(true);
    }
}
