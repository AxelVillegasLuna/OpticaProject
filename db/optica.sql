-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 03-09-2020 a las 18:18:36
-- Versión del servidor: 10.4.8-MariaDB
-- Versión de PHP: 7.3.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `optica`
--
CREATE DATABASE IF NOT EXISTS `optica` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `optica`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `anteojos`
--

CREATE TABLE `anteojos` (
  `id_anteojo` int(11) NOT NULL,
  `cantidad` int(11) DEFAULT NULL,
  `armazon` varchar(255) DEFAULT NULL,
  `od_esf` varchar(50) DEFAULT NULL,
  `od_cil` varchar(50) DEFAULT NULL,
  `od_grados` int(11) DEFAULT NULL,
  `oi_esf` varchar(50) DEFAULT NULL,
  `oi_cil` varchar(50) DEFAULT NULL,
  `oi_grados` int(11) DEFAULT NULL,
  `id_tipo` int(11) NOT NULL,
  `id_cristal` int(11) NOT NULL,
  `id_material` int(11) NOT NULL,
  `id_cp` int(11) NOT NULL,
  `id_orden` int(11) NOT NULL,
  `borrado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `anteojos`
--

INSERT INTO `anteojos` (`id_anteojo`, `cantidad`, `armazon`, `od_esf`, `od_cil`, `od_grados`, `oi_esf`, `oi_cil`, `oi_grados`, `id_tipo`, `id_cristal`, `id_material`, `id_cp`, `id_orden`, `borrado`) VALUES
(1, 5, 'Cobra', '+30', '+150', 90, '+90', '+250', 90, 1, 1, 1, 3, 1, 0),
(2, 4, 'Paloma', '+40', '+190', 120, '+100', '+200', 45, 2, 2, 2, 2, 1, 0),
(3, 50, 'Rugny 590', '+120', '+54', 45, '+90', '+250', 120, 2, 3, 2, 6, 4, 0),
(4, 4, 'Tres patos 389', '+45', '+42', 90, '+90', '+250', 90, 1, 2, 3, 7, 2, 0),
(5, 10, 'Marfil 750', '+280', '+140', 45, '+90', '+250', 90, 2, 3, 2, 3, 7, 0),
(6, 2, 'Cualquiera 500', '+120', '+140', 45, '+50', '+250', 90, 2, 3, 2, 5, 8, 0),
(7, 25, 'Zenzog', '+50', '+280', 150, '+120', '+300', 95, 1, 1, 3, 6, 1, 1),
(9, 2, 'Flecha 500', '+200', '+45', 120, '+120', '+90', 90, 2, 2, 2, 3, 9, 0),
(10, 5, 'Paloma 120', '+97', '+36', 215, '+120', '+54', 45, 2, 3, 3, 7, 1, 1),
(11, 5, 'Paloma 120', '+97', '+36', 215, '+120', '+54', 45, 2, 3, 2, 4, 11, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `id_cliente` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `apellido` varchar(50) NOT NULL,
  `telefono` varchar(20) DEFAULT NULL,
  `borrado` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`id_cliente`, `nombre`, `apellido`, `telefono`, `borrado`) VALUES
(1, 'Axel', 'Villegas Luna', '351221888', 0),
(2, 'Eliana Valeria  ', 'Villegas', '515154848', 0),
(3, 'Mario', 'Pergolini', '26564154', 0),
(4, 'Monica', 'Luna', '3512219341', 0),
(5, 'Juan Cruz', 'Dominguez', '3512219341', 0),
(6, 'Luis', 'Villegas', '45646151851', 0),
(7, 'Jose', 'Dominguez', '4469468484', 0),
(8, 'Juan', 'Perez', '21651561', 0),
(9, 'Jose', 'Paredes', '15165181848', 0),
(10, 'Axel', 'Lopez', '1265156156', 0),
(11, 'Monica', 'Rodriguez', '155155448', 0),
(12, 'Joel', 'Heredia', '16516468', 0),
(13, 'Martin', 'Domingo', '151584545', 0),
(14, 'Raul Tomas', 'Perez', '51651651', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `colores_procesos`
--

CREATE TABLE `colores_procesos` (
  `id_cp` int(11) NOT NULL,
  `nombre` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `colores_procesos`
--

INSERT INTO `colores_procesos` (`id_cp`, `nombre`) VALUES
(1, 'Blanco'),
(2, 'Antireflejo'),
(3, 'Alto índice'),
(4, 'Filtro luz azul'),
(5, 'Fotocromáticos'),
(6, 'Teñidos'),
(7, 'Flint-lite/Lantano');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `materiales`
--

CREATE TABLE `materiales` (
  `id_material` int(11) NOT NULL,
  `nombre` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `materiales`
--

INSERT INTO `materiales` (`id_material`, `nombre`) VALUES
(1, 'Mineral'),
(2, 'Organico'),
(3, 'Policarbonato');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ordenes_trabajo`
--

CREATE TABLE `ordenes_trabajo` (
  `id` int(11) NOT NULL,
  `seña` float DEFAULT NULL,
  `montoTotal` float DEFAULT NULL,
  `fechaEntrada` date DEFAULT NULL,
  `fechaSalida` date DEFAULT NULL,
  `id_cliente` int(11) NOT NULL,
  `borrado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `ordenes_trabajo`
--

INSERT INTO `ordenes_trabajo` (`id`, `seña`, `montoTotal`, `fechaEntrada`, `fechaSalida`, `id_cliente`, `borrado`) VALUES
(1, 500, 3500, '2020-08-04', '2020-08-21', 1, 0),
(2, 1500, 3000, '2020-07-14', '2020-08-27', 1, 0),
(4, 512, 4782, '2020-08-15', '2020-08-24', 1, 0),
(5, 2500, 8900, '2020-08-05', '2020-09-24', 2, 0),
(6, 5400, 10000, '2020-08-05', '2020-09-06', 7, 0),
(7, 800, 6500, '2020-08-12', '0000-00-00', 1, 1),
(8, 900, 5000, '2020-08-18', '0000-00-00', 4, 0),
(9, 2000, 6000, '2020-08-29', '2020-09-04', 1, 1),
(10, 450, 5000, '2020-08-06', '2020-08-19', 1, 1),
(11, 205, 5000, '2020-08-11', '2020-08-29', 14, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_anteojo`
--

CREATE TABLE `tipo_anteojo` (
  `id_tipo` int(11) NOT NULL,
  `nombre` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tipo_anteojo`
--

INSERT INTO `tipo_anteojo` (`id_tipo`, `nombre`) VALUES
(1, 'Cerca'),
(2, 'Lejos');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_cristal`
--

CREATE TABLE `tipo_cristal` (
  `id_cristal` int(11) NOT NULL,
  `nombre` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tipo_cristal`
--

INSERT INTO `tipo_cristal` (`id_cristal`, `nombre`) VALUES
(1, 'Monofocal'),
(2, 'Bifocal'),
(3, 'Multifocal');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `anteojos`
--
ALTER TABLE `anteojos`
  ADD PRIMARY KEY (`id_anteojo`),
  ADD KEY `fk_anteojo_tipo` (`id_tipo`),
  ADD KEY `fk_anteojo_cristal` (`id_cristal`),
  ADD KEY `fk_anteojo_material` (`id_material`),
  ADD KEY `fk_anteojo_cp` (`id_cp`),
  ADD KEY `fk_anteojo_orden` (`id_orden`);

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id_cliente`);

--
-- Indices de la tabla `colores_procesos`
--
ALTER TABLE `colores_procesos`
  ADD PRIMARY KEY (`id_cp`);

--
-- Indices de la tabla `materiales`
--
ALTER TABLE `materiales`
  ADD PRIMARY KEY (`id_material`);

--
-- Indices de la tabla `ordenes_trabajo`
--
ALTER TABLE `ordenes_trabajo`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_orden_cliente` (`id_cliente`);

--
-- Indices de la tabla `tipo_anteojo`
--
ALTER TABLE `tipo_anteojo`
  ADD PRIMARY KEY (`id_tipo`);

--
-- Indices de la tabla `tipo_cristal`
--
ALTER TABLE `tipo_cristal`
  ADD PRIMARY KEY (`id_cristal`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `anteojos`
--
ALTER TABLE `anteojos`
  MODIFY `id_anteojo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id_cliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `colores_procesos`
--
ALTER TABLE `colores_procesos`
  MODIFY `id_cp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `materiales`
--
ALTER TABLE `materiales`
  MODIFY `id_material` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `ordenes_trabajo`
--
ALTER TABLE `ordenes_trabajo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `tipo_anteojo`
--
ALTER TABLE `tipo_anteojo`
  MODIFY `id_tipo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `tipo_cristal`
--
ALTER TABLE `tipo_cristal`
  MODIFY `id_cristal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `anteojos`
--
ALTER TABLE `anteojos`
  ADD CONSTRAINT `fk_anteojo_cp` FOREIGN KEY (`id_cp`) REFERENCES `colores_procesos` (`id_cp`),
  ADD CONSTRAINT `fk_anteojo_cristal` FOREIGN KEY (`id_cristal`) REFERENCES `tipo_cristal` (`id_cristal`),
  ADD CONSTRAINT `fk_anteojo_material` FOREIGN KEY (`id_material`) REFERENCES `materiales` (`id_material`),
  ADD CONSTRAINT `fk_anteojo_orden` FOREIGN KEY (`id_orden`) REFERENCES `ordenes_trabajo` (`id`),
  ADD CONSTRAINT `fk_anteojo_tipo` FOREIGN KEY (`id_tipo`) REFERENCES `tipo_anteojo` (`id_tipo`);

--
-- Filtros para la tabla `ordenes_trabajo`
--
ALTER TABLE `ordenes_trabajo`
  ADD CONSTRAINT `fk_orden_cliente` FOREIGN KEY (`id_cliente`) REFERENCES `clientes` (`id_cliente`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
