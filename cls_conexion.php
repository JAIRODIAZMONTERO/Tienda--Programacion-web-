<?php 
	
	include_once("config.php");

	$con = new conexion($confg['servidor'], $confg['usuario'],$confg['clave'],$confg['basedatos']);

	class conexion{
		var $enlace;

		function __construct($servidor, $usuario, $clave, $basedatos){
			$this->enlace = mysql_connect($servidor, $usuario, $clave) or die(header("Location: index.php"));
			mysql_select_db($basedatos);
		}

		function __destruct(){
			mysql_close($this->enlace);
		}
	}
 ?>