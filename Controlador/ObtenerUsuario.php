<?php
session_start();
require_once '../../Conf/Usuarios.php';
$obtener = new Usuarios();
$resultado = $obtener->obtenerUsusario($_SESSION['usuario']);
 $resultado = json_decode($resultado,true);

 $todos = $obtener->obtenerUsusarios();
 $todos = json_decode($todos,true);

 ?>
