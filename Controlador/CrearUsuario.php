<?php
session_start();
require_once '../Conf/Usuarios.php';

$usuario = $_POST['usuario'];
$password = $_POST['password'];
$repeat = $_POST['repeat'];
$email = $_POST['email'];
$resultado = false;

  if ($password == $repeat) {
    $pass_hash = password_hash($password,PASSWORD_BCRYPT);
    $nuevo = new Usuarios();
    $resultado = $nuevo->CrearUsuario($usuario,$pass_hash,$email);
    $resultado = json_encode($resultado);
  }

  echo $resultado;





 ?>
