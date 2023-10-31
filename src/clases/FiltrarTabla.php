<?php
require_once 'RepositorioGastos.php';

class FiltrarTabla {

public function filtrarCategoria($filtro) {
     $rg=new RepositorioGastos();
     $resultado = $rg->filtrar($filtro);

    if ($resultado->num_rows > 0) {

        echo "<table class='table table-striped table-dark'>
        <tr>
            <th>Fecha</th>
            <th>Descripcion del gasto</th>
            <th>Monto</th>
            <th>Categoria</th>
        </tr>";

        while ($row = $resultado->fetch_assoc()) {
            echo  "<tr>
            <td>" . $row['fecha'] . "</td>
            <td>" . $row['descripcion'] . "</td>
            <td>" . $row['monto'] . "</td>
            <td>" . $row['nombre_categoria'] . "</td>
        </tr>"; 
    }

        echo "</table>";
    } else {

        echo
        "<div class='d-flex flex-column mb-2'>
        <div class='p-2'><h2 class='display-4'>No se encontraron resultados para el filtro: <div class= 'filtro'>$filtro</div></h2> </div>
        <div class='p-2'><img src='images/404.jpg' alt='404' class='404'>
        </div>
        </div>";
    }
}


}