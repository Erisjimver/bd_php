<!DOCTYPE html>
<html>
<head>
	<title>Base de datos</title>
</head>
<body>

<?php

	//$usuario=$_GET["usu"];
	//$contra=$_GET["con"];

	require("datos_conexion.php");

	$conexion=mysqli_connect($db_host,$db_usuario,$db_contra);
	$usuario= mysqli_real_escape_string($conexion, $_GET["usu"]);
	$contra= mysqli_real_escape_string($conexion, $_GET["con"]);

	if(mysqli_connect_errno()){
		echo "Error de  conexion a bd";
		exit();
	}
	//else{

	mysqli_select_db($conexion,$db_nombre) or die("No se encuentra la base de datos");

	mysqli_set_charset($conexion,"utf8");//linea que permite mostrar tildes en las consultas de la bd


	//$consulta="select * from usuarios where usuario='$usuario' and contra='$contra'";


	$consulta="delete from usuarios where usuario='$usuario' and contra='$contra'";

	echo "$consulta <br><br>";
/*
	if(mysqli_query($conexion,$consulta)){
		echo "Baja Procesada";
	}
*/

	mysqli_query($conexion,$consulta);

	if(mysqli_affected_rows($conexion)>0){
		echo "Baja Procesada";
	}
	else{
		echo "No se ha ejecutado la baja correctamente";
	}


	mysqli_close($conexion);//cerrar conecion
?>
</body>
</html>



