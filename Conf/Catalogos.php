<?php
require_once 'NewCrud.php';
/**
 *
 */
class Catalogos extends NewCrud
{
function getCatalogos()
{
  $columnas = $this->Leer("id,Poster,Titulo","Serie","ORDER BY Titulo ASC LIMIT 0,6");
  // $columnas = json_encode($columnas);
  return $columnas;

}


}
 ?>
