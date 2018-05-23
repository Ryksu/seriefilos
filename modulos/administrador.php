<?php if ($resultado[0]['rol']=="1"): ?>
  <div class="c-panel" id="c-panel">
    <h2>Adminitrador</h2>
    <div class="c-mostrar">
      <button type="button" class="Usuarios" name="Usuarios" id="Usuarios">
        <span class="fas fa-users"></span> Todos los Usuarios</button>

      <button type="button" class="Series" name="Series" id="Series"><span class="fas fa-film"></span> Todas las series</button>
    </div>

  <div  id="c-Usuarios" class="disabled">
    <table id="users-table">
      <tr>
        <th>Usuario</th>
        <th>Email</th>
        <th>Nombre</th>
        <th>Apellidos</th>
        <th>Cumpleaño</th>
        <th>Borrar</th>
      </tr>
    </table>
  </div>

  <div id="c-series" class="disabled">
    <table id="serie-table">
      <tr>
        <th>ID</th>
        <th>Titulo</th>
        <th>Sinopsis</th>
        <th>Categoria</th>
        <th>Años</th>
        <th>Temporada</th>
        <th>Estado</th>
        <th>Trailer</th>
        <th>Poster</th>
        <th>Publicado por</th>
        <th>Puntuacion</th>
        <th>Borrar</th>
        <th>Editar</th>
      </tr>
    </table>
<?php
  include 'paginacion.php';?>
  </div>
<script src="../../js/Administrador.js"></script>

</div>
<?php endif; ?>
