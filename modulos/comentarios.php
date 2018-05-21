<?php if (isset($_SESSION['usuario'])&&!empty($_SESSION['usuario'])): ?>
  <div class="c-comentar">
    <div class="comentar">
      <textarea name="texto"></textarea>
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
  </div>
<div class="c-comentarios">
  <h2>Comentarios</h2>
</div>


<?php  include_once 'paginacion.php'; ?>
<script src="../../js/ObtenerComentarios.js"></script>
<?php endif; ?>
