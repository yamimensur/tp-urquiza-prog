<?php
require_once 'RepositorioGastos.php';
require_once 'clases/Usuario.php';

class Imprimir
{
    
    public function mostrarInforme($nombreTabla)
    {
        $rg=new RepositorioGastos;
        $resultado = $rg->consultarInforme($nombreTabla);

        if ($resultado) {

            if ($resultado->num_rows > 0) {

                echo "<table class='table table-striped '>
                    
                    <tr class='thead-dark'>
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

    public function grafico($nombreTabla){
        $rg=new RepositorioGastos;
        $resultado = $rg->consultarInforme($nombreTabla);
        while ($row=$resultado->fetch_assoc()){
            echo "['" .$row['nombre_categoria']."', " .$row['SUM(monto)']."],";
          }
    }





    public function mostrarDatosUsuario()
    {
        session_start();
        if (isset($_SESSION['usuario'])) 
        {
            $usuario = unserialize($_SESSION['usuario']);
            $id_usuario= $usuario->getId();
            $rg = new RepositorioGastos();
            $resultado = $rg->consultarTablaUsuario($id_usuario);

            if ($resultado) {
    
                if ($resultado->num_rows > 0) {
    
                    echo "
                    <table class='tabla-resultados table table-bordered table-striped  '>
                    
                        <tr class='thead-dark'>
                             <th>Select</th>
                             <th>Monto</th> 
                             <th>Descripcion</th> 
                             <th>Fecha</th>
                             <th>Categoria</th>
                             <th>Borrar</th>
                        </tr>";
    
                    while ($row = $resultado->fetch_assoc()) {
                        echo "<tr class='fila-datos'>
                            <td> <input type='checkbox' value='$row[id]' class='checkboxBorrar'  </td>
                            <td>" . $row['monto'] . "</td>
                            <td>" . $row['descripcion'] . "</td>
                            <td>" . $row['fecha'] . "</td>
                            <td>" . $row['nombre_categoria'] . "</td>
                            <td> <form action='procesar_borrar_gastos.php' method='post' class='borrarGasto'>
                            <input type='hidden' name='gasto' value='$row[id]'>
                            <button type='button' name='procesar_borrar_gastos' class='btn p-0 mb-0' >
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
                echo "Error: " . $rg->error;
            }
        }
    
        
       
    }

    public function mostrarDatos($nombreTabla)
    {
        $rg=new RepositorioGastos;
        $resultado = $rg->consultarTabla($nombreTabla);

        if ($resultado) {

            if ($resultado->num_rows > 0) {

                echo "
                <table class='tabla-resultados table table-bordered table-striped  '>
                
                    <tr class='thead-dark'>
                         <th>Select</th>
                         <th>Usuario</th> 
                         <th>Monto</th> 
                         <th>Descripcion</th> 
                         <th>Fecha</th>
                         <th>Categoria</th>
                         <th>Borrar</th>
                    </tr>";

                while ($row = $resultado->fetch_assoc()) {
                    echo "<tr class='fila-datos'>
                        <td> <input type='checkbox' value='$row[id]' class='checkboxBorrar'  </td>
                        <td>" . $row['nombre_usuario'] . "</td>
                        <td>" . $row['monto'] . "</td>
                        <td>" . $row['descripcion'] . "</td>
                        <td>" . $row['fecha'] . "</td>
                        <td>" . $row['nombre_categoria'] . "</td>
                        <td> <form action='procesar_borrar_gastos.php' method='post' class='borrarGasto'>
                        <input type='hidden' name='gasto' value='$row[id]'>
                        <button type='button' name='procesar_borrar_gastos' class='btn p-0 mb-0' >
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