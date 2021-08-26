<?php


	class Consultas{

		public function insertarMedico($idMedico,$nombreMedico,$apellidoMedico,$telefonoMedico,$correoMedico,$especialidadMedico,$tarjetaProfesional,$estadoMedico,$idUsuarioFK){
			$modelo = new Conexion();
			$conexion = $modelo->getConection();
			$sql = "INSERT INTO medico(idMedico, nombreMedico, apellidoMedico, telefonoMedico, correoMedico, especialidadMedico, tarjetaProfesional, estadoMedico,idUsuarioFK ) VALUES (:idMedico,:nombreMedico,:apellidoMedico,:telefonoMedico,:correoMedico,:especialidadMedico,:tarjetaProfesional,:estadoMedico, :idUsuarioFK)";
			$statement=$conexion->prepare($sql);
			$statement->bindParam(":idMedico",$idMedico);
			$statement->bindParam(":nombreMedico",$nombreMedico);
			$statement->bindParam(":apellidoMedico",$apellidoMedico);
			$statement->bindParam(":telefonoMedico",$telefonoMedico);
			$statement->bindParam(":correoMedico",$correoMedico);
			$statement->bindParam(":especialidadMedico",$especialidadMedico);
			$statement->bindParam(":tarjetaProfesional",$tarjetaProfesional);
			$statement->bindParam(":estadoMedico",$estadoMedico);
			$statement->bindParam(":idUsuarioFK",$idUsuarioFK);

			if (!$statement) {
			 	return "error al crear registro";
			 }else{
			 	$statement->execute();
			 	return "Registro creado correctamente";
			 }
		}

		public function actualizarMedico($idMedico,$nombreMedico,$apellidoMedico,$telefonoMedico,$correoMedico,$especialidadMedico,$tarjetaProfesional,$estadoMedico){
			$modelo = new Conexion();
			$conexion = $modelo->getConection();
			$sql = "UPDATE medico SET nombreMedico=:nombreMedico,apellidoMedico=:apellidoMedico,telefonoMedico=:telefonoMedico, correoMedico=:correoMedico,especialidadMedico=:especialidadMedico,tarjetaProfesional=:tarjetaProfesional,estadoMedico=".$estadoMedico." WHERE idMedico=:idMedico";
			$statement=$conexion->prepare($sql);
			$statement->bindParam(":idMedico",$idMedico);
			$statement->bindParam(":nombreMedico",$nombreMedico);
			$statement->bindParam(":apellidoMedico",$apellidoMedico);
			$statement->bindParam(":telefonoMedico",$telefonoMedico);
			$statement->bindParam(":correoMedico",$correoMedico);
			$statement->bindParam(":especialidadMedico",$especialidadMedico);
			$statement->bindParam(":tarjetaProfesional",$tarjetaProfesional);
			/*$statement->bindParam(":estadoMedico",$estadoMedico);*/

			if (!$statement) {
			 	return "error al actualizar registro";
			 }else{
			 	$statement->execute();
			 	return "Registro actualizado correctamente";
			 }
		}

		public function borrarMedico($idMedico){
			$rows=null;
			$modelo = new Conexion();
			$conexion = $modelo->getConection();
			$sql="DELETE FROM medico WHERE idMedico='".$idMedico."'";
			$statement=$conexion->prepare($sql);
			$statement->execute();
			while ($result=$statement->fetch()) {
				$rows[]=$result;
			}
			return $sql;
		}
 

		public function cargarMedicos(){
			$rows=null;
			$modelo = new Conexion();
			$conexion = $modelo->getConection();
			$sql="SELECT * FROM medico";
			$statement=$conexion->prepare($sql);
			$statement->execute();
			while ($result=$statement->fetch()) {
				$rows[]=$result;
			}
			return $rows;

		}

		public function cargarMedicosFiltroName($filtro){
			$rows=null;
			$modelo = new Conexion();
			$conexion = $modelo->getConection();
			$sql="SELECT * FROM medico WHERE nombreMedico LIKE '%".$filtro."%'";
			$statement=$conexion->prepare($sql);			
			$statement->execute();
			while ($result=$statement->fetch()) {
				$rows[]=$result;
			}
			return $rows;

		}
		public function cargarMedicosFiltroId($filtro){
			$rows=null;
			$modelo = new Conexion();
			$conexion = $modelo->getConection();
			$sql="SELECT m.*, U.direccionUsuario FROM medico m JOIN usuario U ON m.idMedico=U.idUsuario WHERE m.idMedico =  '".$filtro."'";
			$statement=$conexion->prepare($sql);			
			$statement->execute();
			while ($result=$statement->fetch()) {
				$rows[]=$result;
			}
			return $rows;

		}
		public function cargarMedicosFiltroIdAsig($filtro){
			$rows=null;
			$modelo = new Conexion();
			$conexion = $modelo->getConection();
			$sql="SELECT idMedico,nombreMedico, apellidoMedico FROM medico WHERE idMedico =  '".$filtro."'";
			$statement=$conexion->prepare($sql);			
			$statement->execute();
			while ($result=$statement->fetch()) {
				$rows[]=$result;
			}
			return $rows;

		}
		
		public function cambiarEstadoMedico($estadoMedico, $idMedico){			
			$modelo = new Conexion();
			$conexion = $modelo->getConection();
			$sql='UPDATE medico SET estadoMedico='.$estadoMedico.' WHERE idMedico="'.$idMedico.'";';
			$statement=$conexion->prepare($sql);

			if (!$statement) {
			 	return "error al actualizar registro";
			}else{
			 	$statement->execute();
				return "Registro actualizado correctamente";
			}


		}
		public function cargarMedicosFiltrados($filtroCol, $valor){
			$rows=null;
			$modelo = new Conexion();
			$conexion = $modelo->getConection();
			$sql="SELECT idMedico,nombreMedico, apellidoMedico, telefonoMedico, correoMedico, especialidadMedico, estadoMedico FROM medico WHERE ".$filtroCol." LIKE '%".$valor."%'";
			$statement=$conexion->prepare($sql);
			$statement->execute();
			while ($result=$statement->fetch()) {
				$rows[]=$result;
			}
			return $rows;
		}
		
	}

?>