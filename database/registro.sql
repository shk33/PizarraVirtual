-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 29-11-2014 a las 22:21:32
-- Versión del servidor: 5.6.16
-- Versión de PHP: 5.5.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `pizarra_virtual`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `registro`
--

CREATE TABLE IF NOT EXISTS `registro` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `numero_metrica` int(11) NOT NULL,
  `ecuacion` varchar(80) NOT NULL,
  `errores_encontrados` int(11) NOT NULL,
  `tipos_encontrados` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `lista_errores` varchar(2000) CHARACTER SET latin1 COLLATE latin1_spanish_ci NOT NULL,
  `lista_tipos` varchar(2000) CHARACTER SET latin1 COLLATE latin1_spanish_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Volcado de datos para la tabla `registro`
--

INSERT INTO `registro` (`id`, `numero_metrica`, `ecuacion`, `errores_encontrados`, `tipos_encontrados`, `fecha`, `lista_errores`, `lista_tipos`) VALUES
(9, 1, 'x=y', 3, 2, '2014-11-29', '<p>bbb</p>\n', '<p>d,d</p>\n'),
(10, 2, 'x=y', 1, 1, '2014-11-30', '<p>bbb</p>\n', '<p>n</p>\n');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
