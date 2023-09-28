<?php
require_once 'clases/RepositorioMostrarDatos.php';
require_once 'clases/ImprimirDatos.php';
require_once 'clases/RepositorioGastos.php';

$bd = new RepositorioMostrarDatos();

$mostrar_datos = new ImprimirDatos($bd);
?>


<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
        <meta name="viewport" content="width=device-width">
        <title>Mostrar Gastos</title>
        <link rel="stylesheet" href="bootstrap.min.css">
</head>
<body>

<div><?php $mostrar_datos->mostrarTabla('gastos');?></div>

<form action="delete_gastos.php" method="post">
            <label for="gasto">Escriba el ID del gasto para <strong>eliminarlo</strong> : </label><br>
            <input name="gasto" class="form-control form-control-lg" placeholder="ID Gasto"><br>
            <input type="submit" value="Eliminar usuario" class="btn btn-primary">
            </form>
</body>
</html>

