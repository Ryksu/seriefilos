<?php
session_start();
require_once '../../Conf/Series.php';
$getseries= new Series();
$inicio = 0;
$limite = 10;
 $series = $getseries->obtenerSeries($inicio,$limite);
 $series = json_decode($series,true);

 ?>
