<?php
include '../../Controlador/ObtenerUsuario.php';
?>
<!DOCTYPE html>
<html lang="es" dir="ltr">

<head>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta charset="utf-8">
  <title>Seriefilos: <?php echo $_SESSION['usuario'] ?></title>
  <link rel="icon" href="../img/favicon.png" type="image/x-png">
  <link rel="stylesheet" href="../../estilo/css/estilo_contacto.css">
  <link rel="stylesheet" href="../../estilo/css/estilo_perfil.css">
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
        <form class="perfil" id="perfil" method="post">
          <fieldset>
            <legend>Datos del usuario</legend>
            <div class="c-foto">
              <img src="<?php echo $resultado[0]['foto'] ?>" id="imagen" alt="<?php echo "imagen de perfil de ". $_SESSION['usuario'] ?>">
              <div id="c-subir" hidden>
                <label for="subir">Subir foto de perfil</label>
                <input type="file" name="foto" id="foto" value="" accept="image/jpeg,image/gif,image/x-png">
            </div>
          </div>
              <label for="usuario">Usuario</label>
              <input type="text" name="usuario" id="usuario" value="<?php echo $resultado[0]['usuario']?>" disabled>
              <label for="email">Email</label>
              <input type="email" name="email" id="email" value="<?php echo $resultado[0]['email'] ?>" disabled>
            </fieldset>
          <fieldset>
            <legend>Datos personales</legend>
            <label for="nombre">Nombre</label>
            <input type="text" name="nombre" id="nombre" value="<?php echo $resultado[0]['nombre'] ?>" disabled>
            <label for="apellidos">Apellidos</label>
            <input type="text" name="apellidos" id="apellidos" value="<?php echo $resultado[0]['apellidos']; ?>" disabled>
            <label for="cumple">Cumpleaño</label>
            <input type="date" name="cumple" id="cumple" value="<?php echo $resultado[0]['cumple']; ?>" disabled>
          </fieldset>
          <div class="c-editar" id="c-editar">
              <button  type="button" name="Editar" id="Editar">
                <span class="fas fa-edit"></span>
                Editar
              </button>
          </div>
          <div hidden id="c-enviar">
            <button type="reset" name="Deshacer">
              <span class="fas fa-redo-alt"></span>
              Deshacer
            </button>
            <button type="submit" name="Enviar" id="Enviar">
              <span class="far fa-paper-plane"></span>
              Enviar
            </button>
          </div>
        </form>
        <script src="../../js/EditarUsuario.js"></script>
      </div>
      <?php if ($resultado[0]['rol']=="1"): ?>
        <div class="c-panel" id="c-panel">
          <h2>Adminitrador</h2>
          <div class="c-mostar">
            <button type="button" name="mostrar" id="mostrar">
              <span class="fas fa-users"></span> Todos los Usuarios</button>
          </div>

        </div>
        <div  id="c-Todo" class="disabled">
          <table>
            <tr>
              <th>Usuario</th>
              <th>Email</th>
              <th>Nombre</th>
              <th>Apellidos</th>
              <th>Cumpleaño</th>
              <th>Borrar</th>
            </tr>
            <?php foreach ($todos as $key => $value): ?>
              <tr>
                <td><?php echo $value['usuario'] ?></td>
                <td><?php echo $value['email'] ?></td>
                <td><?php echo $value['nombre'] ?></td>
                <td><?php echo $value['apellidos'] ?></td>
                <td><?php echo $value['cumple']; ?></td>
                <td class="delete">
                  <button type="button" class="eliminar" value="<?php echo $value['usuario'] ?>" name="eliminar">
                    <span class="fas fa-trash-alt"></span>
                    </button>
                </td>
              </tr>
            <?php endforeach; ?>
          </table>
        </div>
        <script src="../../js/Adminitrador.js"></script>
      <?php endif; ?>
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
