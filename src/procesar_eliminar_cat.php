<?php
require_once 'clases/Controlador.php';

if (isset($_POST['nombre'])) {
    $cs = new Controlador();
    $result = $cs->eliminarCat($_POST['nombre']);
    if( $result[0] === true ) {
        $redirigir = 'cargar_gasto.php?mensaje='.$result[1];
    } else {
        $redirigir = 'cargar_gasto.php?mensaje='.$result[1];
    }
} else {
    $redirigir = 'cargar_gasto.php?mensaje=Debe completar todos los campos';
}
header('Location: ' . $redirigir);