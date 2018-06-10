<?php
session_start();
require_once '../Conf/Usuarios.php';
require_once '../lib/parsedown-master/Parsedown.php';

$usuario = (isset($_POST['usuario'])&&!empty($_POST['usuario'])) ? $_POST['usuario'] : $_SESSION['usuario'] ;
$Usuarios = new Usuarios();
$usuarioDatos = $Usuarios->ObtenerUsuario($_SESSION['usuario']);
$usuarioDatos = json_decode($usuarioDatos,true);

if (isset($_FILES['foto'])&&!empty($_FILES['foto'])) {
  if ($_FILES['foto']['size']<=2000000) {
    if(is_uploaded_file($_FILES['foto']['tmp_name'])) {
    $foto = $_FILES['foto']['name'];
    $extension = explode(".",$foto);
    $foto_tipo = $_FILES['foto']['type'];

      if ($foto_tipo == "image/jpeg" || $foto_tipo == "image/png" || $foto_tipo == "image/gif") {

        $hora = date('dmy');
        $alt = rand();
        $image = "$alt".$hora.".".$extension[1];
        $url = "../img/perfiles/".$image;
        move_uploaded_file($_FILES['foto']['tmp_name'],$url);

        $fototmp = $url;
        $ancho = 200;
        $alto = 200;
        list($Oancho,$Oalto) = getimagesize($fototmp);
        $ratioOriginal  = $Oancho/$Oalto;
        if ($ancho/$alto > $ratioOriginal) {
          $ancho = $alto * $ratioOriginal;
        }else {
          $alto = $ancho * $ratioOriginal;
        }
        $lienzo = imagecreatetruecolor($ancho,$alto);
        switch ($foto_tipo) {
          case 'image/jpg':
          $origen = imagecreatefromjpeg($fototmp);
            break;
          case 'image/jpeg':
          $origen = imagecreatefromjpeg($fototmp);
            break;
          case 'image/png':
          $origen = imagecreatefrompng($fototmp);
            break;
          case 'image/gif':
            $origen = imagecreatefromgif($fototmp);
            break;
        }
        // Set the content type header - in this case image/jpeg
         imagecopyresampled($lienzo,$origen,0,0,0,0,$ancho,$alto,$Oancho,$Oalto);
         switch ($foto_tipo) {
           case 'image/jpg':
           imagejpeg($lienzo,$url);
           imagedestroy($lienzo);
             break;
           case 'image/jpeg':
           imagejpeg($lienzo,$url);

           imagedestroy($lienzo);

             break;
           case 'image/png':
           imagepng($lienzo,$url);
           imagedestroy($lienzo);

             break;
           case 'image/gif':
             imagegif($lienzo,$url);
             imagedestroy($lienzo);

             break;
         }

        echo $Usuarios->setFoto("../".$url,$usuario);
         // La imagen se cargado correctamente
      }
      else{
        echo 2; // Lo siento aun no tenemos soporte para esta extension prueba con jpg, png o gif
      }
    }
  }
  else {
    echo 3;
  }
}

if ($_POST['email']!=$usuarioDatos[0]['email']) {
  if (isset($_POST['email'])&&!empty($_POST['email'])) {
    $email =$_POST['email'];
    $resultado = $Usuarios->Leer("email","usuarios"," where email ='$email'");
    $resultado = json_decode($resultado,true);
    if (empty($resultado)) {
       $Usuarios->Actulizar("usuarios","Email = '$email'","usuario = '$usuario'");
     }else {
      echo "e0";
    }
  }
}


if(isset($_POST['password'])&&!empty($_POST['password'])&&isset($_POST['repeat'])&&!empty($_POST['repeat'])) {

  $password =$_POST['password'];
  $repeat = $_POST['repeat'];
  if ($password==$repeat) {
    $pass_hash = password_hash($password,PASSWORD_BCRYPT);
    $Usuarios->Actulizar("usuarios","Password = '$pass_hash'","usuario = '$usuario'");
  }
}

if ($_POST['nombre']!=$usuarioDatos[0]['nombre']) {
  if (isset($_POST['nombre'])&&!empty($_POST['nombre'])) {
    $nombre =$_POST['nombre'];
    $Usuarios->Actulizar("usuarios","Nombre = '$nombre'","usuario = '$usuario'");
  }

}
if ($_POST['apellidos']!=$usuarioDatos[0]['apellidos']) {
  if (isset($_POST['apellidos'])&&!empty($_POST['apellidos'])) {
    $apellidos =$_POST['apellidos'];
    $Usuarios->Actulizar("usuarios","Apellidos = '$apellidos'","usuario = '$usuario'");
  }
}
if ($_POST['cumple']!=$usuarioDatos[0]['cumple']) {
  if (isset($_POST['cumple'])&&!empty($_POST['cumple'])) {
    $cumple =$_POST['cumple'];
    $Usuarios->Actulizar("usuarios","Cumple = '$cumple'","usuario = '$usuario'");
  }
}

if ($_POST['informacion']!=$usuarioDatos[0]['informacion']) {
  if (isset($_POST['informacion'])&&!empty($_POST['informacion'])) {
    $info = $_POST['informacion'];
    $info = str_replace("'","\"",$info);
    $sobremi= Parsedown::instance()
              ->setMarkupEscaped(true)
              ->text($info);
  $Usuarios->Actulizar("usuarios","informacion = '$sobremi'","usuario = '$usuario'");
  }
}

 ?>
