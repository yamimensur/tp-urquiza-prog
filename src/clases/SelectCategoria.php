<?php
require_once 'RepositorioGastos.php';

class Select
{
    private $bd;

    public function __construct($bd)
    {
        $this->bd = $bd;
    }

    public function selectTabla()
    {
        $resultado = $this->bd->select(); 

        echo "<select name='categorias'>";
                 while ($row = $resultado->fetch_assoc()) {
                   echo "<option value='{$row['id_categoria']}'>{$row['nombre_categoria']}  </option>";}
        echo "</select>";
        
        
}

}