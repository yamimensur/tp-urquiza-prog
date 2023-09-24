<?php
require_once 'RepositorioMostrarDatos.php';
class ImprimirDatos {
    private $bd;

    public function __construct($bd) {
        $this->bd = $bd;
    }

    public function mostrarTabla($nombreTabla) {
        // Construye la consulta SQL para seleccionar todos los registros de la tabla especificada.
        $sql = "SELECT * FROM $nombreTabla";
        // Ejecuta la consulta en la base de datos.
        $resultado = $this->bd->query($sql);

        if ($resultado) {
            //Verficamos que se devuelva al menos una row utilizando la propiedad num_rows de mysqli
            if ($resultado->num_rows > 0) {
                echo "<table>";

                // usa los nombres de las columnas
                $row = $resultado->fetch_assoc();
                echo "<tr>";
                foreach ($row as $column => $value) {
                    echo "<th>$column</th>";
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