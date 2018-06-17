<?php
require_once '../../Conf/Usuarios.php';
require_once '../../Conf/Series.php';


if (!isset($_SESSION['usuario'])&&empty($_SESSION['usuario'])) {
  header("location:/login");
}
$usuarios = new Usuarios();
$Series = new Series();
$usuario = $_GET['usuario'];

if ($_GET['usuario']!='Admin') {
  $res = $usuarios->ObtenerUsuario($usuario);

  if (isset($_GET['pg'])) {
    $publicacion = $Series->paginacionPublicaciones($usuario,$_GET);
  }
  else {
    $publicacion = $Series->paginacionPublicaciones($usuario);
  }
  $publicacion = json_decode($publicacion,true);
  $res = json_decode($res,true);
    if (!empty($res)) {
      $resultado = $res;
    }
    else{
      header("refresh:0,url=/catalogo");
      echo '<script type="text/javascript">
        alert("El usuario no existe");
      </script>';
    }
}
else{
  header("refresh:0,url=/catalogo");
  echo '<script type="text/javascript">
    alert("El usuario no existe");
  </script>';
}


 ?>
