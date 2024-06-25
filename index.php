<?php
require_once __DIR__ . '../vendor/autoload.php';
use Modelo\MuebleMapper;
$muebleMapper = new MuebleMapper();
$muebles = $muebleMapper->getColeccionMuebles('mueble');
?>



<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="./lib/bootstrap-4.1.1-dist/css/bootstrap.css" />
    <link rel="stylesheet" href="./css/styles.css">
    <link rel="stylesheet" href="./lib/open-iconic-master/font/css/open-iconic-bootstrap.css" />
    <script type="text/javascript" src="./lib/JQuery/jquery-3.3.1.js"></script>
    <script type="text/javascript" src="./lib/bootstrap-4.1.1-dist/js/bootstrap.min.js"></script>
    <title>Muebles</title>
</head>
<body>
    <?php include_once './gui/header.html'; ?>

    <div class="container">
           <div class="card">
            <div class="card-header">
                <h3>Listado de muebles</h3>
            </div>
            <div class="card-body">
                <p>
                    <a href="./src/App/Mueble/crear.php">
                        <button type="button" class="btn btn-success">
                            <span class="oi oi-plus"></span> Nuevo mueble
                        </button>
                    </a>
                </p>
                <?php
                    if (isset($_GET['mensaje'])) {
                       $mensaje = $_GET['mensaje'];
                        echo '<div class="alert alert-success" role="alert">' . htmlspecialchars($mensaje) . '</div>';
                    }
                ?>
                <div class="table-responsive">
                <table class="table table-hover table-sm">
                    <thead class="table-info">
                        <tr>
                            <th>ID Mueble</th>
                            <th>Ancho</th>
                            <th>Largo</th>
                            <th>Opciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($muebles as $mueble) { ?>
                            <tr>
                                <td><?= $mueble->getId(); ?></td>
                                <td><?= $mueble->getAncho(); ?></td>
                                <td><?= $mueble->getLargo(); ?></td>
                                <td>
                                    <a title="Modificar" href="./src/App/Mueble/modificar.php?id=<?= $mueble->getId(); ?>">
                                        <button type="button" class="btn btn-outline-warning">
                                            <span class="oi oi-pencil"></span> Editar
                                        </button>
                                    </a>

                                    <a title="Eliminar" href="./src/App/Mueble/eliminar.php?id=<?= $mueble->getId(); ?>">
                                        <button type="button" class="btn btn-outline-danger">
                                            <span class="oi oi-trash"></span> Eliminar
                                        </button>
                                    </a>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    </div>
    
    <?php include_once './gui/footer.html'; ?>
</body>
</html>
