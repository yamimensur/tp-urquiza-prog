<?php

require_once 'Gasto.php';
require_once '.env.php';
require_once 'Categoria.php';

class RepositorioGastos
{
    private static $conexion = null;

    /***
     * Método constructor. Si ya había una conexión a la base de datos
     * establecida, no hace nada. Si la conexión aún no se estableció, realiza
     * la misma con mysqli, utilizando la función credenciales() del archivo
     * .env.php.
     */
    public function __construct()
    {
        $credenciales = credenciales();
        if (is_null(self::$conexion)) {
            self::$conexion = new mysqli(
                $credenciales['servidor'],
                $credenciales['usuario'],
                $credenciales['clave'],
                $credenciales['base_de_datos'],
            );
        }
        if (self::$conexion->connect_error) {
            $error = 'Error de conexion: ' . self::$conexion->connect_error;
            self::$conexion = null;
            die($error);
        }
        self::$conexion->set_charset('utf8mb4');
    }

   

   
    public function save(Gasto $gasto)
    {
        $q = "INSERT INTO gastos (id,id_categoria,id_usuario,monto,descripcion,fecha) ";
        $q.= "VALUES (?, ? , ? , ?, ?, ?)";
        $query = self::$conexion->prepare($q);

        $id=null;
        $categoria = $gasto->id_categoria;
        $id_usuario = $gasto->id_usuario;
        $monto = $gasto->monto;
        $descripcion = $gasto->descripcion;
        $fecha=$gasto->fecha;
        // se asocia el id a la query

        $query->bind_param("ddddss", $id, $categoria, $id_usuario, $monto, $descripcion, $fecha );

        if ($query->execute())  {
            return self::$conexion->insert_id;
        } else {
            return false;
        }
    }

    public function eliminar(Gasto $gasto)
    {
        $q = "DELETE FROM gastos WHERE id = ?";
        $query = self::$conexion->prepare($q);

        $id = $gasto->getId();

        // se asocia el id a la query

        $query->bind_param("d", $id);

        //devuelve true si se elimina el registro y false si la consulta falla, por ahora no hacemos
        //nada mas

        return $query->execute();
    }
        
       
    public function saveCat(Categoria $cat)
    {
        $q = "INSERT INTO categorias (id_categoria,nombre_categoria) ";
        $q.= "VALUES (?, ?)";
        $query = self::$conexion->prepare($q);

        $id=null;
        $nombre = $cat->nombre_categoria;
        $query->bind_param("ds", $id, $nombre);
        if ($query->execute())  {
            return self::$conexion->insert_id;
        } else {
            return false;
        }
    }

   
    public function deleteCat($nombre)
    {
        $q = "DELETE FROM categorias WHERE nombre_categoria = ?";
        $query = self::$conexion->prepare($q);
        $query->bind_param("s", $nombre);

        if ($query->execute()) 
        {
            return true;
        } else {
            return false;
        }

    } 

    public function filtrar($filtro) {
        $q = "select id_categoria from categorias where nombre_categoria like ?";
        $query = self::$conexion->prepare($q);
        $query->bind_param("s", $filtro);
        $id=$query->execute();
        return $id;
    }

    public function filtrarCat($filtro){ 
        $id=$this->filtrar($filtro);
        $q = "select * from gastos where id_categoria like ?";
        $query = self::$conexion->prepare($q);
        $query->bind_param("d", $id);
        if ($query->execute()) 
        {
            return $query->get_result();
        } else {
            return false;
        }
        }

}
