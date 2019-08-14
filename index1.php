<!DOCTYPE html>
<html>
<head>
	<title>Base de datos</title>
</head>
<body>

<?php

	require("datos_conexion.php");

	$conexion=mysqli_connect($db_host,$db_usuario,$db_contra);

	if(mysqli_connect_errno()){
		echo "Error de  conexion a bd";
		exit();
	}
	//else{

	mysqli_select_db($conexion,$db_nombre) or die("No se encuentra la base de datos");

	mysqli_set_charset($conexion,"utf8");//linea que permite mostrar tildes en las consultas de la bd
	$consulta="select * from productos";
	//$consulta="select * from productos where paísdeorigen='ESPAÑA'		";

	$resultado=mysqli_query($conexion,$consulta);

echo "<table border=1>";
echo "<caption>productos</caption>";
echo 	"<tr>";
echo 		"<th>Codigo Articulo</th>";
echo 		"<th>Seccion</th>";
echo 		"<th>Nombre articulo</th>";
echo 		"<th>Precio</th>";
echo 		"<th>Fecha</th>";
echo 		"<th>Importado</th>";
echo 		"<th>Pais de origen</th>";
echo 	"</tr>";
	while($fila=mysqli_fetch_array($resultado,MYSQLI_ASSOC)){
	

echo 	"<tr>";
echo 		"<td>" . $fila['CÓDIGOARTÍCULO']. "</td>";
echo		"<td>" . $fila['SECCIÓN']. "</td>";
echo		"<td>" . $fila['NOMBREARTÍCULO']. "</td>";
echo		"<td>" . $fila['PRECIO']. "</td>";
echo		"<td>" . $fila['FECHA']. "</td>";
echo		"<td>" . $fila['IMPORTADO']. "</td>";
echo		"<td>" . $fila['PAÍSDEORIGEN']. "</td>";

echo 	"</tr>";


	}

echo "</table>";



	mysqli_close($conexion);//cerrar conecion
?>
</body>
</html>