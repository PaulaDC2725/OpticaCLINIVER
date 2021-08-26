<?php
require_once('../modelo/class.conexion.php');
require_once('../modelo/class.consultas.medico.php');
require_once('../modelo/class.consultas.usuario.php');

$consultas = new Consultas();

$consultasUsuario = new ConsultasUsuario();

$idMedico=$_POST['id'];
$nombreMedico=$_POST['nom'];
$apellidoMedico = $_POST['ape'];
$telefonoMedico = $_POST['tel'];
$direccionUsuario = $_POST['dirr'];
$email= $_POST['email'];
$especialidadMedico =$_POST['esp'];
$tarjetaProfesional = $_POST['tarj'];
$estadoMedico = $_POST['est'];

$mensaje = $consultasUsuario->actualizarUsuario($idMedico,$nombreMedico,$apellidoMedico,$email,$telefonoMedico,$direccionUsuario,'Médico',$estadoMedico);	

$mensaje = $consultas->actualizarMedico($idMedico,$nombreMedico,$apellidoMedico,$telefonoMedico,$email,$especialidadMedico,$tarjetaProfesional,$estadoMedico);

 ?>
 <!DOCTYPE html>
 <html>
 <head>
  <title>VALIDAR actualizacion de usuario MÉDICO</title>
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
 <b><span class="validar_title_min"style="font-family: times new roman; font-size: 15px; color: blue">EL Nº DE IDENTIFICACIÓN ES:</span></b><strong><?php echo($idMedico); ?></strong><br>
 <b><span class="validar_title_min"style="font-family: times new roman; font-size: 15px; color: blue">EL CORREO ELECTRÓNICO ES:</span></b><strong><?php echo($email); ?></strong><br>
 <b><span class="validar_title_min"style="font-family: times new roman; font-size: 15px; color: blue">SU NOMBRE ES:</span></b> <strong><?php echo($nombreMedico); ?></strong><br>
 <b><span class="validar_title_min"style="font-family: times new roman; font-size: 15px; color: blue">SU APELLIDO ES:</span></b><strong><?php echo($apellidoMedico); ?></strong><br>
 <b><span class="validar_title_min"style="font-family: times new roman; font-size: 15px; color: blue">SU TELÉFONO ES:</span></b> <strong><?php echo($telefonoMedico); ?></strong><br>
 <b><span class="validar_title_min"style="font-family: times new roman; font-size: 15px; color: blue">SU DIRECCIÓN ES:</span></b> <strong><?php echo($direccionUsuario); ?></strong><br>
 <b><span class="validar_title_min"style="font-family: times new roman; font-size: 15px; color: blue">SU ESPECIALIDAD ES: </span></b> <strong><?php echo($especialidadMedico); ?></strong></br>
 <b><span class="validar_title_min"style="font-family: times new roman; font-size: 15px; color: blue">EL ESTADO DE LA TARJETA PROFESIONAL ES: </span></b><strong> <?php echo($tarjetaProfesional); ?> </strong><br>
 <br>
 <br>
<a href="../../control/gestionar_usuarios_sec.php"><input type="button"class="btn btn-success" value="Listo"/>
	<a href="../../../index.html"><input type="button" class="btn btn-info" value="Volver al inicio"/> </a>
	<br/>
	<br/>
	<a href="../../control/actualizar/act_usu_m.php"><input type="button" class="btn btn-danger" value="volver al formulario"/> </a>
	</div>
	<div id="div_footer">		
			<img src="../../../css/imagenes/fondo_cut.png"/>			
	</div>
 </body>
 </html>
