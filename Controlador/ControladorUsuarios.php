<?php
require_once '../Conf/Usuarios.php';
$Usuarios = new Usuarios();
if ($_POST['action']=="ComprobarUsuario") {
  $usuario = $_POST['usuario'];
  $condicion = "WHERE usuario = '$usuario' and usuario !='Admin'";
  $comprobar = $Usuarios->Leer('usuario','usuarios',$condicion);
  if ($_POST['usuario']=="admin") {
    $comprobar = 0;
  }
  header("Content-Type: application/json; charset=UTF-8");
  echo $comprobar;
}
if ($_POST['action']=="ComprobarEmail") {
  if (filter_var($_POST['email'],FILTER_VALIDATE_EMAIL)) {
    $email = $_POST['email'];
    $condicion = " WHERE Email = '$email'";
    $comprobar = $Usuarios->Leer("Email","usuarios",$condicion);
  }else {
    $comprobar =0;
  }
  header("Content-Type: application/json; charset=UTF-8");
  echo $comprobar;
}

if ($_POST['action']=="Registrar") {
  $usuario = $_POST['usuario'];
  $password = $_POST['password'];
  $repeat = $_POST['repeat'];
  if (filter_var($_POST['email'],FILTER_VALIDATE_EMAIL)) {
    $email = $_POST['email'];
  }
  $resultado = false;

    if ($password == $repeat) {
      $pass_hash = password_hash($password,PASSWORD_BCRYPT);
      $resultado = $Usuarios->CrearUsuario($usuario,$pass_hash,$email);
      $resultado = json_encode($resultado);
    }

    echo $resultado;
}

 ?>
