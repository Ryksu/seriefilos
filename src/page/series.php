<?php
// ini_set('display_errors',1);
// ini_set('display_starup_errors',1);
// error_reporting(E_ALL);
require '../php/Config.php';
require '../php/Crud.php';
$conexion = new Crud();
$conexion->conectar();
$id = $_GET['id'];
$row = $conexion->getSerie($id);
  $titulo = $row['Titulo'];
  $poster = $row['Poster'];
  $texto = $row['Texto'];
  $categoria = $row['Categoria'];
  $temporada = $row['Temporada'];
  $year = $row['Year'];
  $estado = $row['Estado'];
  $trailer = $row['Trailer'];


$url = (isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

 ?>
 <!DOCTYPE html>
 <html lang="es">
   <head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <meta charset="utf-8">
     <link rel="icon" href="../img/favicon.png" type="image/x-png">
     <link rel="stylesheet" href="../css/estilo_catalogo.css">
     <link rel="stylesheet" href="../css/estilo_series.css">
     <link rel="stylesheet" href="../css/fontawesome.css">
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
     <script src="../js/Categorias.js" ></script>
     <script src="../js/caja_busqueda.js" ></script>

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
         <div class="t-logo">
           <a href="../index.html#t-logo">Seriefilos</a>
         </div>
         <!--t-logo-->
         <nav class="menu">
           <ul>
             <li><a href="catalogos.php">Catálogo</a></li>
             <!-- <ul>
         TODO
       </ul> -->
             <li><a href="contacto.html">Contactos</a></li>
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
                 <a href="series.php#serie"><?php echo $titulo ?></a>
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
               </div>
               <div class="redes">
                 <div class="fb-share-button" data-href="<?php  echo $url ?>" data-layout="button_count" data-size="small">
                  </div>
                 <div class="twiter">
                   <a href="https://twitter.com/share?ref_src=twsrc%5Etfw" class="twitter-share-button" data-show-count="false">Tweet</a><script async src="https://platform.twitter.com/widgets.js"></script>
                 </div>
               </div>
               <p>
               <?php echo $texto ?>
             </p>
             <?php if (isset($trailer)): ?>
               <div class="trailer">
               <?php echo $trailer ?>
               </div>
             <?php endif; ?>



           </article>
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