<?php
/**
 *
 */
 require_once 'NewCrud.php';
class Series extends NewCrud
{

  function ObtenerSerie($id)
  {
    return $this->Leer("*","serie","WHERE id = '$id'");
  }

  function BorrarSerie($id)
  {
    return $this->Eliminar("serie","id = '$id'");
  }



  function ObtenerSeries(){

    return $this->Leer("serie.*,usuarios_series.id_Usuarios","serie","RIGHT JOIN usuarios_series  ON serie.id = usuarios_series.id_serie ORDER BY serie.id  LIMIT 0,10");

  }


}



 ?>
