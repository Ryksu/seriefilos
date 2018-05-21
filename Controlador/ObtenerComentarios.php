<?php
include_once '../Conf/Series.php';
$comentarios = new Series();
if ($_GET['action']=="obtener") {
  $resultado = $comentarios->getComentarios($_GET['id']);
  header("Content-Type: application/json; charset=UTF-8");
  echo $resultado;
}


?>
