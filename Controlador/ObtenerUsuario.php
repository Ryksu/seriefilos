<?php
session_start();
require_once '../../Conf/Usuarios.php';
$obtener = new Usuarios();
  $nfilas = $obtener->ContadorFila('id','serie');
  $limite = 8;
  $pagina_total = ceil($nfilas/$limite);

$resultado = $obtener->obtenerUsusario($_SESSION['usuario']);
 $resultado = json_decode($resultado,true);



 ?>
