<?php
/**
 *
 */
 require_once 'NewCrud.php';
class Comentarios extends NewCrud
{

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
}

?>
