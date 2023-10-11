<?php
require_once 'clases/Controlador.php';

if (isset($_POST['usuario']) && isset($_POST['clave'])) {
    $cs = new Controlador();
    $result = $cs->create(
        $_POST['usuario'],
        $_POST['nombre'],
        $_POST['apellido'],
        $_POST['clave']
    );
    if ($result[0] === true) {
        $redirigir = 'home.php?mensaje=' . $result[1];
    } else {
        $redirigir = 'create.php?mensaje=' . $result[1];
    }
} else {
    $redirigir = 'create.php?mensaje=Hay que elegir usuario y clave';
}
header('Location: ' . $redirigir);