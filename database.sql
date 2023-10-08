-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: db
-- Tiempo de generación: 16-09-2020 a las 16:37:17
-- Versión del servidor: 10.5.5-MariaDB-1:10.5.5+maria~focal
-- Versión de PHP: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `database`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuario` int NOT NULL AUTO_INCREMENT,
  `username` text NOT NULL,
  `nombre_apellidos` text NOT NULL,
  `dni` text NOT NULL,
  `telf` int(9) NOT NULL,
  `fecha_nacimiento` date NOT NULL,
  `email` text NOT NULL,
  `password` text NOT NULL,
  PRIMARY KEY (`id_usuario`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


--
-- Estructura de tabla para la tabla `coches`
--

CREATE TABLE `coches` (
  `id_coche` int NOT NULL AUTO_INCREMENT,
  `marca` text NOT NULL,
  `modelo` text NOT NULL,
  `anno` int NOT NULL,
  `color` text NOT NULL,
  `caballos` int NOT NULL,
  `combustible` text NOT NULL,
  `precio` float NOT NULL,
  `id_dueno` int NOT NULL,
  PRIMARY KEY (`id_coche`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `username`, `nombre_apellidos`, `dni`, `telf`, `fecha_nacimiento`, `email`, `password`) VALUES
('0', 'admin', 'unai bermudez', '00000000A', '777777777', '2002-09-29', 'admin@gmail.com', 'test');




--
-- Volcado de datos para la tabla `coches`
--

INSERT INTO `coches` (`marca`, `modelo`, `anno`, `color`, `caballos`, `combustible`, `precio`, `id_dueno`) VALUES
("Dacia", "Sandero", "2023", "negro", "91", "gasolina", "14720", "0");



--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `usuarios`
--



/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
