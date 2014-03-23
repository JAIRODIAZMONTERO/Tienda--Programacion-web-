function validar(){

	valido = false;

	titulo = document.getElementById("txt").value.trim();
	desc = document.getElementById("desc").value.trim();
	prec = document.getElementById("prec").value.trim();
	foto = document.getElementById("file").value;
	ubc = document.getElementById("ubc").value;

	if(titulo.length==0){
		alert("Debe ingresar el titulo del articulo");
		document.getElementById("txt").focus();

		return valido = false;
	}

	if(desc.length==0){
		alert("Debe ingresar la descripcion del articulo");
		document.getElementById("desc").focus();

		return valido = false;
	}

	if(prec.length==0 || isNaN(prec)){
		alert("Debe ingresar un numero en el precio del articulo");
		document.getElementById("prec").focus();

		return valido = false;
	}

	if(ubc =="Seleccione una ubicación"){
		alert("Debe seleccionar la ubicacion del articulo");
		document.getElementById("ubc").focus();

		return valido = false;
	}

	if(foto.length==0){
		alert("Debe subir la foto del articulo");
		document.getElementById("file").click();

		return valido = false;
	}

	else{

		return valido = true;
	}
}


function confirmar(){

	eliminar = false;

	if(confirm("Realmente desea eliminar este articulo?")){
		return eliminar = true;
	}

	else{
		return eliminar = false;

		location.reload();
	}
}