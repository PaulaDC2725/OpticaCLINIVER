<?php 
	class Citas{

		public function asignarCitas($fechaAgenda,$horaAgenda,$Consultorio,$estadoAgenda,$idMedicoFK,$idPacienteFK){
			$resultado=null;
			$modelo = new Conexion();
			$conexion = $modelo->getConection();
			$sql = "INSERT INTO agenda(fechaAgenda,horaAgenda,Consultorio, estadoAgenda,idMedikoFK,idPacienteFK) VALUES ('".$fechaAgenda."','".$horaAgenda."','".$Consultorio."','".$estadoAgenda."','".$idMedicoFK."','".$idPacienteFK."')";	
			$statement=$conexion->prepare($sql);			
			$statement->execute();
			while ($result=$statement->fetch()) {
				$resultado[]=$result;
			}
			return $resultado;
		}
		public function cargarAsigCitafiltroID($filtro){
			$rows=null;
			$modelo = new Conexion();
			$conexion = $modelo->getConection();
			$sql="SELECT p.idPaciente,p.nombrePaciente,p.apellidoPaciente ,m.idMedico, m.nombreMedico, m.apellidoMedico FROM paciente p JOIN medico m ON p.idPaciente=m.idMedico WHERE p.idPaciente =  '".$filtro."'";
			$statement=$conexion->prepare($sql);			
			$statement->execute();
			while ($result=$statement->fetch()) {
				$rows[]=$result;
			}
			return $rows;

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
		public function cargarCitasFiltradas($filtroCol, $valor){
			$rows=null;
			$modelo = new Conexion();
			$conexion = $modelo->getConection();
			$sql="SELECT idAgenda, fechaAgenda, horaAgenda, Consultorio,estadoAgenda, idMedikoFK, idPacienteFK FROM agenda WHERE ".$filtroCol." LIKE '%".$valor."%'";
			$statement=$conexion->prepare($sql);
			$statement->execute();
			while ($result=$statement->fetch()) {
				$rows[]=$result;
			}
			return $rows;
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
	public function cargarCitas(){
			$rows=null;
			$modelo = new Conexion();
			$conexion = $modelo->getConection();
			$sql="SELECT * FROM agenda";
			$statement=$conexion->prepare($sql);
			$statement->execute();
			while ($result=$statement->fetch()) {
				$rows[]=$result;
			}
			return $rows;

		}
		public function cambiarEstadoAgenda($estadoAgenda, $idAgenda){			
			$modelo = new Conexion();
			$conexion = $modelo->getConection();
			$sql='UPDATE agenda SET estadoAgenda='.$estadoAgenda.' WHERE idAgenda="'.$idAgenda.'";';
			$statement=$conexion->prepare($sql);

			if (!$statement) {
			 	return "error al ejecutar";
			}else{
			 	$statement->execute();
				return "Proceso ejecutado correctamente";
			}


		}
	}
	?>