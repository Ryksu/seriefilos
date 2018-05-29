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
    if (isset($_POST['pg'])) {
      $series = $getseries->paginacion("*","serie",$_POST);
      $series = json_decode($series,true);
      $series['paginaTotal'] = Series::$pagina_total;
      $series['pagina'] = Series::$pagina;
      $series = json_encode($series);

    }else{
      $series = $getseries->paginacion("*","serie");
      $series = json_decode($series,true);
      $series['paginaTotal'] = Series::$pagina_total;
      $series['pagina'] = Series::$pagina;
      $series = json_encode($series);

    }
      header("Content-Type: application/json; charset=UTF-8");
      echo $series;
}


if ($_POST['action']=="BorrarSerie") {
  $id = $_POST['serie']  ;
  $borrar = new Series();
  echo $borrar->BorrarSerie($id);
}



 ?>
