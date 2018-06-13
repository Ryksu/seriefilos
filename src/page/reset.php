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
  <link rel="stylesheet" href="../../estilo/css/estilo_contacto.css">
  <link rel="stylesheet" href="../../estilo/css/estilo_recuperar.css">

  <script src="../../lib/jquery/jquery-3.3.1.min.js"></script>
  <script src="../../js/buscador.js"></script>
  <script src="../../js/api.js"></script>
  <script src="../../js/RecuperarCuenta.js"></script>

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
          <li><a href="catalogo">Catálogo</a></li>
          <li><a href="../login">Iniciar sesión</a></li>

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
        <form id="reset" class="recuperar" method="post">
          <fieldset>
            <legend>¿Has olvidado la contraseña?</legend>
            <div class="comprobar">
              <label for="email">Email</label>
              <input type="email" name="email" value="" id="email" required>
            </div>
            <div class="verificar" hidden>

            </div>
            <div class="cambiar" hidden>

            </div>
          </fieldset>
          <div id="msg" class="msg"></div>
          <div class="c-enviar">
            <button type="reset" name="Deshacer">
              <span class="fas fa-redo-alt"></span>
              Deshacer
            </button>
            <button type="button" name="singup" id="enviar">
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
