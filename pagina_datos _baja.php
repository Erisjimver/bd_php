<!DOCTYPE html>
<html>
<head>
	<title>Base de datos</title>
</head>
<body>

<?php

	$usuario=$_GET["usu"];
	$contra=$_GET["con"];

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
	//$consulta="select * from productos where NOMBREARTÍCULO like '%$busqueda%'";

	$consulta="select * from usuarios where usuario='$usuario' and contra='$contra'";
	
	echo "$consulta <br><br>";

	$resultado=mysqli_query($conexion,$consulta);

echo "<table border=1>";
echo "<caption>productos</caption>";
echo 	"<tr>";
echo 		"<th>Nombre: </th>";
echo 		"<th>Contraseña</th>";
echo 		"<th>Telefono</th>";
echo 		"<th>Direccion</th>";

echo 	"</tr>";
	while($fila=mysqli_fetch_array($resultado,MYSQLI_ASSOC)){
	

echo 	"<tr>";
echo 		"<td>" . $fila['usuario']. "</td>";
echo		"<td>" . $fila['contra']. "</td>";
echo		"<td>" . $fila['tlfno']. "</td>";
echo		"<td>" . $fila['direccion']. "</td>";

echo 	"</tr>";


	}

echo "</table>";



	mysqli_close($conexion);//cerrar conecion
?>
</body>
</html>



