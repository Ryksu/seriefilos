<?php
/**
 *
 */
class NewCrud extends Database
{

  function Read($columnas,$tablas,$condicion = NULL)
  {
    $query = "SELECT $columnas FROM  $tablas"." $condicion";
    $this->conectar();
    $sql = $this->conexion->prepare($query);
    $sql-> execute();
    return $sql->fetchAll(PDO::FETCH_ASSOC);
  }

  function Update($tabla,$nombre_columnas,$datos_columnas)
  {
    $query = "INSERT INTO $tabla('".$nombre_columnas."') VALUES('".$datos_columnas."')";
    $this->conectar();
    $sql= $this->conexion->prepare($query);
    $sql->execute();
  }

}
 ?>
