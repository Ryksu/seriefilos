<?php
session_start();
require_once '../Conf/Usuarios.php';
$usuario = (isset($_POST['usuario'])&&!empty($_POST['usuario'])) ? $_POST['usuario'] : $_SESSION['usuario'] ;;
$Usuarios = new Usuarios();

if (isset($_FILES['foto'])&&!empty($_FILES['foto'])) {
  if ($_FILES['foto']['size']<=2000000) {
    if(is_uploaded_file($_FILES['foto']['tmp_name'])) {

      $fototmp = $_FILES['foto']['tmp_name'];
      $ancho = 250;
      $alto = 250;
      list($Oancho,$Oalto) = getimagesize($fototmp);
      $ratioOriginal  = $Oancho/$Oalto;
      if ($ancho/$alto > $ratioOriginal) {
        $ancho = $alto * $ratioOriginal;
      }else {
        $alto = $ancho * $ratioOriginal;
      }
      $lienzo = imagecreatetruecolor($ancho,$alto);
    $foto = $_FILES['foto']['name'];
    $extension = explode(".",$foto);
    $foto_tipo = $_FILES['foto']['type'];

      if ($foto_tipo == "image/jpeg" || $foto_tipo == "image/png" || $foto_tipo == "image/gif") {
        switch ($foto_tipo) {
          case 'image/jpeg':
          $origen = imagecreatefromjpeg($fototmp);
            break;
          case 'image/png':
          $origen = imagecreatefrompng($fototmp);
            break;
          case 'image/gif':
            $origen = imagecreatefromgif($foto);
            break;
        }
        $hora = date('dmy');
        $alt = rand();
        $image = "$alt".$hora.".".$extension[1];

        $url = "../img/perfiles/".$image;
         var_dump(imagecopyresampled($lienzo,$origen,0,0,0,0,$ancho,$alto,$Oancho,$Oalto));


        move_uploaded_file($imagen_resize,$url);

        $Usuarios->setFoto("../".$url,$usuario);
        echo 0; // La imagen se cargado correctamente
      }
      else{
        echo 2; // Lo siento aun no tenemos soporte para esta extension prueba con jpg, png o gif
      }
    }
  }
  else {
    echo 1;
  }
}


if (isset($_POST['email'])&&!empty($_POST['email'])) {
  $email =$_POST['email'];
  $Usuarios->Actulizar("usuarios","Email = '$email'","usuario = '$usuario'");
}
if (isset($_POST['password'])&&!empty($_POST['password'])&&isset($_POST['repeat'])&&!empty($_POST['repeat'])) {

  $password =$_POST['password'];
  $repeat = $_POST['repeat'];
  if ($password==$repeat) {
    $pass_hash = password_hash($password,PASSWORD_BCRYPT);
    $Usuarios->Actulizar("usuarios","Password = '$pass_hash'","usuario = '$usuario'");
  }
}


if (isset($_POST['nombre'])&&!empty($_POST['nombre'])) {
  $nombre =$_POST['nombre'];
  $Usuarios->Actulizar("usuarios","Nombre = '$nombre'","usuario = '$usuario'");
}
if (isset($_POST['apellidos'])&&!empty($_POST['apellidos'])) {
  $apellidos =$_POST['apellidos'];
  $Usuarios->Actulizar("usuarios","Apellidos = '$apellidos'","usuario = '$usuario'");
}
if (isset($_POST['cumple'])&&!empty($_POST['cumple'])) {
  $cumple =$_POST['cumple'];
  $Usuarios->Actulizar("usuarios","Cumple = '$cumple'","usuario = '$usuario'");
}

 ?>
