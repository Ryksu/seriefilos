<?php
require_once '../../Conf/Usuarios.php';

if (!isset($_SESSION['usuario'])&&empty($_SESSION['usuario'])) {
  header("location:/login");
}
$usuarios = new Usuarios();
$usuario = $_GET['usuario'];
if ($_GET['usuario']!='admin') {
  $res = $usuarios->ObtenerUsuario($usuario);
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
