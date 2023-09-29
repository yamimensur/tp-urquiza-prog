<?php
require_once 'clases/Usuario.php';

// Retomamos la sesión previamente iniciada, y recuperamos el objeto Usuario
// que contiene los datos del usuario autenticado:
session_start();
if (isset($_SESSION['usuario'])) {
    $usuario = unserialize($_SESSION['usuario']);
    $nomApe = $usuario->getNombreApellido();
} else {
    // Si no hay usuario autenticado, redirigimos al login.
    header('Location: index.php');
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width">
        <title>Gastos del hogar</title>
        <link rel="stylesheet" href="bootstrap.min.css">
    </head>
    <body class="container">
    <?php include('navbar.php') ?>
      <div class="jumbotron text-center">
      <h1>Gastos del hogar</h1>
      </div>
      <div class="text-center">
        <h3>Bienvenido <?php echo $nomApe;?></h3>

        <?php
            if (isset($_GET['mensaje'])) {
                echo '<div id="mensaje" class="alert alert-primary text-center">
                    <p>'.$_GET['mensaje'].'</p></div>';
            }
        ?>
        <p><a href="cargar_gasto.php">Cargar un nuevo gasto</a></p>
        <p><a href="datos_modificar.php">Modificar datos de mi usuario</a></p>
        <p><a href="confirmar_delete.php">Eliminar mi usuario</a></p>
        <p><a href="logout.php">Cerrar sesión</a></p>
        <p><a href="mostrar_datos.php">Mostra gastos</a></p>
      </div>
    </body>
</html>

