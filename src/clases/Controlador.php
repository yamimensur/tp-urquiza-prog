<?php

require_once 'clases/RepositorioUsuario.php';
require_once 'clases/RepositorioGastos.php';
require_once 'clases/Usuario.php';
require_once 'clases/Gasto.php';
require_once 'clases/Categoria.php';

class Controlador
{
    /**
     * Verifica el login de usuario.
     *
     * @param string $nombre_usuario El nombre de usuario
     * @param string $clave          La contraseña del usuario
     *
     * @return Array El primer valor del array es true o false, según si el
     *               login fue exitoso o no. El segundo elemento del array es
     *               un mensaje que explica el motivo del éxito o fracaso.
     */
    public function login($nombre_usuario, $clave)
    {
        $repo = new RepositorioUsuario();
        $usuario = $repo->login($nombre_usuario, $clave);

        if ($usuario === false) {
            // Falló el login
            return [ false, "Error de credenciales" ];
        } else {
            // Login correcto, $usuario tiene un objeto de tipo Usuario, cuyos
            // datos obtuvo de la BD.

            // Iniciamos la sesión, y guardamos el objeto Usuario como variable
            // de sesión, para que esté disponible al cambiar de página:
            session_start();
            $_SESSION['usuario'] = serialize($usuario);

            return [true, "Usuario correctamente autenticado"];
        }
    }

    /**
     * Crea un nuevo usuario y le solicita al repositorio que lo guarde en la
     * BD. Si el RepositorioUsuario responde exitosamente, loguea al usuario
     * en la sesión.
     *
     * @param string $nombre_usuario El nombre de usuario
     * @param string $nombre         El nombre real de la persona usuaria
     * @param string $apellido       El apellido del usuario/a
     * @param string $clave          La contraseña del usuario
     *
     * @return Array Un array cuyo primer valor es true o false, según si fue
     *               exitosa o no la creación del usuario. El segundo valor del
     *               array retornado es un mensaje explicativo.
     */
    function create($nombre_usuario, $nombre, $apellido, $clave)
    {
        $repo = new RepositorioUsuario();
        $usuario = new Usuario($nombre_usuario, $nombre, $apellido);
        $id = $repo->save($usuario, $clave);
        if ($id === false) {
            // No se pudo guardar
            return [ false, "Error al crear el usuario" ];
        } else {
            $usuario->setId($id);
            session_start();
            $_SESSION['usuario'] = serialize($usuario);
            return [ true, "Usuario creado correctamente" ];
        }
    }

    /**
     * Elimina el usuario. Retorna true si tuvo éxito, false si no.
     *
     * @params Usuario $usuario El objeto usuario a eliminar.
     *
     * @return boolean true si tuvo éxito, false de lo contrario
     */
    function eliminar(Usuario $usuario)
    {
        $repo = new RepositorioUsuario();
        return $repo->eliminar($usuario);

    }

  

    /**
     * Solicita que se actualicen en la BD los datos del usuario, y si tiene
     * éxito, actualiza también los datos del usuario almacenados en la sesión.
     *
     * @param string $nombre_usuario El nuevo nombre de usuario
     * @param string $nombre         El nuevo nombre de la persona
     * @param string $apellido       El nuevo apellido de la persona
     * @param Usuario $usuario       El objeto usuario almacenado en la sesión.
     *
     * @return boolean true si tuvo éxito, false de lo contrario.
     */
    function modificar(string $nombre_usuario, string $nombre, string $apellido, Usuario $usuario)
    {
        $repo = new RepositorioUsuario();

        if ($repo->actualizar($nombre_usuario, $nombre, $apellido, $usuario)) {
            // Si los datos se actualizaron correctamente en la BD, actualizo
            // el usuario que tengo en memoria...
            $usuario->setDatos($nombre_usuario, $nombre, $apellido);
            //... y lo guardo como variable de sesión.
            $_SESSION['usuario'] = serialize($usuario);

            return true;
        } else {
            return false;
        }
    }

    function cargarGasto($monto,$categoria,$fecha,$descripcion)
    {
        session_start();
        if (isset($_SESSION['usuario'])) 
        {
            $usuario = unserialize($_SESSION['usuario']);
            $id_usuario= $usuario->getId();
            $repo = new RepositorioGastos();
            $gasto = new Gasto($id=null,$categoria,$id_usuario,$monto,$descripcion,$fecha);
            $id = $repo->save($gasto);
            if ($id === false) {
                // No se pudo guardar
                return [ false, "Error al guardar el gasto" ];
            } else {
                $gasto->setId($id);
                return [ true, "Gasto guardado correctamente" ];
                 }
        }
    }

    function agregarCat($nombre)
    {
            $repo = new RepositorioGastos();
            $cat = new Categoria($nombre);
            $id = $repo->saveCat($cat);
            if ($id === false) {
                // No se pudo guardar
                return [ false, "Error al crear la categoria" ];
            } else {
                $cat->setId($id);
                return [ true, "Categoria creada correctamente" ];
                 }
    }

    function eliminarCat($nombre)
    {
        $repo = new RepositorioGastos();
         if($repo->deleteCat($nombre)){
            return [ true, "Categoria eliminada correctamente" ];
         }else{
            return [ false, "Error al eliminar la categoria" ]; 
         }

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
   
 


}

