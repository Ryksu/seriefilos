<?php
require_once '../Conf/Puntuacion.php';
$id = $_GET['id'];
$punto = new Puntuacion($id);
if (isset($_GET['punto'])) {
  echo $punto->getPunto();
}
if (isset($_GET['up'])) {
  $punto->thumbUp();
  echo $punto->getPunto();
}
if (isset($_GET['down'])) {
  $punto->thumbDown();
  echo $punto->getPunto();
}
?>
