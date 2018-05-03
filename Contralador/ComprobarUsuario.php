<?php
require_once '../Conf/NewCrud.php';
$bda = new NewCrud();
$usuario = $_POST['usuario'];
$condicion = "WHERE usuario = '$usuario'";
$comprobar = $bda->Leer('usuario','usuarios',$condicion);

header("Content-Type: application/json; charset=UTF-8");
echo $comprobar;
 ?>
