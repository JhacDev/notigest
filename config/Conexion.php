<?php

require_once "global.php";

$conexion = new mysqli(DB_HOST,DB_USERNAME,DB_PASSWORD,DB_NAME);

mysqli_query($conexion, 'SET NAMES "' . DB_ENCODE . '"' );

// Si tenemos un posible error en la conexion la mostramos
if(mysqli_connect_errno()){
	printf("Fallo conexión a la base de datos: %s\n",mysqli_connect_errno());
	exit();
}

if(!function_exists('ejecutarConsulta')){

	function ejecutarConsulta($sql){
		global $conexion;
		$query = $conexion->query($sql); //ejecuta la consulta que resive
		return $query;
	}

	function ejecutarConsultaSimpleFila($sql){
		global $conexion;
		$query = $conexion->query($sql);//ejecuta la consulta que resive como parametro
		$row = $query->fetch_assoc();//recorre el resultado de la consulta
		return $row;
	}

	function ejecutarConsulta_retornarID($sql){
		global $conexion;
		$query = $conexion->query($sql); //ejecuta la consulta que resive
		return $conexion->insert_id; //devuleve la llave primaria del registro insertado
	}

	function limpiarCadena($str){
		global $conexion;
		$str = mysqli_real_escape_string($conexion,trim($str));
		return htmlspecialchars($str);
	}

}

?>