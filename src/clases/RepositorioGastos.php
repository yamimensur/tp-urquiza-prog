<?php

require_once 'Gasto.php';
require_once '.env.php';
require_once 'Categoria.php';
require_once 'ImprimirDatos.php';

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




    public function eliminarGasto($gastoId)
    {
        $repo = new RepositorioGastos();

        // creo un objeto Gasto con el id enviado por form
        $gasto = new Gasto();
        $gasto->setId($gastoId);

        return $repo->eliminar($gasto);
    }
    // Funcion para la consulta sql a la base de datos, y luego utilizamos la conexion para realizar la consulta
    public function query($q)
    {
        return self::$conexion->query($q);
    }

    public function consultarTabla($nombreTabla)
    {
        $q = "SELECT * FROM $nombreTabla";
        $resultado = $this->query($q);

        return $resultado;
    }
    public function select()
    {
        $q = "SELECT nombre_categoria FROM categorias";
        $resultado = $this->query($q);

        return $resultado;
    }


    public function consultarInforme($nombreTabla)
    {
        $q = "SELECT nombre_categoria, MAX(monto), MIN(monto), SUM(monto), ROUND(AVG(monto), 2) FROM gastos GROUP BY nombre_categoria";
        $resultado = $this->query($q);

        return $resultado;
    }

    public function save(Gasto $gasto)
    {
        $q = "INSERT INTO gastos (id,id_categoria,id_usuario,monto,descripcion,fecha) ";
        $q .= "VALUES (?, ? , ? , ?, ?, ?)";
        $query = self::$conexion->prepare($q);

        $id = null;
        $categoria = $gasto->id_categoria;
        $id_usuario = $gasto->id_usuario;
        $monto = $gasto->monto;
        $descripcion = $gasto->descripcion;
        $fecha = $gasto->fecha;
        // se asocia el id a la query

        $query->bind_param("ddddss", $id, $categoria, $id_usuario, $monto, $descripcion, $fecha);

        if ($query->execute()) {
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
        $q .= "VALUES (?, ?)";
        $query = self::$conexion->prepare($q);

        $id = null;
        $nombre = $cat->nombre_categoria;
        $query->bind_param("ds", $id, $nombre);
        if ($query->execute()) {
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

        if ($query->execute()) {
            return true;
        } else {
            return false;
        }

    }

    public function filtrar($filtro)
    {
        $q = "SELECT * FROM gastos WHERE nombre_categoria LIKE ? ";
        $q2 = '%' . $filtro . '%';
        $query = self::$conexion->prepare($q);
        $query->bind_param("s", $q2);
        if ($query->execute()) {
            return $query->get_result();
        } else {
            return false;
        }
    }


}