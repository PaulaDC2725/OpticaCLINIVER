
use cliniver; 
select h.antecedentesFamiliares, u.nombreUsuario, u.apellidoUsuario from Historia_Clinica  h
inner join usuario u on h.idHistoria=u.idUsuario;

 select u.idUsuario, u.nombreUsuario, u.apellidoUsuario, m.nombreMedico, m.correoMedico  from Usuario as u
left join Medico  m on u.idUsuario=m.idMedico where idMedico=05;

select u.idUsuario, u.nombreUsuario, p.direccionPaciente from Usuario u
left join Paciente p on P.idPaciente=U.idUsuario where rolUsuario='Estudiante';

select p.nombrePaciente, m.apellidoMedico, m.nombreMedico, p.direccionPaciente from Paciente  p
right join Medico  m on p.idpaciente=m.idMedico where direccionPaciente= 'Gustavo Restrepo 12F-58' ;

SELECT m.nombreMedico, m.apellidoMedico, m.telefonoMedico, p.nombrePaciente, p.estadoPaciente FROM medico  m
RIGHT JOIN paciente p ON m.idMedico=p.idPaciente where apellidoPaciente='Delgado';

SELECT h.idHistoria, h.Alergias,h.peso,p.nombrePaciente, p.apellidoPaciente, p.estadoPaciente, p.telefonoPaciente  FROM Historia_clinica h
LEFT JOIN paciente p ON h.idHistoria=p.idPaciente WHERE antecedentesFamiliares='Miopia';

