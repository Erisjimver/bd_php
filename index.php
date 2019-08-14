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
	//$consulta="select * from productos";
	$consulta="select * from productos where paísdeorigen='ESPAÑA'		";

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
	while(($fila=mysqli_fetch_row($resultado))==true){
	
	//$fila=mysqli_fetch_row($resultado);


echo 	"<tr>";
echo 		"<td>" . $fila[0]. "</td>";
echo		"<td>" . $fila[1]. "</td>";
echo		"<td>" . $fila[2]. "</td>";
echo		"<td>" . $fila[3]. "</td>";
echo		"<td>" . $fila[4]. "</td>";
echo		"<td>" . $fila[5]. "</td>";
echo		"<td>" . $fila[6]. "</td>";
echo 	"</tr>";

/*
	echo $fila[0]. " ";
	echo $fila[1]. " ";
	echo $fila[2]. " ";
	echo $fila[3]. " ";
	echo $fila[4]. " ";
	echo $fila[5]. " ";
	echo $fila[6]. " ";

	echo "<br>";
	//$registros++;
*/
	}
echo "</table>";

/*
//lee un registro por cada llamada de la funcion fetch
	$fila=mysqli_fetch_row($resultado);//lee el primer registro

	echo $fila[0]. " ";
	echo $fila[1]. " ";
	echo $fila[2]. " ";
	echo $fila[3]. " ";

	echo "<br>";

	$fila=mysqli_fetch_row($resultado);//lee el segundo registro

	echo $fila[0]. " ";
	echo $fila[1]. " ";
	echo $fila[2]. " ";
	echo $fila[3]. " ";
*/


//	}
	mysqli_close($conexion);//cerrar conecion
?>
</body>
</html>