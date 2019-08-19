<!DOCTYPE html>
<html>
<head>
	<title>Base de datos</title>
</head>
<body>

<?php

	$codigo=$_GET["c_art"];
	$seccion=$_GET["secc"];
	$nombre=$_GET["n_art"];
	$precio=$_GET["pre"];
	$fecha=$_GET["fec"];
	$importado=$_GET["imp"];
	$pais=$_GET["p_ori"];

	require("datos_conexion.php");

	$conexion=mysqli_connect($db_host,$db_usuario,$db_contra);

	if(mysqli_connect_errno()){
		echo "Error de  conexion a bd";
		exit();
	}

	mysqli_select_db($conexion,$db_nombre) or die("No se encuentra la base de datos");

	mysqli_set_charset($conexion,"utf8");//linea que permite mostrar tildes en las consultas de la bd

/* 1 */	$sql="insert into productos (códigoartículo, sección,nombreartículo,precio,fecha,importado,paísdeorigen) values (?,?,?,?,?,?,?)";

/* 2 */	$resultado=mysqli_prepare($conexion,$sql);

/* 3 */	$ok=mysqli_stmt_bind_param($resultado, "sssssss" , $codigo,$seccion,$nombre,$precio,$fecha,$importado,$pais);

/* 4 */	$ok=mysqli_stmt_execute($resultado);

	if($ok==false){
		echo "Error al ejecutar la consulta";
	}
	else{

		//$ok=mysqli_stmt_bind_result($resultado,$codigo,$seccion,$precio,$pais);

		echo "Agregado nuevo registro: <br><br>";
/*
		while (mysqli_stmt_fetch($resultado)) {
				echo $codigo . " " . $seccion . " " . $precio . " " . $pais . "<br>";
		}
*/
	}

	mysqli_close($conexion);//cerrar conecion

?>

</body>
</html>



