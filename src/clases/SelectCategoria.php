<?php
require_once 'RepositorioGastos.php';

class SelectCategoria
{


    public function selectTabla()
    {
        $rg= new RepositorioGastos();
        $resultado = $rg->select(); 

        echo "<select name='categorias'class='form-control form-control-lg'>";
                 while ($row = $resultado->fetch_assoc()) {
                   echo "<option value='{$row['id_categoria']}'>{$row['nombre_categoria']}  </option>";}
        echo "</select>";
        
        
}

}