use cliniver;
delimiter //
 create procedure id_usuario(in id nvarchar(12))
 begin
   select * from usuario
   where idUsuario>=id;
 end //
 delimiter ;
 
 call id_usuario('1032480756');


 
 delimiter //
 create procedure datos_medicos(in p_nombreMedico  nvarchar(50),
	in p_apellidoMedico  nvarchar (50))
 begin
   select idMedico, nombreMedico,apellidoMedico,estadoMedico, correoMedico from medico
   where nombreMedico=p_nombreMedico and apellidoMedico=p_apellidoMedico;
 end //
 delimiter ;
 
 call datos_Medicos('Elsa','Alayón');
 
 
 delimiter //
 create procedure datos_consultamedica(in p_horaConsulta  datetime)
 begin
   select * from consulta_medica
   where horaConsulta>p_horaConsulta;
 end //
 delimiter ;
 
 call datos_consultamedica('2020-08-19 10:00:00');
 
 
 delimiter //
 create procedure datos_historia(in p_estatura double,
 in p_peso double)
 begin
    select * from historia_clinica
    where peso>p_peso;
 end //
 delimiter ;
 
 call datos_historia(1.40,70);
   call datos_historia(1.70,60);

DELIMITER //
CREATE PROCEDURE `validar_login`(IN `user` VARCHAR(255), 
IN `password` VARCHAR(255), IN `rol` VARCHAR(255), IN `estado` INT(1))
BEGIN
SELECT COUNT(*) AS RESULTADO FROM usuario WHERE 
idUsuario=user AND passwordUsuario=password AND rolUsuario=rol AND estadoUsuario=estado;
END//
DELIMITER ;

DELIMITER $$
CREATE PROCEDURE `registrarClientes` ( in id INT(12),
										in nombrec VARCHAR(35), 
                                        in appellidoc VARCHAR(35),
                                        infnacimientoc DATE,
                                        in correoc VARCHAR(100),
                                        in telefonoc INT(11),
                                        in estadoc INT,
                                        in idusu INT(12))
BEGIN
	INSERT INTO CLIENTES (idCliente,nombreCliente,apellidoCliente,fechaNacimientoCliente,correoCliente,telefonoCliente,estadoCliente,idUsuarioFK)
    VALUES (id,nombrec,appellidoc,fnacimientoc,correoc,telefonoc,estadoc,idusu);
END$$

DELIMITER ;

DELIMITER $$
CREATE PROCEDURE `mostrarInstructores` ()
BEGIN
	SELECT * FROM INSTRUCTORES;
END$$

DELIMITER ; 
