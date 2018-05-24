<?php session_start() ?>

<!DOCTYPE html>
<html lang="es" dir="ltr">

<head>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta charset="utf-8">
  <title>Seriefilos: <?php echo $titulo = (isset($_SESSION['editar'])&&!empty($_SESSION['editar'])) ? "Editar" : "Agregar" ; ?></title>
  <link rel="icon" href="../img/favicon.png" type="image/x-png">
  <link rel="stylesheet" href="../../estilo/css/estilo_contacto.css">
  <link rel="stylesheet" href="../../estilo/css/estilo_agregar.css">
  <link rel="stylesheet" href="../../estilo/css/fontawesome.css">
  <link rel="stylesheet" href="../../lib/simplemd/simplemde.min.css">
  <script src="../../lib/jquery/jquery-3.3.1.min.js"></script>
  <script src="../../lib/simplemd/simplemde.min.js"></script>


  <script src="../../js/Categorias.js"></script>

  <script src="../../js/buscador.js"></script>
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
          <li><a href="contacto.php">Contactos</a></li>
          <li class="s-menu">
            <?php if (isset($_SESSION['usuario'])&&!empty($_SESSION['usuario'])): ?>
              <a href="perfil.php"><?php echo $_SESSION['usuario'] ?></a>
              <div class="s-menu-contenido">
             <a href="../../index.html#Registrate">Cerrar sesión</a>
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
        <form class="Agregar" id="Agregar" method="post">
          <fieldset>
            <legend>Agregar Serie</legend>
          <div id="serie" class="serie">
            <label for="Poster">Poster</label>
            <input type="file" name="Poster" id="Poster" value="" accept="image/x-png,image/jpeg" required>
            <label for="Titulo">Titulo</label >
            <input type="text" name="Titulo" id="Titulo" value="" required>
            <div class="year_temporada">
              <label for="Year">Año</label>
              <input type="number" name="Year" id="Year" value="" min="1900" max="2020" maxlength="4" required>
              <label for="Temporada">Temporada</label>
              <input type="number" name="Temporada" id="Temporada" value="" required>

            </div>
            <label for="Categoria">Categoria</label>
            <select  required name="Categoria" id="Categoria" >
              <option value="">Seleccione una Categoria</option>
            </select>
          <label for="Estado">Estado</label>
            <select required name="Estado" id="Estado" >
              <option value="">Seleccione un Estado de emisión</option>
            </select>
          <label for="Texto">Sinopsis</label>
            <textarea name="Texto" id="Texto" required></textarea>
          </div>
          </fieldset>
          <div class="c-enviar">
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
      <script src="../../js/InsertarSerie.js"></script>
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