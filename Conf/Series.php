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
    return $this->Leer("*","serie");

  }


}



 ?>
