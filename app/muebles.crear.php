<?php
include_once '../modelo/ColeccionMuebles.php';
$Muebles = new ColeccionMuebles();
?>
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="../lib/bootstrap-4.1.1-dist/css/bootstrap.css" />
        <link rel="stylesheet" href="../lib/open-iconic-master/font/css/open-iconic-bootstrap.css" />
        <script type="text/javascript" src="../lib/JQuery/jquery-3.3.1.js"></script>
        <script type="text/javascript" src="../lib/bootstrap-4.1.1-dist/js/bootstrap.min.js"></script>
        <title><?= Constantes::NOMBRE_SISTEMA; ?> - Cargar Mueble</title>
    </head>
    <body>
        <?php include_once '../gui/header.php'; ?>
        <div class="container">
            <form action="muebles.crear.procesar.php" method="post" enctype="multipart/form-data">
                <div class="card">
                    <div class="card-header">
                        <h3>Cargar mueble</h3>
                    </div>
                    <div class="card-body">
                        <h4>Datos del mueble</h4>
                        <div class="form-group">
                            <label for="inputAncho">Ancho</label>
                            <input type="text" name="ancho" class="form-control" id="inputAncho" placeholder="Ingrese el ancho del mueble" required="">
                        </div>  
                        <div class="form-group">
                            <label for="inputLargo">Largo</label>
                            <input type="text" name="largo" class="form-control" id="inputLargo" placeholder="Ingrese el largo del mueble" required="">
                        </div> 
                    </div>
                    <div class="card-footer" style="display: flex; justify-content: space-between;">
                        <div style="display:flex;">
                            <button type="submit" class="btn btn-outline-success" style="margin-right: 10px;">
                                <span class="oi oi-check"></span> Confirmar
                            </button>
                            <a href="inicio.php">
                                <button type="button" class="btn btn-outline-danger">
                                    <span class="oi oi-x"></span> Cancelar
                                </button>
                            </a>
                        </div>
                       
                    </div>
                </div>
            </form>
        </div>
        <?php include_once '../gui/footer.php'; ?>
    </body>
</html>
