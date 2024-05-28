<?php
include_once '../modelo/ColeccionMuebles.php';
$ColeccionMuebles = new ColeccionMuebles();
?>

<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="../lib/bootstrap-4.1.1-dist/css/bootstrap.css" />
        <link rel="stylesheet" href="../lib/open-iconic-master/font/css/open-iconic-bootstrap.css" />
        <script type="text/javascript" src="../lib/JQuery/jquery-3.3.1.js"></script>
        <script type="text/javascript" src="../lib/bootstrap-4.1.1-dist/js/bootstrap.min.js"></script>        
        <title><?= Constantes::NOMBRE_SISTEMA; ?> - Muebles</title>
    </head>
    <body>

        <?php include_once '../gui/header.php'; ?>

        <div class="container">

            <div class="card">
                <div class="card-header">
                    <h3>Muebles</h3>
                </div>
                <div class="card-body">
                    <p>
                        <a href="muebles.crear.php">
                        <button type="button" class="btn btn-success">
                            <span class="oi oi-plus"></span> Nuevo mueble
                        </button>
                    </a>
                    </p>

                    
                    <table class="table table-hover table-sm">
                        <tr class="table-info">
                            <th>Muebles cargados</th>
                            <th>Opciones</th>
                        </tr>
                        <tr>
                            <?php foreach ($ColeccionMuebles->getMuebles() as $Mueble) {
                                ?>
                                <td style="width: 80%"><?= $Mueble->getAncho(); ?><br /><?= $Mueble->getLargo(); ?></td>
                                <td  style="width: 20%">
                                    <a title="Ver detalle" href="mueble.ver.php?id=<?= $Mueble->getId(); ?>">
                                        <button type="button" class="btn btn-outline-info">
                                            <span class="oi oi-zoom-in"></span>
                                        </button></a>
                                    <a title="Modificar" href="mueble.modificar.php?id=<?= $Mueble->getId(); ?>">
                                        <button type="button" class="btn btn-outline-warning">
                                            <span class="oi oi-pencil"></span>
                                        </button></a>
                                    <a title="Eliminar" href="mueble.eliminar.php?id=<?= $Mueble->getId(); ?>">
                                        <button type="button" class="btn btn-outline-danger">
                                            <span class="oi oi-trash"></span>
                                        </button></a>
                                </td>
                            </tr>
                        <?php } ?>
                    </table>
                </div>
            </div>
        </div>
        <?php include_once '../gui/footer.php'; ?>
    </body>
</html>


