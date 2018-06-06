<?php
header($_SERVER['SERVER_PROTOCOL']." 404 Not Found");
if (isset($_GET['buscador'])) {
  header('location: /src/page/catalogos.php?'.$_SERVER['QUERY_STRING']);
}



 ?>
 <!DOCTYPE html>
 <html lang="es" dir="ltr">
   <head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <meta charset="utf-8">
     <link rel="icon" href="../img/favicon.png" type="image/x-png">
     <link rel="stylesheet" href="../../estilo/css/estilo_catalogo.css">
     <link rel="stylesheet" href="../../estilo/css/Error.css">
     <script src="../../lib/jquery/jquery-3.3.1.min.js"></script>
     <script src="../../js/ListaDatos.js"></script>
     <script src="../../js/buscador.js"></script>
     <title>Seriefilos: UPPS! </title>
   </head>
   <body>
     <div class="container">
       <header class="cabecera">
         <nav class="menu">
           <ul>
             <li class="t-logo">
               Seriefilos
             </li>
             <!--t-logo-->
             <li><a href="../../index">Inicio</a></li>
             <li><a href="../catalogo#contenido">Catálogo</a></li>
             <li class="s-menu">
               <?php if (isset($_SESSION['usuario'])&&!empty($_SESSION['usuario'])): ?>
                 <a href="../perfil"><?php echo $_SESSION['usuario'] ?></a>
                 <div class="s-menu-contenido">
                <a href="../agregar">Añadir serie</a>
                <a href="../logout">Cerrar sesión</a>
               <?php else: ?>
                 <a href="../login">Iniciar sesión</a>
                 <div class="s-menu-contenido">
                   <a href="../signup#Registrate">Registrate</a>
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
         <div class="consulta">
           <h1>UPPS! :(</h1>
           <span></span>
           <p>No se encuentra o aún no ha sido añadida por favor contacte con nosotros: <a href="/contacto">Contacto</a></p>
         </div>

         <div class="c-buscador">
           <?php include '../../modulos/buscador.php' ?>
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
