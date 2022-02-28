<?php include_once('cabecera.php'); ?>
<?php include_once('conexion.php'); ?>
<?php include_once('auth.php'); ?>

<?php

if($_POST) {

    // print_r($_POST);

    $nombre = $_POST['name'];
    $description = $_POST['description'];

    $fecha = new DateTime();

    $imagen = $fecha->getTimestamp()."_".$_FILES['file']['name'];

    $imagen_temporal = $_FILES['file']['tmp_name'];

    move_uploaded_file($imagen_temporal, "./images/". $imagen);

    $objConexion = new Conexion();

    $sql = "INSERT INTO proyectos (nombre, imagen, descripcion) VALUES ('$nombre', '$imagen', '$description')";

    $objConexion->ejecutar($sql);

    header("location: portafolio.php");

}

if($_GET) {
    $id = $_GET['borrar'];
    $objConexion = new Conexion();

    $imagen = $objConexion->consultar("SELECT imagen FROM proyectos WHERE id= $id");
    
    unlink("./images/".$imagen[0]['imagen']);

    $sql = "DELETE FROM proyectos WHERE id = ".$id;
    $objConexion->ejecutar($sql);

    header("location: portafolio.php");
}

$objConexion = new Conexion();
$proyectos = $objConexion->consultar("SELECT * FROM proyectos");

?>

    <div class="container">
        <div class="row">
            <div class="col-12 col-md-5 col-lg-4 mt-4">
                <div class="card">
                    <div class="card-header text-center">
                        Datos del Proyecto
                    </div>
                    <div class="card-body">
                        <form action="portafolio.php" method="post" enctype="multipart/form-data">
                            <div class="mb-3">
                                <label class="form-label" for="name">Nombre del proyecto:</label>
                                <input required type="text" class="form-control" name="name" id="name">
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="file">Imagen del proyecto:</label>
                                <input required type="file" class="form-control" name="file" id="file">
                            </div>
                            <div class="form-group mb-4">
                                <label for="textarea1">Descripción:</label>
                                <textarea required class="form-control" id="textarea1" rows="3" name="description"></textarea>
                            </div>
                            <div class="d-grid gap-2">
                                <input type="submit" class="btn btn-outline-primary btn-lg text-uppercase" value="Enviar">
                            </div>
                        </form>
                    </div>
                    <div class="card-footer text-muted text-center">
                        Sube tus proyectos realizados
                    </div>
                </div>
            </div>

            <div class="col-12 col-md-7 col-lg-8 mt-4">
                <table class="table table-dark table-striped">
                    <thead>
                        <tr>
                            <th>Id:</th>
                            <th>Nombre:</th>
                            <th>Imagen:</th>
                            <th>Descripción:</th>
                            <th>Acciones:</th>
                        </tr>
                    </thead>
                    <?php foreach($proyectos as $proyecto) { ?>
                    <tbody>
                        <tr>
                            <td><?php echo $proyecto['id']; ?></td>
                            <td><?php echo $proyecto['nombre']; ?> </td>
                            <td> <img width="100" class="rounded" src="./images/<?php echo $proyecto['imagen'] ; ?>" alt="Imagen Proyecto"> </td>
                            <td><?php echo $proyecto['descripcion']; ?> </td>
                            <td><a name="" class="btn btn-danger d-grid" href="?borrar=<?php echo $proyecto['id']; ?>">Eliminar</a></td>
                        </tr>
                    </tbody>
                    <?php } ?>
                </table>
            </div>
        </div>
    </div>

<?php include_once('pie.php'); ?>