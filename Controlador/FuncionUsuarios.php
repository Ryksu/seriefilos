<?php
require_once '../Conf/Usuarios.php';
$usuarios = new Usuarios();
if ($_POST['action']=="Comprobar") {
  $usuario = $_POST['usuario'];
  $condicion = "WHERE usuario = '$usuario'";
  $comprobar = $usuarios->Leer('usuario','usuarios',$condicion);

  header("Content-Type: application/json; charset=UTF-8");
  echo $comprobar;
}
if ($_POST['action']=="Registrar") {

}

 ?>
