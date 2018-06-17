<?php
$pagina_total = intval(Series::$pagina_total);
$pagina = intval(Series::$pagina);

?>
<?php if (!isset($_GET['usuario'])&&$pagina_total>1): ?>
  <div class="paginacion">
<?php
$ruta = explode("/",$_SERVER['REQUEST_URI']);
$interrogate = strpos($ruta[1],"?");
if ($interrogate) {
  $ruta2 = explode("?",$ruta[1]);
  $pg = preg_split("/&pg/",$ruta2[1]);
  $ruta3 = $ruta2[0].'?'.$pg[0];
  $ubicacion = htmlentities($ruta3,ENT_QUOTES,"UTF-8");

}else {
  $ubicacion = htmlentities($ruta[1],ENT_QUOTES,"UTF-8");
}

    if (!isset($_GET['buscador'])&&$pagina !=1) {
      echo '<a href="/'.$ubicacion.'/pg/1"><span class="fas fa-angle-double-left"></span></a>';
    }
    else if (isset($_GET['buscador'])&&$pagina!=1) {
        echo '<a href="/'.$ubicacion.'&pg=1"><span class="fas fa-angle-double-left"></span></a>';
    }

     for ($i=1; $i <=$pagina_total ; $i++) {
      if ($pagina==$i) {
        echo "<a href='#' class='activo'>$i</a>";
      }
      elseif(isset($_GET['buscador'])){
        echo '<a href="/'.$ubicacion.'&pg='.$i.'">'.$i.'</a>';

      }
      else  {
        echo '<a href="/'.$ubicacion.'/pg/'.$i.'">'.$i.'</a>';

      }
    }
if (!isset($_GET['buscador'])&&$pagina!=$pagina_total) {
      echo '<a href="/'.$ubicacion.'/pg/'.$pagina_total.'"><span class="fas fa-angle-double-right"></span></a>';
}

 else if(isset($_GET['buscador'])&&$pagina!=$pagina_total){
        echo '<a href="/'.$ubicacion.'&pg='.$pagina_total.'"><span class="fas fa-angle-double-right"></span></a>';
}
     ?>
  </div><!--fin caja caja paginacion-->


<?php elseif (isset($_GET['usuario'])&&$pagina_total>1): ?>
    <div class="paginacion">
  <?php
  $ruta = explode("/",$_SERVER['REQUEST_URI']);
  $ruta2 = $ruta[1].'/'.$ruta[2];
  $ubicacion = htmlentities($ruta2,ENT_QUOTES,"UTF-8");

      if (!isset($_GET['buscador'])&&$pagina !=1) {
        echo '<a href="/'.$ubicacion.'/1"><span class="fas fa-angle-double-left"></span></a>';
      }

       for ($i=1; $i <=$pagina_total ; $i++) {
        if ($pagina==$i) {
          echo "<a href='#' class='activo'>$i</a>";
        }
        else  {
          echo '<a href="/'.$ubicacion.'/'.$i.'">'.$i.'</a>';

        }
      }
  if (!isset($_GET['buscador'])&&$pagina!=$pagina_total) {
        echo '<a href="/'.$ubicacion.'/'.$pagina_total.'"><span class="fas fa-angle-double-right"></span></a>';
  }

       ?>
    </div><!--fin caja caja paginacion-->
<?php endif; ?>
