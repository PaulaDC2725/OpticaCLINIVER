$(document).ready(function() {

	
$('#idFK').keyup(function() {

		validaridFK();

	});

	$("#button_form" ).click(function() {
		validarFormularioPaciente();
	});
	

});

function validarFormularioPaciente(){
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
	var dirr = $("#dirr").val();
	var validardirr = "";									

	if (dirr=="" || dirr==undefined) {
		validardirr="Debe escribir una dirección válida";
	}else{
		validardirr="OK";
	}

	$("#validardirr").html(validardirr);

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
	var tel = $("#tel").val();
	var validartel = "";

	if (tel=="" || tel==undefined) {
		validartel="Debe escribir un número de teléfono valido";
	}else{
		validartel="OK";
	}
	$("#validartel").html(validartel);

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
	var fechanacimiento = $("#fna").val();
	var validarFechan = "";

	if (fechanacimiento=="" || fechanacimiento==undefined) {
		validarFechan="Debe ingresar una fecha";
	}else{
		validarFechan="OK";
	}		
	$("#validarFechan").html(validarFechan);
/********************************************************/

	var id = $("#id").val();
	var validarid = "";

	if (id=="" || id==undefined) {
		validarid="Debe ingresar un número de identificación válido";
	}else{
		validarid="OK";
	}		
	$("#validarid").html(validarid);

/********************************************************/
	
	
	if(validaremail=="OK" && validardirr=="OK" && validarNombre=="OK" && 
		validarApellido=="OK" && validartel=="OK" && validarest=="OK" && validarFechan=="OK" 
		&& validarid=="OK"){
		$( "#form" ).submit();
	}
};

    

