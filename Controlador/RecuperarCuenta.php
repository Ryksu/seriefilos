<?php
require '../Conf/Usuarios.php';
$Usuarios = new Usuarios();

if ($_POST['action'] === "comprobar") {
  $comprobar = [];
  $comprobar[0] = false;
  if (isset($_POST['email'])&&!empty($_POST['email'])) {
    $email = $_POST['email'];
    $resultado = $Usuarios->Leer("email","usuarios"," WHERE email = '$email'");
    $res = json_decode($resultado,true);
    if (count($res)>0) {
      $token =  Usuarios::getToken();
      $codigo = password_hash(Usuarios::$NumToken,PASSWORD_DEFAULT);
      $comprobar[0] = true;
      $comprobar[] = $codigo;
    }
    if(!empty($res[0]['email'])){
        $to = $res[0]['email'];
        $subject = "Recuperar cuenta";
        $mensaje = '
                      <!DOCTYPE html>
                      <html lang="es" dir="ltr">
                        <head>
                          <meta charset="utf-8">
                          <title>Verificar</title>
                        </head>
                        <body>
                        <p> Numero de verificacion:'.$token.'</p>
                        </body>
                      </html>
                    ';
        $headers = "MIME-Version: 1.0" . "\r\n";
        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
        mail($to,$subject,$mensaje,$headers);
    }
  }
  $comprobar = json_encode($comprobar);
  header("Content-Type: application/json; charset=UTF-8");
  echo $comprobar;
}
if ($_POST['action'] == "verificar") {
  if (isset($_POST['codigo'])&&!empty($_POST['codigo'])) {
    $codigo = $_POST['codigo'];
    $hash = $_POST['valor'];
    $email = $_POST['email'];
    $comprobar = Usuarios::verificarToken($codigo,$hash);
    if ($comprobar) {
      $resultado = $Usuarios->Leer("foto,usuario,email","usuarios"," WHERE email = '$email'");
      header("Content-Type: application/json; charset=UTF-8");
      echo $resultado;
    }
    else {
      echo "FAIL";
    }
  }
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

  }
  header("Content-Type: application/json; charset=UTF-8");
  echo $resultado;
}

 ?>
