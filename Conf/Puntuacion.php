<?php
/**
 *
 */
 require_once 'NewCrud.php';
 final class Puntuacion extends NewCrud
{
  public static $punto;
  public $id;
  function __construct($id)
  {
      $serie= $this->Leer("Puntuacion","serie","WHERE id ='$id'");
      $serie = json_decode($serie,true);
      $this->punto = $serie[0]['Puntuacion'];
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

}
?>
