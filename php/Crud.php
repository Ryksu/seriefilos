<?php
/**
 *
 */
class Crud extends Config
{
/**
 * [contarColumna Cuentas la filas]
 * @return [int] [devuelve el numero de filas]
 */

  public function contarColumna()
  {
    $query = "SELECT Count(id) FROM Serie ";
    $n_fila = $this->conexion->prepare($query);
    $n_fila -> execute();
    return  $n_fila -> fetchColumn();
  }
/**
 * [getCatalogos obtiene todas la series]
 * @param  [int] $inicio     [ubicacion inicial de la pagina]
 * @param  [int] $pub_limite [limite de publicaciones]
 * @return [array]             [devuelve la consulta]
 */

  public function getCatalogos($inicio,$pub_limite)
  {
    $query = "SELECT id,Poster,Titulo FROM Serie ORDER BY Titulo ASC LIMIT ".$inicio.",".$pub_limite;
    $sql = $this->conexion -> prepare($query);
    $sql -> execute();
     return $sql -> fetchAll(PDO::FETCH_ASSOC);

  }
/**
 * [getSerie obtiene una serie]
 * @param  [int] $id [clave primaria de la serie]
 * @return [array]     [devuelve la serie consultada]
 */
  public function getSerie($id)
  {
    $query = "SELECT * FROM Serie WHERE id = $id";
    $sql = $this->conexion -> prepare($query);
    $sql -> execute();
    return $sql -> fetch(PDO::FETCH_ASSOC);
  }
/**
 * [getBusqueda obtiene un criterio y compara si coincide con alguna de las columnas]
 * @param  [string] $nomtabla   [nombre de la tabla]
 * @param  [array] $get        [array de $_GET asosiado a criterio que se quire buscar]
 * @param  [int] $inicio     [[ubicacion inicial de la pagina]
 * @param  [int] $pub_limite [limite de publicaciones]
 * @return [array]             [devuelve el resultado obtenido]
 */
  public function getBusqueda($nomtabla,$get,$inicio,$pub_limite)
  {
    $query = "SELECT id,Poster,Titulo FROM $nomtabla WHERE Titulo LIKE '%{$get}%' OR Year LIKE '{$get}' OR Temporada LIKE '{$get}' OR Categoria LIKE '{$get}' LIMIT ".$inicio.",".$pub_limite;
    $sql = $this->conexion->prepare($query);
    $sql -> execute();
    return $sql -> fetchAll(PDO::FETCH_ASSOC);

  }
/**
 * [getColumnRes Cuenta los resultados contenido por columna]
 * @param  [string] $nomtabla [nombre de la tabla]
 * @param  [array] $get      [[array de $_GET asosiado a criterio que se quire buscar]
 * @return [int]           [devuelve un int con la cantidad de columnas encontradas]
 */
  public function getColumnRes($nomtabla,$get)
  {
    $query = "SELECT count(*) FROM $nomtabla WHERE Titulo LIKE '%{$get}%' OR Year LIKE '{$get}' OR temporada LIKE '{$get}' OR Categoria LIKE '{$get}'";

    $sql = $this->conexion->prepare($query);
    $sql-> execute();
    return $sql->fetchColumn();
  }
/**
 * [setSerie Inserta una serie]
 * @param [string] $nomtabla  [Nombre de la tabla]
 * @param [string] $poster    [ruta del poster]
 * @param [string] $titulo    [Nombre]
 * @param [string] $texto     [Sipnosis]
 * @param [string] $categoria [tipo de Categoria que pertenece]
 * @param [int] $year      [año de emisión]
 * @param [int] $temporada [numero de temporada]
 * @param [int] $estado    [Estado de producción de la serie segun el numero: En emisión(0), Terminado(1), Esperando nueva temporada (2) ]
 */
public function setSerie($nomtabla,$poster,$titulo,$texto,$categoria,$year,$temporada,$estado)
{


  $query = "INSERT INTO $nomtabla(Poster,Titulo,Texto,Categoria,Year,Temporada,Estado) VALUES('".$poster."','".$titulo."','".$texto
  ."','".$categoria."','".$year."','".$temporada."','".$estado."')";
  $sql = $this->conexion->prepare($query);
  $sql-> execute();
}
/**
 * [expYear expression regular para comprobar el año]
 * @param  [int] $year [año]
 * @return [int]       [devuelve 0 sino se cumple y 1 si se cumple]
 */

  public function expYear($year)
  {
     return preg_match('/(19[0-9]\d|20[0-1]\d|2020)/',$year);

  }
  /**
   * [vacio cumprueba si es hay datos en la consulta]
   * @param  [string] $nomtabla   [nombre de la tabla]
   * @param  [array] $get        [array asosiativa de $_GET]
   * @param  [int] $inicio     [ubicacion inicial de la pagina]
   * @param  [int] $pub_limite [limite de publicaciones]
   * @return [boolean]             [devuelve booleano]
   */
  public function vacio($nomtabla,$get,$inicio,$pub_limite)
  {
    $vacio = false;
    $res = $this->getBusqueda($nomtabla,$get,$inicio,$pub_limite);
    if (count($res)==0) {
      $vacio = true;
    }
    return $vacio;
  }






}

 ?>
