<?php
	require_once('../modelo/class.conexion.php');
	require_once('../modelo/class.consultas.medico.php');


	$consultas = new Consultas();



	/*$mensaje = $consultas->insertarMedico($idMedico,$nombreMedico,$apellidoMedico,$telefonoMedico,$correoMedico,$especialidadMedico,$tarjetaProfeional,$estadoMedico,$idUsuarioFK);
	echo($mensaje);
	echo "<hr>";
	

	$mensaje = $consultas->actualizarPaciente($idMedico,$nombreMedico,$apellidoMedico,$telefonoMedico,$correoMedico,$especialidadMedico,$tarjetaProfeional,$estadoMedico,$idUsuarioFK);
	echo($mensaje);
	echo "<hr>";

	$idMedicoBorrar="26";

	$borrado =  $consultas->borrarMedico($idMedicoBorrar);

	/*Si el resultado de borrado es 1 se ejecuto correctamente, si es otro entonces fallo*/

	/*echo($borrado);
	echo "<hr>";*/

	$filas = $consultas->cargarMedicos();

	$filtro="a";

	$filas = $consultas->cargarMedicosFiltroName($filtro);


	foreach ($filas as $fila) {
		echo"<table border>";
		echo "<tr>";
		echo "<th> Número de identificación</th>";		
		echo "<th>Nombre</th>";		
		echo "<th>Apellido</th>";		
		echo "<th>Teléfono</th>";
		echo "<th>Correo electrónico</th>";		
		echo "<th>Especialidad</th>";		
		echo "<th>Tarjeta Profesional</th>";
		echo "<th>Estado Medico</th>";		
		echo "<th>ID de usuario</th>";
		echo "<th>Acción</th>";
		echo "</tr>";

		echo "<tr>";
		echo "<td>";
		echo($fila['idMedico']);
		echo "</td>";
		echo "<td>";
		echo($fila['nombreMedico']);
		echo "</td>";
		echo "<td>";
		echo($fila['apellidoMedico']);
		echo "</td>";
		echo "<td>";
		echo($fila['telefonoMedico']);
		echo "</td>";
		echo "<td>";
		echo($fila['correoMedico']);
		echo "</td>";
		echo "<td>";
		echo($fila['especialidadMedico']);
		echo "</td>";
		echo "<td>";
		echo($fila['tarjetaProfesional']);
		echo "</td>";
		echo "<td>";
		echo($fila['estadoMedico']);
		echo "</td>";
		echo "<td>";
		echo($fila['idUsuarioFK']);
		echo "</td>";
		echo "<td>";
		echo "Editar </br>";
		echo "Inhabilitar/habilitar";
		echo "</td>";
		echo "<hr>";

	}

	echo "<br>";
	echo "<br>";

	print_r($filas);
	

	
?>