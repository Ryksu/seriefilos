<?php
session_start();
include_once '../Conf/Comentarios.php';
$comentarios = new Comentarios();
if ($_POST['action']=="obtener") {
  $resultado = $comentarios->getComentarios($_POST['id']);
  header("Content-Type: application/json; charset=UTF-8");
  echo $resultado;
}
if ($_POST['action']=="insertar") {
  $comentarios->insertarComentario($_POST['id'],$_SESSION['usuario'],$_POST['texto']);
  $resultado = $comentarios->getComentarios($_POST['id']);
  header("Content-Type: application/json; charset=UTF-8");
    echo $resultado;
}

?>
