<?php 

	include_once("cls_conexion.php");

	class articulo{
		var $titulo;
		var $precio;
		var $descripcion;
		var $ubicacion;
		var $foto;
		var $id;	

		function __construct($id=0){
			if($id>0){
				$this->id=$id;
				$this->cargar();
			}
		}

		function cargar(){
			$query = "SELECT * FROM articulos WHERE articulo_id = '$this->id'";

			$rs = mysql_query($query);

			if(mysql_num_rows($rs)>0){
				
				$row = mysql_fetch_array($rs);

				$this->titulo = $row['titulo'];
				$this->precio = $row['precio'];
				$this->descripcion = $row['descripcion'];
				$this->ubicacion = $row['ubicacion'];
				$this->foto = $row['foto'];
				$this->id = $row['articulo_id'];				
			}
		}

		function guardar(){

			if($this->id>0){
				
				$query = "UPDATE articulos SET titulo = '$this->titulo', precio=$this->precio, 
						descripcion='$this->descripcion', ubicacion=(SELECT ubicacion_id FROM  ubicaciones 
						WHERE nombre='$this->ubicacion'), foto='$this->foto'";
				
				mysql_query($query);
				
			}
			else{				

				$query = "INSERT INTO articulos(titulo, precio, descripcion, ubicacion, foto)
						 values('$this->titulo',$this->precio,'$this->descripcion',(SELECT 
						 ubicacion_id FROM ubicaciones WHERE nombre='$this->ubicacion'), 
						 '$this->foto')";

				mysql_query($query);
			}
		}

		function mostrar_articulos(){
			$query = "Select a.descripcion, a.titulo, a.foto, a.precio,  u.nombre AS ubicacion, 
					  a.articulo_id FROM articulos a, ubicaciones u WHERE a.ubicacion = u.ubicacion_id ORDER BY a.titulo ASC";

			$rs = mysql_query($query);

			while($row=mysql_fetch_array($rs)){
				echo "<table id='tblArt'>
						  <tr>
							<td rowspan='5'><img src='{$row['foto']}'></td>
							<td><label>T&iacute;tulo:</label></td>
							<td colspan='2'>{$row['titulo']}</td>							
						  </tr>
						  <tr>
						  	<td colspan='2'><label class='desc'>Descripci&oacute;n:</label></td>
						  	<td rowspan='2'><textarea readonly>{$row['descripcion']}</textarea></td>
						  </tr>
						  <tr></tr>
						  <tr>
							<td><label>Costo:&nbsp;&nbsp</label>{$row['precio']}</td>
							<td colspan='2'><label class='lblUbic'>Ubicaci&oacute;n:&nbsp;</label>{$row['ubicacion']}</td>							
						  </tr>
						  <tr>
						  	<td colspan='3'>
						  		<a href='Inicio.php?idm={$row['articulo_id']}' id='lkMod' class='link'>Modificar</a>
						  		<label>|</label>
						  		<a href='gestor_articulos.php?ide={$row['articulo_id']}' id='lkDel' class='link' onclick=' return confirmar();'>Eliminar</a>
						  	</td>
						  </tr>
					  </table>
					  <hr />
					";
			}
		}

		function eliminar(){
			$query = "DELETE FROM articulos WHERE articulo_id = $this->id";

			mysql_query($query);
		}
	}
 ?>