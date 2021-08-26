<?php
	require_once('../modelo/class.conexion.php');
	require_once('../modelo/class.consultas.usuario.php');

	$consultasUsuario = new ConsultasUsuario();

?>
<!DOCTYPE html>
<html>
<head>
	<title>ERROR</title>
	<meta name="viewport" content="width=device-width">
  <link rel="stylesheet" href="../../../css/style.css">
  <!--aqui llamé la referencia del estilo de bootstrap que implementé-->
  <script src="../../../js/jquery-3.3.1.slim.min.js" ></script>
  <link rel="stylesheet" href="../../../bs/3.4.1/css/bootstrap.min.css" integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous">

  <!-- Optional theme -->
  <link rel="stylesheet" href="../../../bs/3.4.1/css/bootstrap-theme.min.css" integrity="sha384-6pzBo3FDv/PJ8r2KRkGHifhEocL+1X2rVCTTkUfGk7/0pbek5mMa1upzvWbrUbOZ" crossorigin="anonymous">

  <!-- Latest compiled and minified JavaScript -->
  <script src="../../../bs/3.4.1/js/bootstrap.min.js" integrity="sha384-aJ21OjlMXNL5UyIl/XNwTMqvzeRMZH2w8c5cRVpzpU8Y5bApTppSuUkhZXN0VxHd" crossorigin="anonymous"></script>
</head>
<body>
<div id="div_header">		
		<img src="../../../css/imagenes/fondo_cut.png"/>			
	</div>
	<br>
	<br>
	<br>
 <?php 

$usuario = $_POST['usuario'];
$contrasenia = $_POST['contraseña'];
$estadoU="";
$Tipo="Paciente";

$filas = $consultasUsuario->validarLoginUsuario($usuario,$contrasenia,$Tipo, $estadoU);
$resultado=0;

	foreach ($filas as $fila) {
		$resultado=$fila['RESULTADO'];
	}

if ($resultado=="1"){
	header('location: ../../pag_principal/pagina_principal_paciente.html');
}else{
	echo('<b><span class="validar_title_min" style="font-family: times new roman; font-size: 20px; color: blue"> El usuario o la contraseña son incorrectos. </span></b>');
}


/*if($usuario=='Paula123' && $contrasenia=='paula271017'){
	header('location: ../../pag_principal/pagina_principal_paciente.html');
}
else{
	echo('<b><span class="validar_title_min" style="font-family: times new roman; font-size: 20px; color: blue"> El usuario o la contraseña son incorrectos. </span></b>');
}*/

?> <br>
	
<br>
<br>
<br>
<br>
<div id="footer">   
  <a href="../../login/login_cliniver_paciente.html">
  <input type="button" class="btn btn-danger" value="Regresar"></a>
  </div>

		<div id="div_footer">		
		<img src="../../../css/imagenes/fondo_cut.png"/>
	</div>
</body>
</html>