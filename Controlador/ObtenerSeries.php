<?php
session_start();
require_once '../../Conf/Series.php';
$getseries= new Series();

 $series = $getseries->obtenerSeries();
 $series = json_decode($series,true);

 ?>
