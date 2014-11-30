-- phpMyAdmin SQL Dump
-- version 4.2.6deb1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 30-11-2014 a las 16:11:51
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
-- Estructura de tabla para la tabla `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
`id` int(11) NOT NULL,
  `correo` varchar(255) NOT NULL,
  `contrasena` varchar(32) NOT NULL,
  `nombre` varchar(255) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `admin`
--

INSERT INTO `admin` (`id`, `correo`, `contrasena`, `nombre`) VALUES
(1, 'admin@admin.com', '4d186321c1a7f0f354b297e8914ab240', 'Administrador');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alumno`
--

CREATE TABLE IF NOT EXISTS `alumno` (
`id` int(11) NOT NULL,
  `nombre` varchar(300) NOT NULL,
  `apellido` varchar(300) NOT NULL,
  `matricula` varchar(100) NOT NULL,
  `contrasena` varchar(32) NOT NULL,
  `correo` varchar(100) NOT NULL,
  `grupo_id` int(11) DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=27 ;

--
-- Volcado de datos para la tabla `alumno`
--

INSERT INTO `alumno` (`id`, `nombre`, `apellido`, `matricula`, `contrasena`, `correo`, `grupo_id`) VALUES
(1, 'Miguel Eduardo', 'Coronel Segovia', '08000973', '29c2e0a10862c6da50c67505bec06f7c', 'mcoronelseg@hotmail.com', NULL),
(2, 'Juan Carlos', 'Peña Moreno', '08983223', '4d186321c1a7f0f354b297e8914ab240', 'penanieto@hotmail.com', 1),
(3, 'Maya', 'Villanueva', '09893932', 'd41d8cd98f00b204e9800998ecf8427e', 'maya@hotmail.com', 1),
(4, 'Jose', 'Ucan Pech', '7832789', 'd41d8cd98f00b204e9800998ecf8427e', 'ucan@hjssa.com', 1),
(5, 'Prueba', 'Prueba', '0889892', 'd41d8cd98f00b204e9800998ecf8427e', 'pruebaqq@hotmail.com', 1),
(13, 'Jorge', 'Cárdenas', '09862341', 'd41d8cd98f00b204e9800998ecf8427e', 'hjdsakhdkjsdahkja@kldsksa.com', NULL),
(22, 'Alumno', 'Alumno', '080009731', '4d186321c1a7f0f354b297e8914ab240', 'alumno@alumno.com', NULL),
(23, 'alumno1 de pw', 'Apellido', '08983223', '4d186321c1a7f0f354b297e8914ab240', 'alpw@alpw.com', 17),
(24, 'alumno2 de pw', 'jkdaskljads', '8278937', '4d186321c1a7f0f354b297e8914ab240', 'alpw2@alpw.com', NULL),
(26, 'hjdshdsjgadsjh', 'ghdgagsdajhghsdagjh', 'ghdsaghjadshgjdashjg', '4d186321c1a7f0f354b297e8914ab240', 'ghdgshajhgjdas@ghdsagjasd.com', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `archivo`
--

CREATE TABLE IF NOT EXISTS `archivo` (
`id` int(11) NOT NULL,
  `ruta` text NOT NULL,
  `plan_id` int(11) NOT NULL,
  `nombre` text NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Volcado de datos para la tabla `archivo`
--

INSERT INTO `archivo` (`id`, `ruta`, `plan_id`, `nombre`) VALUES
(6, 'uploads/planes/1/hosts.txt', 1, 'hosts.txt');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `chat`
--

CREATE TABLE IF NOT EXISTS `chat` (
`id` int(11) NOT NULL,
  `grupo_id` int(11) DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Volcado de datos para la tabla `chat`
--

INSERT INTO `chat` (`id`, `grupo_id`) VALUES
(1, 1),
(7, 13),
(10, 16),
(11, 17),
(12, 18);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `claseerror`
--

CREATE TABLE IF NOT EXISTS `claseerror` (
  `ClaseErrorId` int(11) NOT NULL,
  `ClaseErrorNombre` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `claseerror`
--

INSERT INTO `claseerror` (`ClaseErrorId`, `ClaseErrorNombre`) VALUES
(2000, 'Sin clasificar'),
(2001, 'Distribucion Generalizada'),
(2002, 'Aplicación Repetida'),
(2003, 'Generalizacion'),
(2004, 'Conocimiento basico pobre pero correcto'),
(2005, 'Errores que surgen durante la ejecucion de un procedimiento');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ecuacion`
--

CREATE TABLE IF NOT EXISTS `ecuacion` (
  `numero` int(11) NOT NULL,
  `cadena` varchar(80) NOT NULL,
  `numero_errores` int(11) NOT NULL,
  `numero_tipos` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `ecuacion`
--

INSERT INTO `ecuacion` (`numero`, `cadena`, `numero_errores`, `numero_tipos`) VALUES
(1, 'x+y=y+x', 0, 0),
(2, 'x(y) = xy', 0, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `error`
--

CREATE TABLE IF NOT EXISTS `error` (
  `ErrorId` int(11) NOT NULL,
  `ErrorNombre` varchar(45) NOT NULL,
  `ErrorDescripcion` varchar(140) NOT NULL,
  `ClaseErrorId` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `error`
--

INSERT INTO `error` (`ErrorId`, `ErrorNombre`, `ErrorDescripcion`, `ClaseErrorId`) VALUES
(1001, 'Error Tipo 1', 'Evaluar 4x cuando x=6; 46;', 2000),
(1002, 'Error Tipo 2', 'Evaluar xy cuando x= -3, y= -5', 2000),
(1003, 'Error Tipo 3', 'Al evaluar 2 (-3) como -1 y (-1)³ como -3', 2000),
(1004, 'Error Tipo 4', 'Analizar 3r² como 3 + r² = como (3r)²', 2000),
(1005, 'Error Tipo 5', 'Simplificando 3 + 23 (s-4) a 26(s-4)', 2000),
(1006, 'Error Tipo 6', 'Simplificando 3xy + 4xz a 7xyz', 2000),
(1007, 'Error Tipo 7', '(2a/2a) = 0', 2003),
(1008, 'Error Tipo 8', 'x * (1/x) = 0', 2003),
(1009, 'Error Tipo 9', '0 * a =', 2003),
(1010, 'Error Tipo 10', '?a + b = ?a + ?b', 2001),
(1011, 'Error Tipo 11', '(a + b)² = a² + b²', 2001),
(1012, 'Error Tipo 12', 'a(bc) = ab * ac', 2000),
(1013, 'Error Tipo 13', 'a/(b+c) = a/b + a/c', 2000),
(1014, 'Error Tipo 14', '(a+b)/(c+d)  = a/c + b/d', 2001),
(1015, 'Error Tipo 15', '2^(a+b) = 2^a + 2^b', 2000),
(1016, 'Error Tipo 16', '2^(ab) = 2^a2^b', 2001),
(1017, 'Error Tipo 17', '(ax+by)/(x+y)  = a + b', 2002),
(1018, 'Error Tipo 18', 'x/(2x+y)  = 1/ (2 + y)', 2002),
(1019, 'Error Tipo 19', '(x+3z)/(2x+y)  = 3z/(2 + y)', 2000),
(1020, 'Error Tipo 20', '(x-3)/2x = -(3/2)', 2000),
(1021, 'Error Tipo 21', '(a²+2ab+b²)/(a²+b²)= 2ab', 2000),
(1022, 'Error Tipo 22', '2(x + 3) = 2x + 3', 2005),
(1023, 'Error Tipo 23', '-(3x -w) = -3x -w', 2005),
(1024, 'Error Tipo 24', '(Ax+B)(Cx+D) = ACx² + BD', 2000),
(1025, 'Error Tipo 25', 'x = (4z + x²)/7', 2000),
(1026, 'Error Tipo 26', '(x+1)/(x+4) = 5/6  entonces x+5=y', 2004),
(1027, 'Error Tipo 27', '2x + 5 = 11 entonces: x + 5 = 11/ 2', 2004),
(1028, 'Error Tipo 28', '2x + 5 = y + 2 entonces: x + 5 = y', 2000),
(1029, 'Error Tipo 29', '1/R = 1 / R1 + 1/R2 + 1/R3 entonces: R = R1 + R2 + R3', 2002),
(1030, 'Error Tipo 30', '1/x +1/x² = 3/x² + 6x² entonces: x + 1 = 3 + 6x²', 2000),
(1031, 'Error Tipo 31', 'Factorizando x² + (5/6)x + 1/6 como x (x+ (5/6)) + 1/6', 2000),
(1032, 'Error Tipo 32', '(x-5)(x-7) = 3 entonces: x- 5 = 3 luego x = 8; x-7 = 3 luego x = 10', 2003),
(1033, 'Error Tipo 33', '5/(2-x) + 3 /(2+x) = 4 entonces 5(2+x) + 3 (2-x) = 4', 2005),
(1034, 'Error Tipo 34', 'Pretendiendo que no se puede multiplicar por x por que "no se sabe que es x"', 2000),
(1035, 'Error Tipo 35', 'a^7/a^10 = a³', 2005),
(1036, 'Error Tipo 36', '(3r)² = 3r²', 2005),
(1037, 'Error Tipo 37', '2^(a+b) = 2^a + 2^b', 2000),
(1038, 'Error Tipo 38', 'a(b/c) = ab/ac', 2001),
(1039, 'Error Tipo 39', 'Error no ', 2000);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `grupo`
--

CREATE TABLE IF NOT EXISTS `grupo` (
`id` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `observaciones` text NOT NULL,
  `plan_id` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=20 ;

--
-- Volcado de datos para la tabla `grupo`
--

INSERT INTO `grupo` (`id`, `nombre`, `observaciones`, `plan_id`) VALUES
(1, 'Grupo de prueba', 'Grupo que está haciendo el entorno colaborativo de Pizarra virtual desde cero', 1),
(13, 'Grupo de Segunda fase', '', 19),
(16, 'Grupo de hdsjdkhjadshjdsjhkadshjj', '', 23),
(17, 'Grupo de Plan de PW 1', 'Este es el primer plan', 24),
(18, 'Grupo de gdhagdsdsgaj', '', 25);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `message`
--

CREATE TABLE IF NOT EXISTS `message` (
`id` int(11) NOT NULL,
  `text` text NOT NULL,
  `username` varchar(255) NOT NULL,
  `sent_date` int(11) DEFAULT NULL,
  `chat_id` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=42 ;

--
-- Volcado de datos para la tabla `message`
--

INSERT INTO `message` (`id`, `text`, `username`, `sent_date`, `chat_id`) VALUES
(11, 'lo que sea', 'Administrador', 1416863013, 1),
(12, 'hola nueva cosa', 'Administrador', 1416864007, 1),
(13, 'este es el ultimo', 'Administrador', 1416866443, 1),
(14, 'este es mas ultimo', 'Administrador', 1416868446, 1),
(15, 'este es aún más ultimo', 'Administrador', 1416868452, 1),
(16, 'este muchisisismo más nuevo', 'Administrador', 1416930659, 1),
(17, 'holaaaasss', 'Administrador', 1416931765, 1),
(18, 'adios', 'Administrador', 1416931775, 1),
(19, 'actualizate', 'Administrador', 1416932255, 1),
(20, 'prueba 1', 'Administrador', 1416932294, 1),
(21, 'prueba 3', 'Administrador', 1416932405, 1),
(22, 'esto sí debe de funcionar', 'Administrador', 1416932724, 1),
(23, 'esto también', 'Administrador', 1416932745, 1),
(24, 'este mensaje igual', 'Administrador', 1416932777, 1),
(25, 'hola', 'Administrador', 1416933038, 1),
(26, '¿Cómo les ha estado yendo en su ACTIVIDADES?', 'Administrador', 1416933917, 1),
(27, 'Muy mal', 'Juan Carlos', 1416934142, 1),
(28, '¿por qué?', 'Administrador', 1416934161, 1),
(29, 'Porque no entendemos nada de lo que nos marcaron', 'Juan Carlos', 1416934175, 1),
(30, 'Lo siento no puedo hacer nada hasta que se conecte su tutor', 'Juan Carlos', 1416934536, 1),
(31, 'Por favor Admin ayúdame', 'Administrador', 1416934582, 1),
(32, 'ES que nuestro tutor no sabe', 'Juan Carlos', 1416934608, 1),
(33, '¿por qué lo dices?', 'Administrador', 1416934622, 1),
(34, 'Por que yo soy .......PEÑA NIETO', 'Juan Carlos', 1416934822, 1),
(35, 'Hola a todos este es el comienzo de la segunda fase del proyecto de Ajax', 'Administrador', 1416936235, 7),
(36, 'Probando que todo funcione', 'Administrador', 1417025715, 1),
(37, 'Hola estudiantes he puesto las actividades por favor hagan todo', 'Tutor33', 1417115694, 11),
(38, 'Hola mundo maldito', 'Administrador', 1417130898, 1),
(39, 'El verificador medio sirve no me culpen', 'Administrador', 1417130939, 1),
(40, 'ghdsaghjdsghadsgjhasgh', 'Juan Pablo de Jesús', 1417136254, 1),
(41, 'hajgdsadgjhdsaghjdsa', 'Administrador', 1417138040, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pizarra_general`
--

CREATE TABLE IF NOT EXISTS `pizarra_general` (
`id` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `contenido` text NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `pizarra_general`
--

INSERT INTO `pizarra_general` (`id`, `nombre`, `contenido`) VALUES
(1, 'Pizarra General', 'Bienvenidos sean todos a la pizarra General del Proyecto de Ajax del proyecto d');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pizarra_privada`
--

CREATE TABLE IF NOT EXISTS `pizarra_privada` (
`id` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `grupo_id` int(11) NOT NULL,
  `contenido` text NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=18 ;

--
-- Volcado de datos para la tabla `pizarra_privada`
--

INSERT INTO `pizarra_privada` (`id`, `nombre`, `grupo_id`, `contenido`) VALUES
(1, 'Pizarra de prueba', 1, '3x + 1 = 1 + 3x\n(a  + b )^2 = a^2 + 2ab + b^2 \n2x + 3x + 4x = 9x\n12x + 16 + 5x = 17x + 16\n\n'),
(11, 'Pizarra de Segunda fase', 13, ''),
(14, 'Pizarra de hdsjdkhjadshjdsjhkadshjj', 16, ''),
(15, 'Pizarra de Plan de PW 1', 17, '3x +1 = 1 + 3x\n(a + b)^2 = a^2 + 2ab + b^2'),
(16, 'Pizarra de gdhagdsdsgaj', 18, '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `plan`
--

CREATE TABLE IF NOT EXISTS `plan` (
`id` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `materiales` text NOT NULL,
  `ruta_carpeta` text,
  `plan_ant_id` int(11) DEFAULT NULL,
  `tarea_id` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=27 ;

--
-- Volcado de datos para la tabla `plan`
--

INSERT INTO `plan` (`id`, `nombre`, `materiales`, `ruta_carpeta`, `plan_ant_id`, `tarea_id`) VALUES
(1, 'Plan de prueba modificado dos veces', 'Les subi materiales que espero les guste. Alumnos del rocio', 'uploads/planes/1', NULL, 1),
(19, 'Segunda fase', 'En este fase hay más fases', 'uploads/planes/19', NULL, 1),
(23, 'hdsjdkhjadshjdsjhkadshjj', 'hjkdhshshdjksdhajkdsahjkads', 'uploads/planes/23', NULL, 1),
(24, 'Plan de PW 1', 'Hjshahsakhjdshadhdakjdhjk', 'uploads/planes/24', NULL, 5),
(25, 'gdhagdsdsgaj', 'ghjasggdjshgasdgadsgjdagjadjsh', 'uploads/planes/25', NULL, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `registro`
--

CREATE TABLE IF NOT EXISTS `registro` (
`id` int(11) NOT NULL,
  `numero_metrica` int(11) NOT NULL,
  `ecuacion` varchar(80) NOT NULL,
  `errores_encontrados` int(11) NOT NULL,
  `tipos_encontrados` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `lista_errores` varchar(2000) CHARACTER SET latin1 COLLATE latin1_spanish_ci NOT NULL,
  `lista_tipos` varchar(2000) CHARACTER SET latin1 COLLATE latin1_spanish_ci NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Volcado de datos para la tabla `registro`
--

INSERT INTO `registro` (`id`, `numero_metrica`, `ecuacion`, `errores_encontrados`, `tipos_encontrados`, `fecha`, `lista_errores`, `lista_tipos`) VALUES
(9, 1, 'x=y', 3, 2, '2014-11-29', '<p>bbb</p>\n', '<p>d,d</p>\n'),
(10, 2, 'x=y', 1, 1, '2014-11-30', '<p>bbb</p>\n', '<p>n</p>\n'),
(11, 1, 's +1 = 23', 5, 5, '2014-11-19', '<p>dsaddas</p>\n', '<p>dssdadsa</p>\n');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tarea`
--

CREATE TABLE IF NOT EXISTS `tarea` (
`id` int(11) NOT NULL,
  `nombre` varchar(250) NOT NULL,
  `descripcion` text NOT NULL,
  `tutor_id` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Volcado de datos para la tabla `tarea`
--

INSERT INTO `tarea` (`id`, `nombre`, `descripcion`, `tutor_id`) VALUES
(1, 'Proyecto con CKEditor', 'Implemetar CKEditor', 1),
(2, 'Proyecto de Ajax coqueto', 'Una pizarra virtual como un entorno colaborativo para asistir el aprendeizaje', 1),
(4, 'Tarea de prueba', 'Tarea de prueba con datos dummy', 2),
(5, 'Tarea de pw', 'CIalquie cosas', 6),
(6, 'ghdaghdaghsajdhagdshj', 'gjhagdajhggjhsdgjhsdagjhsad', 1),
(7, 'tarea nueva', 'hdsjahdsahhsdajhjasdjkhda', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tutor`
--

CREATE TABLE IF NOT EXISTS `tutor` (
`id` int(11) NOT NULL,
  `nombre` varchar(250) NOT NULL,
  `apellido` varchar(250) NOT NULL,
  `correo` varchar(250) NOT NULL,
  `contrasena` varchar(32) NOT NULL,
  `seccion` varchar(400) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Volcado de datos para la tabla `tutor`
--

INSERT INTO `tutor` (`id`, `nombre`, `apellido`, `correo`, `contrasena`, `seccion`) VALUES
(1, 'Juan Pablo de Jesús', 'Ucan Pech', 'ucan@uady.com.mx', '4d186321c1a7f0f354b297e8914ab240', 'Programación en Ajax'),
(2, 'Maria Enriqueta', 'Castellanos Bolaños', 'bolanos@hotmial.com', '4d186321c1a7f0f354b297e8914ab240', 'Programación en la web'),
(4, 'Tutor', 'Tutor Virtual', 'tutor@tutor.com', '4d186321c1a7f0f354b297e8914ab240', 'NO sé'),
(5, 'Tutor de prueba', 'Apellido de prueba', 'tutorprueba@prueba.com', '4d186321c1a7f0f354b297e8914ab240', 'sección de prueba'),
(6, 'Tutor33', 'Apellido 33', 'pw@pw.com', '4d186321c1a7f0f354b297e8914ab240', 'Programacion en la web'),
(7, 'Tutor33', 'yjhdfskhjfdjksdf', 'hjdashkads@ghdsjghdas.com', '4d186321c1a7f0f354b297e8914ab240', 'hjsdhkjhdhsdjhsjdk'),
(8, 'Tutor33', 'hola', 'hjdsh@jdskjsd.com', '4d186321c1a7f0f354b297e8914ab240', 'hjdshskjhads');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `admin`
--
ALTER TABLE `admin`
 ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `alumno`
--
ALTER TABLE `alumno`
 ADD PRIMARY KEY (`id`), ADD KEY `grupo_id` (`grupo_id`);

--
-- Indices de la tabla `archivo`
--
ALTER TABLE `archivo`
 ADD PRIMARY KEY (`id`), ADD KEY `plan_id` (`plan_id`);

--
-- Indices de la tabla `chat`
--
ALTER TABLE `chat`
 ADD PRIMARY KEY (`id`), ADD KEY `grupo_id` (`grupo_id`);

--
-- Indices de la tabla `claseerror`
--
ALTER TABLE `claseerror`
 ADD PRIMARY KEY (`ClaseErrorId`);

--
-- Indices de la tabla `ecuacion`
--
ALTER TABLE `ecuacion`
 ADD PRIMARY KEY (`numero`);

--
-- Indices de la tabla `error`
--
ALTER TABLE `error`
 ADD PRIMARY KEY (`ErrorId`), ADD KEY `fk_Error_ClaseError_idx` (`ClaseErrorId`);

--
-- Indices de la tabla `grupo`
--
ALTER TABLE `grupo`
 ADD PRIMARY KEY (`id`), ADD KEY `pland_id` (`plan_id`);

--
-- Indices de la tabla `message`
--
ALTER TABLE `message`
 ADD PRIMARY KEY (`id`), ADD KEY `chat_id` (`chat_id`);

--
-- Indices de la tabla `pizarra_general`
--
ALTER TABLE `pizarra_general`
 ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `pizarra_privada`
--
ALTER TABLE `pizarra_privada`
 ADD PRIMARY KEY (`id`), ADD KEY `grupo_id` (`grupo_id`);

--
-- Indices de la tabla `plan`
--
ALTER TABLE `plan`
 ADD PRIMARY KEY (`id`), ADD KEY `id_plan_ant` (`plan_ant_id`), ADD KEY `id_tarea` (`tarea_id`);

--
-- Indices de la tabla `registro`
--
ALTER TABLE `registro`
 ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tarea`
--
ALTER TABLE `tarea`
 ADD PRIMARY KEY (`id`), ADD KEY `tutor_id` (`tutor_id`);

--
-- Indices de la tabla `tutor`
--
ALTER TABLE `tutor`
 ADD PRIMARY KEY (`id`), ADD KEY `correo` (`correo`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `admin`
--
ALTER TABLE `admin`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `alumno`
--
ALTER TABLE `alumno`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=27;
--
-- AUTO_INCREMENT de la tabla `archivo`
--
ALTER TABLE `archivo`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT de la tabla `chat`
--
ALTER TABLE `chat`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT de la tabla `grupo`
--
ALTER TABLE `grupo`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT de la tabla `message`
--
ALTER TABLE `message`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=42;
--
-- AUTO_INCREMENT de la tabla `pizarra_general`
--
ALTER TABLE `pizarra_general`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `pizarra_privada`
--
ALTER TABLE `pizarra_privada`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT de la tabla `plan`
--
ALTER TABLE `plan`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=27;
--
-- AUTO_INCREMENT de la tabla `registro`
--
ALTER TABLE `registro`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT de la tabla `tarea`
--
ALTER TABLE `tarea`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT de la tabla `tutor`
--
ALTER TABLE `tutor`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `alumno`
--
ALTER TABLE `alumno`
ADD CONSTRAINT `alumno_ibfk_1` FOREIGN KEY (`grupo_id`) REFERENCES `grupo` (`id`) ON DELETE SET NULL;

--
-- Filtros para la tabla `archivo`
--
ALTER TABLE `archivo`
ADD CONSTRAINT `archivo_ibfk_1` FOREIGN KEY (`plan_id`) REFERENCES `plan` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `chat`
--
ALTER TABLE `chat`
ADD CONSTRAINT `chat_ibfk_1` FOREIGN KEY (`grupo_id`) REFERENCES `grupo` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `error`
--
ALTER TABLE `error`
ADD CONSTRAINT `fk_Error_ClaseError` FOREIGN KEY (`ClaseErrorId`) REFERENCES `claseerror` (`ClaseErrorId`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `grupo`
--
ALTER TABLE `grupo`
ADD CONSTRAINT `grupo_ibfk_1` FOREIGN KEY (`plan_id`) REFERENCES `plan` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `pizarra_privada`
--
ALTER TABLE `pizarra_privada`
ADD CONSTRAINT `pizarra_privada_ibfk_1` FOREIGN KEY (`grupo_id`) REFERENCES `grupo` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `plan`
--
ALTER TABLE `plan`
ADD CONSTRAINT `plan_ibfk_1` FOREIGN KEY (`tarea_id`) REFERENCES `tarea` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `tarea`
--
ALTER TABLE `tarea`
ADD CONSTRAINT `tarea_ibfk_1` FOREIGN KEY (`tutor_id`) REFERENCES `tutor` (`id`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
