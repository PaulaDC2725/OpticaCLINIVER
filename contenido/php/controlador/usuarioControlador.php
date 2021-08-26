<?php
	require_once('../modelo/class.conexion.php');
	require_once('../modelo/class.consultas.usuario.php');


	$consultas = new ConsultasUsuario();
	/*$idUsuario="1000000";
	$nombreUsuario="Vaca";
	$apellidoUsuario="Lola";
	$correoUsuario="lavacalola@gmail.com";
	$telefonoUsuario="3183527889";
	$direccionUsuario="Calle 1 234";
	$passwordUsuario="lavacalola123";
	$rolUsuario="Médico";
	$estadoUsuario="1";
/*$mensaje = $consultas->insertarUsuario($idUsuario, $nombreUsuario, $apellidoUsuario, $correoUsuario, $telefonoUsuario, $direccionUsuario, $passwordUsuario, $rolUsuario, $estadoUsuario);
echo($mensaje);
	echo "<hr>";*/


/*$mensaje = $consultas-> actualizarUsuario($idUsuario, $nombreUsuario, $apellidoUsuario, $correoUsuario, $telefonoUsuario, $direccionUsuario, $rolUsuario, $estadoUsuario);
	echo($mensaje);
	echo "<hr>"; */

	/*$idUsuarioBorrar="1000000";

	$borrado =  $consultas->borraUsuario($idUsuarioBorrar);

	/*Si el resultado de borrado es 1 se ejecuto correctamente, si es otro entonces fallo*/

	/*echo($borrado);
	echo "<hr>";*/
	$filas = $consultas->cargarUsuarios();
	$filtro="1001299203";

	$filas = $consultas->cargarUsuariosFiltroId($filtro); 


	foreach ($filas as $fila) {
		echo"<table border>";
		echo "<tr>";
		echo "<th> Número de identificación</th>";		
		echo "<th>Nombre</th>";		
		echo "<th>Apellido</th>";		
		echo "<th>Correo electrónico</th>";
		echo "<th>Teléfono</th>";		
		echo "<th>Dirección</th>";		
		echo "<th>Tipo de Usuario</th>";		
		echo "<th>Estado del usuario</th>";
		echo "<th>Acción</th>";
		echo "</tr>";
		
		echo "<tr>";
		echo "<td>";
		echo($fila['idUsuario']);
		echo "</td>";
		echo "<td>";
        echo($fila['nombreUsuario']);
        echo "</td>";
        echo "<td>";
        echo($fila['apellidoUsuario']);
        echo "</td>";
        echo "<td>";
        echo($fila['correoUsuario']);
        echo "</td>";
        echo "<td>";
        echo($fila['telefonoUsuario']);
        echo "</td>";
        echo "<td>";
        echo($fila['direccionUsuario']);
        echo "</td>";
        echo "<td>";
		echo($fila['rolUsuario']);
		echo "</td>";
		echo "<td>";
		echo($fila['estadoUsuario']);
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

	$filas = $consultas->cargarUsuarios();

	$filtro="";

	$filas = $consultas->cargarUsuariosFiltroName($filtro);


	foreach ($filas as $fila) {
		echo"<table border>";
		echo "<tr>";
		echo "<th> Número de identificación</th>";		
		echo "<th>Nombre</th>";		
		echo "<th>Apellido</th>";		
		echo "<th>Correo electrónico</th>";
		echo "<th>Teléfono</th>";		
		echo "<th>Dirección</th>";		
		echo "<th>Tipo de Usuario</th>";		
		echo "<th>Estado del usuario</th>";
		echo "<th>Acción</th>";
		echo "</tr>";
		
		echo "<tr>";
		echo "<td>";
		echo($fila['idUsuario']);
		echo "</td>";
		echo "<td>";
        echo($fila['nombreUsuario']);
        echo "</td>";
        echo "<td>";
        echo($fila['apellidoUsuario']);
        echo "</td>";
        echo "<td>";
        echo($fila['correoUsuario']);
        echo "</td>";
        echo "<td>";
        echo($fila['telefonoUsuario']);
        echo "</td>";
        echo "<td>";
        echo($fila['direccionUsuario']);
        echo "</td>";
        echo "<td>";
		echo($fila['rolUsuario']);
		echo "</td>";
		echo "<td>";
		echo($fila['estadoUsuario']);
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