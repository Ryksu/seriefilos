<?php session_start();?>
<!DOCTYPE html>
<html lang="es" dir="ltr">

<head>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta charset="utf-8">
  <title>Seriefilos: <?php echo $_SESSION['usuario'] ?></title>
  <link rel="icon" href="../img/favicon.png" type="image/x-png">
  <link rel="stylesheet" href="../../estilo/css/estilo_contacto.css">
  <link rel="stylesheet" href="../../estilo/css/fontawesome.css">
  <script src="../../lib/jquery/jquery-3.3.1.min.js"></script>
  <script src="../../js/buscador.js"></script>

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
          <li><a href="catalogos.php">Catálogo</a></li>
          <li><a href="contacto.php">Contactos</a></li>

          <li class=""><a href="logout.php">Cerrar sesión</a></li>
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
        <form class="" method="post">
          <fieldset>
            <legend><?php echo $_SESSION['usuario'] ?></legend>
            <div class="foto">
              <img src="" id="foto" alt="<?php echo "imagen de perfil de ". $_SESSION['usuario'] ?>">
            </div>
              <label for="usuario">Usuario</label>
              <input type="text" name="usuario" id="usuario" value="" disabled>
              <label for="email">Email</label>
              <input type="email" name="email" id="email" value="" disabled>
          </fieldset>
          <fieldset>
            <legend>Datos personales</legend>
            <label for="nombre">Nombre</label>
            <input type="text" name="nombre" id="nombre" value="" disabled>
            <label for="apellidos">Apellidos</label>
            <input type="text" name="apellidos" id="apellidos" value="" disabled>
            <label for="cumple">Cumpleaño</label>
            <input type="date" name="cumple" id="cumple" value="" disabled>
          </fieldset>
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
