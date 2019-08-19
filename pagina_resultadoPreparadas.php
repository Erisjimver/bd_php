<!DOCTYPE html>
<html>
<head>
	<title>Base de datos</title>
</head>
<body>

<?php

	$pais=$_GET["buscar"];

	require("datos_conexion.php");

	$conexion=mysqli_connect($db_host,$db_usuario,$db_contra);

	if(mysqli_connect_errno()){
		echo "Error de  conexion a bd";
		exit();
	}

	mysqli_select_db($conexion,$db_nombre) or die("No se encuentra la base de datos");

	mysqli_set_charset($conexion,"utf8");//linea que permite mostrar tildes en las consultas de la bd

/* 1 */	$sql="select códigoartículo, sección,precio,paísdeorigen from productos where paísdeorigen= ?";

/* 2 */	$resultado=mysqli_prepare($conexion,$sql);

/* 3 */	$ok=mysqli_stmt_bind_param($resultado, "s" , $pais);

/* 4 */	$ok=mysqli_stmt_execute($resultado);

	if($ok==false){
		echo "Error al ejecutar la consulta";
	}
	else{

		$ok=mysqli_stmt_bind_result($resultado,$codigo,$seccion,$precio,$pais);

		echo "Articulos encontrados: <br><br>";

		while (mysqli_stmt_fetch($resultado)) {
				echo $codigo . " " . $seccion . " " . $precio . " " . $pais . "<br>";
		}

	}

	mysqli_close($conexion);//cerrar conecion

?>

</body>
</html>



