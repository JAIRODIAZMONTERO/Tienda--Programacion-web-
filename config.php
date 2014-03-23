<?php 

	$archivo = file_get_contents("instalador/dbcon.dat");

	$datos = json_decode($archivo);

	$servidor = $datos->servidor;
	$usuario =  $datos->usuario;
	$clave =  $datos->clave;
	$basedatos =  $datos->basedatos;

	$con = array();
	$confg['servidor'] = $servidor;
	$confg['usuario'] = $usuario;
	$confg['clave'] = $clave;
	$confg['basedatos'] = $basedatos;

 ?>