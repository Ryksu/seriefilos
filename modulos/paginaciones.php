<?php
$pagina_total = Series::$pagina_total;
$pagina = Series::$pagina;

 ?>
<?php if ($pagina_total>1): ?>
  <div class="paginacion">
    <?php for ($i=1; $i <= $pagina_total ; $i++) {
      if ($pagina==$i) {
        echo "<a href='#' class='activo'>$i</a>";
      }
      elseif (isset($_GET['buscador'])) {

          echo '<a href="'.$_SERVER['PHP_SELF'].'?'.$_SERVER['QUERY_STRING'].'&pg='.$i.'">'.$i.'</a>';
      }

      else  {
        echo '<a href="'.$_SERVER['PHP_SELF'].'?pg='.$i.'">'.$i.'</a>';

      }
    } ?>
  </div><!--fin caja caja paginacion-->
<?php endif;?>
