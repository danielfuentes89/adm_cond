-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 13-05-2015 a las 04:59:22
-- Versión del servidor: 5.6.17
-- Versión de PHP: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `test`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `menus`
--

CREATE TABLE IF NOT EXISTS `menus` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) DEFAULT NULL,
  `titulo` varchar(100) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Volcado de datos para la tabla `menus`
--

INSERT INTO `menus` (`id`, `nombre`, `titulo`) VALUES
(1, 'Name-Menu1', 'Titulo-Menu-1'),
(2, 'n2', 't2'),
(3, 'n3', 't3');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE IF NOT EXISTS `usuarios` (
  `usro_id` int(11) NOT NULL AUTO_INCREMENT,
  `usro_login` varchar(50) NOT NULL,
  `usro_pass` varchar(50) NOT NULL,
  `usro_nombre` varchar(20) NOT NULL,
  `usro_apellido` varchar(20) NOT NULL,
  `usro_correo` varchar(50) NOT NULL,  
  `usro_nac` date NOT NULL,
  `tpo_usro` int(11) NOT NULL,
  `usro_fono` varchar(20) NOT NULL,
  PRIMARY KEY (`usro_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`usro_login`, `usro_pass`, `usro_nombre`, `usro_apellido`,`usro_correo`, `usro_nac`, `tpo_usro`, `usro_fono`) VALUES
('Jperez','1234','Juan','Perez','JuanPerez@correo.com', '1989-11-03', 2, '+5622683549');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
