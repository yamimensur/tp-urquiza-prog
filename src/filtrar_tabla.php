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
<?php

    if ($resultadosFiltrados) {

        echo "<table class='table table-striped table-dark'>
                <tr>
                    <th>Fecha</th>
                    <th>Descripcion del gasto</th>
                </tr>";

        while ($row = $resultadosFiltrados->fetch_assoc()) {
            echo "<tr>
                    <td>" . $row['fecha'] . "</td>
                    <td>" . $row['descripcion'] . "</td>
                  </tr>";
        }

        echo "</table>";
    } else {

        echo "No se encontraron resultados para el filtro: $filtro";
    }
    ?>

</body>
</html>