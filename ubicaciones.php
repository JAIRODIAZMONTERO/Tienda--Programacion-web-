<?php 
	include_once("cls_ubicacion.php");
	include_once("cls_conexion.php");

	$ubicacion = new ubicacion();
	
	if(isset($_GET['idm']) && $_GET['idm']>0){
		$ubicacion->id = $_GET['idm'];
		$ubicacion->cargar();
	}
 ?>

<!doctype html>
<html>
<head>
	<title>Mantenimiento de ubicaciones</title>
	<link rel="stylesheet" type="text/css" href="Styles/ubicaciones.css">
	<script type="text/javascript" src="Scripts/ubicaciones.js"></script>
</head>
<body>
	<div id="main">
	<div id="head"><h1>Ubicaciones</h1></div>
	<a href="Inicio.php" id="lkVolver">Volver a la Tienda</a>	
	
	<div id="divForm">
		<h2>Datos de la ubicaci&oacute;n</h2>
	<form method="post" action="gestor_ubicaciones.php" onsubmit="return validar();">
		
		<input type="hidden" name="id" value="<?php echo $ubicacion->id; ?>" />
		<table id="tblForm">
			<tr>
				<td><label>Nombre:</label></td>
				<td><input type="text" name="nombre" id="txtNom" value="<?php echo $ubicacion->nombre; ?>"></td>
				<td rowspan="2">
					<button type="button" onclick='window.location="ubicaciones.php"' id="btnNuevo">Nueva</button><br />
					<button type="submit" name="guardar" id="btnGuardar">Guardar</button>
				</td>
			</tr>
			<tr>
				<td><label>Descripci&oacute;n:</label></td>
				<td rowspan="2">
					<textarea name="desc" id="txtDesc" value="" /><?php echo $ubicacion->descripcion; ?></textarea>
				</td>
			</tr>
			<tr></tr>
			<tr>
			</tr>				
		</table>
	</form>
	</div>
	
	<div id="divData">
	<h2>Ubicaciones registradas</h2>
	<table id="tblData" border="1">
		<thead>
			<th>Nombre</th>
			<th id="th">Descripci&oacute;n</th>
			<th id="thAc">Acci&oacute;n</th>
		</thead>
		<tbody>
			<?php 
				$ubicacion->cargar_tabla();
			 ?>
		</tbody>
	</table>
</div>
</div>
</body>
</html>