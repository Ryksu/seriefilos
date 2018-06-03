<?php
require_once '../../Controlador/ObtenerSerie.php';
if (isset($_SESSION['usuario'])&&!empty($_SESSION['usuario'])&&$_SESSION['usuario']!='admin') {
  header('location: ../login.php');

}
?>

<!DOCTYPE html>
<html lang="es" dir="ltr">

<head>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta charset="utf-8">
  <title>Seriefilo:Editar</title>
  <link rel="icon" href="../img/favicon.png" type="image/x-png">
  <link rel="stylesheet" href="../../estilo/css/estilo_contacto.css">
  <link rel="stylesheet" href="../../estilo/css/estilo_editar.css">
  <script src="../../lib/jquery/jquery-3.3.1.min.js"></script>
  <script src="../../js/ListaDatos.js"></script>
  <script src="../../js/buscador.js"></script>
  <script src="../../js/editarSerie.js"></script>
</head>

<body>
  <div class="container">
    <header class="cabecera">
      <!--t-logo-->
      <nav class="menu">
        <ul>
          <li class="t-logo">
            Seriefilos
          </li>
          <li><a href="../../index.php">Inicio</a></li>
          <li><a href="catalogos.php">Catálogo</a></li>
          <li><a href="contacto.php">Contacto</a></li>
          <li class="s-menu">
            <?php if (isset($_SESSION['usuario'])&&!empty($_SESSION['usuario'])): ?>
              <a href="perfil.php"><?php echo $_SESSION['usuario'] ?></a>
              <div class="s-menu-contenido">
             <a href="logout.php">Cerrar sesión</a>
            <?php else: ?>
              <a href="../login.php">Iniciar sesión</a>
              <div class="s-menu-contenido">
                <a href="../../index.html#Registrate">Registrate</a>
            <?php endif; ?>
            </div>
          </li>
        </ul>
        <div class="c-buscador">
          <form class="b-buscador" id="form_search" method="get" action="catalogos.php">
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
      <div class="formulario">
        <form class="Editar" id="Editar" method="post" enctype="multipart/form-data">
          <fieldset>
            <legend>Editar serie: <?php  echo $titulo ?></legend>
          <div id="serie" class="serie">
            <div class="poster">
            <img src="<?php echo $poster ?>" alt="<?php echo $titulo ?>">
          </div>
            <label for="Poster">Poster</label>
            <input type="file" name="Poster" id="Poster" value="" accept="image/x-png,image/jpeg" >
            <label for="Titulo">Titulo</label >
            <input type="text" name="Titulo" id="Titulo" value="<?php echo $titulo ?>" >
            <div class="year_temporada">
              <label for="Year">Año</label>
              <input type="number" name="Year" id="Year" value="<?php echo $year ?>" min="1900" max="2020" maxlength="4" >
              <label for="Temporada">Temporada</label>
              <input type="number" name="Temporada" id="Temporada" value="<?php echo $temporada ?>" >
            </div>
            <label for="Categoria">Categoria</label>
            <select   name="Categoria" id="Categoria" >
              <option value="">Seleccione una Categoria</option>
              <option value="<?php echo $categoria ?>" selected><?php echo $categoria ?></option>
            </select>
          <label for="Estado">Estado</label>
            <select  name="Estado" id="Estado" >
              <option value="">Seleccione un Estado de emisión</option>
              <option value="<?php echo $estado ?>" selected><?php
              switch($estado){
                case 1:
                echo 'En emisión';
                break;
                case 2:
                echo 'Terminado';
                break;
                case 3:
                echo 'Esperando nueva temporada';
                break;
              }
              $estado ?></option>

            </select>
          <?php if (isset($trailer)&&!empty($trailer)): ?>
            <div class="trailer">
              <?php echo $trailer ?>
            </div>
          <?php endif; ?>
          <label for="Trailer">Insertar trailer</label>
          <input type="text" name="Trailer" value="" placeholder="enlace de Youtube">
          <label for="Texto">Sinopsis</label>
            <textarea name="Texto" id="Texto"><?php echo strip_tags($texto);?></textarea>
          </div>
          </fieldset>

          <div class="c-enviar">
            <button type="button" name="volver" id="volver"> <span class="fas fa-angle-left"></span> Volver</button>

            <button type="reset" name="Deshacer">
              <span class="fas fa-redo-alt"></span>
              Deshacer
            </button>
            <button type="submit" name="Enviar" id="enviar">
              <span class="far fa-paper-plane"></span>
              Enviar
            </button>
          </div>
        </form>
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
        </ul>
      </div>
    </footer>
  </div>
</body>

</html>
