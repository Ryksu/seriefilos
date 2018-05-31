<?php
session_start();
if (!isset($_SESSION['usuario'])&&empty($_SESSION['usuario'])) {
  header('location: ../login.php');
}
require_once '../../Conf/Usuarios.php';
require_once '../../Conf/Series.php';

$Usuarios = new Usuarios();
$resultado = $Usuarios->ObtenerUsuario($_SESSION['usuario']);
 $resultado = json_decode($resultado,true);


 ?>
