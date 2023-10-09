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

            echo "<table border='1'>
                    <tr>
                        <th>Monto</th>                        
                    </tr>";
    
            while ($row = $resultado->fetch_assoc()) {
                echo "<tr>
                        <td>" . $row['max(monto)'] . "</td>                        
                      </tr>";
            }
    
            echo "</table>"; }
         else {
    
            echo "No se encontraron resultados para el filtro: $resultado"; }      
        }
    }