<?php
require_once '../Conf/Usuarios.php';
$Usuarios = new Usuarios();
if ($_POST['action']=="Comprobar") {
  $usuario = $_POST['usuario'];
  $condicion = "WHERE usuario = '$usuario'";
  $comprobar = $Usuarios->Leer('usuario','usuarios',$condicion);

  header("Content-Type: application/json; charset=UTF-8");
  echo $comprobar;
}

if ($_POST['action']=="Registrar") {
  $usuario = $_POST['usuario'];
  $password = $_POST['password'];
  $repeat = $_POST['repeat'];
  $email = $_POST['email'];
  $resultado = false;

    if ($password == $repeat) {
      $pass_hash = password_hash($password,PASSWORD_BCRYPT);
      $resultado = $Usuarios->CrearUsuario($usuario,$pass_hash,$email);
      $resultado = json_encode($resultado);
    }

    echo $resultado;
}

 ?>
