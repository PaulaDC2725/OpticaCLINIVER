<?php
require_once('../modelo/class.conexion.php');
require_once('../modelo/class.consultas.usuario.php');
$consultas = new ConsultasUsuario();

$idPaciente=$_POST['id'];

$mensaje= $consultas->borrarUsuario($idPaciente);
echo $mensaje;


header('location: ../../control/gestionar_usuarios_sec.php');
?>