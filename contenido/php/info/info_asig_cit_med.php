 <?php
require_once('../modelo/class.conexion.php');
require_once('../modelo/class.consultas.citasag.php');


$consultasC = new Citas();

$idMedicoFK=$_POST['id'];
$idPacienteFK=$_POST['idPaciente'];
$estadoAgenda ='1';
$horaAgenda = $_POST['horaA'];
$consultorio = $_POST['Consu'];
$fechaAgenda= $_POST['FechaA'];
$mensaje = $consultasC-> asignarCitas($fechaAgenda,$horaAgenda,$consultorio,$estadoAgenda,$idMedicoFK,$idPacienteFK);
header ('location: ../../control/consulta/cons_cit_med.php');
?>
