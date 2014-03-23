function validar(){

	valido = false;

	nomb = document.getElementById('txtNom').value.trim();
	desc = document.getElementById('txtDesc').value.trim();

	if(nomb.length==0){
		alert("Debe ingresar el nombre de la ubicacion");
		document.getElementById('txtNom').value = "";
		document.getElementById('txtNom').focus();

		return valido = false;
	}

	if(desc.length==0){
		alert("Debe ingresar la descripcion de la ubicacion");
		document.getElementById('txtDesc').value = "";
		document.getElementById('txtDesc').focus();
		
		return valido = false;
	}

	else{
		return true;
	}
}

function confirmar(){

	eliminar = false;

	if(confirm("Realmente desea eliminar esta ubicacion?")){
		return eliminar = true;
	}

	else{
		return eliminar = false;

		location.reload();
	}
}