<?php
session_start();
require_once '../Conf/Comentarios.php';
$comentarios = new Comentarios();

$nfilas = $comentarios->comentarioFila($_GET['id']);
<<<<<<< HEAD
$limite = 0;
$pagina = 0;
=======
>>>>>>> ab3e0b3f9bca0c53d4c1e0f1958dff10e5c482e3
if ($nfilas>0) {
  $limite = 5;
  $pagina = 1;
  if (isset($_GET['pg'])) {
    $pagina = $_GET['pg'];
  }
<<<<<<< HEAD
$inicio = ($pagina-1)*$limite;
$pagina_total = ceil($nfilas/$limite);
$LIMIT = " LIMIT $inicio,$limite";

  if ($_GET['action']=="obtener") {

    $resultado = $comentarios->getComentarios($_GET['id'],$LIMIT);
=======
}
$inicio = ($pagina-1)*$limite;
$pagina_total = ceil($nfilas/$limite);

  if ($_GET['action']=="obtener") {
    $resultado = $comentarios->getComentarios($_GET['id'],$inicio,$limite);
>>>>>>> ab3e0b3f9bca0c53d4c1e0f1958dff10e5c482e3
    header("Content-Type: application/json; charset=UTF-8");
    sleep(2);
    echo $resultado;
  }

  if ($_GET['action']=="insertar") {
    $comentarios->insertarComentario($_GET['id'],$_SESSION['usuario'],$_GET['texto']);
<<<<<<< HEAD
    $resultado = $comentarios->getComentarios($_GET['id'],$LIMIT);
    header("Content-Type: application/json; charset=UTF-8");
    sleep(1);
    echo $resultado;
  }
}
else {

  if ($_GET['action']=="obtener") {

    $resultado = $comentarios->getComentarios($_GET['id']);
=======
    $resultado = $comentarios->getComentarios($_GET['id'],$inicio,$limite);
>>>>>>> ab3e0b3f9bca0c53d4c1e0f1958dff10e5c482e3
    header("Content-Type: application/json; charset=UTF-8");
    sleep(1);
    echo $resultado;
  }

<<<<<<< HEAD
  if ($_GET['action']=="insertar") {
    $comentarios->insertarComentario($_GET['id'],$_SESSION['usuario'],$_GET['texto']);
    $resultado = $comentarios->getComentarios($_GET['id']);
    header("Content-Type: application/json; charset=UTF-8");
    sleep(1);
    echo $resultado;
  }
}
=======
>>>>>>> ab3e0b3f9bca0c53d4c1e0f1958dff10e5c482e3

?>
