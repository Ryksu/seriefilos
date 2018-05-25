<?php
require_once '../Conf/Puntuacion.php';
$id = $_GET['id'];
if ($_GET['action']=="serie") {
  $punto = new Puntuacion("serie",$id);
  if ($_GET['thumb']=="get") {
    echo $punto->getPunto();
  }
  if ($_GET['thumb']=="up") {
    $punto->thumbUp();
    echo $punto->getPunto();
  }
  if ($_GET['thumb']=="down") {
    $punto->thumbDown();
    echo $punto->getPunto();
  }
}
?>
