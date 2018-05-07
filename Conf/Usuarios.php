<?php
/**
 *
 */
 require_once "NewCrud.php";

class Usuarios extends NewCrud
{

/* pasamos los datos importante del usuario y registramos en la base de datos */
  function CrearUsuario($usuario,$password,$email)
  {
    $this->Insertar("usuarios",array("Usuario","Password","Email","rol"),array("'$usuario'","'$password'","'$email'","'0'"));

  }
  function iniciarUsuarios($usuario,$password){
    $iniciar = false;
  $condicion = "WHERE usuario = '$usuario'";
   $resultado = $this->Leer("usuario,password","usuarios",$condicion);
   $resultado = json_decode($resultado,true);
 if (!empty($resultado)) {
   if (password_verify($password,$resultado[0]['password'])) {
     $iniciar = true;
   }
   }
   return $iniciar;
  }
}
 ?>
