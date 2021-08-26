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


	var id = $("#id").val();
	var validarid = "";

	if (id=="" || id==undefined) {
		validarid="Debe ingresar un número de identificación válido";
	}else{
		validarid="OK";
	}		
	$("#validarid").html(validarid);

/********************************************************/
	
	
	if(validarNombre=="OK" && validarApellido=="OK" && validarid=="OK"){
		$( "#form" ).submit();
	}
};

    

