<?php session_start() ?>
<!DOCTYPE html>
<html lang="es" dir="ltr">

<head>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta charset="utf-8">
  <title>Seriefilos: Contactos</title>
  <link rel="icon" href="../img/favicon.png" type="image/x-png">
  <link rel="stylesheet" href="../../estilo/css/estilo_contacto.css">
  <script src="../../lib/jquery/jquery-3.3.1.min.js"></script>
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
          <li><a href="#contenido">Contactos</a></li>
          <li class="s-menu">
            <?php if (isset($_SESSION['usuario'])&&!empty($_SESSION['usuario'])): ?>
              <a href="perfil.php"><?php echo $_SESSION['usuario'] ?></a>
              <div class="s-menu-contenido">
             <a href="logout.php">Cerrar sesión</a>
            <?php else: ?>
              <a href="../login.php">Iniciar sesión</a>
              <div class="s-menu-contenido">
                <a href="signup.php#Registrate">Registrate</a>
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
        <form class="Contactos" id="Contactos" action="../php/formulario.php" method="post" enctype="multipart/form-data">
          <fieldset>
            <legend>Contacto</legend>
            <label for="nombre">Nombre de usuario</label>
            <input type="text" name="nombre" id="nombre" value="" placeholder="Nombre" required>
            <label for="correo">Correo</label>
            <input type="email" name="correo" id="correo" value="" placeholder="tucorreo@Correo.com" required>
          </fieldset>
          <fieldset>
            <legend>Asunto</legend>
            <label for="asunto">Seleccione un asunto</label>
            <select class="asunto" name="asunto" id="asunto">
              <option selected>Seleccione una opción</option>
              <option value="serie">Añadir serie</option>
              <option value="consulta">Consulta</option>
            </select>
          <div  id="serie" class="disable">

            <label for="Titulo">Titulo</label>
            <input type="text" name="Titulo" id="Titulo" value="" >
            <div class="year_temporada">
              <label for="Year">Año</label>
              <input type="number" name="Year" id="Year" value="" min="1900" max="2020" maxlength="4">
              <label for="Temporada">Temporada</label>
              <input type="number" name="Temporada" id="Temporada" value="" >

            </div>
            <label for="Categoria">Categoria</label>
            <select  name="Categoria" id="Categoria" >

            </select>
            <label for="Poster">Poster</label>
            <input type="file" name="Poster" id="Poster" value="" accept="image/x-png,image/jpeg">
          <label for="Estado">Estado</label>
                    <select name="Estado" id="Estado">
            <option value="0">En Emisión</option>
            <option value="1">Terminado</option>
            <option value="2">Esperando nueva Temporada</option>
          </select>
          <label for="Texto">Sinopsis</label>
            <textarea name="Texto" id="Texto"></textarea>
          </div>
          <div id="consulta" class="disable">
            <label for="comentario">Comente su consulta</label>
            <textarea name="comentario" id="comentario" >
            </textarea>
          </div>
          </fieldset>
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
