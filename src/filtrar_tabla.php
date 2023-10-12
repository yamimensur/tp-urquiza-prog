<?php
require_once 'clases/RepositorioGastos.php';
require_once 'clases/FiltrarTabla.php';

$filtro = $_POST['filtro'];
$bd = new RepositorioGastos();
$mostrar_datos = new FiltrarTabla($bd);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">
    <title>Mostrar Gastos</title>
    <link rel="stylesheet" href="styles/bootstrap.min.css">
    <link rel="stylesheet" href="styles/styles.css">    
</head>

<body class="fixed-background">
    <?php include('navbar.php') ?>
    <div class="container">
        <?php $mostrar_datos->filtrarCategoria($filtro);
        ?>
        <div class='d-flex flex-column'>
            <div class='p-2'><a href='mostrar_datos.php' class='boton404'>volver</a></div>
        </div>
    </div>
</body>

</html>