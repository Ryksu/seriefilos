<?php
/**
 *
 */
 require_once 'NewCrud.php';
 final class Puntuacion extends NewCrud
{
  public $punto;
  public $id;
  function __construct($tabla,$id)
  {
      $puntuacion= $this->Leer("Puntuacion",$tabla,"WHERE id ='$id'");
      $puntuacion = json_decode($puntuacion,true);
      $this->punto = $puntuacion[0]['Puntuacion'];
      $this->punto = intval($this->punto);
      $this->id = $id;
  }

  function thumbUp(){
    $this->punto = $this->punto + 10;
     return $this->Actulizar("serie","Puntuacion ='$this->punto'","id = '$this->id'" );
  }

  function thumbDown(){
    $this->punto = $this->punto - 10;
      return $this->Actulizar("serie","Puntuacion ='$this->punto'","id = '$this->id'" );
  }

  function getPunto(){
    return $this->punto;
  }

}
?>
