<?php
session_start();
require_once '../../Conf/Usuarios.php';
require_once '../../Conf/Series.php';

$Usuarios = new Usuarios();

$Series = new Series();
$res = $Series->paginacion("id","serie");

$pagina_total = Series::$pagina_total;
$pagina = Series::$pagina;

$resultado = $Usuarios->ObtenerUsuario($_SESSION['usuario']);
 $resultado = json_decode($resultado,true);



 ?>
