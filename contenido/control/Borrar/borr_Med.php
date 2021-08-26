<?php 
  require_once('../../php/modelo/class.conexion.php');
  require_once('../../php/modelo/class.consultas.medico.php');


  $consultas = new Consultas();

  $id=null;
  $idMedico=null;
  $nombreMedico=null;
  $apellidoMedico=null;
  $direccionUsuario=null;
  $telefonoMedico=null;
  $correoMedico=null;
  $especialidadMedico=null;
  $tarjetaProfesional=null;
  $estadoMedico=null;

  if (isset($_GET['id'])) {
    $id=$_GET['id'];
  

    $filtro=$id;
    $select="";
    $selectarj="";

    $filas = $consultas->cargarMedicosFiltroId($filtro);

    foreach ($filas as $fila) {
      $idMedico=$fila['idMedico'];
      $nombreMedico=$fila['nombreMedico'];    
      $apellidoMedico=$fila['apellidoMedico'];
      $direccionUsuario=$fila['direccionUsuario'];
      $telefonoMedico=$fila['telefonoMedico'];
      $correoMedico=$fila['correoMedico'];
      $especialidadMedico=$fila['especialidadMedico'];
      $tarjetaProfesional=$fila['tarjetaProfesional'];
      $estadoMedico=$fila['estadoMedico'];  
    }  

    if ($estadoMedico=="1") {
      $select='<option value="1" selected>Activo</option>
              <option value="0">Inactivo</option>';
    }else{
      $select='<option value="1">Activo</option>
              <option value="0" selected>Inactivo</option>';
    }
  }
  if ($tarjetaProfesional=="Activa") {
      $selectarj='<option value="Activa" selected>Activa</option>
              <option value="Inactiva">Inactiva</option>';
    }else{
      $selectarj='<option value="Activa" >Activa</option>
              <option value="Inactiva" selected>Inactiva</option>';
    }

?>
<!DOCTYPE html>
<html>
<head>
	<title>ELIMINAR USUARIO MEDICO</title>
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
  <script src="../../../js/scriptinfoBorr2.js"></script>
</head> 
<body>
  <div id="div_header">    
    <img src="../../../css/imagenes/fondo_cut.png"/>
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
      <a class="navbar-brand" href="../../pag_principal/pagina_principal_secretaria.html">INICIO</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
      <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Gestionar Usuarios<span class="caret"></span></a>
        <ul class="dropdown-menu">
        <li class="dropdown-header">Registrar Usuarios</li>
        <li><a href="../../registrar/registrar_medico.html">Medico</a></li>
        <li><a href="../../registrar/registrar_paciente.html">Paciente</a></li>
        <li role="separator" class="divider"></li>
        <li><a href="../gestionar_usuarios_sec.php">Más</a></li>
        </ul>
      </li>
      <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Gestionar Citas<span class="caret"></span></a>
        <ul class="dropdown-menu">
        <li><a href="../asig_cit_med.php">Asignar cita</a></li>
        <li role="separator" class="divider"></li>
        <li><a href="../consulta/cons_cit_med.html">Consultar cita</a></li>
        <li role="separator" class="divider"></li>
        <li><a href="../reag_cit_med.html">Reagendar cita</a></li>
        <li role="separator" class="divider"></li>
        <li><a href="../cancelar/can_cit_med.html">Cancelar cita</a></li>
        <li role="separator" class="divider"></li>
        <li><a href="../../registrar/reg_as_pac.html">Registrar asistencia paciente</a></li>
        </ul>
      </li>
      <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Gestionar Historia clínica<span class="caret"></span></a>
          <ul class="dropdown-menu">
          <li><a href="../ape_his_cli.html">Apertura historia clínica</a></li>
          <li role="separator" class="divider"></li>
          <li><a href="../consulta/con_his_cli.html">Consultar historia clínica</a></li>
          </ul>
        </li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Gestionar Exámenes de laboratorio<span class="caret"></span></a>
          <ul class="dropdown-menu">
          <li><a href="../../registrar/reg_res_lab.html">Registrar resultado de laboratorio</a></li>
          <li role="separator" class="divider"></li>
          <li><a href="../consulta/cons_res_lab.html">Consultar resultado de laboratorio</a></li>
          </ul>
        </li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Generar reportes<span class="caret"></span></a>
          <ul class="dropdown-menu">
        <li><a href="../../reportes/gen_rep_cit_med.html">Generar reporte de citas por medico
        </a>
        </li>
        <li role="separator" class="divider"></li>
        <li> <a href="../../reportes/gen_rep_his_cli.html">Generar reporte historia clínica</a>
          </li>
          <li role="separator" class="divider"></li>
          <li><a href="../../reportes/gen_rep_est_cit.html">Generar reporte de estado citas</a>
          </li>
          <li role="separator" class="divider"></li>
          <li><a href="../../reportes/gen_rep_graf_asi_pac.html">Generar reporte Gráfico de asistencia de pacientes</a>
          </li>
         </ul>
      </li>
    </ul>
      
    </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
  </nav>
</div>
	<h2 class="login__title">ELIMINAR MÉDICO</h2>
	 <form action="../../php/info/info_borr_med.php" method="post" id="form"> 
    <div class="form-row">
        <div class="form-group col-md-3 col-lg-3 col-sm-3">
      <label for="id">¿Es este el número de documento del Medico que desea eliminar?</label>
      <input required type="text" id="id_show" name="id_show" placeholder="ingresa el numero del documento de identidad" class="form-control" value="<?php echo $idMedico;?>" disabled>
       <input name="id" id="id" type="hidden" value="<?php echo $idMedico;?>">
         <div id="validarid"></div>
    </div>
       <div class="form-group col-md-3 col-lg-3 col-sm-3">
      <label for="nom">¿Este es el nombre del médico que desea eliminar?</label>
       <input required type="text" id="nomShow" name="nomShow" placeholder="ingresa tu nombre" class="form-control" value="<?php echo $nombreMedico;?>" disabled>
        <br> 
         <input name="nom" id="nom" type="hidden" value="<?php echo $nombreMedico;?>">
      <label id="validarNombre"></label>
    </div>
    <div class="form-group col-md-3 col-lg-3 col-sm-3">
      <label for="ape">¿Este es el apellido del médico que desea eliminar?</label>
      <input  required type="text" id="apeShow" name="apeShow" placeholder="ingresa tu Apellido" class="form-control" value="<?php echo $apellidoMedico;?>" disabled>
       <input name="ape" id="ape" type="hidden" value="<?php echo $idMedico;?>">
      <label id="validarApellido"></label>
    </div>
   </div> 
    <label class="informaciónderegistro"> <b> *VERIFICQUE LA INFORMACIÓN, Y CONFIRME SI ES LA INFORMACIÓN QUE DESEA BORRAR </b> </label>
    <br>
   <input type="button" class="btn btn-danger"  value="CONFIRMO" name="" id="button_form">
  </div>
</form>
  </div>
     <div id="div_footer">    
    <img src="../../../css/imagenes/fondo_cut.png"/>
  </div>
</body>
</html>