<?php
require_once 'RepositorioGastos.php';

class ImprimirDatos
{
    private $bd;

    public function __construct($bd)
    {
        $this->bd = $bd;
    }

    public function mostrarTabla($nombreTabla)
    {
        $resultado = $this->bd->consultarTabla($nombreTabla);

        if ($resultado) {
            //Verficamos que se devuelva al menos una row utilizando la propiedad num_rows de mysqli
            if ($resultado->num_rows > 0) {
                echo "<table class='table table-dark '>";

                // usa los nombres de las columnas
                $row = $resultado->fetch_assoc();
                echo "<tr>";
                foreach ($row as $column => $value) {
                    echo "<th scope='col'>$column</th>";
                }
                echo "</tr>";

                // Muestra las filas de datos.
                do {
                    echo "<tr>";
                    foreach ($row as $column => $value) {
                        echo "<td>$value</td>";
                    }
                    echo "</tr>";
                } while ($row = $resultado->fetch_assoc());

                echo "</table>";
            } else {
                // Muestra un mensaje si no se encontraron registros
                echo "No se encontraron registros.";
            }
        } else {
            // Muestra un mensaje de error si hubo un problema con la consulta
            echo "Error: " . $this->bd->error;
        }
    }
}