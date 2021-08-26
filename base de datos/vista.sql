CREATE VIEW vistausuario AS
SELECT * FROM Usuario WHERE idUsuario='20';

CREATE VIEW vistaPaciente AS  
SELECT p.nombrePaciente, p.apellidoPaciente, a.estadoAgenda 
FROM paciente  p JOIN Agenda a  
where a.idAgenda = p.idPaciente ;

CREATE VIEW vistaMedico AS  
SELECT m.idMedico, m.nombreMedico, m.apellidoMedico, u.direccionUsuario, u.passwordUsuario 
FROM medico  m JOIN usuario u 
where m.apellidoMedico =u.apellidoUsuario  order by idMedico  ;



