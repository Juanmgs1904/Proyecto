-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 23-09-2023 a las 00:26:48
-- Versión del servidor: 10.4.27-MariaDB
-- Versión de PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `proyecto`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `paquetes`
--

CREATE TABLE `paquetes` (
  `codigo` int(11) NOT NULL,
  `Peso` text NOT NULL,
  `Estado` text NOT NULL,
  `fRecibo` date NOT NULL,
  `fEntrega` date NOT NULL,
  `Destinatario` varchar(45) NOT NULL,
  `Destino` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `paquetes`
--

INSERT INTO `paquetes` (`codigo`, `Peso`, `Estado`, `fRecibo`, `fEntrega`, `Destinatario`, `Destino`) VALUES
(14, '6', 'Entregado', '0009-09-09', '0088-08-08', '8', '8'),
(15, '4', 'CamionetaAsignada', '0006-06-06', '0000-00-00', '6', '6'),
(17, '7', 'NoAsignado', '0007-07-07', '0007-07-07', '77', '77'),
(19, '6000', 'NoAsignado', '0008-08-08', '0008-08-08', '8', '8'),
(20, '40', 'enCentral', '2023-09-21', '2023-09-24', 'José', 'Melo'),
(21, '10', 'enAlmacenExterno', '2023-09-22', '2023-09-30', 'Pepe', 'Minas'),
(22, '5', 'NoAsignado', '2023-09-23', '2023-09-24', '1', '1');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `paquetes`
--
ALTER TABLE `paquetes`
  ADD PRIMARY KEY (`codigo`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `paquetes`
--
ALTER TABLE `paquetes`
  MODIFY `codigo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
