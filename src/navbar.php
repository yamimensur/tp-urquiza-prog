<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap/dist/js/bootstrap.min.js"></script>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light sticky-top">
  <a class="navbar-brand" href="#">
    <img src="ico\budget.png" width="30" height="30" alt="" >
  </a> 
  
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">
      <li class="nav-item active">
        <a class="nav-link" href="home.php">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="cargar_gasto.php">Cargar Gasto</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="mostrar_datos.php">Mostrar Gastos</a>
      </li>     
      <li class="nav-item">
        <a class="nav-link" href="datos_modificar.php">Modificar Cuenta</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="borrar_usuario.php">Eliminar Cuenta</a>
      </li>
    </ul>
    <ul class="navbar-nav ml-auto"> 
      <li class="nav-item">
        <a class="nav-link" href="logout.php">Cerrar sesion</a>
      </li>
    </ul>
  </div>
</nav>
</body>
</html>
