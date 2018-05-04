<?php
/**
 *
 */
 require_once "NewCrud.php";

class Usuarios extends NewCrud
{
  public $foto;
  public $usuario; // primary key 
  public $password;
  public $email;
  public $nombre;
  public $apellido;
  public $cumple;
  public $rol;

/* pasamos los datos importante del usuario y registramos en la base de datos */
  function __construct($usuario,$password,$email)
  {
    $this->usuario = $usuario;
    $this->password = $password;
    $this->email = $email;

    $this->Insertar("usuarios",array("usuario","password","email"),array("'$this->usuario'","'$this->password'","'$this->email'"));
  }
}



 ?>
