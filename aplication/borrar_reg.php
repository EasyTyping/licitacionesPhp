<!--Este fichero se encarga de borrar de la BD todas las licitaciones cuya fecha haya 
pasado-->
<?php
include 'conexion.php';
$mañana = date('d.m.Y');
$hoy = strtotime ( '-1 day' , strtotime ( $mañana ) ) ;
$hoy = date ( 'd.m.Y' , $hoy );
mysqli_query ($conexion, "delete from licitatii where Data = '$hoy'");
mysqli_close($conexion);
?> 






