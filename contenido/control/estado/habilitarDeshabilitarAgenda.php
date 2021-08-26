<?php 
	require_once('../../php/modelo/class.conexion.php');
	require_once('../../php/modelo/class.consultas.citasag.php');
	$consultas = new Citas();

	$estadoAgenda=$_GET['estado'];
	$idAgenda=$_GET['id'];

	
	$result=$consultas->cambiarEstadoAgenda($estadoAgenda,$idAgenda);

	header("Location: ../../control/consulta/cons_cit_med.php");

?>