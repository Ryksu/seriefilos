<?php
$tabla = "Serie";


if (!empty($_GET['buscador'])) {
  $pagina_total = ceil($conexion->getColumnRes($tabla,$_GET['buscador']) / $pub_limite);
  $res = $conexion->getBusqueda($tabla,$_GET['buscador'],$inicio,$pub_limite);
  $vacio = $conexion->vacio($tabla,$_GET['buscador'],$inicio,$pub_limite);
}


if (!empty($_GET['año'])){
  $year = $_GET['año'];
  if ($conexion->expYear($year)==1) {
    $pagina_total = ceil($conexion->getColumnRes($tabla,$_GET['año']) / $pub_limite);
    $res = $conexion->getBusqueda($tabla,$year,$inicio,$pub_limite);
    $vacio = $conexion->vacio($tabla,$year,$inicio,$pub_limite);

  }
  else {
    $error = true;
  }
}
  if (!empty($_GET['temporada'])) {
    $pagina_total = ceil($conexion->getColumnRes($tabla,$_GET['temporada']) / $pub_limite);
    $res = $conexion->getBusqueda($tabla,$_GET['temporada'],$inicio,$pub_limite);
    $vacio = $conexion->vacio($tabla,$_GET['temporada'],$inicio,$pub_limite);


  }
  if (!empty($_GET['Categoria'])) {
    $pagina_total = ceil($conexion->getColumnRes($tabla,$_GET['Categoria']) / $pub_limite);
    $res = $conexion->getBusqueda($tabla,$_GET['Categoria'],$inicio,$pub_limite);

    $vacio = $conexion->vacio($tabla,$_GET['Categoria'],$inicio,$pub_limite);
  }



 ?>
