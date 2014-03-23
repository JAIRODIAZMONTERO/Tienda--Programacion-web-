<?php 
	$file = file_get_contents("dbcon.dat");
	$data = json_decode($file);

	$con = array();
	$con['servidor'] = $data->servidor;
	$con['usuario'] = $data->usuario;
	$con['clave'] = $data->clave;
	$con['basedatos'] = $data->basedatos;
 ?>