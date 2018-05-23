<?php
session_start();
require_once '../../Conf/Series.php';
require_once '../../Conf/Comentarios.php';

$conexion = new Series();
$id = $_GET['id'];
$resultado = $conexion->ObtenerSerie($id);
$row = json_decode($resultado,true);
  $titulo = $row[0]['Titulo'];
  $poster = $row[0]['Poster'];
  $texto = $row[0]['Texto'];
  $categoria = $row[0]['Categoria'];
  $temporada = $row[0]['Temporada'];
  $year = $row[0]['Year'];
  $estado = $row[0]['Estado'];
  $trailer = $row[0]['Trailer'];
  $posteado = $row[0]['id_Usuarios'];

$comentarios = new Comentarios();
$nfilas = $comentarios->comentarioFila($_GET['id']);
if ($nfilas>0) {
  $limite = 5;
  $pagina = 1;
  if (isset($_GET['pg'])) {
    $pagina = $_GET['pg'];
  }

$inicio = ($pagina-1)*$limite;
$pagina_total = ceil($nfilas/$limite);
}
else {
  $pagina_total = 0;
}

$url = (isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

 ?>
