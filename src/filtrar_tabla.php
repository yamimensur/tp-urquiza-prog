<?php
require_once 'clases/RepositorioGastos.php';


$filtro = $_POST['filtro'];
$repositorioGastos = new RepositorioGastos();
$resultadosFiltrados = $repositorioGastos->filtrarCat($filtro);
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
<h2 class="display-3">Gastos filtrados por categoria:</h2>
<?php

    if ($resultadosFiltrados) {

    echo "<table class='table table-striped table-dark'>
        <tr>
            <th>Fecha</th>
            <th>Descripcion del gasto</th>
            <th>Monto</th>
            <th>Categoria</th>
        </tr>";

while ($row = $resultadosFiltrados->fetch_assoc()) {
    echo "<tr>
            <td>" . $row['fecha'] . "</td>
            <td>" . $row['descripcion'] . "</td>
            <td>" . $row['monto'] . "</td>
            <td>" . $row['nombre_categoria'] . "</td>
        </tr>";
        }

        echo "</table>";
    } else {

        echo "No se encontraron resultados para el filtro: $filtro";
    }
    ?>

</body>
</html>