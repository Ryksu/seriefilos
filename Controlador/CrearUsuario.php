<?php
session_start();
require_once '../Conf/Usuarios.php';
$usuario = $_POST['usuario'];
$email = $_POST['email'];

if ($_POST['password']==$_POST['repeat']) {
  $password = $_POST['password'];
  /* ciframos el password */
  $pass_cifrado = password_hash($password,PASSWORD_BCRYPT);
  $nuevo = new Usuarios($usuario,$pass_cifrado,$email);
  header('location: ../index.php');

}
else {
  $mensaje = "Error en la contraseña";
  header('localtion: ../index.php#registrar');
}


 ?>
