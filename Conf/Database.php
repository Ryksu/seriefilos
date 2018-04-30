<?php
/**
 *
 */

class Database
{
  private  $nombre_db = DATABASE[0];
  private $nombre_user = DATABASE[1];
  private $password = DATABASE[2];
  private $baseD = DATABASE[3];
  protected $conexion;





public function conectar()
{
  $nb = 'mysql:host='.$this->nombre_db.';dbname='.$this->baseD;

  try {
    $this->conexion = new PDO($nb,$this->nombre_user,$this->password,array(PDO::MYSQL_ATTR_INIT_COMMAND=> 'SET NAMES \'UTF8\''));

  } catch (PDOException $e) {
    echo "Fallo en la base de datos: " . $e -> getMessage();

  }
  return $conexion;
}


}


 ?>
