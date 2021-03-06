-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 12-01-2013 a las 01:28:06
-- Versión del servidor: 5.5.27
-- Versión de PHP: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `sgt`
--
CREATE DATABASE `sgt` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `sgt`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE IF NOT EXISTS `clientes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cuenta` varchar(16) DEFAULT 'Cliente',
  `admin` tinyint(1) NOT NULL DEFAULT '0',
  `password` varchar(16) NOT NULL,
  `nombre` varchar(30) DEFAULT NULL,
  `apellido` varchar(30) DEFAULT NULL,
  `direccion` varchar(40) DEFAULT NULL,
  `telefono` varchar(13) DEFAULT NULL,
  `celular` varchar(13) DEFAULT NULL,
  `ciudad` varchar(20) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `observaciones` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `consultas`
--

CREATE TABLE IF NOT EXISTS `consultas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(30) DEFAULT NULL,
  `apellido` varchar(30) DEFAULT NULL,
  `telefono` varchar(14) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `consulta` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `equipos`
--

CREATE TABLE IF NOT EXISTS `equipos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tipo` varchar(30) NOT NULL,
  `modelo` varchar(30) NOT NULL,
  `marca` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `equipos_repuestos`
--

CREATE TABLE IF NOT EXISTS `equipos_repuestos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_equipo` int(11) NOT NULL,
  `id_repuesto` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_equipo` (`id_equipo`,`id_repuesto`),
  KEY `id_equipo_2` (`id_equipo`,`id_repuesto`),
  KEY `id_repuesto` (`id_repuesto`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `img_ordenes`
--

CREATE TABLE IF NOT EXISTS `img_ordenes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nro_orden` int(11) NOT NULL,
  `direccion_web` varchar(100) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_equipo` (`nro_orden`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `noticias`
--

CREATE TABLE IF NOT EXISTS `noticias` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `noticia` text NOT NULL,
  `fecha` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ordenes`
--

CREATE TABLE IF NOT EXISTS `ordenes` (
  `nro_orden` int(11) NOT NULL,
  `id_cliente` int(11) NOT NULL,
  `id_equipo` int(11) NOT NULL,
  `nro_serie` varchar(50) DEFAULT NULL,
  `adquirido_en` varchar(50) DEFAULT NULL,
  `nro_factura` varchar(50) DEFAULT NULL,
  `fecha_compra` date DEFAULT NULL,
  `falla` varchar(255) NOT NULL,
  `reparacion` text,
  `fecha_ingreso` date DEFAULT NULL,
  `fecha_presupuesto` date DEFAULT NULL,
  `fecha_reparado` date DEFAULT NULL,
  `fecha_prometido` date DEFAULT NULL,
  `fecha_entrega` date DEFAULT NULL,
  `estado` varchar(50) NOT NULL,
  PRIMARY KEY (`nro_orden`),
  KEY `id_usuario` (`id_cliente`,`id_equipo`),
  KEY `id_equipo` (`id_equipo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ordenes_so`
--

CREATE TABLE IF NOT EXISTS `ordenes_so` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nro_orden` int(11) NOT NULL,
  `id_serviceo` int(11) NOT NULL,
  `nro_orden_so` varchar(50) NOT NULL,
  `fecha_ingreso` date NOT NULL,
  `estado` varchar(30) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `cod_id_so` (`nro_orden_so`),
  KEY `id_equipo` (`nro_orden`,`id_serviceo`),
  KEY `id_serviceo` (`id_serviceo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `repuestos`
--

CREATE TABLE IF NOT EXISTS `repuestos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(50) NOT NULL,
  `tipo` varchar(30) DEFAULT 'Desconocido',
  `marca` varchar(30) DEFAULT 'Desconocida',
  `estado` varchar(40) DEFAULT 'Desconocido',
  `observaciones` text,
  `cantidad` int(11) DEFAULT '0',
  `ubicacion` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `service_oficial`
--

CREATE TABLE IF NOT EXISTS `service_oficial` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) NOT NULL,
  `sitio_web` varchar(100) NOT NULL,
  `tipodeorden` varchar(15) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `equipos_repuestos`
--
ALTER TABLE `equipos_repuestos`
  ADD CONSTRAINT `equipos_repuestos_ibfk_1` FOREIGN KEY (`id_equipo`) REFERENCES `equipos` (`id`),
  ADD CONSTRAINT `equipos_repuestos_ibfk_2` FOREIGN KEY (`id_repuesto`) REFERENCES `repuestos` (`id`);

--
-- Filtros para la tabla `img_ordenes`
--
ALTER TABLE `img_ordenes`
  ADD CONSTRAINT `img_ordenes_ibfk_1` FOREIGN KEY (`nro_orden`) REFERENCES `ordenes` (`nro_orden`);

--
-- Filtros para la tabla `ordenes`
--
ALTER TABLE `ordenes`
  ADD CONSTRAINT `ordenes_ibfk_1` FOREIGN KEY (`id_cliente`) REFERENCES `clientes` (`id`),
  ADD CONSTRAINT `ordenes_ibfk_2` FOREIGN KEY (`id_equipo`) REFERENCES `equipos` (`id`);

--
-- Filtros para la tabla `ordenes_so`
--
ALTER TABLE `ordenes_so`
  ADD CONSTRAINT `ordenes_so_ibfk_1` FOREIGN KEY (`nro_orden`) REFERENCES `ordenes` (`nro_orden`),
  ADD CONSTRAINT `ordenes_so_ibfk_2` FOREIGN KEY (`id_serviceo`) REFERENCES `service_oficial` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
