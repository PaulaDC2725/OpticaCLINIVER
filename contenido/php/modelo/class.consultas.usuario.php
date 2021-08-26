<?php


	class ConsultasUsuario{

		public function insertarUsuario($idUsuario, $nombreUsuario, $apellidoUsuario, $correoUsuario, $telefonoUsuario, $direccionUsuario, $passwordUsuario, $rolUsuario, $estadoUsuario){
			$modelo = new Conexion();
			$conexion = $modelo->getConection();
			$sql = "INSERT INTO usuario(idUsuario, nombreUsuario, apellidoUsuario, correoUsuario, telefonoUsuario, direccionUsuario, passwordUsuario, rolUsuario, estadoUsuario) VALUES (:idUsuario, :nombreUsuario, :apellidoUsuario, :correoUsuario, :telefonoUsuario, :direccionUsuario, :passwordUsuario, :rolUsuario, :estadoUsuario)";

			$statement=$conexion->prepare($sql);
			$statement->bindParam(":idUsuario",$idUsuario);
			$statement->bindParam(":nombreUsuario",$nombreUsuario);
			$statement->bindParam(":apellidoUsuario",$apellidoUsuario);
			$statement->bindParam(":correoUsuario",$correoUsuario);
			$statement->bindParam(":telefonoUsuario",$telefonoUsuario);
			$statement->bindParam(":direccionUsuario",$direccionUsuario);
			$statement->bindParam(":passwordUsuario",$passwordUsuario);
			$statement->bindParam(":rolUsuario",$rolUsuario);
			$statement->bindParam(":estadoUsuario",$estadoUsuario);

			if (!$statement) {
			 	return "error al crear registro";			 	
			 }else{
			 	$statement->execute();			 	
			 	return "Registro creado correctamente";
			 }
		}		

		public function validarLoginUsuario($usuario,
			$password,$rol,$estado){
			$rows=null;
			$estado=1;
			$modelo = new Conexion();
			$conexion = $modelo->getConection();					
			$sql="CALL validar_login('".$usuario."',
			'".$password."','".$rol."',".$estado.")";
			$statement=$conexion->prepare($sql);			
			$statement->execute();
			while ($result=$statement->fetch()) {
				$rows[]=$result;
			}
			return $rows;
		}

		public function actualizarUsuario($idUsuario, $nombreUsuario, $apellidoUsuario, $correoUsuario, $telefonoUsuario, $direccionUsuario, /*$passwordUsuario,*/ $rolUsuario, $estadoUsuario){
			$modelo = new Conexion();
			$conexion = $modelo->getConection();
			//$sql = "UPDATE usuario SET nombreUsuario=:nombreUsuario,apellidoUsuario=:apellidoUsuario,correoUsuario=:correoUsuario,telefonoUsuario=:telefonoUsuario,direccionUsuario=:direccionUsuario,passwordUsuario=:passwordUsuario,rolUsuario=:rolUsuario, estadoUsuario=:estadoUsuario WHERE idUsuario=:idUsuario";
			$sql = "UPDATE usuario SET nombreUsuario=:nombreUsuario,apellidoUsuario=:apellidoUsuario,correoUsuario=:correoUsuario,telefonoUsuario=:telefonoUsuario,direccionUsuario=:direccionUsuario,rolUsuario=:rolUsuario, estadoUsuario=".$estadoUsuario." WHERE idUsuario=:idUsuario";
			$statement=$conexion->prepare($sql);
			$statement->bindParam(":idUsuario",$idUsuario);
			$statement->bindParam(":nombreUsuario",$nombreUsuario);
			$statement->bindParam(":apellidoUsuario",$apellidoUsuario);
			$statement->bindParam(":correoUsuario",$correoUsuario);
			$statement->bindParam(":telefonoUsuario",$telefonoUsuario);
			$statement->bindParam(":direccionUsuario",$direccionUsuario);
			/*$statement->bindParam(":passwordUsuario",$passwordUsuario);*/
			$statement->bindParam(":rolUsuario",$rolUsuario);
			/*$statement->bindParam(":estadoUsuario",$estadoUsuario);*/

			if (!$statement) {
			 	return "error al actualizar registro";
			 }else{
			 	$statement->execute();
			 	return "Registro actualizado correctamente";
			 }
		}
		
		public function cargarUsuarios(){
			$rows=null;
			$modelo = new Conexion();
			$conexion = $modelo->getConection();
			$sql="SELECT idUsuario,nombreUsuario, apellidoUsuario, correoUsuario, telefonoUsuario, direccionUsuario, rolUsuario, estadoUsuario FROM Usuario";
			$statement=$conexion->prepare($sql);
			$statement->execute();
			while ($result=$statement->fetch()) {
				$rows[]=$result;
			}
			return $rows;

		}

		public function cargarUsuariosFiltroName($filtro){
			$rows=null;
			$modelo = new Conexion();
			$conexion = $modelo->getConection();
			$sql="SELECT idUsuario,nombreUsuario, apellidoUsuario, correoUsuario, telefonoUsuario, direccionUsuario, rolUsuario, estadoUsuario FROM Usuario WHERE nombreUsuario LIKE '%".$filtro."%'";
			$statement=$conexion->prepare($sql);			
			$statement->execute();
			while ($result=$statement->fetch()) {
				$rows[]=$result;
			}
			return $rows;

		}

		public function cargarUsuariosFiltroId($filtro){
			$rows=null;
			$modelo = new Conexion();
			$conexion = $modelo->getConection();
			$sql="SELECT idUsuario,nombreUsuario, apellidoUsuario, correoUsuario, telefonoUsuario, direccionUsuario, rolUsuario, estadoUsuario FROM Usuario WHERE idUsuario = '".$filtro."'";
			$statement=$conexion->prepare($sql);			
			$statement->execute();
			while ($result=$statement->fetch()) {
				$rows[]=$result;
			}
			return $rows;

		}

		public function cargarUsuariosFiltrados($filtroCol, $valor){
			$rows=null;
			$modelo = new Conexion();
			$conexion = $modelo->getConection();
			$sql="SELECT idUsuario,nombreUsuario, apellidoUsuario, correoUsuario, telefonoUsuario, direccionUsuario, rolUsuario, estadoUsuario FROM Usuario WHERE ".$filtroCol." LIKE '%".$valor."%'";
			$statement=$conexion->prepare($sql);
			$statement->execute();
			while ($result=$statement->fetch()) {
				$rows[]=$result;
			}
			return $rows;
		}
		/*public function cargarUsuariosError($filtroCol, $valor){
			$rows=null;
			$modelo = new Conexion();
			$conexion = $modelo->getConection();
			$sql ="SELECT COUNT(*) AS total FROM Usuario WHERE ".$filtroCol." LIKE '%".$valor."%'";
			$statement=$conexion->prepare($sql);
			$statement->execute();
			while ($result=$statement->fetch()) {
				$rows[]=$result;
			}
			return $rows;
		}*/


		public function cambiarEstadoUsuario($estadoUsuario, $idUsuario){			
			$modelo = new Conexion();
			$conexion = $modelo->getConection();
			$sql='UPDATE usuario SET estadoUsuario='.$estadoUsuario.' WHERE idUsuario="'.$idUsuario.'";';
			$statement=$conexion->prepare($sql);

			if (!$statement) {
			 	return "error al actualizar registro";
			}else{
			 	$statement->execute();
				return "Registro actualizado correctamente";
			}


		}
		public function borrarUsuario($idUsuario){
			$rows=null;
			$modelo = new Conexion();
			$conexion = $modelo->getConection();
			$sql="DELETE FROM Usuario WHERE idUsuario=:idUsuario;";
			$statement=$conexion->prepare($sql);
			$statement->bindParam(":idUsuario",$idUsuario);
			$result=$statement->execute();
			
			return $result;

		}

	}
?>
