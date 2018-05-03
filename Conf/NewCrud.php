<?php
require_once 'Database.php';
/**
 *
 */
class NewCrud extends Database
{

  function Leer($columnas,$tablas,$condicion = NULL)
  {
    $query = "SELECT $columnas FROM  $tablas"." $condicion";
    $this->conectar();
    $sql = $this->conexion->prepare($query);
    $sql-> execute();
    $encode = json_encode($sql->fetchAll(PDO::FETCH_ASSOC));
    return $encode;
  }

  function Insertar($tabla,$nombre_columnas,$datos_columnas)
  {
    $query = "INSERT INTO $tabla('".$nombre_columnas."') VALUES('".$datos_columnas."')";
    $this->conectar();
    $sql= $this->conexion->prepare($query);
    $sql->execute();
  }

  function Eliminar($tablas,$condicion){
    $query = "DELETE FROM $tablas WHERE $condicion";
    $this->conectar();
    $sql= $this->conexion->prepare($query);
    $sql->execute();
  }

  function ContadorColumna($columna,$tablas,$condicion =NULL){
    $query = "SELECT Count('".$columna."') FROM $tablas "." $condicion";
    $this->conectar();
    $n_fila = $this->conexion->prepare($query);
    $n_fila -> execute();
    return  $n_fila -> fetchColumn();
  }


}
 ?>
