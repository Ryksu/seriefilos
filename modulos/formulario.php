<?php
// ini_set('display_errors',1);
// ini_set('display_starup_errors',1);
// error_reporting(E_ALL);
require 'Config.php';
require 'Crud.php';
$url;
if (is_uploaded_file($_FILES['Poster']['tmp_name'])&& $_FILES['Poster']['size']<=1000000){
  $poster = $_FILES['Poster']['name'];
  $poster_tipo = $_FILES['Poster']['type'];
  $tipo = explode(".",$poster);
  if ($poster_tipo == "image/jpeg" || $poster_tipo == "image/x-png") {
    $url_poster = '../poster/';
    $titulo = explode(" ",$_POST['Titulo']);
    $poster =implode("_",$titulo).".".$tipo[1];
// var_dump($url_poster);
    move_uploaded_file($_FILES['Poster']['tmp_name'],$url_poster.$poster);
    $url = $url_poster.$poster;
  }
}
else {
  echo '<script  type="text/javascript">
  alert("El tamaño de la imagen es muy grande");
  </script>
  ';
}

// var_dump($url);



$conexion = new Crud();
/* Conectar a la base datos*/
$conexion->conectar();
/*nombre de la tabla*/
$nomtabla = 'Serie';


if (!empty($_POST['Titulo'])) {
  $conexion->setSerie($nomtabla,$url,$_POST['Titulo'],$_POST['Texto'],$_POST['Categoria'],$_POST['Year'],$_POST['Temporada'],$_POST['Estado']);
}
if (isset($_POST['Enviar'])) {
  $nombre = $_POST['nombre'];
  $asunto = 'Seriefilos: Gracias';
  $para = $_POST['correo'];
  $seleAsunto = $_POST['asunto'];
  switch ($seleAsunto) {
    case 'serie':
    $mensaje = $nombre ." Gracias! por enviar la serie";
    break;

    case 'consulta':
    $mensaje = $nombre ." Gracias! por enviar su consulta";
    break;

  }
  mail($para,$asunto,$mensaje);
}
if (!empty($_POST['comentario'])) {
  $para = "alesisjesus9@gmail.com";
  $asunto = "Seriefilos: Tienes una nueva consulta";
  $mensaje = $_POST["comentario"];
  mail($para,$asunto,$mensaje);
}


header("location: ../page/contacto.html");




 ?>
