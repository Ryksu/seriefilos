<?php
session_start();
include_once '../Conf/Comentarios.php';
$comentarios = new Comentarios();
$nfilas = $comentarios->comentarioFila($_POST['id']);
if ($nfilas>0) {
  $limite = 10;
  $pagina = 1;
  if (isset($_GET['pg'])) {
    $pagina = $_GET['pg'];
  }
  $inicio = ($pagina-1)*$nfilas;
  $pagina_total = ceil($nfilas/$limite);

  if ($_POST['action']=="obtener") {
    $resultado = $comentarios->getComentarios($_POST['id'],$inicio,$limite);
    header("Content-Type: application/json; charset=UTF-8");
    sleep(2);
    echo $resultado;
  }

  if ($_POST['action']=="insertar") {
    $comentarios->insertarComentario($_POST['id'],$_SESSION['usuario'],$_POST['texto']);
    $resultado = $comentarios->getComentarios($_POST['id'],$inicio,$limite);
    header("Content-Type: application/json; charset=UTF-8");
    sleep(2);
    echo $resultado;
  }

}


?>
