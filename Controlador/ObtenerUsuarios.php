<?php
require_once '../Conf/Usuarios.php';

$obtener = new Usuarios();

$usuarios= $obtener->obtenerUsusarios();
header("Content-Type: application/json; charset=UTF-8");

echo $usuarios;

 ?>
