<?php 

	include_once("cls_conexion.php");

	class ubicacion{
		var $nombre;
		var $id;
		var $descripcion;


		function __construct($id=0){
			if($id>0){
				$this->id = $id;
				$this->cargar();
			}
		}

		function guardar(){
			if($this->id>0){
				$query = "UPDATE ubicaciones SET nombre = '$this->nombre',descripcion='$this->descripcion' WHERE ubicacion_id = $this->id";
				
				mysql_query($query);
			}
			else{
				$query = "INSERT INTO ubicaciones (nombre, descripcion) VALUES('$this->nombre', '$this->descripcion')";

				mysql_query($query);
			}
		}

		function cargar(){

			$query = "SELECT * FROM ubicaciones WHERE ubicacion_id=$this->id";
			$rs = mysql_query($query);

			if(mysql_num_rows($rs)>0){
				$fila = mysql_fetch_array($rs);

				$this->nombre = $fila['nombre'];
				$this->id = $fila['ubicacion_id'];
				$this->descripcion = $fila['descripcion'];
			}
		}

		function eliminar(){
			$query = "DELETE FROM ubicaciones WHERE ubicacion_id=$this->id";

			mysql_query($query);
		}

		function mostrar_ubicaciones(){
			$query = "SELECT * FROM ubicaciones ORDER BY nombre ASC";

			$rs = mysql_query($query);

			while ($row = mysql_fetch_array($rs)) {

				echo "<option value='{$row['nombre']}'>{$row['nombre']}</option>";
			}
		}

		function cargar_tabla(){
			$query = "SELECT * FROM ubicaciones ORDER BY nombre ASC";

			$rs = mysql_query($query);

			while ($row = mysql_fetch_array($rs)) {

				echo "<tr>
						<td id='tdNombre'>{$row['nombre']}</td>
						<td><textarea readonly='readonly'>{$row['descripcion']}</textarea></td>
						<td>
							<a href='ubicaciones.php?idm={$row['ubicacion_id']}' id='lkMod' >Modificar</a>
							<label>|<label>
							<a href='gestor_ubicaciones.php?ide={$row['ubicacion_id']}' onclick='return confirmar();'>Eliminar</a></td>
						</td>
					 </tr>";
			}
		}
	}

 ?>