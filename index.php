<!DOCTYPE html>
<html>
<head>
	<title>Base de datos</title>
</head>
<body>

<?php


	$db_host="localhost";
	$db_nombre="pruebas";
	$db_usuario="root";
	$db_contra="";

	$conexion=mysqli_connect($db_host,$db_usuario,$db_contra,$db_nombre);

	if(mysqli_connect_errno()){
		echo "Error de  conexion a bd";
		exit();
	}
	else{

	mysqli_set_charset($conexion,"utf8");//linea que permite mostrar tildes en las consultas de la bd
	$consulta="select * from datos_personales";

	$resultado=mysqli_query($conexion,$consulta);

	$fila=mysqli_fetch_row($resultado);

	echo $fila[0]. " ";
	echo $fila[1]. " ";
	echo $fila[2]. " ";
	echo $fila[3]. " ";

	}

?>
</body>
</html>