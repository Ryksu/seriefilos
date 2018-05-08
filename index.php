<?php session_start() ?>
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
  <script src="lib/jquery/jquery-3.3.1.min.js"></script>
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
          <li><a href="src/page/contacto.php">Contactos</a></li>
          <li class="s-menu">
            <?php if (isset($_SESSION['usuario'])&&!empty($_SESSION['usuario'])): ?>
              <a href="src/page/perfil.php"><?php echo $_SESSION['usuario']; ?></a>
              <div class="s-menu-contenido">
                <a href="src/page/logout.php">Cerrar sesión</a>
            <?php else: ?>
              <a href="src/login.php">Iniciar sesión</a>
              <div class="s-menu-contenido">
                <a href="#Registrate">Registrate</a>
            <?php endif; ?>
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
        <form id="Registrate" class="registro" method="post" action="Controlador/CrearUsuario.php">
          <fieldset>
            <legend>¡Registrate!</legend>
            <label for="usuario">Nombre de usuario</label>
            <input type="text" name="usuario" value="" id="usuario" pattern="[a-zA-z-0-9]{4,8}" required>
            <label for="password">Contraseña</label>
            <input type="password" name="password" value="" id=password required>
            <label for="repeat">Repetir Contraseña</label>
            <input type="password" name="repeat" value="" id="repeat" required>
            <label for="email">Email</label>
            <input type="email" name="email" value="" id="email" required>
          </fieldset>
          <div id="msg"></div>
          <div class="c-enviar">
            <button type="reset" name="Deshacer">
              <span class="fas fa-redo-alt"></span>
              Deshacer
            </button>
            <button type="submit" name="singup" id="singup">
              <span class="far fa-paper-plane"></span>
              Registarse
            </button>
          </div>
        </form>
      </div>
    </main>
    <!-- fin contenido-->
    <script src="js/CrearUsuarios.js" charset="utf-8"></script>
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
