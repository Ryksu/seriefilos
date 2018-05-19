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

  function AgregarSerie($poster,$titulo,$texto,$categoria,$year,$temporada,$estado,$trailer = NULL,$usuario){
    $agregar = false;
    $serie = $this->Insertar("serie",array("Poster","Titulo","Texto","Categoria","Year","Temporada","Estado","Trailer"),array("'$poster'","'$titulo'","'$texto'","'$categoria'","'$year'","'$temporada'","'$estado'","'$trailer'"));
     $ultimoID = $this->conexion->lastInsertId();

    $usuario= $this->Insertar("usuarios_series",array("id_Usuarios","id_Serie"),array("'$usuario'","'$ultimoID'"));
    if ($serie&&$usuario) {
      $agregar = true;
    }
    return $agregar;
  }


  function ObtenerSeries($inicio,$limite){

    return $this->Leer("serie.*,usuarios_series.id_Usuarios","serie","RIGHT JOIN usuarios_series  ON serie.id = usuarios_series.id_serie ORDER BY serie.id  LIMIT $inicio,$limite");

  }
}

?>
