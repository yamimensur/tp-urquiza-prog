<?php
require_once '.env.php';
require_once 'ImprimirDatos.php';


class RepositorioMostrarDatos {
    private static $conexion = null;

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
    
    // Funcion para la consulta sql a la base de datos, y luego utilizamos la conexion para realizar la consulta
    public function query($sql) {
        return self::$conexion->query($sql);
    }

}
