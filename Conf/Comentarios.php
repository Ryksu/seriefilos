<?php
/**
 *
 */
 require_once 'NewCrud.php';
class Comentarios extends NewCrud
{

<<<<<<< HEAD
  function getComentarios($id,$LIMIT = Null){
    return $this->Leer("usuarios.Foto,comentarios.*","usuarios,comentarios"," WHERE comentarios.id_usuario = usuarios.Usuario and comentarios.id_serie = $id ORDER BY tiempo DESC $LIMIT");
=======
  function getComentarios($id,$inicio,$limite){
    return $this->Leer("usuarios.Foto,comentarios.*","usuarios,comentarios"," WHERE comentarios.id_usuario = usuarios.Usuario and comentarios.id_serie = $id ORDER BY tiempo DESC LIMIT $inicio,$limite");
>>>>>>> ab3e0b3f9bca0c53d4c1e0f1958dff10e5c482e3
  }

  function insertarComentario($id,$usuario,$texto){
    return $this->Insertar("comentarios",array("id_serie","id_usuario","comentario"),array("'$id'","'$usuario'","'$texto'"));
  }

  function comentarioFila($id){
    return $this->ContadorFila("id_serie","comentarios"," where id_serie = $id");
  }
}
?>
