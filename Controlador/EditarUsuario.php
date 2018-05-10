<?php
session_start();
require_once '../Conf/Usuarios.php';
$usuario = $_SESSION['usuario'];
$Usuarios = new Usuarios();

if (isset($_FILES['foto'])&&!empty($_FILES['foto'])) {
if(is_uploaded_file($_FILES['foto']['tmp_name'])&&$_FILES['foto']['size']<=1000000) {
  $foto = $_FILES['foto']['name'];
  $extension = explode(".",$foto);
  $foto_tipo = $_FILES['foto']['type'];
    if ($foto_tipo == "image/jpeg" || $poster_tipo == "image/x-png") {
      $hora = date('dmy');
      $alt = rand();
      $image = "$alt".$hora.".".$extension[1];
      $url = "../img/perfiles/".$image;
      move_uploaded_file($_FILES['foto']['tmp_name'],$url);

      $Usuarios->setFoto("../".$url,$usuario);
      echo 0; // La imagen se cargado correctamente
    }
  }
  else {
    echo 1; //  La imagen es muy pesada imagen menos de 1MB
  }

}

if (isset($_POST['email'])&&!empty($_POST['email'])) {
  $email =$_POST['email'];
  $Usuarios->Actulizar("usuarios","Email = '$email'","usuario = '$usuario'");
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
