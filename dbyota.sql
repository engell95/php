-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 06-03-2020 a las 22:25:29
-- Versión del servidor: 10.4.11-MariaDB
-- Versión de PHP: 7.2.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `dbyota`
--
CREATE DATABASE IF NOT EXISTS `dbyota` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `dbyota`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `gestion`
--

CREATE TABLE `gestion` (
  `cod_gestion` int(11) NOT NULL,
  `cod_usuario` int(11) NOT NULL,
  `gestion` varchar(50) NOT NULL,
  `vis_tecnica` tinyint(1) NOT NULL,
  `creado` datetime NOT NULL DEFAULT current_timestamp(),
  `actualizado` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `gestion`
--

INSERT INTO `gestion` (`cod_gestion`, `cod_usuario`, `gestion`, `vis_tecnica`, `creado`, `actualizado`) VALUES
(22, 1, 'Pago de mensualidad', 0, '2020-03-06 15:23:43', '2020-03-06 15:23:43'),
(23, 1, 'Retiro de equipo', 1, '2020-03-06 15:24:00', '2020-03-06 15:24:00'),
(24, 1, 'Revision de equipos', 1, '2020-03-06 15:24:14', '2020-03-06 15:24:14'),
(25, 1, 'Sin servicio', 1, '2020-03-06 15:24:24', '2020-03-06 15:24:24');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `gestion_cliente`
--

CREATE TABLE `gestion_cliente` (
  `cod_gestioncli` int(11) NOT NULL,
  `cod_gestion` int(11) NOT NULL,
  `atendido` tinyint(1) NOT NULL,
  `creado` datetime NOT NULL DEFAULT current_timestamp(),
  `actualizado` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ticket`
--

CREATE TABLE `ticket` (
  `cod_ticket` int(11) NOT NULL,
  `cod_gestioncli` int(11) NOT NULL,
  `cod_gestion` int(11) NOT NULL,
  `cli_nombre` varchar(50) NOT NULL,
  `cli_apellido` varchar(50) NOT NULL,
  `cli_direccion` varchar(250) NOT NULL,
  `cli_telefono` varchar(11) NOT NULL,
  `problema` text NOT NULL,
  `solucion` text NOT NULL,
  `creado` datetime NOT NULL DEFAULT current_timestamp(),
  `actualizado` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `cod_usuario` int(11) NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `apellido` varchar(45) NOT NULL,
  `inicio` varchar(15) NOT NULL,
  `contrasena` varchar(10) NOT NULL,
  `creado` datetime NOT NULL DEFAULT current_timestamp(),
  `actualizado` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`cod_usuario`, `nombre`, `apellido`, `inicio`, `contrasena`, `creado`, `actualizado`) VALUES
(1, 'usuario', 'usuario', 'admin', '123', '2020-03-06 07:52:22', '2020-03-06 07:52:22');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `gestion`
--
ALTER TABLE `gestion`
  ADD PRIMARY KEY (`cod_gestion`),
  ADD KEY `gestion_usuario` (`cod_usuario`);

--
-- Indices de la tabla `gestion_cliente`
--
ALTER TABLE `gestion_cliente`
  ADD PRIMARY KEY (`cod_gestioncli`),
  ADD KEY `gestioncli_gestion` (`cod_gestion`);

--
-- Indices de la tabla `ticket`
--
ALTER TABLE `ticket`
  ADD PRIMARY KEY (`cod_ticket`),
  ADD KEY `ticket_gestioncli` (`cod_gestioncli`),
  ADD KEY `ticket_gestion` (`cod_gestion`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`cod_usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `gestion`
--
ALTER TABLE `gestion`
  MODIFY `cod_gestion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT de la tabla `gestion_cliente`
--
ALTER TABLE `gestion_cliente`
  MODIFY `cod_gestioncli` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `cod_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `gestion`
--
ALTER TABLE `gestion`
  ADD CONSTRAINT `gestion_usuario` FOREIGN KEY (`cod_usuario`) REFERENCES `usuarios` (`cod_usuario`);

--
-- Filtros para la tabla `gestion_cliente`
--
ALTER TABLE `gestion_cliente`
  ADD CONSTRAINT `gestioncli_gestion` FOREIGN KEY (`cod_gestion`) REFERENCES `gestion` (`cod_gestion`);

--
-- Filtros para la tabla `ticket`
--
ALTER TABLE `ticket`
  ADD CONSTRAINT `ticket_gestion` FOREIGN KEY (`cod_gestion`) REFERENCES `gestion` (`cod_gestion`),
  ADD CONSTRAINT `ticket_gestioncli` FOREIGN KEY (`cod_gestioncli`) REFERENCES `gestion_cliente` (`cod_gestioncli`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
