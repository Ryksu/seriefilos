<?php if ($pagina_total>1): ?>
  <div class="paginacion">
    <?php
    for ($i=1; $i <= $pagina_total ; $i++) {
      if (isset($_GET['buscador'])) {

          echo '<a class="npage" data='.$i.'>'.$i.'</a>';
      }

      else  {
        echo '<a class="npage" data='.$i.'>'.$i.'</a>';

      }
    } ?>
  </div><!--fin caja caja paginacion-->
<?php endif;?>
