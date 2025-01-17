
<!DOCTYPE html>
<html>

  <head>
</style>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="assets\brand\favIcon.png">

    <title>Parkin Zanelli S.A.</title>
<link href="signin.css" rel="stylesheet">
    <!-- Bootstrap core CSS -->
    <link href="dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->    
    <link href="dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="sticky-footer-navbar.css" rel="stylesheet">

  </head>
<body>


  <header>
      <!-- Fixed navbar -->
      <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark" >
        <a class="navbar-brand" href="index.php">Zanelli</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item">
              <a class="nav-link" href="ingresoVehiculo.php">Ingreso de Vehiculo</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="retiroVehiculo.php">Retiro de Vehiculos</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="listarUsuarios.php">Listado de usuarios</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="listadoVehiculos.php">Listado de Vehiculos</a>
            </li>
            <li class="nav-item active">
              <a class="nav-link" href="facturacion.php">Historico Facturacion</a>
            </li>

          </ul>
          <form class="form-inline mt-2 mt-md-0">
            <input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
          </form>
        </div>
      </nav>
    </header>

    <!-- Begin page content -->
    <main >

<body class="text-center">
    <form >
      <img class="mb-4" src="assets/brand/user.png" alt="" width="72" height="72" >



    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="assets/js/vendor/jquery-slim.min.js"><\/script>')</script>
    <script src="assets/js/vendor/popper.min.js"></script>
    <script src="dist/js/bootstrap.min.js"></script>

           
        
<h2>Facturacion Historica</h2>
<table>
  <tr>
    <th>&nbspPATENTE&nbsp</th>
    <th>&nbspFECHA DE INGRESO&nbsp</th>
    <th>&nbspFECHA DE EGRESO&nbsp</th>
    <th>&nbspIMPORTE&nbsp</th>
  </tr>

<nav>
  <?php
  $acumulador = 0;
    $archivo = fopen("facturacion.txt", "r") or die("Imposible arbrir el archivo");
    while(!feof($archivo)) 
    {
      $objeto = json_decode(fgets($archivo));

      if ($objeto != "") {
      
      echo "<tr><td>".$objeto->patente."</td>   <td>".$objeto->FechaIngreso."</td> <td>".$objeto->FechaEgreso."</td>  <td>$".$objeto->precio." </td></tr>";
        $acumulador = $acumulador + $objeto->precio;
      }

    }
    echo "<h4> TOTAL FACTURADO: $".$acumulador."</h4>";
    fclose($archivo);
  ?>
</table> 
</nav>
 </div>


</body>
</html>