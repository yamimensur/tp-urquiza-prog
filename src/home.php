<?php
require_once 'clases/Usuario.php';
require_once 'clases/Imprimir.php';
require_once 'clases/RepositorioGastos.php';


$grafico = new Imprimir();

// Retomamos la sesión previamente iniciada, y recuperamos el objeto Usuario
// que contiene los datos del usuario autenticado:
session_start();
if (isset($_SESSION['usuario'])) {
  $usuario = unserialize($_SESSION['usuario']);
  $nomApe = $usuario->getNombreApellido();
} else {
  // Si no hay usuario autenticado, redirigimos al login.
  header('Location: index.php');
}
?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width">
  <title>Gastos del hogar</title>  
  <link rel="stylesheet" href="styles/bootstrap.min.css">
  <link rel="stylesheet" href="styles/styles.css">

  <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
  <script type="text/javascript">
    google.charts.load('current', { 'packages': ['corechart'] });
    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {

      var data = google.visualization.arrayToDataTable([
        ['Task', 'Hours per Day'],
        <?php
        echo $grafico->grafico('gastos');
        ?>
      ]);

      var options = {
        title: 'Mis Gastos'
      };

      var chart = new google.visualization.PieChart(document.getElementById('piechart'));

      chart.draw(data, options);
    }
  </script>

</head>

<body class="fixed-background">

  <?php include('navbar.php') ?>
  <div class="container">
    <br>
    <div class="alert alert-light text-center" role="alert">
      <h1>Gastos del hogar</h1>
      <h4>Bienvenido
        <?php echo $nomApe; ?>
      </h4>
    </div><br>


    <?php
    if (isset($_GET['mensaje'])) {
      echo '<div id="mensaje" class="alert alert-primary text-center">
                    <p>' . $_GET['mensaje'] . '</p></div>';
    }
    ?>
    <div class="div-home">
    <div id="piechart" style="width: 900px; height: 500px;"></div>
    <div class="parrafo-home"><p>¡Hola! Esta es una aplicación que diseñamos para que cargues tus gastos y lleves un control día a día para saber en qué se te está yendo todo el dinero!
    Podes cargar y borrar tantos tus gastos como las categorías en las que inviertes tu dinero. Además, te brindamos un informe muy útil el cual te dirá el máximo y el promedio de lo gastado en cada categoría.
    Para comenzar podes hacer click <a href="cargar_gasto.php">aquí</a>
    </p></div>
  </div>
  </div>

</body>

</html>