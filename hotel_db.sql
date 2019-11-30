-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 30-11-2019 a las 16:15:50
-- Versión del servidor: 10.1.37-MariaDB
-- Versión de PHP: 7.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `hotel_db`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

CREATE TABLE `cliente` (
  `Id` int(11) NOT NULL,
  `Ci` int(11) DEFAULT NULL,
  `Nombre` varchar(35) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `Apellido` varchar(35) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `Nacionalidad` varchar(30) DEFAULT NULL,
  `Celular` int(11) DEFAULT NULL,
  `Email` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `cliente`
--

INSERT INTO `cliente` (`Id`, `Ci`, `Nombre`, `Apellido`, `Nacionalidad`, `Celular`, `Email`) VALUES
(1, 0, 'Grover', 'Taboada', 'Bolivia', 65280094, 'grovertabu@gmail.com');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `habitacion`
--

CREATE TABLE `habitacion` (
  `Id` int(11) NOT NULL,
  `Nrohabitacion` int(11) NOT NULL,
  `Thabitacion` varchar(50) NOT NULL,
  `Estado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `habitacion`
--

INSERT INTO `habitacion` (`Id`, `Nrohabitacion`, `Thabitacion`, `Estado`) VALUES
(1, 1, 'Simple', 1),
(2, 2, 'Simple', 1),
(3, 3, 'Simple', 1),
(4, 4, 'Simple', 1),
(5, 5, 'Simple', 1),
(6, 6, 'Simple', 1),
(7, 7, 'Doble', 1),
(8, 8, 'Doble', 1),
(9, 9, 'Doble', 1),
(10, 10, 'Doble', 1),
(11, 11, 'Doble', 1),
(12, 12, 'Doble', 1),
(13, 13, 'Triple', 1),
(14, 14, 'Triple', 1),
(15, 15, 'Triple', 1),
(16, 16, 'Familiar', 1),
(17, 17, 'Familiar', 1),
(18, 18, 'Familiar', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reservacion`
--

CREATE TABLE `reservacion` (
  `Id` int(11) NOT NULL,
  `Id_cliente` int(11) DEFAULT NULL,
  `Id_habitacion` int(11) DEFAULT NULL,
  `Id_servicio` int(11) DEFAULT NULL,
  `Fingreso` date DEFAULT NULL,
  `Fsalida` date DEFAULT NULL,
  `Nro_dias` int(11) DEFAULT NULL,
  `PrecioH` double(8,2) DEFAULT NULL,
  `PrecioS` double(8,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `reservacion`
--

INSERT INTO `reservacion` (`Id`, `Id_cliente`, `Id_habitacion`, `Id_servicio`, `Fingreso`, `Fsalida`, `Nro_dias`, `PrecioH`, `PrecioS`) VALUES
(1, 1, 1, 5, '2019-11-02', '2019-12-05', 33, 3960.00, 0.00);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `servicios`
--

CREATE TABLE `servicios` (
  `Id` int(11) NOT NULL,
  `Tcomida` varchar(35) NOT NULL,
  `PrecioC` decimal(5,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `servicios`
--

INSERT INTO `servicios` (`Id`, `Tcomida`, `PrecioC`) VALUES
(1, 'Desayuno', '10.00'),
(2, 'Almuerzo', '15.00'),
(3, 'Bebidas', '10.00'),
(5, 'Ninguno', '0.00'),
(6, 'Lavanderia', '12.00'),
(7, 'garaje ', '15.00');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`Id`);

--
-- Indices de la tabla `habitacion`
--
ALTER TABLE `habitacion`
  ADD PRIMARY KEY (`Id`);

--
-- Indices de la tabla `reservacion`
--
ALTER TABLE `reservacion`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `Id_cliente` (`Id_cliente`),
  ADD KEY `Id_habitacion` (`Id_habitacion`);

--
-- Indices de la tabla `servicios`
--
ALTER TABLE `servicios`
  ADD PRIMARY KEY (`Id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `cliente`
--
ALTER TABLE `cliente`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `habitacion`
--
ALTER TABLE `habitacion`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de la tabla `reservacion`
--
ALTER TABLE `reservacion`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `servicios`
--
ALTER TABLE `servicios`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
