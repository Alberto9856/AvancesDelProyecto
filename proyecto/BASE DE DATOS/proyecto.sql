-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 28-10-2020 a las 08:07:26
-- Versión del servidor: 10.1.38-MariaDB
-- Versión de PHP: 7.3.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
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
-- Estructura de tabla para la tabla `banda`
--

CREATE TABLE `banda` (
  `idBanda` int(11) NOT NULL,
  `nombreBanda` varchar(100) NOT NULL,
  `descripcion` varchar(100) DEFAULT NULL,
  `cantidadBoletos` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `banda`
--

INSERT INTO `banda` (`idBanda`, `nombreBanda`, `descripcion`, `cantidadBoletos`) VALUES
(1, 'Septicflesh Infernus Sinfonica', 'Teatro Metropolitan de la Ciudad de Mexico |\r\n2 de febrero del 2021', 10),
(2, 'Hell and Heaven MF', 'Autodromo Hermanos Rodriguez |\r\n5 de Mayo del 2021', 10),
(3, 'Gojira', 'Circo Volador | 17 Septiembre del 2021', 10);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comprasusuario`
--

CREATE TABLE `comprasusuario` (
  `usuario` int(11) NOT NULL,
  `idBanda` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `comprasusuario`
--

INSERT INTO `comprasusuario` (`usuario`, `idBanda`) VALUES
(12, 1),
(12, 1),
(12, 2),
(12, 2),
(12, 2),
(12, 3),
(12, 3),
(12, 3),
(12, 3),
(12, 3),
(12, 3),
(12, 3),
(12, 3),
(12, 2),
(12, 2),
(11, 1),
(11, 1),
(11, 2),
(11, 2),
(11, 2),
(11, 2),
(11, 2),
(12, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `idUsuario` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`idUsuario`, `email`, `password`) VALUES
(11, 'rockalbert_07@hotmail.com', '123'),
(12, 'alberto@hotmail.com', '123');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `banda`
--
ALTER TABLE `banda`
  ADD PRIMARY KEY (`idBanda`);

--
-- Indices de la tabla `comprasusuario`
--
ALTER TABLE `comprasusuario`
  ADD KEY `usuario` (`usuario`),
  ADD KEY `idBanda` (`idBanda`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`idUsuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `banda`
--
ALTER TABLE `banda`
  MODIFY `idBanda` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `idUsuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `comprasusuario`
--
ALTER TABLE `comprasusuario`
  ADD CONSTRAINT `comprasusuario_ibfk_1` FOREIGN KEY (`usuario`) REFERENCES `usuario` (`idUsuario`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `comprasusuario_ibfk_2` FOREIGN KEY (`idBanda`) REFERENCES `banda` (`idBanda`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
