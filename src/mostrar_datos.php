<?php
require_once 'clases/RepositorioMostrarDatos.php';
require_once 'clases/ImprimirDatos.php';

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
</body>
</html>

