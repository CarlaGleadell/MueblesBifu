<?php
include_once '../modelo/Mueble.Class.php';
$id = $_GET["id"];
$Mueble = new Mueble($id);
?>
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="../lib/bootstrap-4.1.1-dist/css/bootstrap.css" />
        <link rel="stylesheet" href="../lib/open-iconic-master/font/css/open-iconic-bootstrap.css" />
        <script type="text/javascript" src="../lib/JQuery/jquery-3.3.1.js"></script>
        <script type="text/javascript" src="../lib/bootstrap-4.1.1-dist/js/bootstrap.min.js"></script>
        <title> Modificar mueble</title>
    </head>
    <body>
        <?php include_once '../gui/header.html'; ?>
        <div class="container">
            <form action="mueble.modificar.procesar.php" method="post" enctype="multipart/form-data">
                <div class="card">
                    <div class="card-header">
                        <div style="background-color: rgba(255, 255, 255, 0.5); text-align: center; padding: 20px;">
                            <h3> <?= $Mueble->getId(); ?></h3>
                        </div>
                    </div>
                    <div class="card-body" style="position: relative;">
                        <a href="personas.curso.php?id=<?= $id; ?>">
                            <button type="button" class="btn btn-primary" style="position: absolute; top: 10px; right: 10px;">Ver preinscriptos</button>
                        </a>
                        <h4>Datos del curso</h4>
                        <div class="form-group">
                            <label for="inputNombre">Nombre</label>
                            <input type="text" name="nombre" class="form-control" id="inputNombre" value="<?= $Curso->getNombre(); ?>" placeholder="Ingrese el nombre del curso" required="">
                        </div>
                        <div class="form-group">
                            <label for="inputDescripcion">Descripcion</label>
                            <textarea type="text" name="descripcion" class="form-control" rows="3"  id="inputDescripcion" placeholder="Ingrese descripcion del curso" required=""><?= $Curso->getDescripcion(); ?></textarea>
                        </div>
                        <div class="form-group">
                            <label for="inputFechasDictado">Días y Horarios en que se dictará</label>
                            <input type="text" name="fechasDictado" class="form-control" value="<?= $Curso->getFechasDictado(); ?>" id="inputFechasDictado" placeholder="Ingrese días y horarios en que se dictará el curso" required="">
                        </div>
                        <div class="form-group">
                            <label for="inputLugar">Espacio de dictado</label>
                            <input type="text" name="lugar" class="form-control" value="<?= $Curso->getLugar(); ?>" id="inputLugar" placeholder="Ingrese la institucion, sector, aula en que se dictará el curso" required="">
                        </div>
                        <h4>Fechas de inscripción</h4>
                        <div class="form-group">
                            <label for="inputMail">Inicio de las inscripciones</label>
                            <input type="date" name="fechaInicioInscripcion" class="form-control" value="<?= $Curso->getFechaInicioInscripcion(); ?>" id="inputMail" placeholder="Ingrese el email del Instructor a cargo de dictar el curso" required="">
                        </div>
                        <div class="form-group">
                            <label for="inputMail">Cierre de las inscripciones</label>
                            <input type="date" name="fechaFinInscripcion" class="form-control" value="<?= $Curso->getFechaFinInscripcion(); ?>" id="inputMail" placeholder="Ingrese el email del Instructor a cargo de dictar el curso" required="">
                        </div>
                        <input type="hidden" name="id" class="form-control" id="id" value="<?= $Curso->getId(); ?>" >
                        <hr />
                        <h4>Imagen del curso </h4>
                        <div style="display:flex;">
                        <img src="<?= $imagen ?>" style="width:50%;">
                        </div>
                        
                        <div class="form-group">
                            <label for="inputImagen">Seleccione un archivo en caso de querer cambiar la imagen del curso (opcional)</label>
                            <input type="file" name="imagen" class="form-control" id="inputImagen" >
                        </div>
                    </div>
                    
                    <div class="card-footer" style="display: flex; justify-content: space-between;">
                        <div style="display:flex;">
                            <button type="submit" class="btn btn-outline-success" style="margin-right: 10px;">
                                <span class="oi oi-check"></span> Confirmar
                            </button>
                            <a href="index_2.php">
                                <button type="button" class="btn btn-outline-danger">
                                    <span class="oi oi-x"></span> Cancelar
                                </button>
                            </a>
                        </div> 
                        <a href="integrantes.curso.php?id=<?= $Curso->getId(); ?>"  >
                            <button type="button" class="btn btn-outline-primary">
                                Gestionar Integrantes
                            </button>
                        </a>
                    </div>
                </div>
            </form>
        </div>
        <?php include_once '../gui/footer.php'; ?>
    </body>
</html>
