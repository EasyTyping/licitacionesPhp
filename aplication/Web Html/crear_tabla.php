<!doctype html>
<html>
<head>
<title>Licitații</title>
<meta charset="utf-8">
<link href="/css/estilo_tabla.css" rel="stylesheet" type="text/css" />
</head>
<body>


<div id="divtest">    
<!--Para hacer responsive la table style="overflow-x:auto;"  podría ir aquí pero me decidí por incluirlo en el Css -->
<?php
include 'conexion.php';


//Si hubo una licitacion ayer la borrarmos 
$mañana = date('d.m.Y');
$hoy = strtotime ( '-1 day' , strtotime ( $mañana ) ) ;
$hoy = date ( 'd.m.Y' , $hoy );
mysqli_query ($conexion, "delete from licitatii where Data = '$hoy'");

//Volcamos el contenido de la BD en la Tabla
$sql = "SELECT * FROM licitatii order by ID DESC LIMIT 10";
$result = $conexion->query($sql);
 
//se despliega el resultado   El ancho lo determine en el css con valor auto de tal manera que el scroll desaparece width="20%" 
echo '<table id="mitabla" border="1" style="text-align:center;">'; 
echo "<tr>";  
echo "<th>Număr Dosar</th>";  
echo "<th>Dată Licitație</th>";  
echo "<th>Descriere</th>";  
echo "<th>Fișier</th>";  
echo "</tr>";

while ($row =  $result->fetch_assoc()){   
    echo "<tr>";  
    echo "<td>".$row["Dosar"]."</td>";  
	echo "<td>".$row["Data"]."</td>"; 
	echo "<td>".$row["Descriere"]."</td>";  
  // 	echo "<td>".$row["Fisier"]."</td>"; 
	$nombreArchivo = $row["Fisier"]; 
	print "<td><a href= '/aplication/pdfs/$nombreArchivo'><img src='/aplication/img/pdf_icon.gif'></a></td>"; 
    "</tr>"; 
}  	
echo "</table>";  
mysqli_close($conexion);
?> 
</div>
<div id="divtest2">
<p><em>Art. 842. Participanţii la licitaţie</em></p>

<ul>
<li>(1) Poate participa la licitaţie, în calitate de licitator, orice persoană care are capacitate deplină de exerciţiu, precum şi capacitatea să dobândească bunul ce se vinde.

<li>(2) Debitorul nu poate licita nici personal, nici prin persoane interpuse.

<li>(3) Solvabilitatea, capacitatea şi interpunerea sunt lăsate la aprecierea sumară şi imediată a executorului judecătoresc, care poate refuza făcând menţiune despre aceasta în procesul-verbal de licitaţie.

<li>(4) Mandatarul va trebui să prezinte o procură specială autentică, care se va păstra la dosarul executării.

<li>(5) Creditorii urmăritori sau intervenienţi nu pot să adjudece bunurile oferite spre vânzare la o valoare mai mică de 75% din preţul de pornire a primei licitaţii.</li></ul>

<a id="enlace" href="https://legeaz.net/noul-cod-de-procedura-civila/art-842" target="_blank">Detalii: https://legeaz.net/noul-cod-de-procedura-civila/art-842</a>
</div>
 
</body>
</html>