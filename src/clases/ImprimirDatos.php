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

            if ($resultado->num_rows > 0) {

                echo "<table class='table table-dark '>
                    <tr>
                         <th>ID Gasto</th>
                         <th>ID Usuario</th> 
                         <th>Monto</th> 
                         <th>Descripcion</th> 
                         <th>Fecha</th>
                         <th>Categoria</th>
                    </tr>";

                while ($row = $resultado->fetch_assoc()) {
                    echo "<tr>
                        <td>" . $row['id'] . "</td>
                        <td>" . $row['id_usuario'] . "</td>
                        <td>" . $row['monto'] . "</td>
                        <td>" . $row['descripcion'] . "</td>
                        <td>" . $row['fecha'] . "</td>
                        <td>" . $row['nombre_categoria'] . "</td>
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