-- phpMyAdmin SQL Dump
-- version 4.2.6deb1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 27-11-2014 a las 17:57:28
-- Versión del servidor: 5.5.40-0ubuntu1
-- Versión de PHP: 5.5.12-2ubuntu4.1

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
`id` int(11) NOT NULL,
  `numero_metrica` int(11) NOT NULL,
  `numero_ecuacion` int(11) NOT NULL,
  `errores_encontrados` int(11) NOT NULL,
  `tipos_encontrados` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `lista_errores` varchar(2000) CHARACTER SET latin1 COLLATE latin1_spanish_ci NOT NULL,
  `lista_tipos` varchar(2000) CHARACTER SET latin1 COLLATE latin1_spanish_ci NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Volcado de datos para la tabla `registro`
--

INSERT INTO `registro` (`id`, `numero_metrica`, `numero_ecuacion`, `errores_encontrados`, `tipos_encontrados`, `fecha`, `lista_errores`, `lista_tipos`) VALUES
(7, 1, 1, 5, 2, '2014-11-27', '<p>asdasd</p>\n', '<p>asdasd</p>\n'),
(8, 1, 1, 15, 2, '2014-11-28', '<p>asdasd</p>\n', '<p>asdasd</p>\n'),
(9, 2, 0, 15, 6, '2014-11-28', '<p>das</p>\n', '<p>asd</p>\n'),
(10, 1, 1, 5, 6, '2014-11-28', '<p>asd</p>\n', '<p>as</p>\n'),
(11, 2, 2, 5, 6, '2014-11-28', '<p>asd</p>\n', '<p>sadas</p>\n'),
(12, 1, 1, 10, 5, '2014-11-28', '<p>nhjdshdsadhsg</p>\n', '<p>hjsdghgsdahjghsdhj</p>\n\n<p>hjadshjdsahdsjakjk</p>\n');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `registro`
--
ALTER TABLE `registro`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `registro`
--
ALTER TABLE `registro`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
