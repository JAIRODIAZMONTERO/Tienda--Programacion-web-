<html>
 <head>
 	<title>Inicio | Creacion de Base de Datos</title>
 	<link rel="stylesheet" type="text/css" href="../Styles/FormDB.css">
 	<script type="text/javascript" src="../Scripts/formBD.js"></script>
 </head>
 <body>
 	<center>
 	<h1>Configuraci&oacute;n de la Base de Datos de la aplicaci&oacute;n</h1>
 	<hr>
 	<p><strong>El sistema necesita crear una Base de Datos para su correcto funcionamiento.<br /> 
 		Por favor complete este formulario con los datos requeridos</strong></p>
 	<form method="post" action="../index.php" onsubmit="return  validar();">
 		<table>
 			<tr>
 				<td><label>Servidor:</label></td>
 				<td><input type="text" name="servidor" class="campo" id="serv" /><label class="req">*</label></td>
 			</tr>
 			<tr>
 				<td><label>Usuario:</label></td>
 				<td><input type="text" name="usuario" class="campo" id="user" /><label class="req">*</label></td>
 			</tr>
 			<tr>
 				<td><label>Password:</label></td>
 				<td><input type="password" name="clave" class="campo" id="clave" /></td>
 			</tr>
 			<tr>
 				<td><label>Base de Datos:</label></td>
 				<td><input type="text" name="basedatos" class="campo" id="bd"/><label class="req">*</label></td>
 				<img src="../Site Images/Database.png">
 			</tr>
 			<tr>
 			<tr></tr>
 				<tr><td colspan="2" align="right"><button type="submit" id="btn">Conectar</button></td>
 			</tr>
 		</table>
 	</form> 
 	</center>
 </body>
 </html>