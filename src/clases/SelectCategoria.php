<?php
require_once 'RepositorioGastos.php';

class SelectCategoria
{
    private $bd;

    public function __construct($bd)
    {
        $this->bd = $bd;
    }

    public function selectTabla()
    {
        $resultado = $this->bd->select(); 

        echo "<select name='categorias'class='form-control form-control-lg'>";
                 while ($row = $resultado->fetch_assoc()) {
                   echo "<option value='{$row['id_categoria']}'>{$row['nombre_categoria']}  </option>";}
        echo "</select>";
        
        
}

}