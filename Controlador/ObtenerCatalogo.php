<?php
require_once '../../Conf/Series.php';

  // code...

$getseries= new Series();
$nfilas = $getseries->ContadorFila("id","serie");
if ($nfilas>0) {
  $limite = 8;
  $pagina = 1;
  if (isset($_GET['pg'])) {
    $pagina = $_GET['pg'];
  }
  $inicio = ($pagina-1)*$limite;
  $pagina_total = ceil($nfilas/$limite);

  $series = $getseries->obtenerSeries($inicio,$limite);
  // header("Content-Type: application/json; charset=UTF-8");

   $res = json_decode($series,true);
}
?>
