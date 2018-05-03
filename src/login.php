<!DOCTYPE html>
<html lang="es" dir="ltr">

<head>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta charset="utf-8">
  <title>Seriefilos: Iniciar sesión</title>
  <link rel="icon" href="../img/favicon.png" type="image/x-png">
  <link rel="stylesheet" href="../estilo/css/estilo_contacto.css">
  <link rel="stylesheet" href="../estilo/css/estilo_login.css">
  <link rel="stylesheet" href="../estilo/css/fontawesome.css">
  <script src="../lib/jquery/jquery-3.3.1.min.js"></script>
  <script src="../js/buscador.js"></script>
</head>

<body>
  <div class="container">
    <header class="cabecera">
      <nav class="menu">
        <ul>
          <li class="t-logo">
            <a href="../index.php">Seriefilos</a>
          </li>
          <!--t-logo-->
          <li><a href="page/catalogos.php">Catálogo</a></li>
          <li><a href="page/contacto.php">Contactos</a></li>
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
        <form class="Usuario" id="Usuario" action="../php/formulario.php" method="post" enctype="multipart/form-data">
          <fieldset>
            <legend>Iniciar sesión</legend>
            <label for="usuario">Nombre de usuario</label>
            <input type="text" name="usuario" id="usuario" value="" required>
            <label for="password">Contraseña</label>
            <input type="password" name="password" id="password" value="" required>
          </fieldset>
          <div class="c-recordar">
            <input type="checkbox" id="recodar" name="recodar" value="1">
            <label for="recodar">Recodar sesión</label>
          </div>
          <div class="c-enviar">
            <button type="reset" name="Deshacer">
              <span class="fas fa-redo-alt"></span>
              Deshacer
            </button>
            <button type="submit" name="Enviar">
              <span class="far fa-paper-plane"></span>
              Iniciar
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
