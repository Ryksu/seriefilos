<?php
/**
 *
 */
 require_once "NewCrud.php";
class Usuarios extends NewCrud
{
  public $usuario;

/* pasamos los datos importante del usuario y registramos en la base de datos */
  function CrearUsuario($usuario,$password,$email)
  {
    $this->Insertar("usuarios",array("Foto","Usuario","Password","Email","rol"),array("'../../img/perfiles/user-default.svg'","'$usuario'","'$password'","'$email'","'0'"));

  }
  /* Comprueba primero si el usuario se encuentra en la bdta si lo encuentra verifica el hash de la contraseña dada dara true si es correcto, false si es incorrecto */
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

  function obtenerUsusario($usuario){
    $condicion = "WHERE usuario = '$usuario'";
    $resultado = $this->Leer("foto,usuario,email,nombre,apellidos,cumple,rol","usuarios",$condicion);
    return $resultado;
  }
  function obtenerUsusarios(){
    return $this->Leer("foto,usuario,email,nombre,apellidos,cumple,rol","usuarios","WHERE usuario != 'Admin'");
  }

  function borrarUsuario($usuario)
  {
    return $this->Eliminar("usuarios","usuario = '$usuario'");

  }

  function setFoto($url,$usuario){
    return $this->Actulizar("usuarios","Foto = '$url'","usuario = '$usuario'");

  }

}

 ?>
