-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 29-12-2020 a las 18:33:30
-- Versión del servidor: 10.4.14-MariaDB
-- Versión de PHP: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `teatro`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `obra`
--

CREATE TABLE `obra` (
  `cod_obra` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `fecha_obra` date NOT NULL,
  `aforo` int(11) NOT NULL,
  `disponibles` int(11) NOT NULL,
  `sala` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `obra`
--

INSERT INTO `obra` (`cod_obra`, `nombre`, `fecha_obra`, `aforo`, `disponibles`, `sala`) VALUES
(1, 'Romeo y Julieta', '2020-12-31', 10, 10, 'Teatro Nacional'),
(2, 'Hamlet', '2020-12-25', 10, 10, 'Teatro Nacional'),
(3, 'la vida es un sueño', '2021-01-15', 10, 10, 'Teatro Teresa Carreño'),
(4, 'Invencibles', '2020-12-23', 10, 10, 'Teatro Municipal'),
(5, 'El rey Lear', '2020-12-31', 10, 10, 'Teatro Mucipal'),
(6, 'Edipo rey', '2020-12-30', 10, 9, 'Teatro Nacional'),
(7, 'El enfermo imaginario', '2021-01-14', 10, 10, 'Teatro Nacional'),
(8, 'El cerco de Numancia', '2021-01-21', 10, 10, 'Teatro Teresa Carreño'),
(9, 'El perro del hortelano', '2020-12-30', 10, 10, 'Teatro Municipal'),
(10, 'Historia de una escalera', '2021-02-04', 10, 10, 'Teatro Nacional');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ventas`
--

CREATE TABLE `ventas` (
  `numero_venta` int(11) NOT NULL,
  `cod_obra` int(11) NOT NULL,
  `comprador` varchar(100) NOT NULL,
  `fecha_compra` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `ventas`
--

INSERT INTO `ventas` (`numero_venta`, `cod_obra`, `comprador`, `fecha_compra`) VALUES
(69, 6, 'Jose Simancas', '2020-12-29');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `obra`
--
ALTER TABLE `obra`
  ADD PRIMARY KEY (`cod_obra`);

--
-- Indices de la tabla `ventas`
--
ALTER TABLE `ventas`
  ADD PRIMARY KEY (`numero_venta`),
  ADD KEY `relacion_obra` (`cod_obra`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `obra`
--
ALTER TABLE `obra`
  MODIFY `cod_obra` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `ventas`
--
ALTER TABLE `ventas`
  MODIFY `numero_venta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `ventas`
--
ALTER TABLE `ventas`
  ADD CONSTRAINT `relacion_obra` FOREIGN KEY (`cod_obra`) REFERENCES `obra` (`cod_obra`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
