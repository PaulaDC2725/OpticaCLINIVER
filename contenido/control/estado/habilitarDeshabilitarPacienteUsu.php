<?php 
	require_once('../../php/modelo/class.conexion.php');
  	require_once('../../php/modelo/class.consultas.php');
  	require_once('../../php/modelo/class.consultas.usuario.php');

  	$consultas = new Consultas();

  	$consultasUsuario = new ConsultasUsuario();

  	$estadoPaciente=$_GET['estado'];
  	$idPaciente=$_GET['id'];

	
	$result=$consultas->cambiarEstadoPaciente($estadoPaciente,$idPaciente);  	

	$result=$consultasUsuario->cambiarEstadoUsuario($estadoPaciente, $idPaciente);

	header("Location: ../../control/gestionar_usuarios_sec.php");

?>