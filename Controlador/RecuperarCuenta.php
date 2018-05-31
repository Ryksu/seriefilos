<?php
require '../Conf/Usuarios.php';
$Usuarios = new Usuarios();
if ($_POST['action'] == "comprobar") {
  if (isset($_POST['email'])&&!empty($_POST['email'])) {
    $email = $_POST['email'];
    $resultado = $Usuarios->Leer("foto,usuario,email","usuarios"," WHERE email = '$email'");
  }
  header("Content-Type: application/json; charset=UTF-8");

  echo $resultado;

}

if ($_POST['action']=="cambiar") {
  $resultado = false;
  if (isset($_POST['password'])&&!empty($_POST['password'])&&isset($_POST['repeat'])&&!empty($_POST['repeat'])) {

    $password =$_POST['password'];
    $repeat = $_POST['repeat'];
    if ($password==$repeat) {
      $pass_hash = password_hash($password,PASSWORD_BCRYPT);
      $resultado = $Usuarios->Actulizar("usuarios","Password = '$pass_hash'","usuario = '$usuario'");
    }
    header("Content-Type: application/json; charset=UTF-8");

    echo $resultado;
  }
}

 ?>
