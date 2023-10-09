<?php
require_once 'clases/RepositorioGastos.php';

$rg = new RepositorioGastos();

$gastoId = $_POST['gasto'];
// Verificamos que gastoid no este vacio y sea numerico
if (!empty($gastoId) && is_numeric($gastoId)) {
    // Llamamos a la funcion eliminar gasto y le enviamos el id del form
    $resultado = $rg->eliminarGasto($gastoId);

    if ($resultado) {
        $redirigir = "mostrar_datos.php?mensaje=Gasto Eliminado";
    } else {
        $redirigir = "mostrar_datos.php?mensaje=No se pudo eliminar el gasto por un error interno";
    }
} else {
    // Si esta vacio o no es correcto el dato enviado
    $redirigir = "mostrar_datos.php?mensaje=ID Invalido";
}

header("Location: $redirigir");