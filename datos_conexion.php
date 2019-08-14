
<?php


	$db_host="localhost";
	$db_nombre="pruebas";
	$db_usuario="root";
	$db_contra="";

	$conexion=mysqli_connect($db_host,$db_usuario,$db_contra);

	if(mysqli_connect_errno()){
		echo "Error de  conexion a bd";
		exit();
	}
	//else{

	mysqli_select_db($conexion,$db_nombre) or die("No se encuentra la base de datos");

	mysqli_set_charset($conexion,"utf8");//linea que permite mostrar tildes en las consultas de la bd
	$consulta="select * from datos_personales";

	$resultado=mysqli_query($conexion,$consulta);


	while(($fila=mysqli_fetch_row($resultado))==true){
	
	//$fila=mysqli_fetch_row($resultado);

	echo $fila[0]. " ";
	echo $fila[1]. " ";
	echo $fila[2]. " ";
	echo $fila[3]. " ";

	echo "<br>";
	//$registros++;
	}


/*
	$fila=mysqli_fetch_row($resultado);

	echo $fila[0]. " ";
	echo $fila[1]. " ";
	echo $fila[2]. " ";
	echo $fila[3]. " ";

	echo "<br>";

	$fila=mysqli_fetch_row($resultado);//lee un registro por llamada

	echo $fila[0]. " ";
	echo $fila[1]. " ";
	echo $fila[2]. " ";
	echo $fila[3]. " ";
*/


//	}
	mysqli_close($conexion);
?>