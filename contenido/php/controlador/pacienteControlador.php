<?php
	require_once('../modelo/class.conexion.php');
	require_once('../modelo/class.consultas.php');


	$consultas = new Consultas();

	

	/*$mensaje = $consultas->insertarPaciente($idPaciente,$nombrePaciente,$apellidoPaciente,$direccionPaciente,$telefonoPaciente,$fechaNacimiento,$estadoPaciente,$idUsuarioFK);
	echo($mensaje);
	echo "<hr>";
	

	$mensaje = $consultas->actualizarPaciente($idPaciente,$nombrePaciente,$apellidoPaciente,$direccionPaciente,$telefonoPaciente,$fechaNacimiento,$estadoPaciente,$idUsuarioFK);
	echo($mensaje);
	echo "<hr>";

	/*$idPacienteBorrar="26";

	$borrado =  $consultas->borrarPaciente($idPacienteBorrar);*/

	/*Si el resultado de borrado es 1 se ejecuto correctamente, si es otro entonces fallo*/

	/*echo($borrado);
	echo "<hr>";*/

	$filas = $consultas->cargarPacientes();

	$filtro="1001299203";

	$filas = $consultas->cargarPacientesFiltroId($filtro);


	foreach ($filas as $fila) {
		echo"<table border>";
		echo "<tr>";
		echo "<th> Número de identificación</th>";		
		echo "<th>Nombre</th>";		
		echo "<th>Apellido</th>";		
		echo "<th>Dirección</th>";
		echo "<th>Teléfono</th>";		
		echo "<th>Fecha de nacimiento</th>";		
		echo "<th>Estado del paciente</th>";		
		echo "<th>ID de usuario</th>";
		echo "<th>Acción</th>";
		echo "</tr>";
		
		echo "<tr>";
		echo "<td>";
		echo($fila['idPaciente']);
		echo "</td>";
		echo "<td>";
        echo($fila['nombrePaciente']);
        echo "</td>";
        echo "<td>";
        echo($fila['apellidoPaciente']);
        echo "</td>";
        echo "<td>";
        echo($fila['direccionPaciente']);
        echo "</td>";
        echo "<td>";
        echo($fila['telefonoPaciente']);
        echo "</td>";
        echo "<td>";
        echo($fila['fechaNacimiento']);
        echo "</td>";
        echo "<td>";
		echo($fila['estadoPaciente']);
		echo "</td>";
		echo "<td>";
		echo($fila['idUsuarioFK']);
		echo "</td>";
		echo "<td>";
		echo "Editar </br>";
		echo "Inhabilitar/habilitar";
		echo "</td>";
		echo "</tr>";
		echo "</table>";

	}

	echo "<br>";
	echo "<br>";

	print_r($filas);

	$filas = $consultas->cargarPacientes();

	$filtro="";

	$filas = $consultas->cargarPacientesFiltroName($filtro);


	foreach ($filas as $fila) {
		echo"<table border>";
		echo "<tr>";
		echo "<th> Número de identificación</th>";		
		echo "<th>Nombre</th>";		
		echo "<th>Apellido</th>";		
		echo "<th>Dirección</th>";
		echo "<th>Teléfono</th>";		
		echo "<th>Fecha de nacimiento</th>";		
		echo "<th>Estado del paciente</th>";		
		echo "<th>ID de usuario</th>";
		echo "<th>Acción</th>";
		echo "</tr>";
		
		echo "<tr>";
		echo "<td>";
		echo($fila['idPaciente']);
		echo "</td>";
		echo "<td>";
        echo($fila['nombrePaciente']);
        echo "</td>";
        echo "<td>";
        echo($fila['apellidoPaciente']);
        echo "</td>";
        echo "<td>";
        echo($fila['direccionPaciente']);
        echo "</td>";
        echo "<td>";
        echo($fila['telefonoPaciente']);
        echo "</td>";
        echo "<td>";
        echo($fila['fechaNacimiento']);
        echo "</td>";
        echo "<td>";
		echo($fila['estadoPaciente']);
		echo "</td>";
		echo "<td>";
		echo($fila['idUsuarioFK']);
		echo "</td>";
		echo "<td>";
		echo "Editar </br>";
		echo "Inhabilitar/habilitar";
		echo "</td>";
		echo "</tr>";
		echo "</table>";

	}

	echo "<br>";
	echo "<br>";

	print_r($filas);

	
?>