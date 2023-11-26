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
  `salt` text NOT NULL,
  `password` text NOT NULL,
  PRIMARY KEY (`id_usuario`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


--
-- Estructura de tabla para la tabla `coches`
--

CREATE TABLE `coches` (
  `id_coche` int NOT NULL AUTO_INCREMENT,
  `imagen` text NOT NULL,
  `marca` text NOT NULL,
  `modelo` text NOT NULL,
  `anno` int NOT NULL,
  `color` text NOT NULL,
  `caballos` int NOT NULL,
  `combustible` text NOT NULL,
  `precio` float NOT NULL,
  `cambio` text NOT NULL,
  `kilometros` int NOT NULL,
  PRIMARY KEY (`id_coche`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `username`, `nombre_apellidos`, `dni`, `telf`, `fecha_nacimiento`, `email`, `salt`, `password`) VALUES
('0', 'admin', 'unai bermudez', '00000000A', '777777777', '2002-09-29', 'admin@gmail.com', '60b1da9d7b233b55f5d06f6c922e4024', '$2y$10$c2WsgIiL457thTml7aO1reRs/Xy.bQsNNjHv.IoKgtZWbB1f9dUvG');




--
-- Volcado de datos para la tabla `coches`
--

INSERT INTO `coches` (`imagen`, `marca`, `modelo`, `anno`, `color`, `caballos`, `combustible`, `precio`, `kilometros`,`cambio`) VALUES
("/images/sandero.jpg","Dacia", "Sandero", "2023", "Negro", "91", "Gasolina", "14720", "0", "Manual"),
("/images/ccorsa.jpg","Opel", "Corsa", "2015", "Gris", "90", "Gasolina", "7950", "142000", "Manual"),
("/images/megane.webp","Renault", "Megane", "2015", "Blanco", "115", "Gasolina", "9600", "102000","Manual"),
("/images/golf.jpg","Volkswagen", "Golf GTE", "2016", "Negro", "204", "Hibrido(Gasolina)", "16500", "209000","Manual"),
("/images/audi.jpg","Audi", "A4", "2007", "Blanco", "300", "Gasolina", "12800", "153000","Manual");


--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `usuarios`
--



/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
