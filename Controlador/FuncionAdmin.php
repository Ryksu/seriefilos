<?php
session_start();
require_once '../Conf/Usuarios.php';
require_once '../Conf/Series.php';

if ($_POST['action']=="ObtenerUsuarios") {
  $obtener = new Usuarios();
  $usuarios= $obtener->obtenerUsusarios();
  header("Content-Type: application/json; charset=UTF-8");
  echo $usuarios;
}
if ($_POST['action']=="BorrarUsuario") {
  require_once '../Conf/Usuarios.php';
  $usuario = $_POST['usuario']  ;
  $borrar = new Usuarios();
  echo $borrar->borrarUsuario($usuario);
}

if($_POST['action']=="ObtenerSeries"){
  $getseries= new Series();
  $nfilas = $getseries->ContadorFila("id","serie");
  if ($nfilas>0) {
    $limite = 8;
    $pagina = 1;
    if (isset($_POST['pg'])) {
      $pagina = $_POST['pg'];
    }
    $inicio = ($pagina-1)*$limite;
    $pagina_total = ceil($nfilas/$limite);

    $series = $getseries->obtenerSeries($inicio,$limite);
    header("Content-Type: application/json; charset=UTF-8");

    echo $series;
  }

}

if ($_POST['action']=="BorrarSerie") {
  $id = $_POST['serie']  ;
  $borrar = new Series();
  echo $borrar->BorrarSerie($id);
}



 ?>