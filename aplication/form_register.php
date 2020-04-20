<!DOCTYPE html>
<html lang="es">
<!--Fichero del formulario-->
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Registrul BEJADIC</title>
<link rel="stylesheet" type="text/css" href="/oficinadomnul/aplication/css/estilo_formulario.css" />
 
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">
  
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <script>
    $( function() {
		  $( "#datepicker" ).datepicker({ dateFormat: 'dd.mm.yy',
          changeMonth: true,
          changeYear: true
	})
	   } );
 </script>

<style type="text/css">
#apDiv1 {
	margin:50 auto;
	text-align: center;
}
</style>
</head>
<body>
<!--Recuerda hay que cambiar las rutas aqui y en el css-->
<div id="apDiv1"><img src="/aplication/img/logo.png" alt="" longdesc="http://enlace.com"></div>
<div id="datos"> 
<form method="post" action="" enctype="multipart/form-data" style="font-family: Arial;">
<table width="674" height="355" border="0">
  <tr>
    <th colspan="2" scope="col">Numar dosar:
      <label for="nume"></label>
      <input name="nume" type="text" id="nume" size="10" maxlength="20"></th>
    <th width="265" rowspan="2" scope="col">Descriere:
      <label for="descriere"></label>
      <textarea name="descriere" cols="40" rows="7" id="descriere"></textarea></th>
  </tr>
  <tr>
    <th height="62" colspan="2" scope="col">Data licitație:
      <label for="data"></label>
      <input name="data" id="datepicker"></th>
    </tr>
  <tr>
    <td colspan="3"><input name="archivo" type="file" id="archivo" lang="ro"/></td>
  </tr>
  <tr>
    <td width="163" height="97"><p>
      <label for="id">ID</label>
    </p>
      <p>
        <input name="idf" type="text" id="idf" size="4" maxlength="4">
        <br/>
    </p>      <input type="submit" name="delete" value="Delete"></td>
    
    <td width="232" height="97"><input type="button" onclick="location='mostrar_registro.php'" name="show" id="show" value="Vezi DB"></td>
   
    <td><input type="submit" value="Trimite la DB" name="boton" /></td>
    </tr>
</table>
</form>
</div>
</body>

<?php
include 'borrar_reg.php';
include 'conexion.php';

if(mysqli_connect_errno ()){	
	echo "<font color='red'>EROARE: NU SE POATE CONECTAR</font>";
	exit();	
}

if(isset($_POST['boton']))//como el metodo del formulario era post si existe algo en memoria (isset) significa q alguien pulso el boton
{	
$nom = $_POST['nume']; 
$data = $_POST['data'];
$mensaj = $_POST['descriere'];

    if(($nom=="")||($data=="")||($mensaj==""))
    {
	echo "<font color='red'>EROARE: TREBUIE SA COMPLETATI CAMPURILE OBLIGATORII</font>";
    }
    else
    {
	$formato = '.pdf';//formato q admite la subida 
		$nombreArchivo = $_FILES['archivo']['name'];//tomamos el nombre del fichero
		$nombreTmpArchivo = $_FILES['archivo']['tmp_name']; //y el nombre temporal
		$ext = substr($nombreArchivo, strrpos($nombreArchivo, '.')); //Cortamos el nombre con "substr" x una determinada posicion, como no la sabemos, le pedimos con strrpos q nos de la posicion del punto.
		if($formato == $ext)//si coincide con el formato entramos aquí
		{ 
		if(move_uploaded_file($nombreTmpArchivo, "pdfs/$nombreArchivo"))//movemos a la carpeta del servidor
		  {
			echo "<font color='green'>FILE ' $nombreArchivo ' SUCESSFULLY UPLOADED.</font>";
			//mysql_select_db($database, $conexion) or die("<font color='red'>EROARE: NU SE POATE SELECTA DB</font>"); // Seleccionamos la BD
		    mysqli_query($conexion, "INSERT INTO licitatii(Fisier, Dosar, Data, Descriere) VALUES ('$nombreArchivo','$nom', '$data', '$mensaj')"); //insertamos datos en la BD
			echo "<font color='green'>   DATE INTRODUSE CORECT ÎN DB</font>";
			mysqli_close($conexion);
		  }
		  else
		  {
		  	echo "<font color='red'>EROARE: S-a produs o eroare la încărcea fișierului, încercați din nou</font>";
		  } 
     	}
     	else
		{
			echo "<font color='red'>EROARE: 1. NU AȚI ALES NICIUN FIȘIER. 2.FIȘIERUL NU ESTE PDF 3. PDF NU ESTE COMPATIBIL</font>"; 
		}
	}
}
if(isset($_POST['delete']))
{
$id= $_POST['idf'];

	if($id==""){
		echo "<font color='red'>EROARE: TREBUIE SA INTRODUCETI ID-UL RANDULUI</font>"; 
	} 	
	else{
			//mysqli_select_db($database, $conexion) or die("<font color='red'>EROARE: NU SE POATE SELECTA DB</font>");
	
		 mysqli_query ($conexion, "DELETE from licitatii WHERE ID = '$id'");   
		 echo "<font color='green'>REGISTRUL S-A ȘTERS CORECT</font>";
		mysqli_close($conexion);  
		 } 
}
?>
</html>