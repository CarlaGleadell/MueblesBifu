<?php
include_once '../modelo/BDConexion.Class.php';
$DatosFormulario = $_POST;
$idMueble = $DatosFormulario["id"];
BDConexion::getInstancia()->autocommit(false);
BDConexion::getInstancia()->begin_transaction();

?>
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="../lib/bootstrap-4.1.1-dist/css/bootstrap.css" />
        <link rel="stylesheet" href="../lib/open-iconic-master/font/css/open-iconic-bootstrap.css" />
        <link rel="stylesheet" href="../css/styles.css">
        <script type="text/javascript" src="../lib/JQuery/jquery-3.3.1.js"></script>
        <script type="text/javascript" src="../lib/bootstrap-4.1.1-dist/js/bootstrap.min.js"></script>
        <title> Modificar mueble</title>

<?php
$medida = $DatosFormulario["ancho"] * $DatosFormulario["largo"];
$query = "UPDATE mueblesbifu.mueble 
SET ancho = '{$DatosFormulario["ancho"]}', largo = '{$DatosFormulario["largo"]}',  medida = '$medida'  
WHERE id = {$idMueble}";
$consulta = BDConexion::getInstancia()->query($query);
if (!$consulta) {
    BDConexion::getInstancia()->rollback();
    die(BDConexion::getInstancia()->errno);
}


BDConexion::getInstancia()->commit();
BDConexion::getInstancia()->autocommit(true);


?>

    </head>
    <body>
        <?php include_once '../gui/header.html'; ?>

        <div class="container">
            <p></p>
            <div class="card">
                <div class="card-header">
                    <h3>Modificar mueble</h3>
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
                    <h5 class="card-text">Opciones</h5>
                    <a href="muebles.php">
                        <button type="button" class="btn btn-primary">
                            <span class="oi oi-account-logout"></span> Salir
                        </button>
                    </a>
                </div>
            </div>
        </div>
        <?php include_once '../gui/footer.html'; ?>

    </body>
</html>
