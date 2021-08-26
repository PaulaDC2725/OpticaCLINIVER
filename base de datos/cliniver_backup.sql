-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 06-10-2020 a las 00:11:51
-- Versión del servidor: 10.4.11-MariaDB
-- Versión de PHP: 7.4.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `cliniver`
--

DELIMITER $$
--
-- Procedimientos
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `datos_consultamedica` (IN `p_horaConsulta` DATETIME)  begin
   select * from consultamedica
   where horaConsulta>p_horaConsulta;
 end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `datos_historia` (IN `p_estatura` DOUBLE, IN `p_peso` DOUBLE)  begin
    select idHistoria,Peso, Alergias from historiaclinica
    where peso>p_peso;
 end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `datos_medicos` (IN `p_nombreMedico` NVARCHAR(50), IN `p_apellidoMedico` NVARCHAR(50))  begin
   select idMedico, nombreMedico,apellidoMedico, telefonoMedico,correoMedico from medico
   where nombreMedico=p_nombreMedico and apellidoMedico=p_apellidoMedico;
 end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `datos_usuarios` (IN `idUsuario` NVARCHAR(12))  begin
   select * from usuario
   where idUsuario<id;
 end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `id_usuario` (IN `idUsuario` NVARCHAR(12))  begin
   select * from usuario
   where idUsuario>=id;
 end$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `agenda`
--

CREATE TABLE `agenda` (
  `idAgenda` varchar(4) CHARACTER SET utf8 NOT NULL,
  `fechaAgenda` date NOT NULL,
  `horaAgenda` datetime NOT NULL,
  `Consultorio` varchar(2) CHARACTER SET utf8 NOT NULL,
  `estadoAgenda` bit(1) NOT NULL,
  `idMedikoFK` varchar(12) CHARACTER SET utf8 DEFAULT NULL,
  `idPacienteFK` varchar(12) CHARACTER SET utf8 DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `agenda`
--

INSERT INTO `agenda` (`idAgenda`, `fechaAgenda`, `horaAgenda`, `Consultorio`, `estadoAgenda`, `idMedikoFK`, `idPacienteFK`) VALUES
('01', '2019-12-21', '2019-12-21 15:30:00', '01', b'1', '01', '01'),
('02', '2019-12-21', '2019-12-21 13:50:00', '01', b'1', '02', '02'),
('03', '2019-12-21', '2019-12-21 14:40:00', '01', b'1', '03', '03'),
('04', '2019-12-21', '2019-12-21 12:20:00', '01', b'1', '04', '04'),
('05', '2019-12-21', '2019-12-21 11:10:00', '01', b'1', '05', '05'),
('06', '2019-12-26', '2019-12-26 12:10:00', '01', b'1', '06', '06'),
('07', '2019-12-26', '2019-12-26 13:10:00', '01', b'1', '07', '07'),
('08', '2019-12-28', '2019-12-28 14:20:00', '01', b'1', '08', '08'),
('09', '2019-12-29', '2019-12-29 19:10:00', '01', b'1', '09', '09'),
('10', '2019-12-21', '2019-12-21 20:10:00', '01', b'1', '10', '10'),
('11', '2020-01-11', '2020-01-11 10:10:00', '01', b'1', '11', '11'),
('12', '2020-01-13', '2020-01-13 13:30:00', '01', b'1', '12', '12'),
('13', '2020-01-15', '2020-01-15 14:40:00', '01', b'1', '13', '13'),
('14', '2020-01-15', '2020-01-15 16:30:00', '01', b'1', '14', '14'),
('15', '2020-01-24', '2020-01-24 17:20:00', '01', b'1', '15', '15'),
('16', '2020-02-04', '2020-02-04 17:10:00', '01', b'1', '16', '16'),
('17', '2020-02-15', '2020-02-15 16:30:00', '01', b'1', '17', '17'),
('18', '2020-02-21', '2020-02-21 14:40:00', '01', b'1', '18', '18'),
('19', '2020-02-23', '2020-02-23 18:30:00', '01', b'1', '19', '19'),
('20', '2020-03-02', '2020-03-02 20:20:00', '01', b'1', '20', '20'),
('21', '2020-03-04', '2020-03-04 17:10:00', '01', b'1', '21', '21'),
('22', '2020-03-15', '2020-03-15 16:30:00', '01', b'1', '22', '22'),
('23', '2020-04-01', '2020-04-01 14:40:00', '01', b'1', '23', '23'),
('24', '2020-04-13', '2020-04-13 18:30:00', '01', b'1', '24', '24'),
('25', '2020-04-22', '2020-04-22 20:20:00', '01', b'1', '25', '25');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `consulta_medica`
--

CREATE TABLE `consulta_medica` (
  `idConsulta` varchar(20) CHARACTER SET utf8 NOT NULL,
  `horaConsulta` datetime NOT NULL,
  `motivoConsulta` text NOT NULL,
  `Enfermedad` text NOT NULL,
  `IdHistoriaFK` varchar(12) CHARACTER SET utf8 DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `consulta_medica`
--

INSERT INTO `consulta_medica` (`idConsulta`, `horaConsulta`, `motivoConsulta`, `Enfermedad`, `IdHistoriaFK`) VALUES
('01', '2020-08-19 10:00:00', 'mismo diagnóstico', 'Posible miopía', NULL),
('02', '2020-08-19 12:30:00', 'mismo diagnóstico', 'desconocido', NULL),
('03', '2020-08-20 10:00:00', 'mismo diagnóstico', 'Irritación ocular', NULL),
('04', '2020-08-23 15:20:00', 'mismo diagnóstico', 'desconocido', NULL),
('05', '2020-08-25 10:30:00', 'mismo diagnóstico', 'desconocido', NULL),
('06', '2020-09-01 10:40:00', 'mismo diagnóstico', 'Posible astigmatismo', NULL),
('07', '2020-09-02 13:20:00', 'mismo diagnóstico', 'desconocido', NULL),
('08', '2020-09-02 15:30:00', 'mismo diagnóstico', 'Irritación ocular', NULL),
('09', '2020-09-10 10:15:00', 'mismo diagnóstico', 'desconocido', NULL),
('10', '2020-09-15 10:00:00', 'mismo diagnóstico', 'desconocido', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `diagnostico`
--

CREATE TABLE `diagnostico` (
  `idDiagnostico` varchar(20) CHARACTER SET utf8 NOT NULL,
  `Descripcion` text NOT NULL,
  `idConsultaFK` varchar(20) CHARACTER SET utf8 DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `diagnostico`
--

INSERT INTO `diagnostico` (`idDiagnostico`, `Descripcion`, `idConsultaFK`) VALUES
('01', 'Sospecha miopía', NULL),
('02', 'Dificultad con permanecer frente dispositivos móviles', NULL),
('03', 'Irritación ocular', NULL),
('04', 'Valoración', NULL),
('05', 'Valoración', NULL),
('06', 'Sospecha astigmatismo', NULL),
('07', 'Dificultad para ver cerca', NULL),
('08', 'irritación ocular', NULL),
('09', 'Valoración', NULL),
('10', 'Valoración', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `examen`
--

CREATE TABLE `examen` (
  `idExamen` varchar(20) CHARACTER SET utf8 NOT NULL,
  `Valor` decimal(10,0) NOT NULL,
  `fechaExamen` date NOT NULL,
  `tipoExamen` varchar(50) CHARACTER SET utf8 NOT NULL,
  `idHistoriaFK` varchar(6) CHARACTER SET utf8 DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `examen`
--

INSERT INTO `examen` (`idExamen`, `Valor`, `fechaExamen`, `tipoExamen`, `idHistoriaFK`) VALUES
('01', '20000', '2020-08-19', 'virtual complejo', NULL),
('02', '10000', '2020-08-19', 'virtual sencillo', NULL),
('03', '30000', '2020-08-20', 'Presencial sencillo', NULL),
('04', '45000', '2020-08-23', 'Presencial', NULL),
('05', '50000', '2020-08-25', 'presencial complejo', NULL),
('06', '10000', '2020-09-01', 'virtual sencillo', NULL),
('07', '30000', '2020-09-02', 'Presencial sencillo', NULL),
('08', '60000', '2020-09-02', 'presencial.', NULL),
('09', '70000', '2020-09-10', 'presencial', NULL),
('10', '40000', '2020-09-15', 'presencial', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `historia_clinica`
--

CREATE TABLE `historia_clinica` (
  `idHistoria` varchar(6) CHARACTER SET utf8 NOT NULL,
  `Estatura` double NOT NULL,
  `Peso` double NOT NULL,
  `antecedentesFamiliares` text NOT NULL,
  `Alergias` text NOT NULL,
  `enfermedadesPadecidas` text NOT NULL,
  `idPacienteFK` varchar(12) CHARACTER SET utf8 DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `historia_clinica`
--

INSERT INTO `historia_clinica` (`idHistoria`, `Estatura`, `Peso`, `antecedentesFamiliares`, `Alergias`, `enfermedadesPadecidas`, `idPacienteFK`) VALUES
('01', 140, 50, 'NA', 'NA', 'Miopia', NULL),
('02', 1.4, 80, 'Astigmatismo', 'NA', 'Astigmatismo', NULL),
('03', 1.3, 70, 'miopia', 'NA', 'Miopia', NULL),
('04', 1.2, 60, 'Miopia', 'NA', 'Miopia', NULL),
('05', 1.5, 100, 'NA', 'NA', 'Astigmatismo', NULL),
('06', 1.7, 90, 'NA', 'NA', 'Miopia', NULL),
('07', 1.8, 70, 'NA', 'NA', 'Miopia', NULL),
('08', 1.6, 10, 'NA', 'NA', 'Miopia', NULL),
('09', 1.5, 90, 'NA', 'NA', 'Miopia', NULL),
('10', 1.4, 70, 'NA', 'NA', 'Miopia', NULL),
('11', 1.7, 60, 'NA', 'NA', 'Miopia', NULL),
('12', 1.9, 60, 'NA', 'NA', 'Miopia', NULL),
('13', 1.3, 10, 'Miopia', 'NA', 'Miopia', NULL),
('14', 1.5, 90, 'NA', 'NA', 'Miopia', NULL),
('15', 1.5, 80, 'NA', 'NA', 'Miopia', NULL),
('16', 1.7, 60, 'NA', 'NA', 'Miopia', NULL),
('17', 1.8, 80, 'NA', 'NA', 'Miopia', NULL),
('18', 1.9, 60, 'NA', 'NA', 'Miopia', NULL),
('19', 1.7, 30, 'NA', 'NA', 'Miopia', NULL),
('20', 1.6, 50, 'NA', 'NA', 'Miopia', NULL),
('21', 1.5, 120, 'NA', 'N.A', 'Miopia', NULL),
('22', 1.4, 80, 'NA', 'NA', 'Miopia', NULL),
('23', 1.7, 70, 'NA', 'NA', 'Miopia', NULL),
('24', 1.8, 60, 'NA', 'NA', 'Miopia', NULL),
('25', 1.7, 40, 'NA', 'NA', 'Miopia', NULL),
('26', 1.4, 50, 'NA', 'NA', 'Miopia', '01');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `medico`
--

CREATE TABLE `medico` (
  `idMedico` varchar(12) CHARACTER SET utf8 NOT NULL,
  `nombreMedico` varchar(50) CHARACTER SET utf8 NOT NULL,
  `apellidoMedico` varchar(50) CHARACTER SET utf8 NOT NULL,
  `telefonoMedico` varchar(20) CHARACTER SET utf8 NOT NULL,
  `correoMedico` varchar(100) CHARACTER SET utf8 NOT NULL,
  `especialidadMedico` varchar(50) CHARACTER SET utf8 NOT NULL,
  `tarjetaProfesional` varchar(50) CHARACTER SET utf8 NOT NULL,
  `estadoMedico` bit(1) NOT NULL,
  `idUsuarioFK` varchar(12) CHARACTER SET utf8 DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `medico`
--

INSERT INTO `medico` (`idMedico`, `nombreMedico`, `apellidoMedico`, `telefonoMedico`, `correoMedico`, `especialidadMedico`, `tarjetaProfesional`, `estadoMedico`, `idUsuarioFK`) VALUES
('01', 'German', 'Delgado', '3123001295', 'gerdel1963@gmail.com', 'Optometría', 'APLICA', b'1', '01'),
('02', 'Concepción', 'Almendrales', '3024312611', 'Conalco_5@hotmail.com', 'Optometría', 'APLICA', b'1', '02'),
('03', 'Camila', 'Cortez', '3124332411', 'Camtez@gmail.com', 'Optometría', 'APLICA', b'1', '03'),
('04', 'Andrés', 'Muñoz', '3245421242', 'Andmuñoz3@hotmail.com', 'Optometría', 'APLICA', b'1', '04'),
('05', 'Mateo', 'Rodriguez', '3123234565', 'maroca21@outlook.com', 'Optometría', 'APLICA', b'1', '05'),
('06', 'Kevin', 'Avellaneda', '3034657768', 'Kavella@gmail.com', 'Optometría', 'APLICA', b'1', '06'),
('07', 'Diego', 'Garcia', '3215468790', 'garciaD12@hotmail.com', 'Optometría', 'APLICA', b'1', '07'),
('08', 'Juliana', 'Morales', '3212379082', 'Jmora22@outlook.com', 'Optometría', 'APLICA', b'1', '08'),
('09', 'Nicholl', 'Quiroga', '3013464190', 'nquiroga11@hotmail.com', 'Optometría', 'APLICA', b'1', '09'),
('10', 'Nina', 'Clavijo', '3119376024', 'Clavina15@hotmail.com', 'Optometría', 'APLICA', b'1', '10'),
('11', 'Natalia', 'Perdomo', '3054782611', 'natper14@hotmail.com', 'Optometría', 'APLICA', b'1', '11'),
('12', 'Paula', 'Salas', '3223344611', 'Comedorysillas19@hotmail.com', 'Optometría', 'APLICA', b'1', '12'),
('13', 'Valentina', 'Angúlo', '3020992611', 'Valengulo08@hotmail.com', 'Optometría', 'APLICA', b'1', '13'),
('14', 'Danna', 'Sarmiento', '3024343211', 'Sarmianna2@hotmail.com', 'Optometría', 'APLICA', b'1', '14'),
('15', 'Juan Pablo', 'Dgreif', '3122611719', 'Dgreifjp00@outlook.com', 'Optometría', 'APLICA', b'1', '15'),
('16', 'Mariana', 'Lopez', '3005110530', 'mlp1234@hotmail.com', 'Optometría', 'APLICA', b'1', '16'),
('17', 'Laura', 'Rubio', '3134641902', 'lrubio@hotmail.com', 'Optometría', 'APLICA', b'1', '17'),
('18', 'Cristian', 'Bonilla', '3193760243', 'Crinilla24@gmail.com', 'Optometría', 'APLICA', b'1', '18'),
('19', 'Jhon', 'Delgado', '3009988877', 'Jdgado14@hotmail.com', 'Optometría', 'APLICA', b'1', '19'),
('20', 'Sebastian', 'Tibocha', '3202631769', 'Setibocha@hotmail.com', 'Optometría', 'APLICA', b'1', '20'),
('21', 'Felipe', 'Cajamarca', '3102412518', 'Cajalipe45@gmail.com', 'Optometría', 'APLICA', b'1', '21'),
('22', 'Daniel', 'Quijano', '32214563782', 'quijaniel@gmail.com', 'Optometría', 'APLICA', b'1', '22'),
('23', 'Andrea', 'Zambrano', '3012456789', 'Zambrea@outlook.com', 'Optometría', 'APLICA', b'1', '23'),
('24', 'Catalina', 'Velandia', '3126459780', 'Catalandia@hotmail.com', 'Optometría', 'APLICA', b'1', '24'),
('25', 'Fernanda', 'Cortez', '3216549870', 'Fernantez18@hotmail.com', 'Optometría', 'APLICA', b'1', '25');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `paciente`
--

CREATE TABLE `paciente` (
  `idPaciente` varchar(12) CHARACTER SET utf8 NOT NULL,
  `nombrePaciente` varchar(50) CHARACTER SET utf8 NOT NULL,
  `apellidoPaciente` varchar(50) CHARACTER SET utf8 NOT NULL,
  `direccionPaciente` varchar(100) CHARACTER SET utf8 NOT NULL,
  `telefonoPaciente` varchar(20) CHARACTER SET utf8 NOT NULL,
  `fechaNacimiento` date NOT NULL,
  `estadoPaciente` bit(1) NOT NULL,
  `idUsuarioFK` varchar(12) CHARACTER SET utf8 DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `paciente`
--

INSERT INTO `paciente` (`idPaciente`, `nombrePaciente`, `apellidoPaciente`, `direccionPaciente`, `telefonoPaciente`, `fechaNacimiento`, `estadoPaciente`, `idUsuarioFK`) VALUES
('01', 'German', 'Delgado', 'Gustavo Restrepo 12F-58', '3123001295', '1963-01-31', b'1', '01'),
('02', 'Concepción', 'Almendrales', 'Gustavo Restrepo 12F-58', '3024312611', '1967-10-27', b'1', '02'),
('03', 'Camila', 'Cortez', 'San Rafael 13-50', '3124332411', '1973-02-11', b'1', '03'),
('04', 'Andrés', 'Muñoz', 'Isabel 11-50', '3245421242', '1983-04-12', b'1', '04'),
('05', 'Mateo', 'Rodriguez', 'Gustavo Restrepo 18-6', '3123234565', '2005-08-30', b'1', '05'),
('06', 'Kevin', 'Avellaneda', 'Rafael 503', '3034657768', '1993-01-24', b'1', '06'),
('07', 'Diego', 'Garcia', 'Lorezo 299', '3215468790', '2003-11-26', b'1', '07'),
('08', 'Juliana', 'Morales', 'San Rafael 13-50', '3212379082', '2003-05-26', b'1', '08'),
('09', 'Nicholl', 'Quiroga', 'Rafael 503', '3013464190', '2005-04-29', b'1', '09'),
('10', 'Nina', 'Clavijo', 'Santa isabel', '3119376024', '2002-05-31', b'1', '10'),
('11', 'Natalia', 'Perdomo', 'San Rafael 13-50', '3054782611', '2006-06-30', b'1', '11'),
('12', 'Paula', 'Salas', 'Rafael 503', '3223344611', '1978-08-22', b'1', '12'),
('13', 'Valentina', 'Angúlo', 'El rosario', '3020992611', '1980-04-11', b'1', '13'),
('14', 'Danna', 'Sarmiento', 'San Rafael 13-50', '3024343211', '1989-10-05', b'1', '14'),
('15', 'Juan Pablo', 'Dgreif', 'Loyola City', '3122611719', '2004-09-08', b'1', '15'),
('16', 'Mariana', 'Lopez', 'Rafael 503', '3005110530', '2003-08-12', b'1', '16'),
('17', 'Laura', 'Rubio', 'Quiroga', '3134641902', '2004-04-16', b'1', '17'),
('18', 'Cristian', 'Bonilla', 'Kennedy', '3193760243', '1999-12-15', b'1', '18'),
('19', 'Jhon', 'Delgado', 'San Rafael 13-50', '3009988877', '1996-11-23', b'1', '19'),
('20', 'Sebastian', 'Tibocha', 'Rafael 503', '3202631769', '2001-06-12', b'1', '20'),
('21', 'Felipe', 'Cajamarca', 'Las lomas 14-3', '3102412518', '2000-05-23', b'1', '21'),
('22', 'Daniel', 'Quijano', 'Rafael 503', '32214563782', '2001-04-22', b'1', '22'),
('23', 'Andrea', 'Zambrano', 'Tunjuelo 90', '3012456789', '2001-01-21', b'1', '23'),
('24', 'Catalina', 'Velandia', 'San Rafael 13-50', '3126459780', '1955-02-09', b'1', '24'),
('25', 'Fernanda', 'Cortez', 'Rafael 503', '3216549870', '1997-03-15', b'1', '25'),
('26', 'David', 'Lopez', 'Calle 1 234', '3183527889', '1991-04-22', b'1', '01');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `idUsuario` varchar(12) CHARACTER SET utf8 NOT NULL,
  `nombreUsuario` varchar(50) CHARACTER SET utf8 NOT NULL,
  `apellidoUsuario` varchar(50) CHARACTER SET utf8 NOT NULL,
  `correoUsuario` varchar(50) CHARACTER SET utf8 NOT NULL,
  `telefonoUsuario` varchar(20) CHARACTER SET utf8 NOT NULL,
  `direccionUsuario` varchar(50) CHARACTER SET utf8 NOT NULL,
  `passwordUsuario` varchar(20) CHARACTER SET utf8 NOT NULL,
  `rolUsuario` varchar(20) CHARACTER SET utf8 NOT NULL,
  `estadoUsuario` bit(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`idUsuario`, `nombreUsuario`, `apellidoUsuario`, `correoUsuario`, `telefonoUsuario`, `direccionUsuario`, `passwordUsuario`, `rolUsuario`, `estadoUsuario`) VALUES
('01', 'German', 'Delgado', 'gerdel1963@gmail.com', '3123001295', 'Gustavo Restrepo 12F-58', 'Gerdel123', 'Ingeniero', b'1'),
('02', 'Concepción', 'Almendrales', 'Conalco_5@hotmail.com', '3024312611', 'Gustavo Restrepo 12F-58', 'Conalco123', 'Ama De Casa', b'1'),
('03', 'Camila', 'Cortez', 'Camtez@gmail.com', '3124332411', 'San Rafael 13-50', 'perrito33', 'Estudiante', b'1'),
('04', 'Andrés', 'Muñoz', 'Andmuñoz3@hotmail.com', '3245421242', 'Isabel 11-50', 'lolxde123', 'Trabajador', b'1'),
('05', 'Mateo', 'Rodriguez', 'maroca21@outlook.com', '3123234565', 'Gustavo Restrepo 18-6', 'juikiolop1222', 'Estudiante', b'1'),
('06', 'Kevin', 'Avellaneda', 'Kavella@gmail.com', '3034657768', 'Rafael 503', 'jsjsjs1423', 'Amo De Casa', b'1'),
('07', 'Diego', 'Garcia', 'garciaD12@hotmail.com', '3215468790', 'Lorezo 299', 'kimilove1221', 'independiente', b'1'),
('08', 'Juliana', 'Morales', 'Jmora22@outlook.com', '3212379082', 'San Rafael 13-50', 'lolxde1233', 'Ama De Casa', b'1'),
('09', 'Nicholl', 'Quiroga', 'nquiroga11@hotmail.com', '3013464190', 'Rafael 503', 'qwerty123456', 'Estudiante', b'1'),
('10', 'Nina', 'Clavijo', 'Clavina15@hotmail.com', '3119376024', 'Santa isabel', '12345678juhytgred', 'Ama De Casa', b'1'),
('11', 'Natalia', 'Perdomo', 'natper14@hotmail.com', '3054782611', 'San Rafael 13-50', 'lolxde123', 'independiente', b'1'),
('12', 'Paula', 'Salas', 'Comedorysillas19@hotmail.com', '3223344611', 'Rafael 503', 'quiensabra1243', 'Estudiante', b'1'),
('13', 'Valentina', 'Angúlo', 'Valengulo08@hotmail.com', '3020992611', 'El rosario', '22312dcdee', 'Ama De Casa', b'1'),
('14', 'Danna', 'Sarmiento', 'Sarmianna2@hotmail.com', '3024343211', 'San Rafael 13-50', 'wweerr12345', 'independiente', b'1'),
('15', 'Juan Pablo', 'Dgreif', 'Dgreifjp00@outlook.com', '3122611719', 'Loyola City', 'lolxde123', 'Estudiante', b'1'),
('16', 'Mariana', 'Lopez', 'mlp1234@hotmail.com', '3005110530', 'Rafael 503', 'xdelol12332', 'Trabajadora', b'1'),
('17', 'Laura', 'Rubio', 'lrubio@hotmail.com', '3134641902', 'Quiroga', '123de33', 'Ama De Casa', b'1'),
('18', 'Cristian', 'Bonilla', 'Crinilla24@gmail.com', '3193760243', 'Kennedy', 'lolxde123', 'Estudiante', b'1'),
('19', 'Jhon', 'Delgado', 'Jdgado14@hotmail.com', '3009988877', 'San Rafael 13-50', 'perrito33', 'Trabajador', b'1'),
('20', 'Sebastian', 'Tibocha', 'Setibocha@hotmail.com', '3202631769', 'Rafael 503', 'masto56', 'Estudiante', b'1'),
('21', 'Felipe', 'Cajamarca', 'Cajalipe45@gmail.com', '3102412518', 'Las lomas 14-3', 'toideo776', 'independiente', b'1'),
('22', 'Daniel', 'Quijano', 'quijaniel@gmail.com', '32214563782', 'Rafael 503', 'cleido455', 'independiente', b'1'),
('23', 'Andrea', 'Zambrano', 'Zambrea@outlook.com', '3012456789', 'Tunjuelo 90', 'esternopp22', 'Trabajadora', b'1'),
('24', 'Catalina', 'Velandia', 'Catalandia@hotmail.com', '3126459780', 'San Rafael 13-50', 'perrito33', 'Trabajadora', b'1'),
('25', 'Fernanda', 'Cortez', 'Fernantez18@hotmail.com', '3216549870', 'Rafael 503', 'fer3444', 'Independiente', b'1');

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `vistamedico`
-- (Véase abajo para la vista actual)
--
CREATE TABLE `vistamedico` (
`idMedico` varchar(12)
,`nombreMedico` varchar(50)
,`apellidoMedico` varchar(50)
,`direccionUsuario` varchar(50)
,`passwordUsuario` varchar(20)
);

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `vistapaciente`
-- (Véase abajo para la vista actual)
--
CREATE TABLE `vistapaciente` (
`nombrePaciente` varchar(50)
,`apellidoPaciente` varchar(50)
,`estadoAgenda` bit(1)
);

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `vistausuario`
-- (Véase abajo para la vista actual)
--
CREATE TABLE `vistausuario` (
`idUsuario` varchar(12)
,`nombreUsuario` varchar(50)
,`apellidoUsuario` varchar(50)
,`correoUsuario` varchar(50)
,`telefonoUsuario` varchar(20)
,`direccionUsuario` varchar(50)
,`passwordUsuario` varchar(20)
,`rolUsuario` varchar(20)
,`estadoUsuario` bit(1)
);

-- --------------------------------------------------------

--
-- Estructura para la vista `vistamedico`
--
DROP TABLE IF EXISTS `vistamedico`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vistamedico`  AS  select `m`.`idMedico` AS `idMedico`,`m`.`nombreMedico` AS `nombreMedico`,`m`.`apellidoMedico` AS `apellidoMedico`,`u`.`direccionUsuario` AS `direccionUsuario`,`u`.`passwordUsuario` AS `passwordUsuario` from (`medico` `m` join `usuario` `u`) where `m`.`apellidoMedico` = `u`.`apellidoUsuario` order by `m`.`idMedico` ;

-- --------------------------------------------------------

--
-- Estructura para la vista `vistapaciente`
--
DROP TABLE IF EXISTS `vistapaciente`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vistapaciente`  AS  select `p`.`nombrePaciente` AS `nombrePaciente`,`p`.`apellidoPaciente` AS `apellidoPaciente`,`a`.`estadoAgenda` AS `estadoAgenda` from (`paciente` `p` join `agenda` `a` on(`a`.`idAgenda` = `p`.`idPaciente`)) ;

-- --------------------------------------------------------

--
-- Estructura para la vista `vistausuario`
--
DROP TABLE IF EXISTS `vistausuario`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vistausuario`  AS  select `usuario`.`idUsuario` AS `idUsuario`,`usuario`.`nombreUsuario` AS `nombreUsuario`,`usuario`.`apellidoUsuario` AS `apellidoUsuario`,`usuario`.`correoUsuario` AS `correoUsuario`,`usuario`.`telefonoUsuario` AS `telefonoUsuario`,`usuario`.`direccionUsuario` AS `direccionUsuario`,`usuario`.`passwordUsuario` AS `passwordUsuario`,`usuario`.`rolUsuario` AS `rolUsuario`,`usuario`.`estadoUsuario` AS `estadoUsuario` from `usuario` where `usuario`.`idUsuario` = '20' ;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `agenda`
--
ALTER TABLE `agenda`
  ADD PRIMARY KEY (`idAgenda`),
  ADD UNIQUE KEY `idAgenda` (`idAgenda`),
  ADD KEY `idPacienteFK` (`idPacienteFK`),
  ADD KEY `idMedikoFK` (`idMedikoFK`);

--
-- Indices de la tabla `consulta_medica`
--
ALTER TABLE `consulta_medica`
  ADD PRIMARY KEY (`idConsulta`),
  ADD UNIQUE KEY `idConsulta` (`idConsulta`),
  ADD KEY `IdHistoriaFK` (`IdHistoriaFK`);

--
-- Indices de la tabla `diagnostico`
--
ALTER TABLE `diagnostico`
  ADD PRIMARY KEY (`idDiagnostico`),
  ADD UNIQUE KEY `idDiagnostico` (`idDiagnostico`),
  ADD KEY `idConsultaFK` (`idConsultaFK`);

--
-- Indices de la tabla `examen`
--
ALTER TABLE `examen`
  ADD PRIMARY KEY (`idExamen`),
  ADD UNIQUE KEY `idExamen` (`idExamen`),
  ADD KEY `idHistoriaFK` (`idHistoriaFK`);

--
-- Indices de la tabla `historia_clinica`
--
ALTER TABLE `historia_clinica`
  ADD PRIMARY KEY (`idHistoria`),
  ADD UNIQUE KEY `idHistoria` (`idHistoria`),
  ADD UNIQUE KEY `idPacienteFK` (`idPacienteFK`);

--
-- Indices de la tabla `medico`
--
ALTER TABLE `medico`
  ADD PRIMARY KEY (`idMedico`),
  ADD UNIQUE KEY `idMedico` (`idMedico`),
  ADD KEY `idUsuarioFK` (`idUsuarioFK`);

--
-- Indices de la tabla `paciente`
--
ALTER TABLE `paciente`
  ADD PRIMARY KEY (`idPaciente`),
  ADD UNIQUE KEY `idPaciente` (`idPaciente`),
  ADD KEY `idUsuarioFK` (`idUsuarioFK`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`idUsuario`),
  ADD UNIQUE KEY `idUsuario` (`idUsuario`);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `agenda`
--
ALTER TABLE `agenda`
  ADD CONSTRAINT `agenda_ibfk_1` FOREIGN KEY (`idPacienteFK`) REFERENCES `paciente` (`idPaciente`),
  ADD CONSTRAINT `agenda_ibfk_2` FOREIGN KEY (`idMedikoFK`) REFERENCES `medico` (`idMedico`);

--
-- Filtros para la tabla `consulta_medica`
--
ALTER TABLE `consulta_medica`
  ADD CONSTRAINT `consulta_medica_ibfk_1` FOREIGN KEY (`IdHistoriaFK`) REFERENCES `historia_clinica` (`idHistoria`);

--
-- Filtros para la tabla `diagnostico`
--
ALTER TABLE `diagnostico`
  ADD CONSTRAINT `diagnostico_ibfk_1` FOREIGN KEY (`idConsultaFK`) REFERENCES `consulta_medica` (`idConsulta`);

--
-- Filtros para la tabla `examen`
--
ALTER TABLE `examen`
  ADD CONSTRAINT `examen_ibfk_1` FOREIGN KEY (`idHistoriaFK`) REFERENCES `historia_clinica` (`idHistoria`);

--
-- Filtros para la tabla `historia_clinica`
--
ALTER TABLE `historia_clinica`
  ADD CONSTRAINT `historia_clinica_ibfk_1` FOREIGN KEY (`idPacienteFK`) REFERENCES `paciente` (`idPaciente`);

--
-- Filtros para la tabla `medico`
--
ALTER TABLE `medico`
  ADD CONSTRAINT `medico_ibfk_1` FOREIGN KEY (`idUsuarioFK`) REFERENCES `usuario` (`idUsuario`);

--
-- Filtros para la tabla `paciente`
--
ALTER TABLE `paciente`
  ADD CONSTRAINT `paciente_ibfk_1` FOREIGN KEY (`idUsuarioFK`) REFERENCES `usuario` (`idUsuario`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
