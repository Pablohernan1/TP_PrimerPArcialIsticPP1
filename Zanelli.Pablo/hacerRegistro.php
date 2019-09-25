<?php
  $miObjeto = new stdClass();
  $miObjeto->nombre = $_POST['nombre'];
  $miObjeto->pass = $_POST['pass'];

  $archivo = fopen('usuarios.txt', 'a');
  fwrite($archivo, json_encode($miObjeto)."\n");
  fclose($archivo);

  echo '<meta http-equiv="Refresh" content="0;URL=login.php">';
?>