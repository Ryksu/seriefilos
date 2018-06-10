<?php
session_start();
require_once '../../Controlador/ControladorPerfilPublico.php';

?>
<!DOCTYPE html>
<html lang="es" dir="ltr">

<head>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="icon" href="/img/icons/favicon.png" type="image/x-png">
  <link rel="manifest" href="/manifest.json" >
  <meta charset="utf-8">
  <title>Seriefilos: <?php echo $resultado[0]['usuario'] ?></title>
  <link rel="stylesheet" href="../../estilo/css/estilo_contacto.css">
  <link rel="stylesheet" href="../../estilo/css/estilo_publico.css">
  <script src="../../lib/jquery/jquery-3.3.1.min.js"></script>
  <script src="../../js/buscador.js"></script>

</head>

<body>
  <div class="container">
    <header class="cabecera">
      <nav class="menu">
        <ul>
          <li class="t-logo">
            Seriefilos  <span class="fas fa-angle-down"></span>
          </li>
          <!--t-logo-->
          <li><a href="../../index">Inicio</a></li>
          <li><a href="/catalogo">Catálogo</a></li>
          <li class=""><a href="/logout">Cerrar sesión</a></li>
        </ul>
        <div class="c-buscador">
          <form class="b-buscador" id="form_search" method="get" action="/catalogo">
            <button id="button_search" type="button" class="m-buscador">
        <span class="fa fa-search"></span>
      </button>
            <input type="search" id="buscador" name="buscador" value="" placeholder="Buscar..">
          </form>
        </div>
      </nav>
      <!-- menu -->
    </header>
    <!-- cabecera-->
    <main class="contenido" id="contenido">
      <div class="public">

            <div class="c-foto">
              <img src="<?php echo $resultado[0]['foto'] ?>" id="imagen" alt="<?php echo "imagen de perfil de ". $resultado[0]['usuario'] ?>">
              <h1><?php echo $resultado[0]['usuario'] ?></h1>
          </div>
          <div class="datos">
            <p>
                <span>Email:</span>
                <?php echo $resultado[0]['email'] ?></p>
              <p>
                <span>Nombre:</span>
                 <?php echo $nombre = (!empty($resultado[0]['nombre'])) ?  $resultado[0]['nombre'] :  "Sin nombre "; ?></p>
             <p>
               <span>Apellidos:</span>
               <?php echo $apellidos = (!empty($resultado[0]['apellidos'])) ? $resultado[0]['apellidos'] : "Sin apellidos" ; ?> </p>
             <p>
               <span>Cumpleaños:</span>
               <?php
               if (!empty($resultado[0]['cumple'])) {
                 $time = strtotime($resultado[0]['cumple']);
                 echo date("d M Y",$time);
               }else {
                 echo "Sin cumpleaños";
               }

               ?></p>
         </div>
          <div class="sobremi">
            <h2>Sobre <?php echo $resultado[0]['usuario'] ?></h2>
            <?php echo $info = (!empty($resultado[0]['informacion'])) ? $resultado[0]['informacion'] : "<p>No hay informacion sobre el usuario</p>" ?>
          </div>
        </div>
  </main>
    <footer>
      <div class="redes_sociales">
        <ul>
          <li>
            <a href="https://facebook.com/">
        <span class="fab fa-facebook"></span>
        facebook
      </a>
          </li>
          <li>
            <a href="https://twitter.com/">
        <span class="fab fa-twitter"></span>
        twitter
      </a>
          </li>
          <li>
            <a href="https://www.instagram.com/">
        <span class="fab fa-instagram"></span>
        instagram
      </a>
          </li>
          <li><a href="contacto">
            <span class="fas fa-info"></span>
            nfo
          </a></li>
        </ul>
      </div>
    </footer>
  </div>
</body>

</html>
