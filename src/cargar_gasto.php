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
    <?php include('navbar.php') ?>
    <div class="jumbotron text-center">
        <h1>Gastos del hogar</h1>
    </div>
    <?php
    if (isset($_GET['mensaje'])) {
        echo '<div id="mensaje" class="alert alert-primary text-center">
                    <p>' . $_GET['mensaje'] . '</p></div>';
    }
    ?>
    <div class="text-center">
        <h3>Cargar nuevo gasto</h3>
        <form action="cargar.php" method="post">
            <label for="monto">Monto</label>
            <input name="monto" class="form-control form-control-lg" placeholder="$999,99"><br>
            <label for="categoria">Categoria</label>
            <select name="categorias" class="form-control form-control-lg">
                <option value="1">Supermercado</option>
                <option value="2">Nafta</option>
                <option value="7">Perfumeria</option>
            </select><br>
            <p><a href="agregar_cat.php">Agregá una nueva categoria</a></p>
            <p><a href="eliminar_cat.php">Eliminá una categoria</a></p>
            <label for="fecha">Fecha</label>
            <input type="date" name="fecha" class="form-control form-control-lg" value=""><br>
            <label for="descripcion">Descripción</label>
            <input type="textarea" name="descripcion" class="form-control form-control-lg"
                placeholder="Compra en Coto"><br>
            <input type="submit" value="Guardar gasto" class="btn btn-primary">
        </form>
    </div>
</body>

</html>