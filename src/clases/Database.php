<?php
require_once '.env.php';
require_once 'DataDisplay.php';


class Database {
    private $conexion;

    public function __construct()
    {
        $credenciales = credenciales();
        $servername = $credenciales['servidor'];
        $username = $credenciales['usuario'];
        $password = $credenciales['clave'];
        $dbname = $credenciales['base_de_datos'];

        $this->conexion = new mysqli($servername, $username, $password, $dbname);

        if ($this->conexion->connect_error) {
            $error = 'Error de conexion: ' . $this->conn->connect_error;
            $this->conexion = null;
            die($error);
        }

        $this->conexion->set_charset('utf8mb4');
    }
    

    public function query($sql) {
        return $this->conexion->query($sql);
    }

    public function close() {
        $this->conexion->close();
    }
}
