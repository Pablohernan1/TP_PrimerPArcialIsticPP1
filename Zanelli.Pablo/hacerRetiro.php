
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="assets\brand\favIcon.png">

    <title>Parkin Zanelli S.A.</title>

    <!-- Bootstrap core CSS -->
    <link href="dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->    
    <link href="dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="sticky-footer-navbar.css" rel="stylesheet">
        <link href="signin.css" rel="stylesheet">
  </head>
<body>


	<header>
      <!-- Fixed navbar -->
      <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
        <a class="navbar-brand" href="index.php">Zanelli</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item ">
              <a class="nav-link" href="registro.php">Registrate<span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item ">
              <a class="nav-link" href="login.php">Login</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="ingresoVehiculo.php">Ingreso de Vehiculo</a>
            </li>
            <li class="nav-item active">
              <a class="nav-link" href="retiroVehiculo.php">Retiro de Vehiculos</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="listarUsuarios.php">Listado de usuarios</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="listadoVehiculos.php">Listado de Vehiculos</a>
            </li>
            <li class="nav-item">
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
    <main role="main" class="container">

<body class="text-center">
    <form class="form-signin">
      <img class="mb-4" src="assets/brand/retiroAuto.png" alt="" width="72" height="72">




    <footer class="footer">
      <div class="container">

      </div>
    </footer>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="assets/js/vendor/jquery-slim.min.js"><\/script>')</script>
    <script src="assets/js/vendor/popper.min.js"></script>
    <script src="dist/js/bootstrap.min.js"></script>

<h2>Retiro de Vehiculos</h2>
<h1></h1>

<ol>
<?php 
error_reporting(0);

$precioPorHora = 50;
$precioMediaHora = 15;
$aPagar = 0;

$flag = true;

$miObjeto = new stdClass();
$miObjeto2 = new stdClass();  

$hora = time(); 
date_default_timezone_set('America/Argentina/Buenos_Aires');

$horaActual2 = mktime();

$patente = $_POST['patente'];
$fraccion = $_POST['fraccion'];
$miObjeto->hora = $hora;

$archivo = fopen('estacionados.txt', 'r+');
$archivo2 = fopen('facturacion.txt', 'a');


	while(!feof($archivo)) 
		{
			$objeto = json_decode(fgets($archivo));

			$patenteTxt = $objeto->patente;

      			if ( $patenteTxt == $patente) {
      				
      				$patenteEncontrada = $objeto-> patente;
      				$horaEncontrada = $objeto -> hora;

              $viejaMostrar =  date("d-m-y H:i", $horaEncontrada);
              $actualMostrar = date("d-m-y H:i", $horaActual2);
      				
              echo "El auto ingreso el ".$viejaMostrar."<br>";
              echo "El auto se retira el ".$actualMostrar."<br>";
      				$resultado =  $horaActual2 - $horaEncontrada;

              if ($fraccion == "hora") {
                $precio = round($resultado/3600);
                $aPagar = $precio*$precioPorHora;
                echo "El precio a pagar es de: $".$aPagar."<br>"; //Cantidad de horas hora


              }else  {
                $precio2 = round($resultado/1800);
                $aPagar = $precio2*$precioMediaHora;
                echo "El precio a pagar es de: $".$aPagar."<br>";//Cantidad de medias horas hora
              }
                  
                  $miObjeto2->patente = $patenteEncontrada;
                  $miObjeto2->FechaIngreso = $viejaMostrar;
                  $miObjeto2->FechaEgreso = $actualMostrar;
                  $miObjeto2->precio = $aPagar;
                fwrite($archivo2, json_encode($miObjeto2)."\n");

              $flag = false;

      			} 

		}
    fclose($archivo);


$reading = fopen('estacionados.txt', 'r');
$writing = fopen('estacionados.tmp', 'w');
$patente2 = $_POST['patente'];
$line2 = "\n";

//echo $patente2;
$replaced = false;

while (!feof($reading)) {

  $line = fgets($reading);
  if (stristr($line,$patente2)) {
    $line = "";
    $replaced = true;
  }
  fputs($writing, $line);
}
fclose($reading); fclose($writing);


if ($replaced) 
{
  rename('estacionados.tmp', 'estacionados.txt');
} else {
  unlink('estacionados.tmp');
}
		

		if ($flag == false) {
			$flag = true;	
		}else echo '<meta http-equiv="Refresh" content="0;URL=vehiculoNoExiste.php">';

	fclose($archivo);

 ?>

 </ol> 

</body>
</html>