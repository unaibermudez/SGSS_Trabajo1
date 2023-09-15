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
  "id_usuario" int NOT NULL AUTO_INCREMENT,
  "username" text NOT NULL
  "password" text NOT NULL
  "nombre_apellidos" text NOT NULL,
  "dni" text NOT NULL,
  "telf" int(9) NOT NULL,
  "fecha_nacimiento" text NOT NULL,
  "email" text NOT NULL,
  PRIMARY KEY ("id_usuario")
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


--
-- Estructura de tabla para la tabla `coches`
--

CREATE TABLE `coches` (
  "id_coche" int NOT NULL AUTO_INCREMENT,
  "modelo" text NOT NULL,
  "anno" int NOT NULL,
  "color" text NOT NULL,
  "caballos" int NOT NULL,
  "precio" float NOT NULL,
  "id_duenno" int NOT NULL,
  PRIMARY KEY ("id_coche")
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
--
-- Volcado de datos para la tabla `usuarios`
--



--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `usuarios`
--


/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
