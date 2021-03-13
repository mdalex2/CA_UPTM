-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 08-07-2013 a las 21:59:48
-- Versión del servidor: 5.5.24-log
-- Versión de PHP: 5.4.3
SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT=0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `control_de_asistencias`
--
drop database if exists control_de_asistencias;
CREATE DATABASE `control_de_asistencias` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `control_de_asistencias`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asistencias`
--

CREATE TABLE IF NOT EXISTS `asistencias` (
  `Cedula` varchar(15) NOT NULL,
  `Fecha` date NOT NULL,
  `Hora_E` time NOT NULL,
  `Horas_S` time NOT NULL,
  PRIMARY KEY (`Cedula`,`Fecha`),
  KEY `Cedula` (`Cedula`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `asistencias`
--

INSERT INTO `asistencias` (`Cedula`, `Fecha`, `Hora_E`, `Horas_S`) VALUES
('1111111', '2013-07-08', '17:14:12', '17:17:28'),
('54321', '2013-06-20', '15:21:14', '19:17:52'),
('54321', '2013-06-21', '18:19:30', '18:25:53'),
('987654321', '2013-06-21', '11:23:20', '11:23:31');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carga_horaria`
--

CREATE TABLE IF NOT EXISTS `carga_horaria` (
  `carga_id` int(11) NOT NULL AUTO_INCREMENT,
  `Cedula` varchar(15) NOT NULL,
  `turno` varchar(11) NOT NULL,
  `tiempo` varchar(10) NOT NULL,
  `Trabajador` varchar(10) NOT NULL,
  PRIMARY KEY (`carga_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `carga_horaria`
--

INSERT INTO `carga_horaria` (`carga_id`, `Cedula`, `turno`, `tiempo`, `Trabajador`) VALUES
(1, '639', 'Noche', 'Completo', 'Contratado');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `descuento`
--

CREATE TABLE IF NOT EXISTS `descuento` (
  `descuentos_id` int(11) NOT NULL AUTO_INCREMENT,
  `Cedula` varchar(15) NOT NULL DEFAULT '0',
  `Fecha` varchar(45) DEFAULT NULL,
  `Cantidad_De_Horas` int(10) DEFAULT NULL,
  `Monto` int(10) DEFAULT NULL,
  PRIMARY KEY (`descuentos_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `horarios`
--

CREATE TABLE IF NOT EXISTS `horarios` (
  `horarios_id` int(11) NOT NULL AUTO_INCREMENT,
  `Cedula` varchar(15) NOT NULL DEFAULT '',
  `turno` varchar(11) NOT NULL,
  `Hora_De_Entrada` time DEFAULT NULL,
  `Hora_De_Salida` time DEFAULT NULL,
  `Horas_De_Dia` int(10) DEFAULT NULL,
  `Horas_De_Noche` int(10) DEFAULT NULL,
  PRIMARY KEY (`horarios_id`),
  KEY `Cedula` (`Cedula`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Volcado de datos para la tabla `horarios`
--

INSERT INTO `horarios` (`horarios_id`, `Cedula`, `turno`, `Hora_De_Entrada`, `Hora_De_Salida`, `Horas_De_Dia`, `Horas_De_Noche`) VALUES
(1, '54321', 'D', '08:00:00', '09:00:00', 2, 0),
(2, '111111', 'M', '08:00:00', '11:00:00', 3, 0),
(3, '543212', 'M', '10:00:00', '11:00:00', 1, 0),
(4, '789654', 'T', '13:00:00', '16:00:00', 3, 0),
(5, '1111111', 'M', '08:00:00', '12:00:00', 4, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inasistencia`
--

CREATE TABLE IF NOT EXISTS `inasistencia` (
  `inasistencia_id` int(11) NOT NULL AUTO_INCREMENT,
  `Cedula` varchar(15) NOT NULL DEFAULT '0',
  `Fecha` date NOT NULL,
  `Horas_Totales` time NOT NULL,
  PRIMARY KEY (`inasistencia_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personal`
--

CREATE TABLE IF NOT EXISTS `personal` (
  `Cedula` varchar(15) NOT NULL DEFAULT '0',
  `Nombre` varchar(20) DEFAULT NULL,
  `Apellido` varchar(20) DEFAULT NULL,
  `Sexo` varchar(1) DEFAULT NULL,
  `Direccion` varchar(45) DEFAULT NULL,
  `Telefono` varchar(25) DEFAULT NULL,
  `cargo` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`Cedula`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `personal`
--

INSERT INTO `personal` (`Cedula`, `Nombre`, `Apellido`, `Sexo`, `Direccion`, `Telefono`, `cargo`) VALUES
('111111', 'manuel', 'contreras', 'M', 'rgr', '-70810', NULL),
('1111111', 'HERMAIN', 'CEBALLOS', 'M', '', '0412-645', 'DOCENTE'),
('54321', 'yony', 'berrios', 'M', 'dddd', '3444', 'DOCENTE'),
('543212', 'raul', 'diaz', 'M', 'dddd', '3444', NULL),
('789654', 'pedro', 'perez', 'M', 'dddd', '3444', NULL),
('987654321', 'LUIS', 'RAMIREZ', 'M', '', '11111111', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sancion`
--

CREATE TABLE IF NOT EXISTS `sancion` (
  `sancion_id` int(11) NOT NULL AUTO_INCREMENT,
  `Cedula` varchar(15) NOT NULL DEFAULT '0',
  `Descripcion` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`sancion_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `seguridad`
--

CREATE TABLE IF NOT EXISTS `seguridad` (
  `cedula_usu` varchar(15) NOT NULL,
  `nombre_usuario` varchar(30) NOT NULL,
  `apellido_usuario` varchar(30) NOT NULL,
  `usuario` varchar(20) NOT NULL,
  `clave` blob NOT NULL,
  `privilegio` varchar(5) NOT NULL,
  PRIMARY KEY (`cedula_usu`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `seguridad`
--

INSERT INTO `seguridad` (`cedula_usu`, `nombre_usuario`, `apellido_usuario`, `usuario`, `clave`, `privilegio`) VALUES
('000000', 'ADMINISTRADOR', 'SISTEMA', 'admin', 0x31323334, 'A'),
('1111111', 'HERMAIN', 'CEBALLOS', 'hermain', 0x31323334, 'U'),
('14771188', 'alexi', 'mendoza', 'alex', 0x31323334, 'U'),
('54321', 'yony', 'berrios', 'yony', 0x3132333435, 'A'),
('987654321', 'LUIS', 'RAMIREZ', 'luisr', 0x31323334, 'U');

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `asistencias`
--
ALTER TABLE `asistencias`
  ADD CONSTRAINT `asistencias_ibfk_1` FOREIGN KEY (`Cedula`) REFERENCES `personal` (`Cedula`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `horarios`
--
ALTER TABLE `horarios`
  ADD CONSTRAINT `horarios_ibfk_1` FOREIGN KEY (`Cedula`) REFERENCES `personal` (`Cedula`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
