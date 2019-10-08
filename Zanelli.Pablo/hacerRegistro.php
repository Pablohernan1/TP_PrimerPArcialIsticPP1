<?php
  error_reporting(0);
  $miObjeto = new stdClass();
  $miObjeto->nombre = $_POST['nombre'];
  $name = $_POST['nombre'];

  $miObjeto->pass = $_POST['pass'];
  $flag = true;

  $archivo = fopen('usuarios.txt', 'a+');
  
while(!feof($archivo)) 
		{
			$objeto = json_decode(fgets($archivo));

			$patenteTxt = $objeto->nombre;

      			if ( $patenteTxt == $name) {

            	$flag = false;
      				break;
      			} ;
		}
		if ($flag == true) {
			$flag = false;	
        fwrite($archivo, json_encode($miObjeto)."\n");
			echo '<meta http-equiv="Refresh" content="0;URL=login.php">';
			
		} else echo '<meta http-equiv="Refresh" content="0;URL=usuarioExiste.php">';
fclose($archivo);
?>