 <?php
$ciu=$_POST['inputCity'];
$dir = $_POST['inputAddress'];
$nom = $_POST['inputEmail4'];
$ape = $_POST['inputPassword4'];
$est =$_POST['inputState'];
$soli = $_POST['inputsoli'];
$usu = $_POST['usu'];
 ?>
 <!DOCTYPE html>
 <html>
 <head>
  <title>VALIDAR Registro de la evolución de historia clínica</title>
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
 <b><span class="validar_title_min" style="font-family: times new roman; font-size: 15px; color: blue">EL TIPO DE SOLICITUD ES:</span></b><b style="font-family: times new roman; font-size: 15px; color: #18453a">Registro evolucion de la historia clínica</b><br>
 <b><span class="validar_title_min"style="font-family: times new roman; font-size: 15px; color: blue">EL NOMBRE DE USUARIO ES:</span></b><strong><?php echo($usu); ?></strong><br>
 <b><span class="validar_title_min"style="font-family: times new roman; font-size: 15px; color: blue">LA DIRECCIÓN INGRESADA ES: </span></b><strong><?php echo($dir); ?></strong><br>
 <b><span class="validar_title_min"style="font-family: times new roman; font-size: 15px; color: blue">EL NOMBRE INGRESADO ES:</span></b><strong><?php echo($nom); ?></strong><br>
 <b><span class="validar_title_min"style="font-family: times new roman; font-size: 15px; color: blue">EL APELLIDO INGRESADO ES:</span></b><strong><?php echo($ape); ?></strong><br>
 <b><span class="validar_title_min"style="font-family: times new roman; font-size: 15px; color: blue">LA CIUDAD ES:</span></b> <strong><?php echo($ciu); ?></strong><br>
 <b><span class="validar_title_min"style="font-family: times new roman; font-size: 15px; color: blue">SU ESTRATO ES: </span></b> <strong><?php echo($est); ?></strong> <br>
 <b><span class="validar_title_min"style="font-family: times new roman; font-size: 15px; color: blue">LA SOLICITUD ES: </span></b> <strong><?php echo($soli); ?></strong> <br>

 <br>
 <br>
<a href="../../pag_principal/pagina_principal_medico.html"><input type="button"class="btn btn-success" value="Listo"/>
	<a href="../../../index.html"><input type="button" class="btn btn-info" value="Volver al inicio"/> </a>
	<br/>
	<br/>
	<a href="../../registrar/reg_evo_his_cli.html"><input type="button" class="btn btn-danger" value="volver al formulario"/> </a>
	</div>
	<div id="div_footer">		
			<img src="../../../css/imagenes/fondo_cut.png"/>			
	</div>
 </body>
 </html>