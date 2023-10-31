<?php

require_once 'clases/Imprimir.php';


$mostrar= new Imprimir();

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
                        <?php $mostrar->mostrarDatos('gastos'); ?>
                </div>
                <!-- Vamos a enviar por metodo post el ID del gasto para poder eliminarlo. -->
                <form action="procesar_borrar_gastos.php" method="post" id="borrarVarios">                        
                        <input type="hidden" name="valoresSeleccionados"  id="valoresSeleccionados">
                        <input type="submit" id="botonBorrar" value="Eliminar gasto" class="btn btn-danger">
                </form>


                <form action="filtrar_tabla.php" method="post">
                        <label for="filtro">Buscar por <strong>categorias</strong> : </label><br>
                        <input name="filtro" class="form-control form-control-lg" placeholder="Filtrar Gasto"><br>
                        <input type="submit" value="Filtrar Gasto" class="btn btn-primary">
                </form>

                <button onclick="mostrarInforme()" class="btn btn-info mt-4 mb-2">Mostrar Informe</button>
                <button onclick="ocultarInforme()" id="btnOcultar" class="btn btn-secondary mt-4 mb-2">Ocultar</button>
                <div id="informe">
                        <?php $mostrar->mostrarInforme('gastos'); ?>
                </div>
        </div>
        <script src="scripts/borrarVariosGastos.js"> </script>
        <script async src="scripts/ocultarInforme.js"></script>
        <script async src="scripts/mostrarInforme.js"></script>
        <script  src="scripts/alertaBorrarGastos.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</body>

</html>