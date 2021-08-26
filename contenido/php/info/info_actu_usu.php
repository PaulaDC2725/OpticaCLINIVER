<?php
require_once('../modelo/class.conexion.php');
require_once('../modelo/class.consultas.php');
require_once('../modelo/class.consultas.usuario.php');

$consultas = new Consultas();

$consultasUsuario = new ConsultasUsuario();

$idPaciente=$_POST['id'];
$email=$_POST['email'];
$nombrePaciente = $_POST['nom'];
$apellidoPaciente = $_POST['ape'];
$direccionPaciente =$_POST['dirr'];
$telefonoPaciente =$_POST['tel'];
$fechaNacimiento = $_POST['fna'];
$estadoPaciente = $_POST['est'];


$mensaje = $consultasUsuario->actualizarUsuario($idPaciente, $nombrePaciente, $apellidoPaciente, $email, $telefonoPaciente, $direccionPaciente, "Paciente", $estadoPaciente);

$mensaje = $consultas->actualizarPaciente($idPaciente,$nombrePaciente,$apellidoPaciente,$direccionPaciente,$telefonoPaciente,$fechaNacimiento,$estadoPaciente);
	
 ?>

 <!DOCTYPE html>
 <html>
 <head>
  <title>VALIDAR actualizacion de usuario PACIENTE</title>
<meta charset="utf-8">
	<meta name="viewport" content="width=device-width">
  <link rel="stylesheet" href="../../../css/style.css">
  <!--aqui llamé la referencia del estilo de bootstrap que implementé-->
  <script src="../../../js/jquery-3.3.1.slim.min.js" ></script>
  <link rel="stylesheet" href="../../../bs/3.4.1/css/bootstrap.min.css" integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous">

  <!-- Optional theme -->
  <link rel="stylesheet" href="../../../bs/3.4.1/css/bootstrap-theme.min.css" integrity="sha384-6pzBo3FDv/PJ8r2KRkGHifhEocL+1X2rVCTTkUfGk7/0pbek5mMa1upzvWbrUbOZ" crossorigin="anonymous">

  <!-- Latest compiled and minified JavaScript -->
  <script src="../../../bs/3.4.1/js/bootstrap.min.js" integrity="sha384-aJ21OjlMXNL5UyIl/XNwTMqvzeRMZH2w8c5cRVpzpU8Y5bApTppSuUkhZXN0VxHd" crossorigin="anonymous"></script>
 <body>
 	<div id="div_header">		
		<img src="../../../css/imagenes/fondo_cut.png"/>			
	</div>
  <div class="registro">

 <h2 class="validar_title"> INFORMACIÓN INGRESADA</h2>
 <b><span class="validar_title_min" style="font-family: times new roman; font-size: 15px; color: blue">EL TIPO DE SOLICITUD ES:</span></b><b style="font-family: times new roman; font-size: 15px; color: #18453a">Actualización usuario</b><br>
 <b><span class="validar_title_min"style="font-family: times new roman; font-size: 15px; color: blue">EL NÚMERO DE IDENTIFICACIÓN ES:</span></b><strong><?php echo($idPaciente); ?></strong><br>
 <b><span class="validar_title_min"style="font-family: times new roman; font-size: 15px; color: blue">LA DIRECCIÓN INGRESADA ES: </span></b><strong><?php echo($direccionPaciente); ?></strong><br>
 <b><span class="validar_title_min"style="font-family: times new roman; font-size: 15px; color: blue">EL NOMBRE INGRESADO ES:</span></b><strong><?php echo($nombrePaciente); ?></strong><br>
 <b><span class="validar_title_min"style="font-family: times new roman; font-size: 15px; color: blue">EL APELLIDO INGRESADO ES:</span></b><strong><?php echo($apellidoPaciente); ?></strong><br>
 <b><span class="validar_title_min"style="font-family: times new roman; font-size: 15px; color: blue">EL CORREO ELECTRÓNICO ES:</span></b> <strong><?php echo($email); ?></strong><br>
 <b><span class="validar_title_min"style="font-family: times new roman; font-size: 15px; color: blue">EL TELÉFONO ES: </span></b> <strong><?php echo($telefonoPaciente); ?></strong> <br>
 <b><span class="validar_title_min"style="font-family: times new roman; font-size: 15px; color: blue">LA FECHA DE NACIMIENTO ES: </span></b> <strong><?php echo($fechaNacimiento); ?></strong> <br>
 <br>
 <br>
<a href="../../control/gestionar_usuarios_sec.php"><input type="button"class="btn btn-success" value="Listo"/>
	<a href="../../../index.html"><input type="button" class="btn btn-info" value="Volver al inicio"/> </a>
	<br/>
	<br/>
	<a href="../../control/actualizar/act_usu.php"><input type="button" class="btn btn-danger" value="volver al formulario"/> </a>
	</div>
	<div id="div_footer">		
			<img src="../../../css/imagenes/fondo_cut.png"/>			
	</div>
 </body>
 </html>
