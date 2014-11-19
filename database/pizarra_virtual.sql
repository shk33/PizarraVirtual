-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 19, 2014 at 08:20 AM
-- Server version: 5.6.20
-- PHP Version: 5.5.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `pizarra_virtual`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
`id` int(11) NOT NULL,
  `correo` varchar(255) NOT NULL,
  `contrasena` varchar(32) NOT NULL,
  `nombre` varchar(255) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `correo`, `contrasena`, `nombre`) VALUES
(1, 'admin@admin.com', '4d186321c1a7f0f354b297e8914ab240', 'Administrador');

-- --------------------------------------------------------

--
-- Table structure for table `alumno`
--

CREATE TABLE IF NOT EXISTS `alumno` (
`id` int(11) NOT NULL,
  `nombre` varchar(300) NOT NULL,
  `apellido` varchar(300) NOT NULL,
  `matricula` varchar(100) NOT NULL,
  `contrasena` varchar(32) NOT NULL,
  `correo` varchar(100) NOT NULL,
  `grupo_id` int(11) DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=23 ;

--
-- Dumping data for table `alumno`
--

INSERT INTO `alumno` (`id`, `nombre`, `apellido`, `matricula`, `contrasena`, `correo`, `grupo_id`) VALUES
(1, 'Miguel Eduardo', 'Coronel Segovia', '08000973', '29c2e0a10862c6da50c67505bec06f7c', 'mcoronelseg@hotmail.com', 1),
(2, 'Juan Carlos', 'Peña Moreno', '08983223', 'd41d8cd98f00b204e9800998ecf8427e', 'penanieto@hotmail.com', 1),
(3, 'Maya', 'Villanueva', '09893932', 'd41d8cd98f00b204e9800998ecf8427e', 'maya@hotmail.com', 1),
(4, 'Jose', 'Ucan Pech', '7832789', 'd41d8cd98f00b204e9800998ecf8427e', 'ucan@hjssa.com', 1),
(5, 'Prueba', 'Prueba', '0889892', 'd41d8cd98f00b204e9800998ecf8427e', 'pruebaqq@hotmail.com', 1),
(13, 'Jorge', 'Cárdenas', '09862341', 'd41d8cd98f00b204e9800998ecf8427e', 'hjdsakhdkjsdahkja@kldsksa.com', NULL),
(21, 'Muchas Gracias', 'Por Usar El Sistema', '7832979812', 'd41d8cd98f00b204e9800998ecf8427e', 'kjasdhjkads@jhdshsd.com', NULL),
(22, 'Alumno', 'Alumno', '080009731', '4d186321c1a7f0f354b297e8914ab240', 'alumno@alumno.com', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `grupo`
--

CREATE TABLE IF NOT EXISTS `grupo` (
`id` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `observaciones` text NOT NULL,
  `plan_id` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `grupo`
--

INSERT INTO `grupo` (`id`, `nombre`, `observaciones`, `plan_id`) VALUES
(1, 'Grupo de prueba', 'Grupo que está haciendo el entorno colaborativo de Pizarra virtual desde cero', 1),
(8, 'Grupo de Nuevo Plan', '', 14),
(9, 'Grupo de No me debo mostrar', '', 15),
(10, 'Grupo de Alinear los CSS', '', 16),
(12, 'Grupo de Implementar PHP', '', 18);

-- --------------------------------------------------------

--
-- Table structure for table `pizarra_general`
--

CREATE TABLE IF NOT EXISTS `pizarra_general` (
`id` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `contenido` text NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `pizarra_general`
--

INSERT INTO `pizarra_general` (`id`, `nombre`, `contenido`) VALUES
(1, 'Pizarra General', 'Bienvenidos sean todos a la pizarra General del Proyecto de Ajax');

-- --------------------------------------------------------

--
-- Table structure for table `pizarra_privada`
--

CREATE TABLE IF NOT EXISTS `pizarra_privada` (
`id` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `grupo_id` int(11) NOT NULL,
  `contenido` text NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `pizarra_privada`
--

INSERT INTO `pizarra_privada` (`id`, `nombre`, `grupo_id`, `contenido`) VALUES
(1, 'Pizarra de prueba', 1, '3x + 1 = 1 + 3x\n(a  + b ) = a^2 + 2ab + b^2 \n2x + 3x + 4x = 9x\n12x + 16 + 5x = 17x + 16\n'),
(6, 'Pizarra de Nuevo Plan', 8, ''),
(7, 'Pizarra de No me debo mostrar', 9, ''),
(8, 'Pizarra de Alinear los CSS', 10, ''),
(10, 'Pizarra de Implementar PHP', 12, '');

-- --------------------------------------------------------

--
-- Table structure for table `plan`
--

CREATE TABLE IF NOT EXISTS `plan` (
`id` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `materiales` text NOT NULL,
  `ruta_carpeta` text NOT NULL,
  `plan_ant_id` int(11) DEFAULT NULL,
  `tarea_id` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=19 ;

--
-- Dumping data for table `plan`
--

INSERT INTO `plan` (`id`, `nombre`, `materiales`, `ruta_carpeta`, `plan_ant_id`, `tarea_id`) VALUES
(1, 'Plan de prueba modificado dos veces', 'Material 1\r\nMaterial 2\r\nMaterial 3', 'dummy_data', NULL, 1),
(14, 'Nuevo Plan', 'hhjakdshak', 'hksdhahdkj', NULL, 2),
(15, 'No me debo mostrar', 'Shalalalalal', 'Shalalalal', NULL, 4),
(16, 'Alinear los CSS porque no me gustan', 'Link to CSS', 'Cosas de CSS', NULL, 1),
(18, 'Implementar PHP 3.0', 'bajskdjsad', 'jkldsajldw', NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tarea`
--

CREATE TABLE IF NOT EXISTS `tarea` (
`id` int(11) NOT NULL,
  `nombre` varchar(250) NOT NULL,
  `descripcion` text NOT NULL,
  `tutor_id` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `tarea`
--

INSERT INTO `tarea` (`id`, `nombre`, `descripcion`, `tutor_id`) VALUES
(1, 'Proyecto con CKEditor', 'Implemetar CKEditor', 1),
(2, 'Proyecto de Ajax coqueto', 'Una pizarra virtual como un entorno colaborativo para asistir el aprendeizaje', 1),
(4, 'Tarea de prueba', 'Tarea de prueba con datos dummy', 2);

-- --------------------------------------------------------

--
-- Table structure for table `tutor`
--

CREATE TABLE IF NOT EXISTS `tutor` (
`id` int(11) NOT NULL,
  `nombre` varchar(250) NOT NULL,
  `apellido` varchar(250) NOT NULL,
  `correo` varchar(250) NOT NULL,
  `contrasena` varchar(32) NOT NULL,
  `seccion` varchar(400) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `tutor`
--

INSERT INTO `tutor` (`id`, `nombre`, `apellido`, `correo`, `contrasena`, `seccion`) VALUES
(1, 'Juan Pablo de Jesús', 'Ucan Pech', 'ucan@uady.com.mx', '4d186321c1a7f0f354b297e8914ab240', 'Programación en Ajax'),
(2, 'Maria Enriqueta', 'Castellanos Bolaños', 'bolanos@hotmial.com', '4d186321c1a7f0f354b297e8914ab240', 'Programación en la web'),
(4, 'Tutor', 'Tutor Virtual', 'tutor@tutor.com', '4d186321c1a7f0f354b297e8914ab240', 'NO sé'),
(5, 'Tutor de prueba', 'Apellido de prueba', 'tutorprueba@prueba.com', '4d186321c1a7f0f354b297e8914ab240', 'sección de prueba');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `alumno`
--
ALTER TABLE `alumno`
 ADD PRIMARY KEY (`id`), ADD KEY `grupo_id` (`grupo_id`);

--
-- Indexes for table `grupo`
--
ALTER TABLE `grupo`
 ADD PRIMARY KEY (`id`), ADD KEY `pland_id` (`plan_id`);

--
-- Indexes for table `pizarra_general`
--
ALTER TABLE `pizarra_general`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pizarra_privada`
--
ALTER TABLE `pizarra_privada`
 ADD PRIMARY KEY (`id`), ADD KEY `grupo_id` (`grupo_id`);

--
-- Indexes for table `plan`
--
ALTER TABLE `plan`
 ADD PRIMARY KEY (`id`), ADD KEY `id_plan_ant` (`plan_ant_id`), ADD KEY `id_tarea` (`tarea_id`);

--
-- Indexes for table `tarea`
--
ALTER TABLE `tarea`
 ADD PRIMARY KEY (`id`), ADD KEY `tutor_id` (`tutor_id`);

--
-- Indexes for table `tutor`
--
ALTER TABLE `tutor`
 ADD PRIMARY KEY (`id`), ADD KEY `correo` (`correo`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `alumno`
--
ALTER TABLE `alumno`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT for table `grupo`
--
ALTER TABLE `grupo`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `pizarra_general`
--
ALTER TABLE `pizarra_general`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `pizarra_privada`
--
ALTER TABLE `pizarra_privada`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `plan`
--
ALTER TABLE `plan`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `tarea`
--
ALTER TABLE `tarea`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `tutor`
--
ALTER TABLE `tutor`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `alumno`
--
ALTER TABLE `alumno`
ADD CONSTRAINT `alumno_ibfk_1` FOREIGN KEY (`grupo_id`) REFERENCES `grupo` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `grupo`
--
ALTER TABLE `grupo`
ADD CONSTRAINT `grupo_ibfk_1` FOREIGN KEY (`plan_id`) REFERENCES `plan` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `pizarra_privada`
--
ALTER TABLE `pizarra_privada`
ADD CONSTRAINT `pizarra_privada_ibfk_1` FOREIGN KEY (`grupo_id`) REFERENCES `grupo` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `plan`
--
ALTER TABLE `plan`
ADD CONSTRAINT `plan_ibfk_1` FOREIGN KEY (`tarea_id`) REFERENCES `tarea` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tarea`
--
ALTER TABLE `tarea`
ADD CONSTRAINT `tarea_ibfk_1` FOREIGN KEY (`tutor_id`) REFERENCES `tutor` (`id`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
