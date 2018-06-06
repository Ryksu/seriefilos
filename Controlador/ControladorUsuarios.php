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
      $subject = " Verificar registro";
      $url = (isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]/login?action=verificar&usuario=$usuario";
      $mensaje = '
      <!DOCTYPE html>
      <html lang="es" dir="ltr">
        <head>
          <meta charset="utf-8">
          <title>Verificar</title>
        </head>
        <body>

          <p>Hola nos alegra tenerte por aqui, solo te falta un paso <br> <a href="'.$url.'">Verificar</a></p>
        </body>
      </html>';
        $headers = "MIME-Version: 1.0" . "\r\n";
        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

      mail($email,$subject,$mensaje,$headers);
    }

    echo $resultado;
}

 ?>
