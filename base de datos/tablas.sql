use cliniver;

create table USUARIO(
idUsuario	NVarchar(12) UNIQUE,
nombreUsuario	NVarchar	(50)	Not null,
apellidoUsuario	NVarchar	(50)	Not null,
correoUsuario	NVarchar	(50)	Not null,
telefonoUsuario	NVarchar	(20)	Not null,
direccionUsuario	NVarchar	(50)	Not null,
passwordUsuario	NVarchar	(20)	Not null,
rolUsuario	NVarchar	(20)	Not null,
estadoUsuario	Bit		Not null,
Primary Key(idUsuario)
);

create table PACIENTE(
idPaciente	NVarchar	(12) UNIQUE,
nombrePaciente	NVarchar	(50)	Not Null,
apellidoPaciente	NVarchar	(50)	Not null,
direccionPaciente	NVarchar	(100)	Not null,
telefonoPaciente	NVarchar	(20)	Not null,
fechaNacimiento	Date		Not null,
estadoPaciente	Bit		Not null,
idUsuarioFK	NVarchar(12),
Primary Key(idPaciente),
foreign Key(idUsuarioFK) 
references USUARIO(idUsuario)
);

create table MEDICO(
idMedico	NVarchar(12)	UNIQUE,
nombreMedico	NVarchar(50)	Not null,
apellidoMedico	NVarchar(50)	Not null,
telefonoMedico	NVarchar(20)	Not null,
correoMedico	NVarchar(100)	Not null,
especialidadMedico	NVarchar	(50)	Not null,
tarjetaProfesional	NVarchar(50)	Not null,
estadoMedico	Bit		Not null,
idUsuarioFK	NVarchar	(12),
Primary Key(idMedico),
foreign key (idUsuarioFK)
references USUARIO(idUsuario)
);

create table HISTORIA_CLINICA(
idHistoria	NVarchar	(6) UNIQUE,	
Estatura	Double		Not null,
Peso 	Double		Not null,
antecedentesFamiliares	Text		Not null,
Alergias	Text		Not null,
enfermedadesPadecidas	Text		Not null,
idPacienteFK	Nvarchar	(12) UNIQUE,
Primary Key(idHistoria),
foreign Key(idPacienteFK) 
references PACIENTE(idPaciente) 
);

create table CONSULTA_MEDICA(
idConsulta	NVarchar	(20) UNIQUE,
horaConsulta	DateTime		Not null,
motivoConsulta	Text		Not null,
Enfermedad	Text		Not null,
IdHistoriaFK	NVarchar	(12),
primary key(idConsulta),
foreign Key(idHistoriaFK) 
references HISTORIA_CLINICA(idHistoria)
);

create table  DIAGNOSTICO(
idDiagnostico	NVarchar(20) UNIQUE,
Descripcion 	Text		Not null,
idConsultaFK	NVarchar(20),
primary key(idDiagnostico),
foreign Key(idConsultaFK) 
references CONSULTA_MEDICA(idConsulta)
);

create table EXAMEN(
idExamen	NVarchar	(20)	UNIQUE,
Valor	Numeric		Not  null,
fechaExamen	Date		Not null,
tipoExamen	NVarchar	(50)	Not null,
idHistoriaFK	NVarchar	(6)	,
Primary Key(idExamen),
foreign Key(idHistoriaFK) 
references HISTORIA_CLINICA(idHistoria)
);


create table AGENDA(
idAgenda	int(4) AUTO_INCREMENT,
fechaAgenda	Date		Not null,
horaAgenda	Datetime		Not null,
Consultorio	Nvarchar(2)	Not null,
estadoAgenda	Bit		Not null,
idMedikoFK	NVarchar	(12),
idPacienteFK	NVarchar 	(12),
primary key(idAgenda),
foreign Key(idPacienteFK) 
references paciente(idPaciente),
foreign Key(idMedikoFK) 
references MEDICO(idMedico)
);
