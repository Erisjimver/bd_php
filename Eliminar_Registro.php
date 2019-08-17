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
	$consulta="delete from productos where códigoartículo='$cod'";

	$resultado=mysqli_query($conexion,$consulta);

	if($resultado==false){
		echo "Error al eliminar, no existe producto o codigo incrorrecto";
	}
	else{
		//echo "Producto eliminado";
		if(mysqli_affected_rows($conexion)==0){
			echo "No hay registros a eliminar";
		}
		else{
			echo "se han eliminado " . mysqli_affected_rows($conexion) . " registros";
		}
	}

	mysqli_close($conexion);//cerrar conecion

?>

</body>
</html>