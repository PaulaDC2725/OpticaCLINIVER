<?php 
  require_once('../php/modelo/class.conexion.php');
  require_once('../php/modelo/class.consultas.medico.php');
  require_once('../php/modelo/class.consultas.citasag.php');


  $consultas = new Consultas();


  $id=null;
  $idMedico=null;
  $nombreMedico=null;
  $apellidoMedico=null;
  

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
  $consultasP= new Citas();
 
    $filas = $consultasP->cargarPacientes();
   
   
  
  $tabla="";
  $estado="";
  $boton='';   

    foreach ($filas as $fila){


      $boton='<a href="asig_cit_med_FormP.php?id='.$filtro.'&idPac='.$fila['idPaciente'].'"> <input type="button" value="Seleccionar" class="btn btn-success"> </a>';

      $tabla.='<tr class="limitada" scope="row">';
        $tabla.='<th scope="col">'.$fila['idPaciente'].'</th>';
        $tabla.='<td>'.$fila['nombrePaciente'].'</td>';
        $tabla.='<td>'.$fila['apellidoPaciente'].'</td>';
        $tabla.='<td>'.$fila['direccionPaciente'].'</td>';
        $tabla.='<td>'.$fila['telefonoPaciente'].'</td>';
        $tabla.='<td>'.$fila['fechaNacimiento'].'</td>';
                if ($fila['estadoPaciente']=='1') {
          $estado='<td>ACTIVO</td>';
        }else{$estado='<td>INACTIVO</td>';}
        $tabla.=$estado;
        $tabla.='<td>'.$boton.'</td>';        

      $tabla.='</tr>';

     
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
        <li><a href="asig_cit_med.php">Asignar cita</a></li>
        <li role="separator" class="divider"></li>
        <li><a href="consulta/cons_cit_med.php">Consultar cita</a></li>
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
  <h3 class="login__title">Información del médico Seleccionado</h3>

        
 <form action="asig_cit_med_FormP.php"  method="post">
	       <div class="form-row">
        <div class="form-group col-md-4 col-lg-4 col-sm-4">
      <label for="id">Número de Identificación del médico</label>
      <input required type="text" id="id_show" name="id_show" placeholder="ingresa el numero del documento de identidad" class="form-control" value="<?php echo $idMedico;?>" disabled>
      <input name="id" id="id" type="hidden" value="<?php echo $idMedico;?>">
    </div>    
    <div class="form-group col-md-4 col-lg-4 col-sm-4">
      <label for="nom">Nombre</label>
      <input required type="text" id="nomS" name="nomS" placeholder="ingresa tu nombre" class="form-control" value="<?php echo $nombreMedico;?>" disabled>
        <br> 
       <input name="nom" id="nom" type="hidden" value="<?php echo $nombreMedico;?>">
    </div>
    <div class="form-group col-md-4 col-lg-4 col-sm-4">
      <label for="ape">Apellido</label>
      <input  required type="text" id="apeS" name="apeS" placeholder="ingresa tu Apellido" class="form-control" value="<?php echo $apellidoMedico;?>" disabled>
       <input name="ape" id="ape" type="hidden" value="<?php echo $apellidoMedico;?>">
      <br> 
    </div>
  </div>
 <h2 class="login__title">Seleccione el paciente que solicita la cita</h2>
<div class="table-responsive"> 
  <table class="table table-striped">
    <thead>
      <tr>
        <th scope="col">Número de identificación</th>
        <th scope="col">Nombre</th>
        <th scope="col">Apellido</th>
        <th scope="col">Dirección</th>
        <th scope="col">Teléfono</th>
        <th scope="col">Fecha de Nacimiento</th>
        <th scope="col">Estado del Paciente</th>
        <th scope="col">Seleccionar</th>
      </tr>
    </thead>
    <tbody>        
      <?php echo $tabla;?>
    </tbody>
  </table>
</div>
  
  </div>
  </form>
     <div id="div_footer">    
    <img src="../../css/imagenes/fondo_cut.png"/>
  </div>
</body>
</html>