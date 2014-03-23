function validar(){

	valido = false;

	serv = document.getElementById("serv").value;
	user = document.getElementById("user").value;
	clave = document.getElementById("clave").value;
	bd = document.getElementById("bd").value;


	if(serv.length == 0){
		alert("Debe ingresar el nombre del servidor");
		document.getElementById("serv").focus();

		return valido = false;
	}

	if(user.length == 0){
		alert("Debe ingresar el nombre de usuario");
		document.getElementById("user").focus();

		return valido = false;
	}

	if(bd.length == 0){
		alert("Debe ingresar el nombre de la base de datos");
		document.getElementById("bd").focus();

		return valido = false;
	}

	else{
		alert("Cuando la conexion logre ser establecida usted sera redireccioando automaticamante");
		
		return valido = true;
	} 
}