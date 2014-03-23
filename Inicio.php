<?php 
	include_once("cls_ubicacion.php");
	include_once("cls_articulo.php");

	$articulo = new articulo();

	if(isset($_GET['idm']) && $_GET['idm']>0){
		$articulo->id = $_GET['idm'];
		$articulo->cargar();
	}
 ?> 

<!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<title>Articulos | Home</title>
	<script type="text/javascript"src="Scripts/inicio.js"></script>
	<link rel="stylesheet" type="text/css" href="Styles/articulos.css">		
</head>
<body>
	<div id="main">
	<div id="head"><h1>Mi Tienda</h1></div>
	<a href="ubicaciones.php" id="lkUbic">Administrar ubicaciones</a>
	<div id="divForm">
	<h2>Datos de los articulos</h2>				
		<form enctype="multipart/form-data" method="post" action="gestor_articulos.php" onsubmit="return validar();">
			<input type="text" name="id"  value="<?php echo $articulo->id; ?>" />
			<table id="tblForm">
				<tr>
					<td><label for="titulo">T&iacute;tulo:</label></td>
					<td><input type="text" name="titulo" class = "campo" id="txt" value="<?php echo $articulo->titulo; ?>" /></td>
					<td width="50"></td>
					<td><label for="precio">Precio:</label></td>
					<td><input type="number" id="prec" min="0" name="precio"  value="<?php echo $articulo->precio; ?>" /></td>
				</tr>
				<tr>
					<td><label for="desc">Descripci&oacute;n:</label></td>
					<td rowspan="2">
						<textarea name="descripcion" cols="25" rows="2" id="desc" value="" /><?php echo $articulo->descripcion; ?></textarea>
					</td>
					<td width="50"></td>
					<td><label for="ubicacion">Ubicaci&oacute;n:</label></td>
					<td>
						<select name="ubicacion" value="<?php echo $articulo->ubicacion; ?>" id="ubc">
							<option>Seleccione una ubicaci&oacute;n</option>
							<?php 

								$ubicacion = new ubicacion();

								$ubicacion->mostrar_ubicaciones(); 

							?>
						</select>
					</td>
					<tr></tr>
					<tr>
						<td><label for="foto">Foto:</label></td>
						<td><input type="file" name="foto" id="file" value="<?php echo $articulo->foto; ?>" /></td>
						<input type="hidden" name="MAX_FILE_SIZE" value="5000000">
						<td width="50"></td>						
					</tr>
					<tr align="right">
						<td colspan="5">
							<button type="submit" class="btn">Guardar</button>
							<button onclick='window.location="Inicio.php"' type="button" class="btn">Nuevo</button>
						</td>
					</td>
					</tr>
			</table>
		</form>
	</div>
	
	<div id="divArt">
		<h2>Articulos en existencia</h2>
			<?php 				
				$rs = $articulo->mostrar_articulos();
			 ?>
	</div>
	</div>	
</body>
</html>