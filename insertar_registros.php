<!DOCTYPE html>
<html>
<head>
	<title>Insertar Registros</title>

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
	$consulta="insert into productos (CÓDIGOARTÍCULO,SECCIÓN,NOMBREARTÍCULO) values ('AR42','DEPORTES','RAQUETA BADMINTOR')";

	$resultado=mysqli_query($conexion,$consulta);

	mysqli_close($conexion);//cerrar conecion

?>

</body>
</html>