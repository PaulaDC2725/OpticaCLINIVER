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

	if(validarid=="OK"  && validarNombre=="OK" && 
		validarApellido=="OK" ){
		$( "#form" ).submit();
	}
	
};


   

