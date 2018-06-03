<?php
/**
 *
 */
 require_once 'NewCrud.php';
class Series extends NewCrud
{
  public static $pagina_total = 0;
  public static $pagina = 1;
  function ObtenerSerie($id)
  {
    return $this->Leer("*","serie RIGHT JOIN usuarios_series","ON serie.id = usuarios_series.id_serie WHERE serie.id = '$id'");
  }

  function BorrarSerie($id)
  {
    return $this->Eliminar("serie","id = '$id'");
  }

  function AgregarSerie($poster,$titulo,$texto,$categoria,$year,$temporada,$estado,$usuario,$trailer = NULL){
    $agregar = false;
    if($this->expYear($year)){
      $Anho = $year;
    }
    else {
      $Anho = NULL;
    }

    $serie = $this->Insertar("serie",array("Poster","Titulo","Texto","Categoria","Year","Temporada","Estado","Trailer"),array("'$poster'","'$titulo'","'$texto'","'$categoria'","'$Anho'","'$temporada'","'$estado'","'$trailer'"));
     $ultimoID = $this->conexion->lastInsertId();

    $usuario= $this->Insertar("usuarios_series",array("id_Usuarios","id_Serie"),array("'$usuario'","'$ultimoID'"));
    if ($serie&&$usuario) {
      $agregar = true;
    }
    return $agregar;
  }

  function ObtenerSeries($inicio,$limite){

    return $this->Leer("serie.*,usuarios_series.id_Usuarios","serie","RIGHT JOIN usuarios_series  ON serie.id = usuarios_series.id_serie ORDER BY serie.Titulo  LIMIT $inicio,$limite");

  }

  function expYear($year)
  {
     return preg_match('/(19[0-9]\d|20[0-1]\d|2020)/',$year);

  }

  function buscar($columna,$patron,$inicio,$limite)
  {
    return $this->Leer("serie.*,usuarios_series.id_Usuarios","serie","RiGHT JOIN usuarios_series ON serie.id = usuarios_series.id_serie WHERE serie.$columna LIKE '%{$patron}%' ORDER BY serie.Titulo LIMIT $inicio,$limite");
  }

  function paginacion($columna,$tablas,array $request = NULL){
      $nfilas = $this->ContadorFila($columna,$tablas);
      if ($nfilas>0) {
        $limite = 8;
        // $pagina = 1;
        if (isset($request['pg'])) {
          Series::$pagina = $request['pg'];
      }
      $inicio = (Series::$pagina-1)*$limite;
      Series::$pagina_total = ceil($nfilas/$limite);
      $series = $this->ObtenerSeries($inicio,$limite);
      return $series;
    }
  }

  function paginacionResultado($columna,$tablas,$patron,array $request = NULL){
    $nfilas = $this->ContarResultado($columna,$tablas,$patron);
    if ($nfilas>0) {
      $limite = 8;
      if (isset($request['pg'])) {
        Series::$pagina = $request['pg'];
      }
      $inicio = (Series::$pagina-1)*$limite;
      Series::$pagina_total = ceil($nfilas/$limite);
      $series = $this->buscar($columna,$patron,$inicio,$limite);
      return $series;
    }
  }
}


?>
