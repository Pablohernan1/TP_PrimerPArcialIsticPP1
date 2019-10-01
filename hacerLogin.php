<?php
		error_reporting(0);
		$loginNombre = $_POST['nombre'];
		$loginPassword = $_POST['passw'];
		$flag = false;


		$archivo = fopen("usuarios.txt", "r");

		while(!feof($archivo)){

		 	$objeto = json_decode(fgets($archivo));


			 	if ( $objeto -> nombre == $loginNombre && $objeto -> pass == $loginPassword) {

			 		$flag = true;
			 	} 

		}

		if ($flag == true) {
			echo '<meta http-equiv="Refresh" content="0;URL=ok.php">';
		} else echo '<meta http-equiv="Refresh" content="0;URL=no.php">';
		fclose($archivo);



	?>
