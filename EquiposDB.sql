-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 13-10-2019 a las 19:20:25
-- Versión del servidor: 10.1.41-MariaDB-0ubuntu0.18.04.1
-- Versión de PHP: 7.0.31-1+ubuntu18.04.1+deb.sury.org+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `Equipos`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Equipos`
--

CREATE TABLE `Equipos` (
  `ID` char(38) NOT NULL,
  `Nombre` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `Equipos`
--

INSERT INTO `Equipos` (`ID`, `Nombre`) VALUES
('22a63ac4-edc2-11e9-9508-02c036b03311', 'pepsi'),
('30bab0ee-edc2-11e9-9508-02c036b03311', 'dddddd');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Jugadores`
--

CREATE TABLE `Jugadores` (
  `ID` char(38) NOT NULL,
  `Nombre` varchar(50) NOT NULL,
  `Apellidos` varchar(50) NOT NULL,
  `Edad` int(11) NOT NULL,
  `Foto` varchar(150) NOT NULL,
  `IDEquipo` char(38) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `Jugadores`
--

INSERT INTO `Jugadores` (`ID`, `Nombre`, `Apellidos`, `Edad`, `Foto`, `IDEquipo`) VALUES
('2c458b58-edc2-11e9-9508-02c036b03311', 'sds ', 'dds ', 15, 'pepsi.png ', '22a63ac4-edc2-11e9-9508-02c036b03311'),
('442a9f2c-edc2-11e9-9508-02c036b03311', 'pero tio', 'top', 223, 'sd', '22a63ac4-edc2-11e9-9508-02c036b03311'),
('56493ae5-edc2-11e9-9508-02c036b03311', 'aefaf ', 'afaf ', 0, 'sf ', '22a63ac4-edc2-11e9-9508-02c036b03311'),
('756e4b00-edc2-11e9-9508-02c036b03311', '345t', '32r3r', 0, 'rrrrrrrrrrrr', '22a63ac4-edc2-11e9-9508-02c036b03311'),
('8ad7b6e9-edc2-11e9-9508-02c036b03311', '', '', 0, '', '30bab0ee-edc2-11e9-9508-02c036b03311');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `Equipos`
--
ALTER TABLE `Equipos`
  ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `Jugadores`
--
ALTER TABLE `Jugadores`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `FK_EquiposJugadores` (`IDEquipo`);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `Jugadores`
--
ALTER TABLE `Jugadores`
  ADD CONSTRAINT `FK_EquiposJugadores` FOREIGN KEY (`IDEquipo`) REFERENCES `Equipos` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
