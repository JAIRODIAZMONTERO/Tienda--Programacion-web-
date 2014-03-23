<?php 

include_once("cls_articulo.php");
include_once("cls_conexion.php");

	$articulo = new articulo(); 

	if(isset($_POST)){

		$foto = $_FILES['foto']['name'];
		$ruta_foto = "Imagenes/".time()."__".$foto;
		$temp = $_FILES['foto']['tmp_name'];

		if($_FILES['foto']['size'] < $_POST['MAX_FILE_SIZE']){

			if(move_uploaded_file($temp, $ruta_foto)){
				$articulo->titulo = mysql_real_escape_string($_POST['titulo']);
				$articulo->precio = mysql_real_escape_string($_POST['precio']);
				$articulo->descripcion = mysql_real_escape_string($_POST['descripcion']);
				$articulo->ubicacion = mysql_real_escape_string($_POST['ubicacion']);
				$articulo->id = mysql_real_escape_string($_POST['id']);
				$articulo->foto = $ruta_foto;

				$articulo->guardar();

				header("Location: Inicio.php");
			}
		}
		else{
			header("Location: Inicio.php");
		}		
	}

	if(isset($_GET['ide']) && $_GET['ide']>0){

		$articulo->id=$_GET['ide'];
		$articulo->eliminar();

		header("Location: Inicio.php");
	}
 ?>