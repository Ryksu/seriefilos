<?php if (isset($_SESSION['usuario'])&&!empty($_SESSION['usuario'])): ?>
<div class="c-comentarios">
  <h2>Comentarios</h2>
</div>
<?php  include_once 'paginacion.php'; ?>
<script src="../../js/ObtenerComentarios.js"></script>
<?php endif; ?>
