<?php
include_once '../modelo/ColeccionMuebles.php';
$ColeccionMuebles = new ColeccionMuebles();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../lib/bootstrap-4.1.1-dist/css/bootstrap.css" />
    <link rel="stylesheet" href="../css/styles.css">
    <link rel="stylesheet" href="../lib/open-iconic-master/font/css/open-iconic-bootstrap.css" />
    <script type="text/javascript" src="../lib/JQuery/jquery-3.3.1.js"></script>
    <script type="text/javascript" src="../lib/bootstrap-4.1.1-dist/js/bootstrap.min.js"></script>        
    <title>Muebles</title>
</head>
<body>
    <?php include_once '../gui/header.html'; ?>

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
                    <thead class="table-info">
                        <tr>
                            <th>ID Mueble</th>
                            <th>Ancho</th>
                            <th>Largo</th>
                            <th>Opciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($ColeccionMuebles->getMuebles() as $Mueble) { ?>
                            <tr>
                                <td><?= $Mueble->getId(); ?></td>
                                <td><?= $Mueble->getAncho(); ?></td>
                                <td><?= $Mueble->getLargo(); ?></td>
                                <td style="width: 20%">
                                    <a title="Modificar" href="mueble.modificar.php?id=<?= $Mueble->getId(); ?>">
                                        <button type="button" class="btn btn-outline-warning">
                                            <span class="oi oi-pencil"></span>
                                        </button>
                                    </a>
                                    <a title="Eliminar" href="mueble.eliminar.php?id=<?= $Mueble->getId(); ?>">
                                        <button type="button" class="btn btn-outline-danger">
                                            <span class="oi oi-trash"></span>
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
    
    <?php include_once '../gui/footer.html'; ?>
</body>
</html>
