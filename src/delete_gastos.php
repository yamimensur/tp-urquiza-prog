<?php
require_once 'clases/ControladorSesion.php';

$cs = new ControladorSesion();

// chequeamos que el formulario se envie
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // obetenemos el id de gasto del formulario
    $gastoId = $_POST['gasto'];

    // verificamos que gastoid no este vacio y sea numerico
    if (!empty($gastoId) && is_numeric($gastoId)) {
        // Convert $gastoId to an integer
        $gastoId = (int)$gastoId;

        // llamamos a la funcion eliminar gasto y le enviamos el id del form
        $resultado = $cs->eliminarGasto($gastoId);

        if ($resultado) {            
            echo "Se ha eliminado el gasto";
        } else {            
            echo "Error";
        }
    } else {
        // si esta vacio o no es correcto el dato enviado
        echo "ID invalido";
    }
}