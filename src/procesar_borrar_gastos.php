<?php
require_once 'clases/RepositorioGastos.php';
require_once 'clases/Controlador.php';

$cs = new Controlador();
$valoresCheckbox = $_POST['valoresSeleccionados'];
$gastoId = $_POST['gasto'];
$seleccionIds = json_decode($valoresCheckbox);

if (!empty($seleccionIds)) {
    foreach ($seleccionIds as $gastoId) {
        if (is_numeric($gastoId)) {
            $resultado = $cs->eliminarGasto($gastoId);

            if ($resultado) {
                $redirigir = "mostrar_datos.php?mensaje=Gasto Eliminado";
            } else {
                $redirigir = "mostrar_datos.php?mensaje=No se pudo eliminar el gasto por un error interno";
            }           
        }
    }
}
elseif(is_numeric($gastoId)) { 
    $resultado = $cs->eliminarGasto($gastoId);

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

