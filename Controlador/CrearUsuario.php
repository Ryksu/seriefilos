<?php
session_start();
require_once '../Conf/Usuarios.php';

$usuario = $_POST['usuario'];
$password = $_POST['password'];
$repeat = $_POST['repeat'];
$email = $_POST['email'];
if (isset($_POST['singup'])) {
  if ($password == $repeat) {
    $pass_hash = password_hash($password,PASSWORD_BCRYPT);
    $nuevo = new Usuarios();
    $nuevo->CrearUsuario($usuario,$pass_hash,$email);
    header("refresh:5;url=../index.php");
    echo "<p>Tus datos han sido guardados perfectamente, volveremos a la pagina principal en 5 seg, puedes hacer <a href='../index.php'> clic </a> para volver a la pagina principal</p>";

  }
  else{
    header("refresh:5;url=../index.php");
    echo "<p>Hubo un error volvemos a la pagina principal</p>";
  }

}




 ?>
