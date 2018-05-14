<?php
session_start();
require_once '../Conf/Usuarios.php';
$iniciar = new Usuarios();
$resultado = $iniciar->iniciarUsuarios($_POST['usuario'],$_POST['password']);
if ($resultado) {
  $_SESSION['usuario'] = $_POST['usuario'];
}
if (isset($_POST['recodar'])) {
  setcookie('usuario_cookie',$_POST['usuario'],time()+60*60*3600,"/",".ajwebdev.com");
}
$resultado = json_encode($resultado);
header("Content-Type: application/json; charset=UTF-8");
echo $resultado;
?>
