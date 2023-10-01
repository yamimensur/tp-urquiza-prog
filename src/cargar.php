<?php
require_once 'clases/ControladorSesion.php';

if (isset($_POST['monto']) && isset($_POST['categorias']) && isset($_POST['fecha']) && isset($_POST['descripcion'])) {
    $cs = new ControladorSesion();
    $result = $cs->cargarGasto($_POST['monto'], $_POST['categorias'], $_POST['fecha'], $_POST['descripcion']);
    if ($result[0] === true) {
        $redirigir = 'mostrar_datos.php?mensaje=' . $result[1];
    } else {
        $redirigir = 'cargar_gasto.php?mensaje=' . $result[1];
    }
} else {
    $redirigir = 'cargar_gasto.php?mensaje=Debe completar todos los campos';
}
header('Location: ' . $redirigir);