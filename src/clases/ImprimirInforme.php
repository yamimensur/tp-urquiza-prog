<?php
require_once 'RepositorioGastos.php';

class ImprimirInforme
{
    private $bd;

    public function __construct($bd)
    {
        $this->bd = $bd;
    }

    public function mostrarTabla($nombreTabla)
    {
        $resultado = $this->bd->consultarInforme($nombreTabla);

        if ($resultado) {

            if ($resultado->num_rows > 0) {

                echo "<table class='table table-dark '>
                    <tr>
                         <th>Categoria</th>
                         <th>Maximo Gastado</th> 
                         <th>Minimo Gastado</th> 
                         <th>Total de lo gastado</th> 
                         <th>Gasto en promedio</th>                        
                    </tr>";

                while ($row = $resultado->fetch_assoc()) {
                    echo "<tr>
                        <td>" . $row['nombre_categoria'] . "</td>
                        <td>" . $row['MAX(monto)'] . "</td>
                        <td>" . $row['MIN(monto)'] . "</td>
                        <td>" . $row['SUM(monto)'] . "</td>
                        <td>" . $row['ROUND(AVG(monto), 2)'] . "</td>                        
                      </tr>";
                }

                echo "</table>";
            } else {

                echo "No existen datos para elaborar informe.";
            }
        } else {
            // Muestra un mensaje de error si hubo un problema con la consulta
            echo "Error: " . $this->bd->error;
        }

    }
}