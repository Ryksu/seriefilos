<?php
 ?>
<!DOCTYPE html>
<html lang="es" dir="ltr">

<head>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="icon" href="/img/icons/favicon.png" type="image/x-png">
  <link rel="manifest" href="/manifest.json" >
  <meta charset="utf-8">
  <title>Seriefilos: Iniciar sesión</title>
  <link rel="stylesheet" href="../estilo/css/estilo_contacto.css">
  <link rel="stylesheet" href="../estilo/css/estilo_login.css">
  <script src="../lib/jquery/jquery-3.3.1.min.js"></script>
  <script src="../js/buscador.js"></script>

</head>

<body>
  <div class="container">
    <header class="cabecera">
      <nav class="menu">
        <ul>
          <li class="t-logo">
            Seriefilos <span class="fas fa-angle-down"></span>
          </li>
          <!--t-logo-->
          <li><a href="../index">inicio</a></li>
          <li><a href="catalogo">Catálogo</a></li>
          <li><a href="signup">Registrate</a></li>
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
        <form class="Usuario" id="Login" method="post" enctype="multipart/form-data">
          <fieldset>
            <legend>Iniciar sesión</legend>
            <label for="usuario">Nombre de usuario</label>
            <?php if (isset($_COOKIE['usuario_cookie'])&&!empty($_COOKIE['usuario_cookie'])): ?>
              <input type="text" name="usuario" id="usuario" value="<?php echo $_COOKIE['usuario_cookie'] ?>" required>
          <?php else: ?>
              <input type="text" name="usuario" id="usuario" value="" required>
            <?php endif; ?>
            <label for="password">Contraseña</label>
            <input type="password" name="password" id="password" value="" required>
          </fieldset>
        <div class="c-opciones">
          <div class="c-recordar">
            <input type="checkbox" id="recodar" name="recodar" value="1">
            <label for="recodar">Recodar sesión</label>
          </div>
          <div class="c-olvidado">
            <a href="/reset">¿Has olvidado la contraseña?</a>
          </div>
        </div>
            <div id="msg" class="msg"></div>
          <div class="c-enviar">
            <button type="reset" name="Deshacer">
              <span class="fas fa-redo-alt"></span>
              Deshacer
            </button>
            <button type="submit" name="Enviar" id="Enviar">
              <span class="far fa-paper-plane"></span>
              Iniciar
            </button>
          </div>
        </form>
      </div>
    </main>
    <script src="../js/IniciarSesion.js" charset="utf-8"></script>
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
