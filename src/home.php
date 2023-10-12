<?php
require_once 'clases/Usuario.php';


require_once 'clases/ImprimirDatos.php';
require_once 'clases/RepositorioGastos.php';
require_once 'clases/ImprimirInforme.php';
$bd = new RepositorioGastos();
$grafico= new ImprimirInforme($bd);

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
    <link rel="stylesheet" href="styles/styles.css">
    <link rel="stylesheet" href="styles/bootstrap.min.css"> 
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
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

<body>
<div class="fixed-background">
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

       <div id="piechart" style="width: 900px; height: 500px;"></div>
    </div>
    </div>
</body>

</html>