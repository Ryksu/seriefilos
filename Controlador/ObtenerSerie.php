<?php
session_start();
require_once '../../Conf/Series.php';
require_once '../../Conf/Comentarios.php';
if (isset($_GET['buscador'])) {
  header('location:catalogos.php?'.$_SERVER['QUERY_STRING']);
}

$conexion = new Series();
$id = $_GET['id'];
$resultado = $conexion->ObtenerSerie($id);
$row = json_decode($resultado,true);
  $titulo = htmlentities($row[0]['Titulo'],ENT_QUOTES,"UTF-8");
  $poster = htmlentities($row[0]['Poster'],ENT_QUOTES,"UTF-8");
  $texto = $row[0]['Texto'];
  $categoria = explode(",",$row[0]['Categoria']);
  $temporada = htmlentities($row[0]['Temporada'],ENT_QUOTES,"UTF-8");
  $year = htmlentities($row[0]['Year'],ENT_QUOTES,"UTF-8");
  $estado = htmlentities($row[0]['Estado'],ENT_QUOTES,"UTF-8");
  $trailer = $row[0]['Trailer'];
  $posteado = htmlentities($row[0]['id_Usuarios'],ENT_QUOTES,"UTF-8");

$url = (isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

 ?>
