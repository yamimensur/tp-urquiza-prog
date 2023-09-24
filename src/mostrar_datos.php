<?php
require_once 'clases/Database.php';
require_once 'clases/DataDisplay.php';


$db = new Database();

$dataDisplay = new DataDisplay($db);

$dataDisplay->displayTable('gastos');