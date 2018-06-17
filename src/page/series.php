<?php
require_once '../../Controlador/ObtenerSerie.php';
 ?>
 <!DOCTYPE html>
 <html lang="es" dir="ltr">
   <head>
     <meta name="title" content="Seriefilos: <?php echo $titulo ?>">
     <meta name="description" content="<?php
     $descrip = substr($texto,0,300);
     $descrip= strip_tags($descrip);
     $descrip = str_replace('"','',$descrip);
     echo $descrip;
      ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="/img/icons/favicon.png" type="image/x-png">
    <link rel="manifest" href="/manifest.json" >
     <meta charset="utf-8">
     <link rel="stylesheet" href="../../estilo/css/estilo_catalogo.css">
     <link rel="stylesheet" href="../../estilo/css/estilo_series.css">
     <script src="../../lib/jquery/jquery-3.3.1.min.js"></script>
     <script src="../../js/api.js"></script>
     <script src="../../js/Puntuacion.js" ></script>
     <script src="../../js/ListaDatos.js" ></script>
     <script src="../../js/buscador.js" ></script>


     <title>Seriefilos: <?php echo " ".  $titulo  ?></title>
   </head>
   <body>
     <!-- Boton facebook -->
     <div id="fb-root"></div>
     <script>(function(d, s, id) {
       var js, fjs = d.getElementsByTagName(s)[0];
       if (d.getElementById(id)) return;
       js = d.createElement(s); js.id = id;
       js.src = 'https://connect.facebook.net/es_ES/sdk.js#xfbml=1&version=v2.12';
       fjs.parentNode.insertBefore(js, fjs);
     }(document, 'script', 'facebook-jssdk'));</script>
     <!-- Boton facebook -->
     <div class="container">
       <header class="cabecera">
         <nav class="menu">
           <ul>
             <li class="t-logo">
              Seriefilos  <span class="fas fa-angle-down"></span>
             </li>
             <!--t-logo-->
             <li> <a href="../../index#t-logo">Inicio</a></li>
             <li><a href="/catalogo">Catálogo</a></li>
             <li class="s-menu">
               <?php if (isset($_SESSION['usuario'])&&!empty($_SESSION['usuario'])): ?>
                 <a href="/perfil"><?php echo $_SESSION['usuario'] ?></a>
                 <div class="s-menu-contenido">
                <a href="/agregar">Añadir serie</a>
                <a href="/logout">Cerrar sesión</a>
               <?php else: ?>
                 <a href="../login">Iniciar sesión</a>
                 <div class="s-menu-contenido">
                   <a href="signup.php">Registrate</a>
               <?php endif; ?>
             </div>
           </li>
          </ul>
           <div class="hamburger-menu">
             <button class="hamburger" type="button" name="button">
               <span class="fas fa-bars"></span>
             </button>
           </div>
        </nav><!-- menu -->
       </header>
       <main class="contenido">
         <div class="c-serie">
           <nav class="c-navegacion">
             <ul>
               <li><span class="fas fa-angle-left"></span>
                 <a href="/catalogo">volver a Catálogos</a>
               </li>
               <li>
                 <span class="fas fa-angle-left"></span>
                 <a href="/catalogo?buscador=&año=&temporada=&Categoria=<?php echo $categoria1= str_replace(" ","+",$categoria[0])?>&Estado=&Enviar="><?php  echo $categoria[0]?></a>
                 <?php if (count($categoria)>=2): ?>
                 |
              <a href="/catalogo?buscador=&año=&temporada=&Categoria=<?php echo $categoria2= str_replace(" ","+",$categoria[1])?>&Estado=&Enviar="><?php  echo $categoria[1]?></a>
            <?php endif; ?>
               </li>
               <li>
                 <span class="fas fa-angel-left"></span>
                 <?php echo $titulo ?>
               </li>
             </ul>
           </nav>
           <article class="serie" id="#serie">
             <h1><?php echo $titulo ?></h1>
             <img src="<?php echo $poster ?>" alt="<?php echo $titulo ?> ">
               <div class="info">
                 <?php switch ($estado) {
                   case 1:
                   echo "<p>
                        <span>Estado:</span>
                        En emisión
                        </p>";
                     break;
                     case 2:
                     echo "<p>
                     <span>Estado:</span>
                     Esperando nueva temporada
                     </p>";
                     break;
                     case 3:
                     echo "<p>
                        <span>Estado:</span>
                        Terminado
                      </p>";
                       break;

                 } ?>


                 <p>
                   <span>Año:</span>
                   <?php echo $year ?>
                 </p>
                 <p>
                   <span>Temporada:</span>
                   <?php echo $temporada ?>
                 </p>
                 <p>
                   <span>Publicado  por:</span>
                   <?php echo $posteado ?>
                 </p>
               </div>
               <div class="c-puntuacion">

                 <button type="button" name="button" value="<?php echo $_GET['id'] ?>" id="thumbup" class="thumbup"><span class="far fas-thumbs-up"></span></button>

                 <div class="punto" id="punto">

                 </div>

                 <button type="button" name="button" value="<?php echo $_GET['id'] ?>" id="thumbdown" class="thumbdown"> <span class="far fas-thumbs-down"></span></button>
               </div>
               <div class="redes">
                 <div class="fb-share-button" data-href="<?php  echo $url ?>" data-layout="button_count" data-size="small">
                  </div>
                 <div class="twiter">
                   <a href="https://twitter.com/share?ref_src=twsrc%5Etfw" class="twitter-share-button" data-show-count="false">Tweet</a><script async src="https://platform.twitter.com/widgets.js"></script>
                 </div>
             </div>

               <?php echo $texto ?>

             <?php if (isset($trailer)): ?>
               <div class="trailer">
               <?php echo $trailer ?>
               </div>
             <?php endif; ?>
           </article>
          <?php include_once '../../modulos/comentarios.php'; ?>
         </div>
         <div class="c-buscador">
           <?php include_once '../../modulos/buscador.php' ?>
         </div><!-- fin caja de busqueda-->

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
      <li><a href="/contacto">
        <span class="fas fa-info"></span>
        nfo
      </a></li>
    </ul>
  </div>
</footer>
</div>
<!-- fin container-->
   </body>
 </html>
