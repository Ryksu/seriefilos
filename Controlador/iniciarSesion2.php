<?php
require_once '../Conf/Usuarios.php';
$usuario = $_POST['usuario'];
$password = $_POST['password'];
$iniciar = new Usuarios();
if (!empty($_COOKIE['usuario_cookie'])&& !empty($_COOKIE['password_cookie'])) {
   if($iniciar->iniciarUsuarios($_COOKIE['usuario_cookie'],$_COOKIE['password_cookie'])) {
    header('location:page/perfil.php');
    session_start();
    $msg = '';
    }
    // else {
    //   $msg = "Error en el usuario y/o contraseña";
    // }
}
else {
  if ($_POST['recodar']== 1) {
    setcookie('usuario_cookie',$usuario,time()+60*60*60*3600,"/");
    setcookie('password_cookie',$password,time()+60*60*60*3600,"/");
  }
   else if ($iniciar->iniciarUsuarios($usuario,$password)) {
     header('location:page/perfil.php');
     session_start();
    }
    else{
      $msg = "Error en el usuario y/o contraseña";
    }
}


 ?>
