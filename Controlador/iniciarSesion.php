<?php
session_start();
require_once '../Conf/Usuarios.php';
if ($_POST['action'] =="iniciar"){
  $iniciar = new Usuarios();
  $password = $_POST['password'];
  $usuario = $_POST['usuario'];
  $resultado = $iniciar->iniciarUsuario($usuario,$password);
  if ($resultado) {
    $_SESSION['usuario'] = $_POST['usuario'];
  }

  if (isset($_POST['recodar'])) {
    setcookie('usuario_cookie',$_POST['usuario'],time()+60*60*3600,"/",".ajwebdev.com");
  }
  $resultado = json_encode($resultado);
  header("Content-Type: application/json; charset=UTF-8");
  echo $resultado;
}
if ($_POST['action']=='verificar') {
  $verificar = new  Usuarios();
  $resultado = false;
  if (isset($_POST['usuario'])&&!empty($_POST['usuario'])) {
    $usuario = $_POST['usuario'];
    $resultado = $verificar->Verificar($usuario);
  }
  header("Content-Type: application/json; charset=UTF-8");

  echo $resultado;

}
?>
