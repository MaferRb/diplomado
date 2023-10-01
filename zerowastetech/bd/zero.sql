-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 01-10-2023 a las 04:41:48
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `zero`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `recoleccion_dispositivos`
--

CREATE TABLE `recoleccion_dispositivos` (
  `ID` int(11) NOT NULL,
  `nombre` varchar(50) DEFAULT NULL,
  `apellidos` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `celular` int(20) NOT NULL,
  `direccion` varchar(50) NOT NULL,
  `ciudad` varchar(50) NOT NULL,
  `departamento` varchar(50) NOT NULL,
  `codigo_postal` varchar(10) NOT NULL,
  `comentarios` text NOT NULL,
  `acepta_politicas` tinyint(1) DEFAULT NULL,
  `fecha_registro` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `recoleccion_dispositivos`
--

INSERT INTO `recoleccion_dispositivos` (`ID`, `nombre`, `apellidos`, `email`, `celular`, `direccion`, `ciudad`, `departamento`, `codigo_postal`, `comentarios`, `acepta_politicas`, `fecha_registro`) VALUES
(1, 'maria', 'rodriguez', 'mrivasba@ibero.edu.co', 2147483647, 'CR 42A 54C-12  CIUDAD CORDOBA', 'cali', 'valle', '750051', 'recoger 5 (CPU)', 1, '2023-09-24 19:48:43'),
(2, 'maria 22 test', 'rodriguez', 'mrivasba@ibero.edu.co', 2147483647, 'CR 42A 54C-12  CIUDAD CORDOBA', 'cali', 'valle', '750051', 'recoger tables', 1, '2023-09-24 19:52:55'),
(3, 'William', 'Cortez', 'nmontan8@ibero.edu.co', 2147483647, 'CR 42A 54C-14 Ciudad Cordoba', 'cali', 'valle', '750051', 'recoger PC y Tablet', 1, '2023-09-24 20:58:48'),
(4, 'William', 'Cortez', 'nmontan8@ibero.edu.co', 2147483647, 'CR 42A 54C-14 Ciudad Cordoba', 'cali', 'valle', '750051', 'recoger PC y Tablet', 1, '2023-09-24 21:16:23'),
(5, 'William', 'rodriguez', 'mrarabe@hotmail.com', 2147483647, 'CR 42A 54C-14 Ciudad Cordoba', 'cali', 'valle', '750051', 'recoger computador de escritorio (torre,cpu, mause, teclado)', 1, '2023-09-25 00:33:35'),
(6, 'Sandra', 'Barrera', 'sesove1897@eilnews.com', 2147483647, 'CR 42A 54C-15 CIUDAD CORDOBA', 'cali', 'valle', '750051', 'Se solicita recoger 2 CPU, 2 Teclados, 2 mause, 2 pantallas', 1, '2023-09-25 21:47:04'),
(7, 'Sandra', 'Barrera', 'sesove1897@eilnews.com', 2147483647, 'CR 42A 54C-15 CIUDAD CORDOBA', 'cali', 'valle', '750051', 'Se solicita recoger 2 CPU, 2 Teclados, 2 mause, 2 pantallas', 1, '2023-09-25 22:59:40'),
(8, 'test', 'test2', 'ejemplo@test.com', 2147483647, 'test direccion', 'test ciudad', 'test despartamento', '00000', 'ok test', 1, '2023-09-25 23:21:49'),
(9, 'Lisandro', 'Osorio Amaya', 'mrarabe@hotmail.com', 2147483647, 'test direccion', 'test ciudad', 'test despartamento', '00000', 'recoger Pc (CPU, Teclado, mause, cables, pantalla)', 1, '2023-09-26 01:35:38'),
(10, 'maria', 'rivas', 'maria@hotmail.com', 1647818529, 'test direccion', 'test ciudad', 'test despartamento', '00000', 'comentario de prueba ', 1, '2023-09-26 03:06:11'),
(11, 'maria', 'rivas', 'maria@hotmail.com', 1647818529, 'test direccion', 'test ciudad', 'test despartamento', '00000', 'comentario de prueba ', 1, '2023-09-26 03:14:11'),
(12, 'nombre test', 'apellido test', 'maria6@hotmail.com', 600000123, 'direccion test', 'ciudad test', 'departamento test', '000000', 'comentario test', 1, '2023-09-28 03:44:55');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `recoleccion_dispositivos`
--
ALTER TABLE `recoleccion_dispositivos`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `recoleccion_dispositivos`
--
ALTER TABLE `recoleccion_dispositivos`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
