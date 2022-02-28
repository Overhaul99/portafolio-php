<?php

session_start();

if($_POST) {
    if( (strtolower($_POST['usuario']) == "overhaul") && (strtolower($_POST['password']) == "luis120599") ) {
        $_SESSION['usuario'] = "overhaul";

        header("location: index.php");

    } else {
        echo "<script> alert('Usuario o contraseña incorrecta'); </script>";
    }
}

?>

<!doctype html>
<html lang="en">
    <head>
        <title>Login</title>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Bootstrap CSS v5.0.2 -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"  integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    </head>
    <body>

    <div class="container mt-4">
        <div class="row">
            <div class="col-md-4"></div>
            <div class="col-md-4">

                <div class="card">
                    <div class="card-header text-center">
                        Iniciar Sesión
                    </div>
                    <div class="card-body">
                        <form action="login.php" method="post">
                            <div class="mb-3">
                                <label for="usuario" class="form-label">Usuario:</label>
                                <input class="form-control" type="text" name="usuario" id="usuario" placeholder="Tu Usuario">
                            </div>

                            <div class="mb-3">
                                <label for="password" class="form-label">Contraseña:</label>
                                <input class="form-control" type="password" name="password" id="password" placeholder="Tu Contraseña">
                            </div>

                            <button class="btn btn-success" type="submit">Iniciar Sesión</button>
                        </form>
                    </div>
                </div>

            </div>
            <div class="col-md-4"></div>
        </div>

    </div>

    </body>
</html>