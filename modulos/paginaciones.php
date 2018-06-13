<?php
$pagina_total = Series::$pagina_total;
$pagina = Series::$pagina;

 ?>
<?php if ($pagina_total>1): ?>
  <div class="paginacion">
<?php
    if ($pagina !=1) {
      echo '<a href="catalogo?pg='.($pagina-1).'"><span class="fas fa-angle-left"></span></a>';

    }
     for ($i=1; $i <= $pagina_total ; $i++) {
      if ($pagina==$i) {
        echo "<a href='#' class='activo'>$i</a>";
      }
      else if (isset($_GET['buscador'])) {

          echo '<a href="catalogo?'.$_SERVER['QUERY_STRING'].'&pg='.$i.'">'.$i.'</a>';
      }

      else  {
        echo '<a href="catalogo?pg='.$i.'">'.$i.'</a>';

      }
    }
if ($pagina!=$pagina_total) {
      echo '<a href="catalogo?pg='.($pagina+1).'"><span class="fas fa-angle-right"></span></a>';
}
     ?>
  </div><!--fin caja caja paginacion-->
<?php endif;?>
