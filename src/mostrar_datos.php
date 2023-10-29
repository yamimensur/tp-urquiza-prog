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
        <link rel="stylesheet" href="styles/bootstrap.min.css">
        <link rel="stylesheet" href="styles/styles.css">

        <link rel="stylesheet" href="styles/styles.css">
</head>

<body class="fixed-background">
        <?php include('navbar.php') ?>
        <div class="container">
        <div class="jumbotron text-center">
            <h1>Gastos del hogar</h1>
        </div>
                <?php
                if (isset($_GET['mensaje'])) {
                        echo '<div id="mensaje" class="alert alert-primary text-center">
                    <p>' . $_GET['mensaje'] . '</p></div>';
                }
                ?>
                <div>
                        <?php $mostrar_datos->mostrarTabla('gastos'); ?>
                </div>
                <!-- Vamos a enviar por metodo post el ID del gasto para poder eliminarlo. -->
                <form action="delete_gastos.php" method="post">
                        <label for="gasto">Escriba el ID del gasto para <strong>eliminarlo</strong> : </label><br>
                        <input name="gasto" class="form-control form-control-lg" placeholder="ID Gasto"><br>
                        <input type="submit" value="Eliminar gasto" class="btn btn-danger">
                </form>


                <form action="filtrar_tabla.php" method="post">
                        <label for="filtro">Buscar por <strong>categorias</strong> : </label><br>
                        <input name="filtro" class="form-control form-control-lg" placeholder="Filtrar Gasto"><br>
                        <input type="submit" value="Filtrar Gasto" class="btn btn-primary">
                </form>

                <button onclick="mostrarInforme()" class="btn btn-info mt-4 mb-2">Mostrar Informe</button>
                <button onclick="ocultarInforme()" id="btnOcultar" class="btn btn-secondary mt-4 mb-2">Ocultar</button>
                <div id="informe">
                        <?php $mostrar_informe->mostrarTabla('gastos'); ?>
                </div>
        </div>
        <script async src="scripts/ocultarInforme.js"></script>
        <script async src="scripts/mostrarInforme.js"></script>
        <script>
        function confirmarDelete() {            
            let resultado = confirm("¿Desea eliminar esta tarea?");
            return resultado;
        }
    </script>
</body>

</html>