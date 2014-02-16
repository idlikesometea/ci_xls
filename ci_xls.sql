-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 16-02-2014 a las 04:24:16
-- Versión del servidor: 5.5.32
-- Versión de PHP: 5.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `ci_xls`
--
CREATE DATABASE IF NOT EXISTS `ci_xls` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `ci_xls`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `datos_test`
--

CREATE TABLE IF NOT EXISTS `datos_test` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `clics` int(11) NOT NULL,
  `impresiones` int(11) NOT NULL,
  `visitas` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Volcado de datos para la tabla `datos_test`
--

INSERT INTO `datos_test` (`id`, `clics`, `impresiones`, `visitas`) VALUES
(1, 1, 23, 1),
(2, 12, 15, 3),
(3, 3, 13, 2),
(4, 8, 11, 5);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
