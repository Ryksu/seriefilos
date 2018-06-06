<?php
session_start();
require '../Conf/Usuarios.php';
$nombre ="";
$email = "";
if(isset($_SESSION['usuario'])&&!empty($_SESSION['usuario'])){
  $nombre = $_SESSION['usuario'];
}else{
  $nombre = $_POST['nombre'];
}

if (isset($_SESSION['usuario'])&&!empty($_SESSION['usuario'])) {
$Usuarios = new Usuarios();
$usuario = $_SESSION['usuario'];
$resultado = $Usuarios->Leer("email","usuarios","where usuario = '$usuario'");
$resultado = json_decode($resultado,true);
  if (!empty($resultado[0]['email'])) {
  $email = $resultado[0]['email'];
  }
}else {
  $email = $_POST['email'];
}
$asunto = $_POST['asunto'];
$comentario = $_POST['comentario'];
$secreto = "6Lc6nVwUAAAAAFYwBXCcLjy9TWJ-HSBRAaqTR1R2";
$respuesta = $_POST['captcha'];

$verificar = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret={$secreto}&response={$respuesta}");
  $captcha_ok  = json_decode($verificar);
  if ($captcha_ok->success) {
    echo "OK";
    $subject = "tienes un nuevo mensaje con el asunto:". $asunto;
    $mensaje =  '<!DOCTYPE html>
    <html lang="en" dir="ltr">
      <head>
        <meta charset="utf-8">
        <title>Tienes un nuevo mensaje</title>
      </head>
      <body>
        <p> Hola Admin tienes un nuevo mensaje del usuario: <b>'.$nombre.'</b>, con el email  <b>'.$email.'</b></p>
        <p> el comentario es:</p>
        <p>'.$comentario.'</p>
      </body>
    </html>';
    $headers = "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

    mail("postmaster@ajwebdev.com",$subject,$mensaje,$headers);
    }else{
    echo "FAIL";
  }

 ?>
