<?php
/**
 *
 */
 require_once 'NewCrud.php';
class Comentarios extends NewCrud
{
  public static $pagina_total = 1;
  public static $pagina = 1;

  function getComentarios($id,$LIMIT = Null){
    return $this->Leer("usuarios.Foto,comentarios.*","usuarios,comentarios"," WHERE comentarios.id_usuario = usuarios.Usuario and comentarios.id_serie = $id ORDER BY tiempo DESC $LIMIT");

  }

  function insertarComentario($id,$usuario,$texto){
    $num = $this->autoIncrementar($id);
     return $this->Insertar("comentarios",array("id_serie","id_usuario","id","comentario"),array("'$id'","'$usuario'","'$num'","'$texto'"));

  }

  function comentarioFila($id){
    return $this->ContadorFila("id_serie","comentarios"," where id_serie = $id");
  }

  function autoIncrementar($id){
    $num = $this->Leer("MAX(id) as MAX","comentarios"," WHERE id_serie ='$id'");
    $num = json_decode($num,true);
    if ($num[0]['MAX']!=NULL) {
      $num = intval($num[0]['MAX']);
      $num++;
      }
      else{
        $num = 1;
      }
      return $num;
  }

  function paginacion($id,array $get = null){
    $nfilas = $this->comentarioFila($id);
    if ($nfilas>0) {
      $limite = 5;
      if (isset($get['pg'])) {
        Comentarios::$pagina = $get['pg'];
      }
      $inicio = (Comentarios::$pagina - 1)*$limite;
      Comentarios::$pagina_total = ceil($nfilas/$limite);
      $LIMIT = " LIMIT $inicio,$limite";
      $resultado = $this->getComentarios($id,$LIMIT);
      return $resultado;
    }
  }


}

?>
