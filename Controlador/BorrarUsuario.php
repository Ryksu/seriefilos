<?php
require_once '../Conf/Usuarios.php';
$usuario = $_POST['usuario']  ;
$borrar = new Usuarios();
echo $borrar->borrarUsuario($usuario);

 ?>
