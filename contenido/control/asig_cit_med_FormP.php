<?php
require_once('../php/modelo/class.conexion.php');
require_once('../php/modelo/class.consultas.medico.php');
require_once('../php/modelo/class.consultas.citasag.php');
require_once('../php/modelo/class.consultas.citasag.php');

$consultas = new Consultas();
$consultasCitasas = new Citas();





$idMedico=$_GET['id'];
$idPaciente=$_GET['idPac'];
$nombreMedico="";
$apellidoMedico="";
$idPaciente="";
$nombrePaciente="";
$apellidoPaciente="";


if (isset($_GET['id'])) {
  $id=$_GET['id'];

  $filtro=$id;
  $select="";

  $filas = $consultas->cargarMedicosFiltroIdAsig($filtro);

  foreach ($filas as $fila) {
    $idMedico=$fila['idMedico'];
    $nombreMedico=$fila['nombreMedico'];    
    $apellidoMedico=$fila['apellidoMedico'];
  }
}


if (isset($_GET['idPac'])) {
  $id=$_GET['idPac'];

  $filtro=$id;
  $select="";

  $filas = $consultasCitasas->cargarPacientesFiltrados('idPaciente', $filtro);

  foreach ($filas as $fila) {
    $idPaciente=$fila['idPaciente'];
    $nombrePaciente=$fila['nombrePaciente'];    
    $apellidoPaciente=$fila['apellidoPaciente'];
  }
}


?>
<!DOCTYPE html>
<html>
<head>
	<title>ASIGNAR CITA MEDICA</title>
	 <meta charset="utf-8">
  <meta name="viewport" content="width=device-width">
  <link rel="stylesheet" href="../../css/style.css">
  <!--aqui llamé la referencia del estilo de bootstrap que implementé-->
  <script src="../../js/jquery-3.3.1.slim.min.js" ></script>
  <link rel="stylesheet" href="../../bs/3.4.1/css/bootstrap.min.css" integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous">

  <!-- Optional theme -->
  <link rel="stylesheet" href="../../bs/3.4.1/css/bootstrap-theme.min.css" integrity="sha384-6pzBo3FDv/PJ8r2KRkGHifhEocL+1X2rVCTTkUfGk7/0pbek5mMa1upzvWbrUbOZ" crossorigin="anonymous">

  <!-- Latest compiled and minified JavaScript -->
  <script src="../../bs/3.4.1/js/bootstrap.min.js" integrity="sha384-aJ21OjlMXNL5UyIl/XNwTMqvzeRMZH2w8c5cRVpzpU8Y5bApTppSuUkhZXN0VxHd" crossorigin="anonymous"></script> 
</head>
<body>
	<div id="div_header">		
		<img src="../../css/imagenes/fondo_cut.png"/>
	</div>
  <div id="header">
  <nav class="navbar navbar-default">
    <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
      <span class="sr-only">Toggle navigation</span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="../pag_principal/pagina_principal_secretaria.html">INICIO</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
      <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Gestionar Usuarios<span class="caret"></span></a>
        <ul class="dropdown-menu">
        <li class="dropdown-header">Registrar Usuarios</li>
        <li><a href="../registrar/registrar_medico.html">Medico</a></li>
        <li><a href="../registrar/registrar_paciente.html">Paciente</a></li>
        <li role="separator" class="divider"></li>
        <li><a href="gestionar_usuarios_sec.php">Más</a></li>
        </ul>
      </li>
      <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Gestionar Citas<span class="caret"></span></a>
        <ul class="dropdown-menu">
        <li><a href="asig_cit_med.html">Asignar cita</a></li>
        <li role="separator" class="divider"></li>
        <li><a href="consulta/cons_cit_med.html">Consultar cita</a></li>
        <li role="separator" class="divider"></li>
        <li><a href="reag_cit_med.html">Reagendar cita</a></li>
        <li role="separator" class="divider"></li>
        <li><a href="cancelar/can_cit_med.html">Cancelar cita</a></li>
        <li role="separator" class="divider"></li>
        <li><a href="reg_as_pac.html">Registrar asistencia paciente</a></li>
        </ul>
      </li>
      <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Gestionar Historia clínica<span class="caret"></span></a>
          <ul class="dropdown-menu">
          <li><a href="ape_his_cli.html">Apertura historia clínica</a></li>
          <li role="separator" class="divider"></li>
          <li><a href="consulta/con_his_cli.html">Consultar historia clínica</a></li>
          </ul>
        </li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Gestionar Exámenes de laboratorio<span class="caret"></span></a>
          <ul class="dropdown-menu">
          <li><a href="reg_res_lab.html">Registrar resultado de laboratorio</a></li>
          <li role="separator" class="divider"></li>
          <li><a href="consulta/cons_res_lab.html">Consultar resultado de laboratorio</a></li>
          </ul>
        </li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Generar reportes<span class="caret"></span></a>
          <ul class="dropdown-menu">
        <li><a href="../reportes/gen_rep_cit_med.html">Generar reporte de citas por medico
        </a>
        </li>
        <li role="separator" class="divider"></li>
        <li> <a href="../reportes/gen_rep_his_cli.html">Generar reporte historia clínica</a>
          </li>
          <li role="separator" class="divider"></li>
          <li><a href="../reportes/gen_rep_est_cit.html">Generar reporte de estado citas</a>
          </li>
          <li role="separator" class="divider"></li>
          <li><a href="../reportes/gen_rep_graf_asi_pac.html">Generar reporte Gráfico de asistencia de pacientes</a>
          </li>
         </ul>
      </li>
    </ul>
      
    </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
  </nav>
</div>
	<h2 class="login__title">ASIGNAR CITA MÉDICA</h2>
	 <form action="../php/info/info_asig_cit_med.php"  method="post">
       <div class="form-row">
        <div class="form-group col-md-6 col-lg-6 col-sm-6">
      <label for="id">Número de Identificación del médico</label>
      <input required type="text" id="id_show" name="id_show" placeholder="ingresa el numero del documento de identidad" class="form-control" value="<?php echo $idMedico;?>" disabled>
      <input name="id" id="id" type="hidden" value="<?php echo $idMedico;?>">
    </div>    
  <div class="form-row">
    <div class="form-group col-md-6 col-lg-6 col-sm-6">
      <label for="nom">Nombre del médico</label>
      <input required type="text" id="nomS" name="nomS" placeholder="ingresa tu nombre" class="form-control" value="<?php echo $nombreMedico;?>" disabled>
        <br> 
       <input name="nombreMedico" id="nom" type="hidden" value="<?php echo $nombreMedico;?>">
    </div>
    <div class="form-group col-md-6 col-lg-6 col-sm-6">
      <label for="ape">Apellido del médico</label>
      <input  required type="text" id="apeS" name="apeS" placeholder="ingresa tu Apellido" class="form-control" value="<?php echo $apellidoMedico;?>" disabled>
       <input name="apellidoMedico" id="ape" type="hidden" value="<?php echo $apellidoMedico;?>">
      <br> 
    </div>
    <div class="form-row">
        <div class="form-group col-md-6 col-lg-6 col-sm-6">
      <label for="id">Número de Identificación del Paciente</label>
      <input required type="text" id="id_show" name="id_show" placeholder="ingresa el numero del documento de identidad" class="form-control" value="<?php echo $idPaciente;?>" disabled>
      <input name="idPaciente" id="id" type="hidden" value="<?php echo $idPaciente;?>">
    </div> 
    <div class="form-group col-md-6 col-lg-6 col-sm-6">
      <label for="ape">Nombre del Paciente</label>
      <input  required type="text" id="apeS" name="apeS" placeholder="ingresa tu Apellido" class="form-control" value="<?php echo $nombrePaciente;?>" disabled>
       <input name="nombrePaciente" id="ape" type="hidden" value="<?php echo $nombrePaciente;?>">
      <br> 
    </div>
    <div class="form-group col-md-6 col-lg-6 col-sm-6">
      <label for="ape">Apellido del Paciente</label>
      <input  required type="text" id="apeS" name="apeS" placeholder="ingresa tu Apellido" class="form-control" value="<?php echo $apellidoPaciente;?>" disabled>
       <input name="apellidoPaciente" id="ape" type="hidden" value="<?php echo $apellidoPaciente;?>">
      <br> 
    </div>
    <div class="form-group col-md-6 col-lg-6 col-sm-6">
      <label for="ape">Fecha de la cita</label>
      <input  required type="date" id="apeS" name="FechaA" placeholder="ingresa tu Apellido" class="form-control" >
      <br> 
    </div>
    <div class="form-group col-md-6 col-lg-6 col-sm-6">
      <label for="ape">Hora de la cita</label>
      <input  required type="datetime-local" id="apeS" name="horaA" placeholder="ingresa tu Apellido" class="form-control" >
      <br> 
    </div>
    <div class="form-group col-md-6 col-lg-6 col-sm-6">
      <label for="ape">Consultorio</label>
      <input  required type="text" id="apeS" name="ConsuS" placeholder="ingresa tu Apellido" class="form-control" value="1" disabled>
      <input name="Consu" id="ape" type="hidden" value="1">
      <br> 
    </div>
  </div>
 
    <button type="submit" class="btn btn-success">Completar
    </button>
   
  
  </div>
  </form>
     <div id="div_footer">    
    <img src="../../css/imagenes/fondo_cut.png"/>
  </div>
</body>
</html>