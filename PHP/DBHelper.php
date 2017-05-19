<?php
function dbCreate(){
	$conectar = Conecter();
	$resultado=mysqli_query($conectar,$bd);
	$bd="Create Database if not exists Catalogo;";
	$resultado=mysqli_query($conectar,$bd);

	if ($resultado) {
		echo "Se ha creado la base de datos correctamente";
	}
	else{
		echo "No se ha podida crear la base de datos";
	}
}

function Conecter(){
	$conectar = mysqli_connect("localhost","Cain","ghahfah16");
	if($conectar){
		echo "Se ha conectado correctamente al servidor ";
		return $conectar;
		}
	else{
		echo "No se pudo conectar al servidor";
		return null;
	}
}

function TableContac(){
		$conectar = Conecter();
		mysqli_select_db($conectar,"Catalogo");
		$tabla = "Create Table if not exists Peliculas";
		$tabla.="(ID int NOT NULL  AUTO_INCREMENT, ";
		$tabla.="nombre varchar(50), ";
		$tabla.="genero varchar(50), ";
		$tabla.="descripcion varchar(50), ";
		$tabla.="clasificacion varchar(30), ";
		$tabla.="ruta varchar(30), ";
		$tabla.="Primary key(ID)) ";
		$General=mysqli_query($conectar,$tabla);
		if ($General) {
			echo "Se ha creado la tabla correctamente";
		}
		else {
		    echo "No se pudo crear la tabla <br>";
		}
	}



function addContac(){
	dbCreate();
	TableContac();
	$nombre = $_POST['nombre'];
	$descripcion = $_POST['descripcion'];
	$genero = $_POST['genero'];
	$ruta = $_POST['ruta'];
	$clasificacion = $_POST['clasificacion'];
	$conexion = Conecter();
	mysqli_select_db($conexion,"Catalogo");

	$datos="INSERT INTO `Peliculas`(`nombre`,`genero`,`descripcion`,`clasificacion`,`ruta`)
	VALUES ('$nombre','$genero','$descripcion','$clasificacion','$ruta')";
	$insertar=mysqli_query($conexion,$datos);
	if (!$insertar){
		echo 'error al insertar los datos, la Sentencia SQL' .mysql_error();
	}
		else {
			header('location:../index.php');
		}
		mysqli_close($conexion);
}

function getContas(){
	$arr = array();
	$conectar = Conecter();
	mysqli_select_db($conectar,"Catalogo");
	$consulta="Select * From Peliculas;";
	$resultado=mysqli_query($conectar,$consulta);
	$registros=mysqli_num_rows($resultado);
	for ($i=0; $i < $registros ; $i++) {
		$row = mysqli_fetch_assoc($resultado); 
		//$elemento=mysql_result($resultado, $i,"nombre");
		$elemento = $row['nombre'];
		
		array_push($arr,$elemento);
		//$elemento=mysql_result($resultado, $i,"genero");
		$elemento = $row['genero'];
		
		array_push($arr,$elemento);
		//$elemento=mysql_result($resultado, $i,"descripcion");
		
		$elemento = $row['descripcion'];
		array_push($arr,$elemento);
		//$elemento=mysql_result($resultado, $i,"clasificacion");
		$elemento = $row['clasificacion'];
		array_push($arr,$elemento);
		//$elemento=mysql_result($resultado, $i,"ruta");
		$elemento = $row['ruta'];
		array_push($arr,$elemento);
	}
	mysqli_close($conectar);
	return $arr;
}

function update(){
	$nombre = $_POST['nombre'];
	$descripcion = $_POST['descripcion'];
	$genero = $_POST['genero'];
	$ruta = $_POST['ruta'];
	$id = $_GET["contacto"];
	$clasificacion = $_POST['clasificacion'];
	$conectar = mysqli_connect("localhost","Cain","ghahfah16");
	mysqli_select_db($conectar,"Catalogo");
	$modificar="update Peliculas set nombre='".$nombre."', genero= '".$genero."', descripcion= '".$descripcion."', clasificacion= '".$clasificacion."', ruta= '".$ruta."' where ID='".$id."';";
	$resultado=mysqli_query($conectar,$modificar);

	if ($resultado) {
			header('location:../index.php');
		}else {
			echo "No se pudo modificar el registro de la base de datos <br>";
		}
	}
	

	function delete(){
	$conectar = Conecter();
	mysqli_select_db($conectar,"Catalogo");
	$modificar="delete from Peliculas where ID = '".$_GET["id"]."' ";
	$resultado=mysqli_query($conectar,$modificar);

	if ($resultado) {
			header('location:../index.php');
		}else {
			echo "No se pudo modificar el registro de la base de datos <br>";
		}
	}
?>