<!DOCTYPE html>
<html>
<head>
	<title>Insertar Registros</title>

</head>
<body>

<?php
	
	$cod=$_GET["c_art"];
	$sec=$_GET["seccion"];
	$nom=$_GET["n_art"];
	$pre=$_GET["precio"];
	$fec=$_GET["fecha"];
	$imp=$_GET["importado"];
	$por=$_GET["p_orig"];

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
	$consulta="insert into productos (CÓDIGOARTÍCULO,SECCIÓN,NOMBREARTÍCULO,PRECIO,FECHA,IMPORTADO,PAÍSDEORIGEN) values ('$cod','$sec','$nom','$pre','$fec','$imp','$por')";

	$resultado=mysqli_query($conexion,$consulta);

	if($resultado==false){
		echo "Error en la consulta";
	}
	else{
		echo "Registro guardado";
		echo "<table><tr><td>$cod</td></tr>";
		echo "<table><tr><td>$sec</td></tr>";
		echo "<table><tr><td>$nom</td></tr>";
		echo "<table><tr><td>$pre</td></tr>";
		echo "<table><tr><td>$fec</td></tr>";
		echo "<table><tr><td>$imp</td></tr>";
		echo "<table><tr><td>$por</td></tr></table>";
	}

	mysqli_close($conexion);//cerrar conecion

?>

</body>
</html>