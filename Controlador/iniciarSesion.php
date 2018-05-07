<?php
require_once '../Conf/Usuarios.php';
$iniciar = new Usuarios();
$resultado = $iniciar->iniciarUsuarios($_POST['usuario'],$_POST['password']);
$resultado = json_encode($resultado);
header("Content-Type: application/json; charset=UTF-8");
echo $resultado;
?>
