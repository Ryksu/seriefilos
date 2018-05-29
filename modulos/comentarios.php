<?php if (isset($_SESSION['usuario'])&&!empty($_SESSION['usuario'])): ?>
  <div class="c-comentar">
    <div class="comentar">
      <textarea name="texto" id="texto" placeholder="escribe un comentario..."></textarea>
    </div>
    <div id="c-send-comment" hidden>
      <button type="button" name="cancelar" id="cancelar">
        <span class="fas fa-redo-alt"></span>
        Deshacer
      </button>
      <button type="button" name="comment" id="comment">
        <span class="far fa-paper-plane"></span>
        Enviar
      </button>
    </div>
  </div>
<div class="c-comentarios">
  <h2>Comentarios</h2>
  <p id="sincomentar">Sin comentarios</p>
  <div class="loading">
    <span  class='fas fa-spinner fa-pulse'></span>
  </div>
</div>
<?php  include 'paginacion.php'; ?>

<script src="../../js/ObtenerComentarios.js"></script>
<?php else: ?>
  <div class="c-comentarios">
    <p>Registrate para comentar <a href="signup.php">Registarse</a></p>
  </div>
<?php endif; ?>
