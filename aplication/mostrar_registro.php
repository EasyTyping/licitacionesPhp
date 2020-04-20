<!doctype html>
<html>
<head>
<title>Show Registrul</title>
<meta charset="utf-8">
<link rel="stylesheet" href="/aplication/css/estilo_formulario.css" />
</head>
<body>

<!--Fichero que se encarga de mostar la tabla-->
<?php  
include 'conexion.php';
$result = mysqli_query($conexion, "SELECT * FROM licitatii order by ID DESC");
mysqli_close($conexion); 
//se despliega el resultado  
echo '<table id="mitabla" border="1">'; 
echo "<thead>";
echo "<tr>";
echo "<th>ID</th>";
echo "<th>Număr Dosar</th>";  
echo "<th>Dată Licitație</th>";  
echo "<th>Descriere</th>";  
echo "<th>Fișier</th>";
echo "</tr>";
echo "</thead>";
echo "<tbody>";
if($result!=null)
	while ($row = mysqli_fetch_row($result)){   
		echo "<tr>";  
		echo "<td>".$row[0]."</td>";  
		echo "<td>".$row[1]."</td>"; 
		echo "<td>".$row[2]."</td>";  
		echo "<td>".$row[3]."</td>"; 
		$nombreArchivo = $row[4]; 
		print "<td><a href= '/oficinadomnul/aplication/pdfs/$nombreArchivo'><img src='/oficinadomnul/aplication/img/pdf_icon.gif'></a></td>"; 
		"</tr>"; 
	}
else
	echo "<font color='red'>Houston tenemos un problema";	  	
echo "</tbody>";
echo "</table>";  
?> 
<a href= 'form_register.php'><p id="volver">Back</p></a>
</body>
</html>