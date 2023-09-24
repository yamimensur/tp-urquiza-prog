<?php
require_once 'clases/RepositorioMostrarDatos.php';
require_once 'clases/ImprimirDatos.php';


$bd = new RepositorioMostrarDatos();

$mostrar_datos = new ImprimirDatos($bd);

$mostrar_datos->mostrarTabla('gastos');
