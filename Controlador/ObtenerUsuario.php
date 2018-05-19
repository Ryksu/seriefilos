<?php
session_start();
require_once '../../Conf/Usuarios.php';
require_once '../../Conf/Series.php';
$obtener = new Usuarios();
$resultado = $obtener->obtenerUsusario($_SESSION['usuario']);
 $resultado = json_decode($resultado,true);



 ?>
