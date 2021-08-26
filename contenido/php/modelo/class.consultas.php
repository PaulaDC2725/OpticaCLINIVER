<?php


	class Consultas{

		public function insertarPaciente($idPaciente,$nombrePaciente,$apellidoPaciente,$direccionPaciente,$telefonoPaciente,$fechaNacimiento,$estadoPaciente,$idUsuarioFK){
			$modelo = new Conexion();
			$conexion = $modelo->getConection();
			$sql = "INSERT INTO paciente(idPaciente, nombrePaciente, apellidoPaciente, direccionPaciente, telefonoPaciente, fechaNacimiento, estadoPaciente, idUsuarioFK) VALUES (:idPaciente,:nombrePaciente,:apellidoPaciente,:direccionPaciente,:telefonoPaciente,:fechaNacimiento,:estadoPaciente,:idUsuarioFK)";		

			$statement=$conexion->prepare($sql);
			$statement->bindParam(":idPaciente",$idPaciente);
			$statement->bindParam(":nombrePaciente",$nombrePaciente);
			$statement->bindParam(":apellidoPaciente",$apellidoPaciente);
			$statement->bindParam(":direccionPaciente",$direccionPaciente);
			$statement->bindParam(":telefonoPaciente",$telefonoPaciente);
			$statement->bindParam(":fechaNacimiento",$fechaNacimiento);
			$statement->bindParam(":estadoPaciente",$estadoPaciente);
			$statement->bindParam(":idUsuarioFK",$idUsuarioFK);

			if (!$statement) {
			 	return "error al crear registro";			 	
			 }else{
			 	$statement->execute();	
			 	return "Registro creado correctamente";
			 }
		}

		public function actualizarPaciente($idPaciente,$nombrePaciente,$apellidoPaciente,$direccionPaciente,$telefonoPaciente,$fechaNacimiento,$estadoPaciente){
			$modelo = new Conexion();
			$conexion = $modelo->getConection();
			$sql = "UPDATE paciente SET nombrePaciente=:nombrePaciente,apellidoPaciente=:apellidoPaciente,direccionPaciente=:direccionPaciente,telefonoPaciente=:telefonoPaciente,fechaNacimiento=:fechaNacimiento,estadoPaciente=".$estadoPaciente." WHERE idPaciente=:idPaciente";
			$statement=$conexion->prepare($sql);
			$statement->bindParam(":idPaciente",$idPaciente);
			$statement->bindParam(":nombrePaciente",$nombrePaciente);
			$statement->bindParam(":apellidoPaciente",$apellidoPaciente);
			$statement->bindParam(":direccionPaciente",$direccionPaciente);
			$statement->bindParam(":telefonoPaciente",$telefonoPaciente);
			$statement->bindParam(":fechaNacimiento",$fechaNacimiento);
			/*$statement->bindParam(":estadoPaciente",$estadoPaciente);*/

			if (!$statement) {
			 	return "error al actualizar registro";
			 }else{
			 	$statement->execute();
			 	return "Registro actualizado correctamente";
			 }
		}

		public function borrarPaciente($idPaciente){
			$rows=null;
			$modelo = new Conexion();
			$conexion = $modelo->getConection();
			$sql="DELETE FROM paciente WHERE idPaciente=:idPaciente;";
			$statement=$conexion->prepare($sql);
			$statement->bindParam(":idPaciente",$idPaciente);
			$result=$statement->execute();
			
			return $result;

		}


		public function cargarPacientes(){
			$rows=null;
			$modelo = new Conexion();
			$conexion = $modelo->getConection();
			$sql="SELECT * FROM paciente";
			$statement=$conexion->prepare($sql);
			$statement->execute();
			while ($result=$statement->fetch()) {
				$rows[]=$result;
			}
			return $rows;

		}

		public function cargarPacientesFiltroName($filtro){
			$rows=null;
			$modelo = new Conexion();
			$conexion = $modelo->getConection();
			$sql="SELECT * FROM paciente WHERE nombrePaciente LIKE '%".$filtro."%'";
			$statement=$conexion->prepare($sql);			
			$statement->execute();
			while ($result=$statement->fetch()) {
				$rows[]=$result;
			}
			return $rows;

		}

		public function cargarPacientesFiltroId($filtro){
			$rows=null;
			$modelo = new Conexion();
			$conexion = $modelo->getConection();
			$sql="SELECT P.*, U.correoUsuario FROM paciente P JOIN usuario U ON P.idPaciente=U.idUsuario WHERE P.idPaciente =  '".$filtro."'";
			$statement=$conexion->prepare($sql);			
			$statement->execute();
			while ($result=$statement->fetch()) {
				$rows[]=$result;
			}
			return $rows;

		}

		public function cambiarEstadoPaciente($estadoPaciente, $idPaciente){			
			$modelo = new Conexion();
			$conexion = $modelo->getConection();
			$sql='UPDATE paciente SET estadoPaciente='.$estadoPaciente.' WHERE idPaciente="'.$idPaciente.'";';
			$statement=$conexion->prepare($sql);

			if (!$statement) {
			 	return "error al actualizar registro";
			}else{
			 	$statement->execute();
				return "Registro actualizado correctamente";
			}


		}
		public function cargarPacientesFiltrados($filtroCol, $valor){
			$rows=null;
			$modelo = new Conexion();
			$conexion = $modelo->getConection();
			$sql="SELECT idPaciente, nombrePaciente, apellidoPaciente, direccionPaciente,telefonoPaciente, fechaNacimiento, estadoPaciente FROM paciente WHERE ".$filtroCol." LIKE '%".$valor."%'";
			$statement=$conexion->prepare($sql);
			$statement->execute();
			while ($result=$statement->fetch()) {
				$rows[]=$result;
			}
			return $rows;
		}
		
	}

?>