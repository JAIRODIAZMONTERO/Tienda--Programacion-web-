<?php 

	include_once("cls_ubicacion.php");

	$ubicacion = new ubicacion();

	if($_POST){
		$ubicacion->nombre = mysql_real_escape_string($_POST['nombre']);
		$ubicacion->descripcion = mysql_real_escape_string($_POST['desc']);
		$ubicacion->id = mysql_real_escape_string($_POST['id']);		

		$ubicacion->guardar();

		header("Location: ubicaciones.php");
	}

	if(isset($_GET['ide']) && $_GET['ide']>0){
		$ubicacion->id = $_GET['ide'];

		$ubicacion->eliminar();

		header("Location: ubicaciones.php");

	}

 ?>