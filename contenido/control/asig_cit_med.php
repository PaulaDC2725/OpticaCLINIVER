 <?php
  require_once('../php/modelo/class.conexion.php');
  require_once('../php/modelo/class.consultas.medico.php');
  $consultas = new Consultas();
  if (isset($_GET['filtroCol']) && isset($_GET['valor'])) {
    $filas = $consultas->cargarMedicosFiltrados($_GET['filtroCol'],$_GET['valor']);
  }else{
    $filas = $consultas->cargarMedicos();
  }  
   
  
  $tabla="";
  $estado="";
  $boton='';

  if (isset($filas)) {    

    foreach ($filas as $fila){
      $tabla.='<tr class="limitada" scope="row">';
        $tabla.='<th scope="col">'.$fila['idMedico'].'</th>';
        $tabla.='<td>'.$fila['nombreMedico'].'</td>';
        $tabla.='<td>'.$fila['apellidoMedico'].'</td>';
        $tabla.='<td>'.$fila['telefonoMedico'].'</td>';
        $tabla.='<td>'.$fila['correoMedico'].'</td>';
        $tabla.='<td>'.$fila['especialidadMedico'].'</td>';
                if ($fila['estadoMedico']=='1') {
          $estado='<td>ACTIVO</td>';
        }else{$estado='<td>INACTIVO</td>';}
        $tabla.=$estado;
        $tabla.='<td>'.$boton.'</td>';
        $tabla.='<td><center><a href="asig_cit_med_Form.php?id='.$fila['idMedico'].'"<input type="button" class="btn btn-success">SELECCIONAR</a></center>';

      $tabla.='</tr>';

     
     }  
 }else{
  $tabla='<tr style="text-align: center">';
        $tabla.='<td colspan="9" style="color: #d64f4f; font-size: 20px">';
          $tabla.='No se encuentran resultados para la busqueda';
        $tabla.='</td>';
      $tabla.='</tr>';
 }

?>
<!DOCTYPE html>
<html>
<head>
  <title>MEDICOS</title>
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
<h2 class="login__title">Seleccione el Médico que atenderá la cita</h2>
<table class="table table-striped">
  <tbody>
    <tr>
      <form action="asig_cit_med.php" method="GET" id="form">        
        <td>
          <select type="option" id="est" name="filtroCol" class="form-control" required="">
            <option value="idMedico">Número de identificación</option>
            <option value="nombreMedico">Nombre</option>
            <option value="apellidoMedico">Apellido</option>
            <option value="telefonoMedico">Telefono</option>
            <option value="correoMedico">Correo</option>
          </select>          
        </td>
        <td>
          <input type="text" name="valor" class="form-control" value="" required="">
        </td>
        <td>          
          <button type="submit" class="btn btn-info" >Buscar</button>
        </td>
        <td>
          <a href="asig_cit_med.php"><input type="button" class="btn btn-success" value="Limpiar Busqueda"></a>
        </td>
      </form>         
      <td>
        
      </td>  
    </tr>
  </tbody>
</table>
<div class="table-responsive"> 
  <table class="table table-striped">
    <thead>
      <tr>
        <th scope="col">Número de identificación</th>
        <th scope="col">Nombre</th>
        <th scope="col">Apellido</th>
        <th scope="col">Telefono</th>
        <th scope="col">Correo electrónico</th>
        <th scope="col">Especialidad del médico</th>
        <th scope="col">Estado del Medico</th>
        <th scope="col">Seleccionar</th>
      </tr>
    </thead>
    <tbody>        
      <?php echo $tabla;?>
    </tbody>
  </table>
</div>
 <div id="div_footer">    
    <img src="../../css/imagenes/fondo_cut.png"/>
  </div>
</body>
</html>