<?php
session_start();
require_once '../Conf/Series.php';
require_once '../lib/parsedown-master/Parsedown.php';
$Series = new Series();
$parsedown = new Parsedown();
$id = $_POST['id'];
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
           $postertmp = $url;
           $ancho = 1000;
           $alto = 1000;
           list($anchoOring,$altoOring) = getimagesize($postertmp);
           $ratioOriginal = $anchoOring/$altoOring;
           if ($ancho/$alto > $ratioOriginal) {
             $ancho = $alto * $ratioOriginal;
           }
           else{
             $alto = $ancho * $ratioOriginal;
           }
           $lienzo = imagecreatetruecolor($ancho,$alto);
           switch ($Poster_tipo) {
             case 'image/jpg':
             $origen = imagecreatefromjpeg($postertmp);
               break;
             case 'image/jpeg':
             $origen = imagecreatefromjpeg($postertmp);
               break;
             case 'image/png':
             $origen = imagecreatefrompng($postertmp);
               break;
             case 'image/gif':
               $origen = imagecreatefromgif($postertmp);
               break;
           }
           imagecopyresampled($lienzo,$origen,0,0,0,0,$ancho,$alto,$anchoOring,$altoOring);

           switch ($Poster_tipo) {
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
           $Series->Actulizar("serie","Poster = '../$url'"," id = '$id'");

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
  $datos = ucfirst($_POST['Titulo']);
  echo $Series->Actulizar("serie","Titulo = '$datos'","id = '$id'");
}

if (isset($_POST['Texto'])&&!empty($_POST['Texto'])) {
  $sinopsis = $_POST['Texto'];
  $sinopsis = str_replace("'","\"",$sinopsis);
  $texto = Parsedown::instance()
            ->setMarkupEscaped(true)
            ->text($sinopsis);

  echo $Series->Actulizar("serie","Texto = '$texto'","id = '$id'");
}
if (isset($_POST['Categoria'])&&!empty($_POST['Categoria'])) {
  $categoria = $_POST['Categoria'];
  echo $Series->Actulizar("serie","Categoria = '$categoria'","id = '$id'");
}

if (isset($_POST['Year'])&&!empty($_POST['Year'])) {
  if($Series->expYear($_POST['Year'])){
    $year = $_POST['Year'];
    echo $Series->Actulizar("serie","Year = '$year'","id = '$id'");
  }
}

if (isset($_POST['Temporada'])&&!empty($_POST['Temporada'])) {
  $temporada = $_POST['Temporada'];
  echo $Series->Actulizar("serie","Temporada = '$temporada'","id = '$id'");
}

if (isset($_POST['Estado'])&&!empty($_POST['Estado'])) {
  $estado = $_POST['Estado'];
  echo $Series->Actulizar("serie","Estado = '$estado'","id = '$id'");
}

if (isset($_POST['Trailer'])&&!empty($_POST['Trailer'])) {
  if (strlen($_POST['Trailer'])==43) {
    $video = explode("=",$_POST['Trailer']);
    $iframe = '<iframe width="560" height="315" src="https://www.youtube.com/embed/'.$video[1].'" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>';
    $trailer = $iframe;
    $Series->Actulizar("serie","Trailer = '$trailer'","id = '$id'");
  }
  else{
      echo 2;
  }
}
 ?>
