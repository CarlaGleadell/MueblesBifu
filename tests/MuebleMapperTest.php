<?php
namespace TestMapper;

require_once __DIR__ . '/../vendor/autoload.php';

use PDOException;
use Modelo\MuebleMapper;
use Modelo\BDConexion;
use PHPUnit\Framework\TestCase;

class MuebleMapperTest extends TestCase {

    private $muebleMapper;
    private $conexionMock;

    protected function setUp(): void {
        $this->conexionMock = $this->getMockBuilder(BDConexion::class)
                                   ->disableOriginalConstructor()
                                   ->getMock();

        $this->muebleMapper = new MuebleMapper($this->conexionMock);
    }

    public function testCrearMueble() {
        $ancho = 10;
        $largo = 20;
        $medida = $ancho * $largo;

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

        $this->muebleMapper->crearMueble($ancho, $largo);
        
        $this->assertTrue(true);
    }
}
