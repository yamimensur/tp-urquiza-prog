<?php

require_once 'clases/ImprimirDatos.php';
require_once 'clases/RepositorioGastos.php';
require_once 'clases/ImprimirInforme.php';

$bd = new RepositorioGastos();

$mostrar_datos = new ImprimirDatos($bd);
$mostrar_informe = new ImprimirInforme($bd);
?>


<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
        <meta name="viewport" content="width=device-width">
        <title>Mostrar Gastos</title>
        <link rel="stylesheet" href="bootstrap.min.css">
</head>
<body class="container">
<?php include('navbar.php') ?>
<?php
            if (isset($_GET['mensaje'])) {
                echo '<div id="mensaje" class="alert alert-primary text-center">
                    <p>'.$_GET['mensaje'].'</p></div>';
            }
        ?>
<div><?php $mostrar_datos->mostrarTabla('gastos');?></div>
<!-- Vamos a enviar por metodo post el ID del gasto para poder eliminarlo. -->
<form action="delete_gastos.php" method="post">
            <label for="gasto">Escriba el ID del gasto para <strong>eliminarlo</strong> : </label><br>
            <input name="gasto" class="form-control form-control-lg" placeholder="ID Gasto"><br>
            <input type="submit" value="Eliminar gasto" class="btn btn-primary">
            </form>


            <form action="filtrar_tabla.php" method="post">
            <label for="filtro">Buscar por <strong>categorias</strong> : </label><br>
            <input name="filtro" class="form-control form-control-lg" placeholder="Filtrar Gasto"><br>
            <input type="submit" value="Filtrar Gasto" class="btn btn-primary">
            </form>

        <button onclick="mostrarInforme()">Mostrar Informe</button>
        <div id="informe" style="display:none"> <?php $mostrar_informe->mostrarTabla('gastos');?></div>
        <script src="scripts/mostrarInforme.js"></script>
</body>
</html>

