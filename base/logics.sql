-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 30-10-2017 a las 17:33:54
-- Versión del servidor: 5.7.9
-- Versión de PHP: 5.6.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `logics`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `client`
--

DROP TABLE IF EXISTS `client`;
CREATE TABLE IF NOT EXISTS `client` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(255) DEFAULT NULL,
  `Apellidos` varchar(255) DEFAULT NULL,
  `Telefono` varchar(255) DEFAULT NULL,
  `Contra` varchar(255) DEFAULT NULL,
  `Correo` varchar(255) DEFAULT NULL,
  `Direccion` varchar(255) DEFAULT NULL,
  `users_id` int(11) DEFAULT NULL,
  `Empresa` varchar(20) DEFAULT NULL,
  `RFC` varchar(25) DEFAULT NULL,
  `nivel_id` enum('client') DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=39 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `client`
--

INSERT INTO `client` (`id`, `Nombre`, `Apellidos`, `Telefono`, `Contra`, `Correo`, `Direccion`, `users_id`, `Empresa`, `RFC`, `nivel_id`) VALUES
(12, 'LUIS MANUEL', 'COBIAN', '3121833722', '81dc9bdb52d04dc20036dbd8313ed055', 'cobianl066@gmail.com', 'MINATITLAN #25', 12, NULL, NULL, NULL),
(26, 'Uriel', 'Guizar', '8183982120', '8098957c2abd5031fe02cb9d4c5c4103', 'guizar.u@glologistics.com.mx', '1565 W 20th St. San Bernardino, CA 92411', NULL, NULL, NULL, NULL),
(27, 'Uriel', 'Gmail', '8183982120', '8098957c2abd5031fe02cb9d4c5c4103', 'urielguizar1990@gmail.com', '1565 W 20th St. San Bernardino CA 92411', NULL, NULL, NULL, NULL),
(37, 'PEDRO', 'castillo', NULL, NULL, 'pedro@gmail.com', NULL, 12, NULL, NULL, 'client'),
(38, 'assad', 'sdasda', NULL, NULL, 'aas', NULL, 12, NULL, NULL, 'client');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

DROP TABLE IF EXISTS `clientes`;
CREATE TABLE IF NOT EXISTS `clientes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(255) DEFAULT NULL,
  `Apellidos` varchar(255) DEFAULT NULL,
  `Telefono` varchar(25) DEFAULT NULL,
  `Correo` varchar(50) DEFAULT NULL,
  `Direccion` varchar(25) DEFAULT NULL,
  `RFC` varchar(13) DEFAULT NULL,
  `Empresa` varchar(255) NOT NULL,
  `nivel_id` enum('user','client') DEFAULT NULL,
  `Contra` varchar(255) DEFAULT NULL,
  `users_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_client` (`users_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`id`, `Nombre`, `Apellidos`, `Telefono`, `Correo`, `Direccion`, `RFC`, `Empresa`, `nivel_id`, `Contra`, `users_id`) VALUES
(1, 'Cobian', 'Hernandez', '1234', 'correo@gmail.com', 'minatitaln', 'cohlas', 'GLOP', 'client', '81dc9bdb52d04dc20036dbd8313ed055', 12),
(2, 'GLO', 'Ayuda', '8183982120', 'ayuda@glologistics.com.mx', '1565 W 20th St', 'GLO2017AYUDA', 'Glo Ayuda', 'client', '8098957c2abd5031fe02cb9d4c5c4103', 27),
(3, 'Cotiza', 'GLO', '', 'cotiza@glologistics.com.mx', 'Cotiza Allende GLO ', 'Cotiza1258GLO', 'CotizaGLO', 'client', '8098957c2abd5031fe02cb9d4c5c4103', 27);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `movimientos`
--

DROP TABLE IF EXISTS `movimientos`;
CREATE TABLE IF NOT EXISTS `movimientos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Movimiento` varchar(255) CHARACTER SET utf8 COLLATE utf8_spanish2_ci DEFAULT NULL,
  `Confirmacion` text CHARACTER SET utf8 COLLATE utf8_spanish_ci,
  `Origen` varchar(255) DEFAULT NULL,
  `Destino` varchar(255) DEFAULT NULL,
  `Fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `id_status` varchar(10) DEFAULT NULL,
  `id_clients` int(10) NOT NULL,
  `ruta` varchar(255) NOT NULL,
  `Comentarios` text NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_statatus` (`id_status`),
  KEY `fk_clientes` (`id_clients`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `movimientos`
--

INSERT INTO `movimientos` (`id`, `Movimiento`, `Confirmacion`, `Origen`, `Destino`, `Fecha`, `id_status`, `id_clients`, `ruta`, `Comentarios`) VALUES
(4, 'ADADSFADS', '<p>\r\n	AKSNJKASD</p>\r\n', 'USA', 'COLIMA', '2017-10-30 16:57:35', 'PENDENDIEN', 26, '9d96b-2-1-.png', '<p>\r\n	SON LOS PIRNCIPALES</p>\r\n'),
(5, 'PRINCIPALES', '<p>\r\n	ME GUSTA TODO</p>\r\n', 'COLIMA', 'MANZANILLO', '2017-10-30 17:08:33', 'COLIMA', 12, '03fe0-51a15-c.docx', '<p>\r\n	ESTO ES LO PRINCIPAL</p>\r\n');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `movimientos_facturas`
--

DROP TABLE IF EXISTS `movimientos_facturas`;
CREATE TABLE IF NOT EXISTS `movimientos_facturas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_movimiento` int(11) DEFAULT NULL,
  `id_client` int(11) DEFAULT NULL,
  `pdf` text,
  `xml` text,
  `status_factura` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_mov` (`id_movimiento`),
  KEY `clientes` (`id_client`),
  KEY `status_facturas` (`status_factura`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `provedores`
--

DROP TABLE IF EXISTS `provedores`;
CREATE TABLE IF NOT EXISTS `provedores` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(255) DEFAULT NULL,
  `Apellidos` varchar(255) DEFAULT NULL,
  `Telefono` varchar(255) DEFAULT NULL,
  `Password` varchar(255) DEFAULT NULL,
  `Tipo_usuario` varchar(10) DEFAULT NULL,
  `Correo` varchar(255) DEFAULT NULL,
  `Direccion` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `provedores`
--

INSERT INTO `provedores` (`id`, `Nombre`, `Apellidos`, `Telefono`, `Password`, `Tipo_usuario`, `Correo`, `Direccion`) VALUES
(12, 'LUIS MANUEL', 'COBIAN', '3121833722', '81dc9bdb52d04dc20036dbd8313ed055', 'master', 'cobianl066@gmail.com', 'MINATITLAN #25'),
(26, 'Uriel', 'Guizar', '8183982120', '8098957c2abd5031fe02cb9d4c5c4103', 'master', 'guizar.u@glologistics.com.mx', '1565 W 20th St. San Bernardino, CA 92411'),
(27, 'Uriel', 'Gmail', '8183982120', '8098957c2abd5031fe02cb9d4c5c4103', 'admin', 'urielguizar1990@gmail.com', '1565 W 20th St. San Bernardino CA 92411'),
(32, 'sds', 'sdfsdf', NULL, NULL, NULL, 'sddssdf', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `status`
--

DROP TABLE IF EXISTS `status`;
CREATE TABLE IF NOT EXISTS `status` (
  `status` varchar(10) NOT NULL,
  PRIMARY KEY (`status`) USING BTREE,
  KEY `status` (`status`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `status`
--

INSERT INTO `status` (`status`) VALUES
('Aceptado'),
('En proceso'),
('Entregado');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `status_carga`
--

DROP TABLE IF EXISTS `status_carga`;
CREATE TABLE IF NOT EXISTS `status_carga` (
  `Status` varchar(255) NOT NULL,
  PRIMARY KEY (`Status`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `status_carga`
--

INSERT INTO `status_carga` (`Status`) VALUES
('CITA CONFIRMADA '),
('CONTENEDOR CARGADO'),
('DESAUDAMIENTO LIBRE'),
('EN RUTA FISCAL '),
('EN RUTA PARA ENTREGA '),
('ENTREGA DE VACIO'),
('ENTREGA EFECTIVA'),
('MANIOBRAS RECOLECTADAS'),
('MODULACION EN PEDIMIENTO '),
('RECONOCIMIENTO ADUANERO '),
('RETONORNO DE CONTENEDOR'),
('SERVICIO CONCLUIDO '),
('UNIDAD DE DESTINO '),
('UNIDAD DE FUERA DE PUERTO'),
('UNIDAD EN PATIO REGULADORA'),
('UNIDAD EN PUERTO'),
('UNIDAD PROXIMA A DESTINO');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `status_facturas`
--

DROP TABLE IF EXISTS `status_facturas`;
CREATE TABLE IF NOT EXISTS `status_facturas` (
  `fac_status` varchar(255) NOT NULL,
  PRIMARY KEY (`fac_status`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `status_facturas`
--

INSERT INTO `status_facturas` (`fac_status`) VALUES
('Credito 10 dias'),
('Pagado'),
('Pendiente');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(255) DEFAULT NULL,
  `Apellidos` varchar(255) DEFAULT NULL,
  `Telefono` varchar(255) DEFAULT NULL,
  `Contra` varchar(255) DEFAULT NULL,
  `Correo` varchar(255) DEFAULT NULL,
  `Direccion` varchar(255) DEFAULT NULL,
  `users_id` int(11) DEFAULT NULL,
  `nivel_id` enum('user') DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=38 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `Nombre`, `Apellidos`, `Telefono`, `Contra`, `Correo`, `Direccion`, `users_id`, `nivel_id`) VALUES
(12, 'LUIS MANUEL', 'COBIAN', '3121833722', '81dc9bdb52d04dc20036dbd8313ed055', 'cobianl066@gmail.com', 'MINATITLAN #25', 12, NULL),
(26, 'Uriel', 'Guizar', '8183982120', '8098957c2abd5031fe02cb9d4c5c4103', 'guizar.u@glologistics.com.mx', '1565 W 20th St. San Bernardino, CA 92411', NULL, NULL),
(27, 'Uriel', 'Gmail', '8183982120', '8098957c2abd5031fe02cb9d4c5c4103', 'urielguizar1990@gmail.com', '1565 W 20th St. San Bernardino CA 92411', NULL, NULL),
(37, 'CARLOS', 'MEDA', NULL, NULL, 'meda@gmail.com', NULL, 12, 'user');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
