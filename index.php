<!DOCTYPE html>
<html lang="es" dir="ltr">

<head>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta charset="utf-8">
  <title>Seriefilos: La web para amantes de las series </title>
  <link rel="icon" href="img/favicon.png" type="image/x-png">
  <link rel="manifest" href="manifest.json" >
  <link rel="stylesheet" href="estilo/css/estilo_index.css">
  <link rel="stylesheet" href="estilo/css/fontawesome.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="js/buscador.js"></script>
</head>

<body>
  <div class="container">
    <header class="cabecera">
      <nav class="menu">
        <ul>
          <li><a href="#t-logo">Inicio</a>
          </li>
          <li><a href="src/page/catalogos.php">Catálogo</a></li>
          <li><a href="src/page/contacto.html">Contactos</a></li>
          <li class="s-menu">
            <a href="src/login.html">Iniciar sesión</a>
            <div class="s-menu-contenido">
              <a href="#Registrate">Registrate</a>
            </div>
          </li>
        </ul>
        <div class="c-buscador">
          <form class="b-buscador" id="form_search" method="get" action="src/page/catalogos.php">
            <button id="button_search" type="button" class="m-buscador">
        <span class="fa fa-search"></span>
      </button>
            <input type="search" id="buscador" name="buscador" value="" placeholder="Buscar..">
          </form>
        </div>
      </nav>
      <!-- menu -->
    </header>
    <!-- cabecera -->
    <main class="contenido">
      <div class="t-logo" id="t-logo">
        <h1>Seriefilos</h1>
        <h2>La web para amantes de las series </h2>
      </div>
      <div class="c-descripcion">
        <div class="articulo">
          <h2>Busca...</h2>
            <img src="img/icons/busca.svg" alt="Buscar-icon">
        </div>
        <div class="articulo">
          <h2>Puntua... </h2>
            <img src="img/icons/fav.svg" alt="Favorito-icon">
        </div>
        <div class="articulo">
          <h2>Y comparte.. </h2>
            <img src="img/icons/share.svg" alt="Compartir-icon">
        </div>
      </div>

      <div class="c-registrar">
        <form id="Registrate" class="registro" action="index.html" method="post">
          <fieldset>
            <legend>¡Registrate!</legend>
            <label for="usuario">Nombre de usuario</label>
            <input type="text" name="usuario" value="">
            <label for="password">Contraseña</label>
            <input type="password" name="password" value="">
            <label for="repeat">Repetir Contraseña</label>
            <input type="password" name="repeat" value="">
            <label for="Email">Email</label>
            <input type="email" name="Email" value="">
          </fieldset>
          <div class="c-enviar">
            <button type="reset" name="Deshacer">
              <span class="fas fa-redo-alt"></span>
              Deshacer
            </button>
            <button type="submit" name="Registarse">
              <span class="far fa-paper-plane"></span>
              Registarse
            </button>
          </div>
        </form>
      </div>
    </main>
    <!-- fin contenido-->
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
