<?php
require_once 'Database.php';
class DataDisplay {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function displayTable($tableName) {
        // Construye la consulta SQL para seleccionar todos los registros de la tabla especificada.
        $sql = "SELECT * FROM $tableName";
        // Ejecuta la consulta en la base de datos.
        $result = $this->db->query($sql);

        if ($result) {
            if ($result->num_rows > 0) {
                echo "<table>";

                // Muestra los nombres de las columnas como encabezados de la tabla.
                $row = $result->fetch_assoc();
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
                } while ($row = $result->fetch_assoc());

                echo "</table>";
            } else {
                // Muestra un mensaje si no se encontraron registros.
                echo "No se encontraron registros.";
            }
        } else {
            // Muestra un mensaje de error si hubo un problema con la consulta.
            echo "Error: " . $this->db->error;
        }
    }
}