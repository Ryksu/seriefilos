<?php
require_once '../Conf/Series.php';

$id = $_POST['serie']  ;
$borrar = new Series();
echo $borrar->BorrarSerie($id);

 ?>
