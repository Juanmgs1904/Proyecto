-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 23-09-2023 a las 00:28:51
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
-- Estructura de tabla para la tabla `almacen`
--

CREATE TABLE `almacen` (
  `id` int(11) NOT NULL,
  `ubicacion` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `almacen`
--

INSERT INTO `almacen` (`id`, `ubicacion`) VALUES
(1, 'Montevideo'),
(12, 'Canelones'),
(13, '6'),
(14, 'i'),
(15, 'u'),
(16, 'l');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `almacenexterno`
--

CREATE TABLE `almacenexterno` (
  `idE` int(11) NOT NULL,
  `Empresa` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `almacenexterno`
--

INSERT INTO `almacenexterno` (`idE`, `Empresa`) VALUES
(13, 'crecom'),
(14, 'cre');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `almaceninterno`
--

CREATE TABLE `almaceninterno` (
  `idI` int(11) NOT NULL,
  `ruta` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `almaceninterno`
--

INSERT INTO `almaceninterno` (`idI`, `ruta`) VALUES
(16, 4),
(1, 5),
(12, 8),
(15, 9);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `camion`
--

CREATE TABLE `camion` (
  `Matricula` char(7) NOT NULL,
  `Peso` double NOT NULL CHECK (`Peso` <= 3.3),
  `Alto` double NOT NULL CHECK (`Alto` <= 4.10),
  `Ancho` double NOT NULL CHECK (`Ancho` <= 2.6),
  `Largo` double NOT NULL CHECK (`Largo` <= 13.20),
  `Tipo` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `camion`
--

INSERT INTO `camion` (`Matricula`, `Peso`, `Alto`, `Ancho`, `Largo`, `Tipo`) VALUES
('34', 2, 3, 2, 9, '3'),
('888', 2, 4, 2, 7, '7');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `camionero`
--

CREATE TABLE `camionero` (
  `CIC` int(8) NOT NULL,
  `FechaVL` date DEFAULT NULL,
  `Turno` int(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `camionero`
--

INSERT INTO `camionero` (`CIC`, `FechaVL`, `Turno`) VALUES
(666, '0099-09-09', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `camioneta`
--

CREATE TABLE `camioneta` (
  `MatriculaC` char(7) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `camioneta`
--

INSERT INTO `camioneta` (`MatriculaC`) VALUES
('78'),
('8');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `conduce`
--

CREATE TABLE `conduce` (
  `CIC` int(8) NOT NULL,
  `MatriculaV` char(7) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contiene`
--

CREATE TABLE `contiene` (
  `codigo` int(11) NOT NULL,
  `IDL` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `contiene`
--

INSERT INTO `contiene` (`codigo`, `IDL`) VALUES
(14, 29),
(15, 50);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `esta`
--

CREATE TABLE `esta` (
  `IDR` int(11) NOT NULL,
  `IDA` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `esta`
--

INSERT INTO `esta` (`IDR`, `IDA`) VALUES
(1, 12),
(1, 16),
(2, 15);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lleva`
--

CREATE TABLE `lleva` (
  `IDL` int(11) NOT NULL,
  `Matricula` char(7) NOT NULL,
  `fEntrega` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `lleva`
--

INSERT INTO `lleva` (`IDL`, `Matricula`, `fEntrega`) VALUES
(29, '34', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lotes`
--

CREATE TABLE `lotes` (
  `IDL` int(11) NOT NULL,
  `Peso` int(11) DEFAULT NULL,
  `Estado` varchar(45) NOT NULL,
  `Destino` varchar(40) NOT NULL,
  `Ruta` int(11) NOT NULL,
  `tiempoEstimado` datetime NOT NULL,
  `idI` int(11) DEFAULT NULL,
  `enAlmacenExterno` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `lotes`
--

INSERT INTO `lotes` (`IDL`, `Peso`, `Estado`, `Destino`, `Ruta`, `tiempoEstimado`, `idI`, `enAlmacenExterno`) VALUES
(29, 67, 'Asignado', '3', 7, '2023-09-22 21:03:00', 15, 0),
(31, 65, 'NoAsignado', '10', 8, '2023-09-30 21:05:00', 12, 0),
(50, 0, 'Entregado', 'Tacuarembo', 6, '2023-09-12 22:30:00', 16, 0),
(52, 30, 'NoAsignado', 'Artigas', 8, '2023-09-28 13:24:17', 16, 0),
(53, 45, 'No Asignado', 'Montevideo', 1, '2023-09-22 22:56:34', 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `nrorecorrido`
--

CREATE TABLE `nrorecorrido` (
  `IDR` int(11) NOT NULL,
  `nroRuta` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `nrorecorrido`
--

INSERT INTO `nrorecorrido` (`IDR`, `nroRuta`) VALUES
(1, 8),
(2, 5),
(2, 7),
(2, 9);

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

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personal`
--

CREATE TABLE `personal` (
  `CIP` int(8) NOT NULL,
  `Cargo` varchar(45) DEFAULT NULL,
  `FechaNacimiento` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `personal`
--

INSERT INTO `personal` (`CIP`, `Cargo`, `FechaNacimiento`) VALUES
(666, 'Armado lotes', '2003-09-02'),
(5555, 'Armado lote', '0077-07-07');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personas`
--

CREATE TABLE `personas` (
  `CI` int(8) NOT NULL,
  `Nombre` varchar(45) DEFAULT NULL,
  `Telefono` varchar(9) DEFAULT NULL,
  `Direccion` varchar(45) DEFAULT NULL,
  `Mail` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `personas`
--

INSERT INTO `personas` (`CI`, `Nombre`, `Telefono`, `Direccion`, `Mail`) VALUES
(666, 'chmichurri', '6', 'Bv Artib', 'LuisHernandez@gmail.com'),
(5555, 'Bruno', '8', 'Bv Artiga', 'MariaPerez@gmail.com'),
(5555555, '5', '5', '5', 'robertoSanchez@gmail.com');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personas_token`
--

CREATE TABLE `personas_token` (
  `TokenId` int(11) NOT NULL,
  `Mail` varchar(45) DEFAULT NULL,
  `Token` varchar(45) DEFAULT NULL,
  `Estado` varchar(45) DEFAULT NULL,
  `Fecha` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `personas_token`
--

INSERT INTO `personas_token` (`TokenId`, `Mail`, `Token`, `Estado`, `Fecha`) VALUES
(340, 'LuisHernandez@gmail.com', '99822586aec01f68a7aa14a085d88d25', 'Activo', '2023-09-19 00:58:00'),
(341, 'hol@gmail.com', 'bfcb66e6bf9c2a68646d26fcc057586a', 'Activo', '2023-09-19 04:44:00'),
(342, 'LuisHernandez@gmail.com', '3652d2eef0c7df24a140a0614d43b977', 'Activo', '2023-09-19 04:45:00'),
(343, 'hol@gmail.com', '70beb4171b82249907f3c34d588a3368', 'Activo', '2023-09-19 04:46:00'),
(344, 'LuisHernandez@gmail.com', '0b22bfcd5dc11d07549c4a3af09308e7', 'Activo', '2023-09-19 04:57:00'),
(345, 'hol@gmail.com', '32ffe69596858ac0d6c7686c4fdf2851', 'Activo', '2023-09-19 04:57:00'),
(346, 'LuisHernandez@gmail.com', '06c898041121712c873118fbf4c4ddb1', 'Activo', '2023-09-19 05:01:00'),
(347, 'hol@gmail.com', '12d8497c3ccea553bdf29b0e2ea5f0c9', 'Activo', '2023-09-19 05:12:00'),
(348, 'LuisHernandez@gmail.com', '7ce95010fcb713d242943bbc9133ad68', 'Activo', '2023-09-19 05:20:00'),
(349, 'robertoSanchez@gmail.com', '24f51c91ad2d0b752c8905d455c0f981', 'Activo', '2023-09-19 23:04:00'),
(350, 'LuisHernandez@gmail.com', 'ba3e2b4427dfb854d5471623a91e8e6b', 'Activo', '2023-09-19 23:05:00'),
(351, 'robertoSanchez@gmail.com', 'dcf9ffe3ee0b92d5d2a5b68a447a6e0f', 'Activo', '2023-09-20 01:45:00'),
(352, 'LuisHernandez@gmail.com', '9efb6ccd076148588d575f5a44833276', 'Activo', '2023-09-20 01:59:00'),
(353, 'LuisHernandez@gmail.com', '01e42f8b7530aeb80997f2b25224d8dd', 'Activo', '2023-09-22 05:10:00'),
(354, 'MariaPerez@gmail.com', '1426b5449d84318a0f44cfa4a31c3048', 'Activo', '2023-09-22 05:27:00'),
(355, 'LuisHernandez@gmail.com', '19365cb2b1b9310aa4dbec7e94e78dbc', 'Activo', '2023-09-22 05:28:00'),
(356, 'MariaPerez@gmail.com', 'a257daf8c42d847a97193e117232d1fa', 'Activo', '2023-09-22 05:30:00'),
(357, 'LuisHernandez@gmail.com', '1c3f66054d94e06a908020eb7c225598', 'Activo', '2023-09-22 05:34:00'),
(358, 'LuisHernandez@gmail.com', 'd99c7c5c41096e2fa99be5c6b569a76f', 'Activo', '2023-09-22 06:20:00'),
(359, 'LuisHernandez@gmail.com', '005cb837bcfdf3940c0c1dbcc6296809', 'Activo', '2023-09-22 06:20:00'),
(360, 'LuisHernandez@gmail.com', 'c4c7a765553e9493731d5f13320da570', 'Activo', '2023-09-22 06:39:00'),
(361, 'LuisHernandez@gmail.com', 'c3e29a3b35f89dd0e2f65a3b2cc813af', 'Activo', '2023-09-22 06:51:00'),
(362, 'LuisHernandez@gmail.com', '7146ec85a44d568bbd5403bd7bb2b5bc', 'Activo', '2023-09-22 06:53:00'),
(363, 'LuisHernandez@gmail.com', '8bd15369d86cd301df552f87d895e679', 'Activo', '2023-09-22 16:49:00'),
(364, 'LuisHernandez@gmail.com', 'd22c66a64162080b152c0a0b2c96398b', 'Activo', '2023-09-22 18:08:00'),
(365, 'LuisHernandez@gmail.com', 'f29ca9205015217e110ebe2713abe79d', 'Activo', '2023-09-22 18:08:00'),
(366, 'LuisHernandez@gmail.com', '7367444282e4bf02b40aa4182b73e8ad', 'Activo', '2023-09-22 18:09:00'),
(367, 'LuisHernandez@gmail.com', 'e7488ae0f17dce0e9f017b7534247897', 'Activo', '2023-09-22 19:40:00'),
(368, 'MariaPerez@gmail.com', 'e4239674e05865a8970d7d68c0a3f992', 'Activo', '2023-09-22 20:24:00'),
(369, 'LuisHernandez@gmail.com', 'd34ae47a9cc27c5b7406e4676348aa1f', 'Activo', '2023-09-22 20:26:00'),
(370, 'MariaPerez@gmail.com', 'd33e15421335edbdd665c28d867cff28', 'Activo', '2023-09-22 20:27:00'),
(371, 'val@gmail.com', 'c25fb1d2b321673b2699054f4fd937d5', 'Activo', '2023-09-22 20:29:00'),
(372, 'LuisHernandez@gmail.com', '3ef65a1e739a6e06e63ffbc77210055a', 'Activo', '2023-09-22 20:30:00'),
(373, 'val@gmail.com', '91099aba41a401444eaed590016f8e0c', 'Activo', '2023-09-22 20:30:00'),
(374, 'hol@gmail.com', 'b2174f6b768336be3c1cc90d07b937c9', 'Activo', '2023-09-22 22:47:00'),
(375, 'robertoSanchez@gmail.com', '2eb44c1e1f7a01de6736c69cc26cbf2b', 'Activo', '2023-09-23 00:23:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `recorrido`
--

CREATE TABLE `recorrido` (
  `IDR` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `recorrido`
--

INSERT INTO `recorrido` (`IDR`) VALUES
(1),
(2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sigue`
--

CREATE TABLE `sigue` (
  `Matricula` char(7) NOT NULL,
  `IDR` int(11) NOT NULL,
  `IDA` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `sigue`
--

INSERT INTO `sigue` (`Matricula`, `IDR`, `IDA`) VALUES
('34', 1, 12),
('888', 2, 15);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `trabaja`
--

CREATE TABLE `trabaja` (
  `IDA` int(11) NOT NULL,
  `CIP` int(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `trabaja`
--

INSERT INTO `trabaja` (`IDA`, `CIP`) VALUES
(16, 666);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `transporta`
--

CREATE TABLE `transporta` (
  `codigo` int(11) NOT NULL,
  `MatriculaC` char(7) NOT NULL,
  `fEntrega` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `transporta`
--

INSERT INTO `transporta` (`codigo`, `MatriculaC`, `fEntrega`) VALUES
(14, '78', NULL),
(15, '78', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `Mail` varchar(30) NOT NULL,
  `Contraseña` varchar(100) NOT NULL,
  `Estado` varchar(30) NOT NULL,
  `Rol` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`Mail`, `Contraseña`, `Estado`, `Rol`) VALUES
('hol@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'Activo', 'AlmacenExterno'),
('LuisHernandez@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'Activo', 'AlmacenInterno'),
('MariaPerez@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'Activo', 'ChoferCamioneta'),
('robertoSanchez@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'Activo', 'Administrador'),
('val@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'Activo', 'ChoferCamion');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `va`
--

CREATE TABLE `va` (
  `MatriculaC` char(7) NOT NULL,
  `idI` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `va`
--

INSERT INTO `va` (`MatriculaC`, `idI`) VALUES
('78', 1),
('8', 12);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `va_a`
--

CREATE TABLE `va_a` (
  `Matricula` char(7) NOT NULL,
  `IDA` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `va_a`
--

INSERT INTO `va_a` (`Matricula`, `IDA`) VALUES
('34', 1),
('34', 12),
('34', 13),
('34', 16),
('888', 12);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `va_a_llegada`
--

CREATE TABLE `va_a_llegada` (
  `Matricula` char(7) NOT NULL,
  `IDA` int(11) NOT NULL,
  `FechaLlegada` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `va_a_llegada`
--

INSERT INTO `va_a_llegada` (`Matricula`, `IDA`, `FechaLlegada`) VALUES
('34', 1, '2023-09-22 18:01:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `va_a_salida`
--

CREATE TABLE `va_a_salida` (
  `Matricula` char(7) NOT NULL,
  `IDA` int(11) NOT NULL,
  `FechaSalida` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `va_a_salida`
--

INSERT INTO `va_a_salida` (`Matricula`, `IDA`, `FechaSalida`) VALUES
('34', 16, '2023-09-23 14:48:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `va_llegada`
--

CREATE TABLE `va_llegada` (
  `MatriculaC` char(7) NOT NULL,
  `FechaLlegada` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `va_llegada`
--

INSERT INTO `va_llegada` (`MatriculaC`, `FechaLlegada`) VALUES
('78', '2023-09-23 15:12:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `va_salida`
--

CREATE TABLE `va_salida` (
  `MatriculaC` char(7) NOT NULL,
  `FechaSalida` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `va_salida`
--

INSERT INTO `va_salida` (`MatriculaC`, `FechaSalida`) VALUES
('78', '2023-10-06 15:20:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vehiculo`
--

CREATE TABLE `vehiculo` (
  `MatriculaV` char(7) NOT NULL,
  `Estado` varchar(40) NOT NULL,
  `Disponibilidad` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `vehiculo`
--

INSERT INTO `vehiculo` (`MatriculaV`, `Estado`, `Disponibilidad`) VALUES
('34', 'En buen estado', 'Disponible'),
('78', 'En buen estado', 'Disponible'),
('8', 'En mal estado', 'Disponible'),
('888', 'En buen estado', 'Disponible');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `almacen`
--
ALTER TABLE `almacen`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `almacenexterno`
--
ALTER TABLE `almacenexterno`
  ADD PRIMARY KEY (`idE`);

--
-- Indices de la tabla `almaceninterno`
--
ALTER TABLE `almaceninterno`
  ADD PRIMARY KEY (`idI`),
  ADD UNIQUE KEY `ruta` (`ruta`);

--
-- Indices de la tabla `camion`
--
ALTER TABLE `camion`
  ADD PRIMARY KEY (`Matricula`);

--
-- Indices de la tabla `camionero`
--
ALTER TABLE `camionero`
  ADD PRIMARY KEY (`CIC`);

--
-- Indices de la tabla `camioneta`
--
ALTER TABLE `camioneta`
  ADD PRIMARY KEY (`MatriculaC`);

--
-- Indices de la tabla `conduce`
--
ALTER TABLE `conduce`
  ADD PRIMARY KEY (`CIC`),
  ADD KEY `fk_conduceCamion` (`MatriculaV`);

--
-- Indices de la tabla `contiene`
--
ALTER TABLE `contiene`
  ADD PRIMARY KEY (`codigo`,`IDL`),
  ADD KEY `fk_lote` (`IDL`);

--
-- Indices de la tabla `esta`
--
ALTER TABLE `esta`
  ADD PRIMARY KEY (`IDR`,`IDA`),
  ADD KEY `fk_AlmacenRecorrido` (`IDA`);

--
-- Indices de la tabla `lleva`
--
ALTER TABLE `lleva`
  ADD PRIMARY KEY (`IDL`),
  ADD KEY `fk_camionLleva` (`Matricula`);

--
-- Indices de la tabla `lotes`
--
ALTER TABLE `lotes`
  ADD PRIMARY KEY (`IDL`),
  ADD KEY `fk_almacenLote` (`idI`);

--
-- Indices de la tabla `nrorecorrido`
--
ALTER TABLE `nrorecorrido`
  ADD PRIMARY KEY (`IDR`,`nroRuta`);

--
-- Indices de la tabla `paquetes`
--
ALTER TABLE `paquetes`
  ADD PRIMARY KEY (`codigo`);

--
-- Indices de la tabla `personal`
--
ALTER TABLE `personal`
  ADD PRIMARY KEY (`CIP`);

--
-- Indices de la tabla `personas`
--
ALTER TABLE `personas`
  ADD PRIMARY KEY (`CI`),
  ADD UNIQUE KEY `Mail` (`Mail`);

--
-- Indices de la tabla `personas_token`
--
ALTER TABLE `personas_token`
  ADD PRIMARY KEY (`TokenId`),
  ADD KEY `fk_usuario` (`Mail`);

--
-- Indices de la tabla `recorrido`
--
ALTER TABLE `recorrido`
  ADD PRIMARY KEY (`IDR`);

--
-- Indices de la tabla `sigue`
--
ALTER TABLE `sigue`
  ADD PRIMARY KEY (`Matricula`),
  ADD KEY `fk_sigueAlmacen` (`IDA`),
  ADD KEY `fk_sigueRecorrido` (`IDR`);

--
-- Indices de la tabla `trabaja`
--
ALTER TABLE `trabaja`
  ADD PRIMARY KEY (`CIP`),
  ADD KEY `fk_trabajaAlmacen` (`IDA`);

--
-- Indices de la tabla `transporta`
--
ALTER TABLE `transporta`
  ADD PRIMARY KEY (`codigo`),
  ADD KEY `fk_Camioneta` (`MatriculaC`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`Mail`);

--
-- Indices de la tabla `va`
--
ALTER TABLE `va`
  ADD PRIMARY KEY (`MatriculaC`),
  ADD KEY `fk_almacenInternoVa` (`idI`);

--
-- Indices de la tabla `va_a`
--
ALTER TABLE `va_a`
  ADD PRIMARY KEY (`Matricula`,`IDA`),
  ADD KEY `fk_almacenVa` (`IDA`);

--
-- Indices de la tabla `va_a_llegada`
--
ALTER TABLE `va_a_llegada`
  ADD PRIMARY KEY (`Matricula`,`IDA`,`FechaLlegada`),
  ADD KEY `fk_vaALlegadaAlmacen` (`IDA`);

--
-- Indices de la tabla `va_a_salida`
--
ALTER TABLE `va_a_salida`
  ADD PRIMARY KEY (`Matricula`,`IDA`,`FechaSalida`),
  ADD KEY `fk_vaALSalidaAlmacen` (`IDA`);

--
-- Indices de la tabla `va_llegada`
--
ALTER TABLE `va_llegada`
  ADD PRIMARY KEY (`MatriculaC`,`FechaLlegada`);

--
-- Indices de la tabla `va_salida`
--
ALTER TABLE `va_salida`
  ADD PRIMARY KEY (`MatriculaC`,`FechaSalida`);

--
-- Indices de la tabla `vehiculo`
--
ALTER TABLE `vehiculo`
  ADD PRIMARY KEY (`MatriculaV`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `almacen`
--
ALTER TABLE `almacen`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de la tabla `lotes`
--
ALTER TABLE `lotes`
  MODIFY `IDL` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT de la tabla `paquetes`
--
ALTER TABLE `paquetes`
  MODIFY `codigo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT de la tabla `personas_token`
--
ALTER TABLE `personas_token`
  MODIFY `TokenId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=376;

--
-- AUTO_INCREMENT de la tabla `recorrido`
--
ALTER TABLE `recorrido`
  MODIFY `IDR` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `almacenexterno`
--
ALTER TABLE `almacenexterno`
  ADD CONSTRAINT `fk_almacenId` FOREIGN KEY (`idE`) REFERENCES `almacen` (`id`) ON DELETE NO ACTION;

--
-- Filtros para la tabla `almaceninterno`
--
ALTER TABLE `almaceninterno`
  ADD CONSTRAINT `fk_almacen` FOREIGN KEY (`idI`) REFERENCES `almacen` (`id`) ON DELETE NO ACTION;

--
-- Filtros para la tabla `camion`
--
ALTER TABLE `camion`
  ADD CONSTRAINT `fk_camion` FOREIGN KEY (`Matricula`) REFERENCES `vehiculo` (`MatriculaV`) ON DELETE NO ACTION;

--
-- Filtros para la tabla `camionero`
--
ALTER TABLE `camionero`
  ADD CONSTRAINT `fk_persona` FOREIGN KEY (`CIC`) REFERENCES `personas` (`CI`) ON DELETE NO ACTION;

--
-- Filtros para la tabla `camioneta`
--
ALTER TABLE `camioneta`
  ADD CONSTRAINT `fk_camionetaC` FOREIGN KEY (`MatriculaC`) REFERENCES `vehiculo` (`MatriculaV`) ON DELETE NO ACTION;

--
-- Filtros para la tabla `conduce`
--
ALTER TABLE `conduce`
  ADD CONSTRAINT `fk_conduceCamion` FOREIGN KEY (`MatriculaV`) REFERENCES `vehiculo` (`MatriculaV`),
  ADD CONSTRAINT `fk_conduceCamionero` FOREIGN KEY (`CIC`) REFERENCES `camionero` (`CIC`) ON DELETE NO ACTION;

--
-- Filtros para la tabla `contiene`
--
ALTER TABLE `contiene`
  ADD CONSTRAINT `fk_lote` FOREIGN KEY (`IDL`) REFERENCES `lotes` (`IDL`) ON DELETE NO ACTION,
  ADD CONSTRAINT `fk_paquete` FOREIGN KEY (`codigo`) REFERENCES `paquetes` (`codigo`) ON DELETE NO ACTION;

--
-- Filtros para la tabla `esta`
--
ALTER TABLE `esta`
  ADD CONSTRAINT `fk_AlmacenRecorrido` FOREIGN KEY (`IDA`) REFERENCES `almaceninterno` (`idI`) ON DELETE NO ACTION,
  ADD CONSTRAINT `fk_recorridoAlmacen` FOREIGN KEY (`IDR`) REFERENCES `recorrido` (`IDR`) ON DELETE NO ACTION;

--
-- Filtros para la tabla `lleva`
--
ALTER TABLE `lleva`
  ADD CONSTRAINT `fk_camionLleva` FOREIGN KEY (`Matricula`) REFERENCES `camion` (`Matricula`) ON DELETE NO ACTION,
  ADD CONSTRAINT `fk_loteLleva` FOREIGN KEY (`IDL`) REFERENCES `lotes` (`IDL`) ON DELETE NO ACTION;

--
-- Filtros para la tabla `lotes`
--
ALTER TABLE `lotes`
  ADD CONSTRAINT `fk_almacenLote` FOREIGN KEY (`idI`) REFERENCES `almaceninterno` (`idI`) ON DELETE NO ACTION;

--
-- Filtros para la tabla `nrorecorrido`
--
ALTER TABLE `nrorecorrido`
  ADD CONSTRAINT `fk_recorrido` FOREIGN KEY (`IDR`) REFERENCES `recorrido` (`IDR`);

--
-- Filtros para la tabla `personal`
--
ALTER TABLE `personal`
  ADD CONSTRAINT `fk_personaCi` FOREIGN KEY (`CIP`) REFERENCES `personas` (`CI`) ON DELETE NO ACTION;

--
-- Filtros para la tabla `personas_token`
--
ALTER TABLE `personas_token`
  ADD CONSTRAINT `fk_usuario` FOREIGN KEY (`Mail`) REFERENCES `usuario` (`Mail`) ON DELETE NO ACTION;

--
-- Filtros para la tabla `sigue`
--
ALTER TABLE `sigue`
  ADD CONSTRAINT `fk_sigueAlmacen` FOREIGN KEY (`IDA`) REFERENCES `esta` (`IDA`),
  ADD CONSTRAINT `fk_sigueCamion` FOREIGN KEY (`Matricula`) REFERENCES `camion` (`Matricula`) ON DELETE NO ACTION,
  ADD CONSTRAINT `fk_sigueRecorrido` FOREIGN KEY (`IDR`) REFERENCES `esta` (`IDR`);

--
-- Filtros para la tabla `trabaja`
--
ALTER TABLE `trabaja`
  ADD CONSTRAINT `fk_trabajaAlmacen` FOREIGN KEY (`IDA`) REFERENCES `almacen` (`id`) ON DELETE NO ACTION,
  ADD CONSTRAINT `fk_trabajaPersonal` FOREIGN KEY (`CIP`) REFERENCES `personal` (`CIP`) ON DELETE NO ACTION;

--
-- Filtros para la tabla `transporta`
--
ALTER TABLE `transporta`
  ADD CONSTRAINT `fk_Camioneta` FOREIGN KEY (`MatriculaC`) REFERENCES `camioneta` (`MatriculaC`),
  ADD CONSTRAINT `fk_transportaPaquete` FOREIGN KEY (`codigo`) REFERENCES `paquetes` (`codigo`) ON DELETE NO ACTION;

--
-- Filtros para la tabla `va`
--
ALTER TABLE `va`
  ADD CONSTRAINT `fk_almacenInternoVa` FOREIGN KEY (`idI`) REFERENCES `almaceninterno` (`idI`),
  ADD CONSTRAINT `fk_camionetaVa` FOREIGN KEY (`MatriculaC`) REFERENCES `camioneta` (`MatriculaC`);

--
-- Filtros para la tabla `va_a`
--
ALTER TABLE `va_a`
  ADD CONSTRAINT `fk_almacenVa` FOREIGN KEY (`IDA`) REFERENCES `almacen` (`id`),
  ADD CONSTRAINT `fk_camionVa` FOREIGN KEY (`Matricula`) REFERENCES `camion` (`Matricula`);

--
-- Filtros para la tabla `va_a_llegada`
--
ALTER TABLE `va_a_llegada`
  ADD CONSTRAINT `fk_vaALlegadaAlmacen` FOREIGN KEY (`IDA`) REFERENCES `va_a` (`IDA`) ON DELETE NO ACTION,
  ADD CONSTRAINT `fk_vaALlegadaCamion` FOREIGN KEY (`Matricula`) REFERENCES `va_a` (`Matricula`);

--
-- Filtros para la tabla `va_a_salida`
--
ALTER TABLE `va_a_salida`
  ADD CONSTRAINT `fk_vaALSalidaAlmacen` FOREIGN KEY (`IDA`) REFERENCES `va_a` (`IDA`) ON DELETE NO ACTION,
  ADD CONSTRAINT `fk_vaASalidaCamion` FOREIGN KEY (`Matricula`) REFERENCES `va_a` (`Matricula`) ON DELETE NO ACTION;

--
-- Filtros para la tabla `va_llegada`
--
ALTER TABLE `va_llegada`
  ADD CONSTRAINT `fk_vaALlegadaCamioneta` FOREIGN KEY (`MatriculaC`) REFERENCES `va` (`MatriculaC`);

--
-- Filtros para la tabla `va_salida`
--
ALTER TABLE `va_salida`
  ADD CONSTRAINT `fk_vaASalidaCamioneta` FOREIGN KEY (`MatriculaC`) REFERENCES `va` (`MatriculaC`) ON DELETE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
