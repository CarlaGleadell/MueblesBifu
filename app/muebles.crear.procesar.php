<?php
include_once '../modelo/BDConexion.Class.php';
$DatosFormulario = $_POST;
BDConexion::getInstancia()->autocommit(false);
BDConexion::getInstancia()->begin_transaction();
?>
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="../lib/bootstrap-4.1.1-dist/css/bootstrap.css" />
        <link rel="stylesheet" href="../lib/open-iconic-master/font/css/open-iconic-bootstrap.css" />
        <script type="text/javascript" src="../lib/JQuery/jquery-3.3.1.js"></script>
        <script type="text/javascript" src="../lib/bootstrap-4.1.1-dist/js/bootstrap.min.js"></script>
        <title> Cargar mueble</title>
        
<?php 
    
    $query = "INSERT INTO muebles (id, ancho, largo, medida)"
            . "VALUES ( null,
            '{$DatosFormulario["ancho"]}',
            '{$DatosFormulario["largo"]}',
            null)";
    $consulta = BDConexion::getInstancia()->query($query);

    if (!$consulta) {
        BDConexion::getInstancia()->rollback();
        //arrojar una excepcion
        die(BDConexion::getInstancia()->errno);
    }

    BDConexion::getInstancia()->commit();
    BDConexion::getInstancia()->autocommit(true);

  
?>
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="../lib/bootstrap-4.1.1-dist/css/bootstrap.css" />
        <link rel="stylesheet" href="../lib/open-iconic-master/font/css/open-iconic-bootstrap.css" />
        <script type="text/javascript" src="../lib/JQuery/jquery-3.3.1.js"></script>
        <script type="text/javascript" src="../lib/bootstrap-4.1.1-dist/js/bootstrap.min.js"></script>
        <title><?= Constantes::NOMBRE_SISTEMA; ?> - Cargar mueble</title>
    </head>
    <body>
        <?php include_once '../gui/header.php'; ?>

        <div class="container">
            <p></p>
            <div class="card">
                <div class="card-header">
                    <h3>Cargar mueble</h3>
                </div>
                <div class="card-body">
                    <?php if ($consulta) { ?>
                        <div class="alert alert-success" role="alert">
                            Operaci&oacute;n realizada con &eacute;xito.
                        </div>
                    <?php } ?>   
                    <?php if (!$consulta) { ?>
                        <div class="alert alert-danger" role="alert">
                            Ha ocurrido un error.
                        </div>
                    <?php } ?>
                    <hr />
                </div>
            </div>
        </div>
        <?php include_once '../gui/footer.php'; ?>
    </body>
</html>
