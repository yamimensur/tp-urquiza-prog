<?php
require_once 'clases/Usuario.php';
require_once 'clases/Controlador.php';

// Validamos que el usuario tenga sesión iniciada:
session_start();
if (isset($_SESSION['usuario'])) {
    // Si es así, recuperamos la variable de sesión
    $usuario = unserialize($_SESSION['usuario']);
} else {
    // Si no, redirigimos al login
    header('Location: index.php');
}
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">
    <title>Bienvenido al sistema</title>
    <link rel="stylesheet" href="styles/bootstrap.min.css">
</head>

<body class="container">
    <div class="jumbotron text-center">
        <h1>Gastos del hogar</h1>
    </div>
    <div class="text-center">
        <h3>Eliminar categoria</h3>
        <form action="deleteCat.php" method="post">
            <label for="nombre">Ingrese el nombre de la categoria que desea eliminar</label>
            <input name="nombre" class="form-control form-control-lg" placeholder="Perfumeria"><br>
            <input type="submit" value="eliminar" class="btn btn-primary">
        </form>
    </div>
</body>

</html>