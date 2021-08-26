SELECT nombreUsuario, apellidoUsuario, telefonoUsuario
FROM Usuario WHERE idUsuario= ALL (SELECT idUsuario FROM Usuario WHERE idUsuario='05');
 

select  nombrePaciente,apellidoPaciente,telefonoPaciente,direccionPaciente  
from Paciente  where idPaciente= all ( select idPaciente from Paciente  where idPaciente='06');

SELECT idMedico, nombreMedico, telefonoMedico, tarjetaProfesional
FROM medico WHERE telefonoMedico= ALL (SELECT telefonoMedico FROM medico WHERE telefonoMedico='3123001295');
 