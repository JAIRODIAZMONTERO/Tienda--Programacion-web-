<?php 
	include("Appconfig.php");	
	
	$conexion = new conexion($con['servidor'], $con['usuario'], $con['clave'], $con['basedatos']);

	class conexion{
		var $enlace;
		var $query;

		function __construct($servidor, $usuario, $clave, $basedatos){
			$this->enlace = mysql_connect($servidor, $usuario, $clave) or die(header("Location: index.php"));
			mysql_select_db($basedatos);
		}

		function ejecutar_query(){
			mysql_query($this->query);
		}

		function __destruct(){
			mysql_close($this->enlace);
		}
	}
 ?>