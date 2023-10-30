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

                echo "
                <table class='tabla-resultados table table-bordered table-striped  '>
                
                    <tr class='thead-dark'>
                         <th>ID Gasto</th>
                         <th>Usuario</th> 
                         <th>Monto</th> 
                         <th>Descripcion</th> 
                         <th>Fecha</th>
                         <th>Categoria</th>
                         <th>Borrar</th>
                    </tr>";

                while ($row = $resultado->fetch_assoc()) {
                    echo "<tr class='fila-datos'>
                        <td>" . $row['id'] . "</td>
                        <td>" . $row['nombre_usuario'] . "</td>
                        <td>" . $row['monto'] . "</td>
                        <td>" . $row['descripcion'] . "</td>
                        <td>" . $row['fecha'] . "</td>
                        <td>" . $row['nombre_categoria'] . "</td>
                        <td> <form action='delete_gastos.php' method='post' class='borrarGasto'>
                        <input type='hidden' name='gasto' value='$row[id]'>
                        <button type='button' name='delete_gastos' class='btn p-0 mb-0' >
                        <img src='ico/trash-bin.png' width='25' height='25' alt='Delete' /> 
                        </button>
                        </form></td>
                      </tr>";
                }

                echo "</table>
                ";
            } else {

                echo "<div class='carga-datos'> <a href='cargar_gasto.php'> <img src='images/nodata.jpg'  class='no-data'/></a>
                <p class='leyenda-carga-datos'>Comienza cargando gastos para podes disfrutar de la aplicación.
                <a href='cargar_gasto.php'>Nuevos gastos!</a></p>
                
                </div>";
            }
        } else {
            // Muestra un mensaje de error si hubo un problema con la consulta
            echo "Error: " . $this->bd->error;
        }
    }
}