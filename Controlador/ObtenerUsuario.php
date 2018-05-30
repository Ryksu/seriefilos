<?php
session_start();
require_once '../../Conf/Usuarios.php';
require_once '../../Conf/Series.php';

$Usuarios = new Usuarios();


$resultado = $Usuarios->ObtenerUsuario($_SESSION['usuario']);
 $resultado = json_decode($resultado,true);


 ?>
