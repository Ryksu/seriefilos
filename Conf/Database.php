<?php
/**
 *
 */
class Database
{
  private  $nombre_host = "localhost";
  private $nombre_user ="ajwedevckqmoucho";
  private $password ="Farolito92";
  private $baseD = "ajwedevckqmoucho";
  protected $conexion;





public function conectar()
{
  $nb = 'mysql:host='.$this->nombre_host.';dbname='.$this->baseD;

  try {
    $this->conexion = new PDO($nb,$this->nombre_user,$this->password,array(PDO::MYSQL_ATTR_INIT_COMMAND=> 'SET NAMES \'UTF8\''));

  } catch (PDOException $e) {
    echo "Fallo en la base de datos: " . $e -> getMessage();

  }
  return $this->conexion;
}


}


 ?>
