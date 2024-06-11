<?php
namespace App\Mueble;
require_once __DIR__ . '/../../../vendor/autoload.php';
use Modelo\MuebleMapper;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $ancho = $_POST['ancho'];
    $largo = $_POST['largo'];
    $muebleMapper = new MuebleMapper();
    $muebleMapper->modificarMueble($id, $ancho, $largo);

    header("Location: ../muebles.php");
    exit;
}

$id = $_GET["id"];
$muebleMapper = new MuebleMapper();
$Mueble = $muebleMapper->buscarMueble($id);

?>
<html>
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../../../lib/bootstrap-4.1.1-dist/css/bootstrap.css" />
    <link rel="stylesheet" href="../../../lib/open-iconic-master/font/css/open-iconic-bootstrap.css" />
    <link rel="stylesheet" href="../../../css/styles.css">
    <script type="text/javascript" src="../../../lib/JQuery/jquery-3.3.1.js"></script>
    <script type="text/javascript" src="../../../lib/bootstrap-4.1.1-dist/js/bootstrap.min.js"></script>
    <title>Modificar mueble</title>
</head>
<body>
    <?php include_once '../../../gui/header.html'; ?>
    <div class="container">
        <form action="" method="post">
            <div class="card">
                <div class="card-header">
                    <div style="background-color: rgba(255, 255, 255, 0.5); text-align: center; padding: 20px;">
                        <h3>Mueble <?= $Mueble->getId(); ?></h3>
                    </div>
                </div>
                <div class="card-body" style="position: relative;">
                    <h4>Datos del mueble</h4>
                    <div class="form-group">
                        <label for="inputAncho">Ancho</label>
                        <input type="text" name="ancho" class="form-control" id="inputAncho" value="<?= $Mueble->getAncho(); ?>" placeholder="Ingrese el ancho del mueble" required="">
                    </div>
                    <div class="form-group">
                        <label for="inputLargo">Largo</label>
                        <input type="text" name="largo" class="form-control" id="inputLargo" value="<?= $Mueble->getLargo(); ?>" placeholder="Ingrese el largo del mueble" required="">
                    </div>
                    <input type="hidden" name="id" class="form-control" id="id" value="<?= $Mueble->getId(); ?>" >
                </div>
                <div class="card-footer" style="display: flex; justify-content: space-between;">
                    <div style="display:flex;">
                        <button type="submit" class="btn btn-outline-success" style="margin-right: 10px;">
                            <span class="oi oi-check"></span> Confirmar
                        </button>
                        <a href="../muebles.php">
                            <button type="button" class="btn btn-outline-danger">
                                <span class="oi oi-x"></span> Cancelar
                            </button>
                        </a>
                    </div> 
                </div>
            </div>
        </form>
    </div>
    <?php include_once '../../../gui/footer.html'; ?>
</body>
</html>
