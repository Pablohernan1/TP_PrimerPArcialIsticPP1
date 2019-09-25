<?php 
error_reporting(0);


$flag = true;

$miObjeto = new stdClass();

$hora = time(); 
date_default_timezone_set('America/Argentina/Buenos_Aires');
$hora= date ('H:i', $hora);
$miObjeto->patente = $_POST['patente'];



$patente = $_POST['patente'];
$miObjeto->hora = $hora;

$archivo = fopen('estacionados.txt', 'r+');



	while(!feof($archivo)) 
		{
			$objeto = json_decode(fgets($archivo));
			//echo "<li>"."Patente: ".$objeto->patente." "."Ingreso: " .$objeto->hora."</li>";
			$patenteTxt = $objeto->patente;

      			if ( $patenteTxt == $patente) {
      				echo "dsa";
      				$patenteEncontrada = $objeto-> patente ;
      				$horaEncontrada = $objeto -> hora;

      				//echo ' Tiempo de ejecución: '.$horaEncontrada->format('%i minutos %s segundos');

      				echo($patenteEncontrada. " ". $horaEncontrada." ".$diferencia);
      			} 

		}


		

		//if ($flag == flase) {
		//	fwrite($archivo, json_encode($miObjeto)."\n");
		//	$flag = true;
		//		echo '<meta http-equiv="Refresh" content="0;URL=autoIngresado.php">';
		//}else echo '<meta http-equiv="Refresh" content="0;URL=autoNoIngresado.php">';



	fclose($archivo);


//echo '<meta http-equiv="Refresh" content="0;URL=index.php">';
 ?>