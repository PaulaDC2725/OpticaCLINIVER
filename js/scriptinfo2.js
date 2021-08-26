$(document).ready(function() {

	$('#id').keyup(function() {

		validarid();

	});
	$("#button_form" ).click(function() {
		validarFormularioMedico();
	});
	

});



function validarFormularioMedico(){
	/********************************************************/	
	var id = $("#id").val();
	var validarid = "";

	if (id=="" || id==undefined) {
		validarid="Debe ingresar un número de identificación";
	}else{
		validarid="OK";
	}
	$("#validarid").html(validarid);

/********************************************************/
	var email = $("#email").val();
	var validaremail = "";									

	if (email=="" || email==undefined) {
		validaremail="Debe escribir un correo válido";
	}else{
		validaremail="OK";
	}

	$("#validaremail").html(validaremail);

/********************************************************/
	var nombre = $("#nom").val();
	var validarNombre = "";

	if (nombre=="" || nombre==undefined) {
		validarNombre="Debe escribir un nombre valido";
	}else{
		validarNombre="OK";
	}		
	$("#validarNombre").html(validarNombre);

/********************************************************/
	var apellido = $("#ape").val();
	var validarApellido = "";

	if (apellido=="" || apellido==undefined) {
		validarApellido="Debe escribir un apellido valido";
	}else{
		validarApellido="OK";
	}		
	$("#validarApellido").html(validarApellido);

/********************************************************/
	var dirr = $("#dirr").val();
	var validardirr = "";									

	if (dirr=="" || dirr==undefined) {
		validardirr="Debe escribir una dirección válida";
	}else{
		validardirr="OK";
	}

	$("#validardirr").html(validardirr);

/********************************************************/
		var tel = $("#tel").val();
	var validartel = "";

	if (tel=="" || tel==undefined) {
		validartel="Debe escribir un número de teléfono valido";
	}else{
		validartel="OK";
	}
	$("#validartel").html(validartel);

/********************************************************/
	var esp = $("#esp").val();
	var validaresp = "";									

	if (esp=="" || esp==undefined) {
		validaresp="Debe ingresar una especialidad";
	}else{
		validaresp="OK";
	}

	$("#validaresp").html(validaresp);
	/********************************************************/
	var est = $("#est").val();
	var validarest = "";

	if (est=="" || est==undefined) {
		validarest="Debe seleccionar un estado";
	}else{
		validarest="OK";
	}
	$("#validarest").html(validarest);


/********************************************************/
	var tarj = $("#tarj").val();
	var validartarj = "";									

	if (tarj=="" || tarj==undefined) {
		validartarj="Debe ingresar un estado de tarjeta profesional válido";
	}else{
		validartarj="OK";
	}

	$("#validartarj").html(validartarj);
	/********************************************************/

	if(validarid=="OK"  && validaremail=="OK" && validarNombre=="OK" && 
		validarApellido=="OK" && validardirr=="OK" && validartel=="OK" && validaresp=="OK"   && validarest=="OK"   && 
		validartarj=="OK"){
		$( "#form" ).submit();
	}
	
};


   

