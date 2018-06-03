<?php
session_start();
require_once '../Conf/Series.php';
require_once '../lib/parsedown-master/Parsedown.php';
$Series = new Series();
$parsedown = new Parsedown();
$comprobarURL = 0;
$url = '';
if (isset($_FILES['Poster'])&&!empty($_FILES['Poster'])) {
  if ($_FILES['Poster']['size']<=2000000) {
    if(is_uploaded_file($_FILES['Poster']['tmp_name'])) {
    $Poster = $_FILES['Poster']['name'];
    $extension = explode(".",$Poster);
    $Poster_tipo = $_FILES['Poster']['type'];
      if ($Poster_tipo == "image/jpeg" || $Poster_tipo == "image/png") {
        "entro";
        $titulo = explode(" ",$_POST['Titulo']);
        $poster = implode("_",$titulo).".".$extension[1];
        $url = "../img/poster/".$poster;
         if(move_uploaded_file($_FILES['Poster']['tmp_name'],$url)){
           $comprobarURL = 1; // La imagen se ha cargado correctamente
           echo $comprobarURL;
         }
      }
      else{
        $comprobarURL = 2;
        echo $comprobarURL; // Lo siento aun no tenemos soporte para esta extension prueba con jpg, png o gif
      }
    }
  }
  else {
    $comprobarURL = 3;
    echo $comprobarURL;
  }
}

if (isset($_POST['Titulo'])&&!empty($_POST['Titulo'])) {
  if ($comprobarURL!=1) {
    var_dump("Entro");
    echo $comprobarURL."0";
  }
  else {
    $titulo = ucfirst($_POST['Titulo']);
    $sinopsis =$_POST['Texto'];

    $sinopsis = str_replace("'","\"",$sinopsis);
    $texto = Parsedown::instance()
            ->setMarkupEscaped(true)
            ->text($sinopsis);
    $year = $_POST['Year'];
    $temporada = $_POST['Temporada'];
    $categoria = $_POST["Categoria"];
    $estado = $_POST['Estado'];
    if (isset($_POST['Trailer'])&&!empty($_POST['Trailer'])) {
      if (strlen($_POST['Trailer'])==43) {
        $video = explode("=",$_POST['Trailer']);
        $iframe = '<iframe width="560" height="315" src="https://www.youtube.com/embed/'.$video[1].'" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>';
        $trailer = $iframe;
          echo $Series->AgregarSerie("../".$url,$titulo,$texto,$categoria,$year,$temporada,$estado,$_SESSION['usuario'],"$trailer");
      }
      else{
          echo 2;
      }
    }
    else{
      echo $Series->AgregarSerie("../".$url,$titulo,$texto,$categoria,$year,$temporada,$estado,$_SESSION['usuario']);

    }
  }
}

 ?>
