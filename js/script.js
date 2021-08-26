$(document).ready(function() {

	$('#contra2').keyup(function() {

		validaContrasenias();

	});
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

				
	var validaClave = $("#validaClave").val();
	var validaridFK = $("#validaridFK").val();
	
	
	if(validaridFK=="OK" && validartel=="OK" && validarNombre=="OK" && 
		validarApellido=="OK" && validarest=="OK" && validarFechan=="OK" && 
		validaClave=="OK" && validardirr=="OK" && validaremail=="OK"){
		$( "#form" ).submit();
	}
	
};



function validaContrasenias(){
	var contra1 = $('#contra1').val();
	var contra2 = $('#contra2').val();
				

	if ( contra1 == contra2 )
	{
		$('#error2').text("las contraseñas si coinciden").css("color", "green");
		$("#validaClave").val("OK");
	} else {
		$('#error2').text("las contraseñas no coinciden").css("color", "red");
		$("#validaClave").val("");
	}
	if (contra2==""){
		$('#error2').text("no dejar en blanco").css("color", "red"); 
		$("#validaClave").val("");
	}
};
/********************************************************/
    function validaridFK(){
    var id = $('#id').val();
	var idFK = $('#idFK').val();
				

	if ( id == idFK )
	{
		$('#EidFK').text("los números si coinciden").css("color", "green");
		$("#validaridFK").val("OK");
	} else {
		$('#EidFK').text("los números no coinciden").css("color", "red");
		$("#validaridFK").val("");
	}
	if (idFK==""){
		$('#EidFK').text("no dejar en blanco").css("color", "red"); 
		$("#validaridFK").val("");
	}
};

