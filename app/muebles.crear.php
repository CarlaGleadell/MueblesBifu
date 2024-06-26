<?php
include_once '../modelo/MuebleMapper.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $ancho = $_POST['ancho'];
    $largo = $_POST['largo'];
    $muebleMapper = new MuebleMapper();
    $muebleMapper->crearMueble($ancho, $largo);

    header("Location: ../index.php");
    exit;
}
?>
<html>
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../lib/bootstrap-4.1.1-dist/css/bootstrap.css" />
    <link rel="stylesheet" href="../lib/open-iconic-master/font/css/open-iconic-bootstrap.css" />
    <link rel="stylesheet" href="../css/styles.css">
    <script type="text/javascript" src="../lib/JQuery/jquery-3.3.1.js"></script>
    <script type="text/javascript" src="../lib/bootstrap-4.1.1-dist/js/bootstrap.min.js"></script>
    <title>Cargar Mueble</title>
</head>
<body>
    <div class="container">
        <form action="" method="post">
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
                        <a href="../index.php">
                            <button type="button" class="btn btn-outline-danger">
                                <span class="oi oi-x"></span> Cancelar
                            </button>
                        </a>
                    </div>
                </div>
            </div>
        </form>
    </div>
</body>
</html>
