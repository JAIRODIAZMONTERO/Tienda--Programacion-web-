<?php 

	include("instalador/cls_conexion.php");

	$archivo = file_get_contents("instalador/dbcon.dat");

	$datos = json_decode($archivo);

	$servidor  = $datos->servidor;
	$usuario   = $datos->usuario;
	$clave     = $datos->clave;
	$basedatos = $datos->basedatos;		
	
		$con = mysqli_connect($servidor, $usuario, $clave);	

		if(!mysql_select_db($basedatos) && mysql_errno() == 1049){			
			header("Location: instalador/FormBD.php");
		}				

	if($_POST){

		$json = json_encode($_POST);

		file_put_contents("instalador/dbcon.dat", $json);

		//Creamos la base de datos si no existe...
		$conexion->query = "create database if not exists $basedatos";
		$conexion->ejecutar_query();

		//usamos la base de datos...
		$conexion->query = "use $basedatos";
		$conexion->ejecutar_query();

		//creamos las tablas...
		$conexion->query = "CREATE TABLE `ubicaciones` (
							  `nombre` VARCHAR(100) DEFAULT NULL,
							  `descripcion` TINYTEXT,
							  `ubicacion_id` INT(11) NOT NULL AUTO_INCREMENT,
							  PRIMARY KEY (`ubicacion_id`)
							)";
		$conexion->ejecutar_query();		

		$conexion->query  =	"CREATE TABLE `articulos` (
									  `articulo_id` INT(11) NOT NULL AUTO_INCREMENT,
									  `titulo` VARCHAR(50) DEFAULT NULL,
									  `precio` DECIMAL(10,0) DEFAULT NULL,
									  `ubicacion` INT(11) DEFAULT NULL,
									  `descripcion` TEXT,
									  `foto` VARCHAR(100) DEFAULT NULL,
									  PRIMARY KEY (`articulo_id`),
									  KEY `fk_articulos` (`ubicacion`),
									  CONSTRAINT `fk_articulos` FOREIGN KEY (`ubicacion`) REFERENCES `ubicaciones` (`ubicacion_id`) ON DELETE CASCADE ON UPDATE CASCADE
									)";
		$conexion->ejecutar_query();
	}

	if(mysqli_connect($servidor, $usuario, $clave, $basedatos)){			
			header("Location: bienvenido.php");
		}

		else{
			header("Location: instalador/FormBD.php");
		}		
 ?>
