<?php
include_once '../modelo/MuebleMapper.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $muebleMapper = new MuebleMapper();
    $muebleMapper->eliminarMueble($id);

    header("Location: ../index.php");
    exit;
}

$id = $_GET["id"];
$muebleMapper = new MuebleMapper();
$Mueble = $muebleMapper->buscarMueble($id);

if ($Mueble === null) {
    die("Mueble no encontrado");
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
    <title>Eliminar mueble</title>
</head>
<body>
    <div class="container">
        <form action="" method="post">
            <div class="card">
                <div class="card-header">
                    <h3>Eliminar mueble</h3>
                </div>
                <div class="card-body">
                    <p class="alert alert-warning ">
                        <span class="oi oi-warning"></span> ATENCIÓN. Esta operación no puede deshacerse.
                    </p>
                    <p>¿Está seguro que desea eliminar el mueble <b><?= $Mueble->getId(); ?></b>?</p>
                </div>
                <div class="card-footer">
                    <input type="hidden" name="id" class="form-control" id="id" value="<?= $Mueble->getId(); ?>" >
                    <button type="submit" class="btn btn-outline-success">
                        <span class="oi oi-check"></span> Sí, deseo eliminar
                    </button>
                    <a href="../index.php" class="btn btn-outline-danger">
                        <span class="oi oi-x"></span> NO (Salir de esta pantalla)
                    </a>
                </div>
            </div>
        </form>
    </div>
</body>
</html>
