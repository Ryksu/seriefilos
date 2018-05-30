<?php
session_start();
require_once '../Conf/Comentarios.php';
$comentarios = new Comentarios();
$id = $_GET['id'];
if ($_GET['action']=="obtener") {
  if (isset($_GET['pg'])) {
    $resultado = $comentarios->paginacion($id,$_GET);
    $resultado = json_decode($resultado,true);
    $resultado['paginaTotal'] = Comentarios::$pagina_total;
    $resultado['pagina'] = Comentarios::$pagina;
    $resultado = json_encode($resultado);
  }
  else{
    $resultado = $comentarios->paginacion($id);
    $resultado = json_decode($resultado,true);
    $resultado['paginaTotal'] = Comentarios::$pagina_total;
    $resultado['pagina'] = Comentarios::$pagina;
    $resultado = json_encode($resultado);



  }
  header("Content-Type: application/json; charset=UTF-8");
  sleep(2);
  echo $resultado;
}
if ($_GET['action']=="insertar") {
  $texto = $_GET['texto'];
  $usuario = $_SESSION['usuario'];
    $comentarios->insertarComentario($id,$usuario,$texto);
    if (isset($_GET['pg'])) {
      $resultado = $comentarios->paginacion($id,$_GET);
      $resultado = json_decode($resultado,true);
      $resultado['paginaTotal'] = Comentarios::$pagina_total;
      $resultado['pagina'] = Comentarios::$pagina;
      $resultado = json_encode($resultado);
    }
    else{
      $resultado = $comentarios->paginacion($id);
      $resultado = json_decode($resultado,true);
      $resultado['paginaTotal'] = Comentarios::$pagina_total;
      $resultado['pagina'] = Comentarios::$pagina;
      $resultado = json_encode($resultado);

    }
    header("Content-Type: application/json; charset=UTF-8");
    sleep(1);
    echo $resultado;
}
?>
