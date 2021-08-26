<?php 
	require_once('../../php/modelo/class.conexion.php');
	require_once('../../php/modelo/class.consultas.medico.php');
	require_once('../../php/modelo/class.consultas.usuario.php');

	$consultas = new Consultas();

	$consultasUsuario = new ConsultasUsuario();

	$estadoMedico=$_GET['estado'];
	$idMedico=$_GET['id'];

	
	$result=$consultas->cambiarEstadoMedico($estadoMedico,$idMedico);  	

	$result=$consultasUsuario->cambiarEstadoUsuario($estadoMedico, $idMedico);

	header("Location: ../../control/gestionar_usuarios_sec.php");

?>