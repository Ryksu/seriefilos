<?php
require_once '../../Controlador/ObtenerSerie.php';
 ?>
 <!DOCTYPE html>
 <html lang="es" dir="ltr">
   <head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <meta charset="utf-8">
     <link rel="icon" href="../img/favicon.png" type="image/x-png">
     <link rel="stylesheet" href="../../estilo/css/estilo_catalogo.css">
     <link rel="stylesheet" href="../../estilo/css/estilo_series.css">
     <link rel="stylesheet" href="../../estilo/css/fontawesome.css">
     <script src="../../lib/jquery/jquery-3.3.1.min.js"></script>
     <script src="../../js/Categorias.js" ></script>
     <script src="../../js/caja_busqueda.js" ></script>
     <script src="../../js/Puntuacion.js" ></script>


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
              Seriefilos
             </li>
             <!--t-logo-->
             <li> <a href="../../index.php#t-logo">Inicio</a></li>
             <li><a href="catalogos.php">Catálogo</a></li>
             <li><a href="contacto.php">Contactos</a></li>
             <li class="s-menu">
               <?php if (isset($_SESSION['usuario'])&&!empty($_SESSION['usuario'])): ?>
                 <a href="perfil.php"><?php echo $_SESSION['usuario'] ?></a>
                 <div class="s-menu-contenido">
                <a href="agregar.php">Añadir serie</a>
                <a href="logout.php">Cerrar sesión</a>
               <?php else: ?>
                 <a href="../login.php">Iniciar sesión</a>
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
                 <a href="catalogos.php">Catálogo</a>
               </li>
               <li>
                 <span class="fas fa-angle-left"></span>
                 <?php echo $categoria ?>
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
                   case 0:
                   echo "<p>
                        <span>Estado:</span>
                        En emisión
                        </p>";
                     break;
                     case 1:
                     echo "<p>
                        <span>Estado:</span>
                        Terminado
                      </p>";
                       break;
                       case 2:
                       echo "<p>
                            <span>Estado:</span>
                            Esperando nueva temporada
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
           <form class="form_search" method="get" action="catalogos.php">
             <div class="b-buscador">
               <button id="button_search" type="submit" class="m-buscador">     <span class="fa fa-search"></span>
               </button>
               <input type="search" id="buscador" name="buscador" value="" placeholder="Buscar...">
             </div>
             <div class="c-year">
               <label for="año">Año</label>
               <input type="number" name="año"  id="año" min="1900" max="2020" value="">
             </div>
             <div class="c-temporada">
               <label for="temporada">Temporada</label>
               <input type="number" name="temporada" id="temporada" value="">
             </div>
             <div class="c-categorias">
               <label for="Categoria">Categorias</label>
               <select class="categorias" name="Categoria" id="Categoria">
                 <option value="" selected>Todos </option>
                 </select>
             </div>
             <div class="c-estados">
               <label for="Estado">Estado</label>
               <select class="estados" name="Estado" id="Estado">
               </select>
             </div>
             <div class="c-enviar">
               <button type="reset" name="Deshacer">
               <span class="fas fa-redo-alt"></span>
               Deshacer
             </button>
               <button type="submit" name="Enviar">
               <span class="far fa-paper-plane"></span>
               Enviar
             </button>
           </div>
           </form>
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
    </ul>
  </div>
</footer>
</div>
<!-- fin container-->
   </body>
 </html>
