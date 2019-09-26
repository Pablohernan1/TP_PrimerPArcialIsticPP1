<?php 

$reading = fopen('prueba.txt', 'r');
$writing = fopen('prueba.tmp', 'w');

$replaced = false;

while (!feof($reading)) {
  $line = fgets($reading);
  if (stristr($line,'PHV360')) {
    $line = "\n";
    $replaced = true;
  }
  fputs($writing, $line);
}
fclose($reading); fclose($writing);
// might as well not overwrite the file if we didn't replace anything
if ($replaced) 
{
  rename('prueba.tmp', 'prueba.txt');
} else {
  unlink('prueba.tmp');
}

 ?>