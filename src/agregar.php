<?php
require_once 'clases/ControladorSesion.php';

if (isset($_POST['nombre'])) {
    $cs = new ControladorSesion();
    $result = $cs->agregarCat($_POST['nombre']);
    if( $result[0] === true ) {
        $redirigir = 'cargar_gasto.php?mensaje='.$result[1];
    } else {
        $redirigir = 'cargar_gasto.php?mensaje='.$result[1];
    }
} else {
    $redirigir = 'cargar_gasto.php?mensaje=Debe completar todos los campos';
}
header('Location: ' . $redirigir);