<?php
session_start();
require_once '../../Conf/Series.php';
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


$url = (isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

 ?>
