<?php
 session_start();
require_once '../../Conf/Crud.php';
$conexion = new Crud();
# preparando Paginacion
$pub_limite = 6;
$inicio = 0;
$pagina  = 1;
if (isset($_GET['pg'])){
  $pagina = $_GET['pg'];
  $inicio = ($pagina - 1 ) * $pub_limite;
}
$pagina_total = ceil($conexion->contarColumna() / $pub_limite);
/*obteniendo el catalogos */
$res = $conexion->getCatalogos($inicio,$pub_limite);

$vacio = false;
// include_once '../../modulos/buscador.php';
?>
 <!DOCTYPE html>
 <html lang="es" dir="ltr">
   <head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <meta charset="utf-8">
     <link rel="icon" href="../img/favicon.png" type="image/x-png">
     <link rel="stylesheet" href="../../estilo/css/estilo_catalogo.css">
     <link rel="stylesheet" href="../../estilo/css/fontawesome.css">
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
     <script src="../../js/Categorias.js"></script>

     <script src="../../js/caja_busqueda.js"></script>

     <title>Seriefilos: Catálogo</title>
   </head>
   <body>
     <div class="container">
       <header class="cabecera">
         <nav class="menu">
           <ul>
             <li class="t-logo">
               <a href="../../index.php">Seriefilos</a>
             </li>
             <!--t-logo-->
             <li><a href="catalogos.php#contenido">Catálogo</a></li>
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
                   <a href="../../index.html#Registrate">Registrate</a>
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
<?php if ($vacio): ?>
  <div class="consulta">
    <h1>Lo siento :(</h1>
    <?php if ($error): ?>
      <p><?php echo $error ?></p>
      <?php else: ?>
        <p>No se encuentra o aún no ha sido añadida por favor contacte con nosotros:

    <?php endif; ?>
      <a href="contacto.html">Contacto</a></p>
  </div>
<?php else: ?>
  <div class="catalogos">
    <?php foreach($res as $row):?>
      <a href="series.php?id=<?php echo $row['id']?>">
        <article class="serie">
          <img src="<?php echo $row['Poster'];?>" alt="<?php echo $row['Titulo']?>">

          <h1><?php echo $row['Titulo']?></h1>
        </article>

      </a>
    <?php endforeach; ?>
  </div><!--fin categologos-->
<?php endif; ?>
         <div class="c-buscador">
           <form class="form_search" method="get" >
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
                 <option value="" selected>Todos</option>
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

         <?php if ($pagina_total>1): ?>
           <div class="paginacion">
             <?php for ($i=1; $i <= $pagina_total ; $i++) {
               if ($pagina==$i) {
                 echo "<p>$i</p>";
               }
               elseif (isset($_GET['buscador'])) {

                   echo '<a href="'.$_SERVER['PHP_SELF'].'?'.$_SERVER['QUERY_STRING'].'&pg='.$i.'">'.$i.'</a>';
               }

               else  {
                 echo '<a href="'.$_SERVER['PHP_SELF'].'?pg='.$i.'">'.$i.'</a>';

               }
             } ?>
           </div><!--fin caja caja paginacion-->
         <?php endif;?>
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
