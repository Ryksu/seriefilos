<?php session_start() ?>

<!DOCTYPE html>
<html lang="es" dir="ltr">

<head>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="icon" href="/img/icons/favicon.png" type="image/x-png">
  <link rel="manifest" href="/manifest.json" >
  <meta charset="utf-8">
  <title>Seriefilo:Agregar</title>
  <link rel="stylesheet" href="../../estilo/css/estilo_contacto.css">
  <link rel="stylesheet" href="../../estilo/css/estilo_agregar.css">
  <script src="../../lib/jquery/jquery-3.3.1.min.js"></script>
  <script src="../../js/api.js"></script>
  <script src="../../js/ListaDatos.js"></script>
  <script src="../../js/buscador.js"></script>
</head>

<body>
  <div class="container">
    <header class="cabecera">
      <!--t-logo-->
      <nav class="menu">
        <ul>
          <li class="t-logo">
            Seriefilos <span class="fas fa-angle-down"></span>
          </li>
          <li><a href="../../index">Inicio</a></li>
          <li><a href="catalogo">Catálogo</a></li>
          <li class="s-menu">
            <?php if (isset($_SESSION['usuario'])&&!empty($_SESSION['usuario'])): ?>
              <a href="perfil"><?php echo $_SESSION['usuario'] ?></a>
              <div class="s-menu-contenido">
             <a href="logout">Cerrar sesión</a>
            <?php else: ?>
              <a href="../login">Iniciar sesión</a>
              <div class="s-menu-contenido">
                <a href="../../index.html#Registrate">Registrate</a>
            <?php endif; ?>
            </div>
          </li>
        </ul>
        <div class="c-buscador">
          <form class="b-buscador" id="form_search" method="get" action="catalogo">
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
            <label for="Categoria"><dfn title="Para seleccionar varios matenga pulsado contr">Categoria</dfn></label>
            <select  multiple required name="Categoria[]" id="Categoria" >
              <option value="" >Seleccione una Categoria</option>
            </select>
          <label for="Estado">Estado</label>
            <select required name="Estado" id="Estado" >
              <option value="">Seleccione un Estado de emisión</option>
            </select>
          <label for="Trailer">Insertar trailer</label>
          <input type="text" name="Trailer" value="" placeholder="enlace de Youtube">
          <label for="Texto">Sinopsis*</label>
            <textarea name="Texto" id="Texto" required></textarea>
          <small>*Usa markdown</small>
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
