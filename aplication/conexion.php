<?php
//conexion para php 7- via php
	
$hostname = "localhost";
$database = "miBD";
$user = "root";
$pass = "";
$conexion = mysqli_connect ($hostname, $user, $pass, $database);
//echo "Éxito: Se realizó una conexión apropiada a MySQL! La base de datos mi_bd es genial." . PHP_EOL;
//echo "Información del host: " . mysqli_get_host_info($conexion) . PHP_EOL;

if(mysqli_connect_errno ()){	
	echo "<font color='red'>EROARE: NU SE POATE CONECTAR</font>";
	exit();	
}

?>