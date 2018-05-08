<?php
session_start();
session_destroy();
header("refresh:2,url=../../index.php");
echo "<p>Cerrando sesión, volviendo a la pagina pricipal</p>";
 ?>
