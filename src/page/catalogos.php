<?php
 session_start();
$vacio = false;
require_once '../../Controlador/ObtenerCatalogo.php';
?>
 <!DOCTYPE html>
 <html lang="es" dir="ltr">
   <head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="/img/icons/favicon.png" type="image/x-png">
    <link rel="manifest" href="/manifest.json" >
     <meta charset="utf-8">
     <link rel="stylesheet" href="../../estilo/css/estilo_catalogo.css">
     <script src="../../lib/jquery/jquery-3.3.1.min.js"></script>
     <script src="../../js/ListaDatos.js"></script>
     <script src="../../js/buscador.js"></script>
     <title>Seriefilos: Catálogo</title>
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
             <li><a href="catalogo#contenido">Catálogo</a></li>
             <li class="s-menu">
               <?php if (isset($_SESSION['usuario'])&&!empty($_SESSION['usuario'])): ?>
                 <a href="perfil"><?php echo $_SESSION['usuario'] ?></a>
                 <div class="s-menu-contenido">
                <a href="agregar">Añadir serie</a>
                <a href="logout">Cerrar sesión</a>
               <?php else: ?>
                 <a href="../login">Iniciar sesión</a>
                 <div class="s-menu-contenido">
                   <a href="signup#Registrate">Registrate</a>
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
       <main class="contenido" id="contenido">
         <div class="c-catalogo">


   <div class="catalogos" id="catalogo">
     <?php foreach($res as $row):?>
       <a href="series/<?php echo $row['id']?>">
         <article class="serie">
           <img src="<?php echo $row['Poster'];?>" alt="<?php echo $row['Titulo']?>">

           <h1><?php echo $row['Titulo']?></h1>
         </article>

       </a>
     <?php endforeach; ?>
   </div><!--fin categologos -->

</div>
         <div class="c-buscador">
           <?php include '../../modulos/buscador.php' ?>
         </div><!-- fin caja de busqueda-->
       </main>
        <?php include_once '../../modulos/paginaciones.php'; ?>
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
<!-- fin container-->

   </body>
 </html>
