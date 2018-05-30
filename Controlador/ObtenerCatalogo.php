<?php
require_once '../../Conf/Series.php';

$getseries= new Series();
  if (!isset($_GET['pg'])) {
    $res = $getseries->paginacion('id','serie');
    $res = json_decode($res,true);

  }
  else {
    $res = $getseries->paginacion('id','serie',$_GET);
    $res = json_decode($res,true);

  }

  if (isset($_GET['buscador']) && !empty($_GET['buscador'])) {
      $datos = $_GET['buscador'];
    $res = $getseries->paginacionResultado("Titulo","serie",$datos);
    $res = json_decode($res,true);

    if ($res ==NULL) {
      http_response_code(404);
      header('location: ../error/404.php');
    }
  }
  if (isset($_GET['año']) && !empty($_GET['año'])) {
      $datos = $_GET['año'];
    $res = $getseries->paginacionResultado("Year","serie",$datos);
    $res = json_decode($res,true);

    if ($res ==NULL) {
      http_response_code(404);
      header('location: ../error/404.php');
    }
  }
  if (isset($_GET['temporada']) && !empty($_GET['temporada'])) {
      $datos = $_GET['temporada'];

    $res = $getseries->paginacionResultado("Temporada","serie",$datos);
    $res = json_decode($res,true);

    if ($res ==NULL) {
      http_response_code(404);
      header('location: ../error/404.php');
    }
  }

  if (isset($_GET['Categoria']) && !empty($_GET['Categoria'])) {
      $datos = $_GET['Categoria'];

    $res = $getseries->paginacionResultado("Categoria","serie",$datos);
    $res = json_decode($res,true);

    if ($res ==NULL) {
      http_response_code(404);
      header('location: ../error/404.php');
    }
  }

  if (isset($_GET['Estado']) && !empty($_GET['Estado'])) {
      $datos = $_GET['Estado'];

    $res = $getseries->paginacionResultado("Estado","serie",$datos);
    $res = json_decode($res,true);
    if ($res ==NULL) {
      http_response_code(404);
      header('location: ../error/404.php');
    }
  }




?>
